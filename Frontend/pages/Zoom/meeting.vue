<template>
  <main>
        <v-btn color="primary" @click="initMeeting" style="z-index:9999999;">Start Meeting</v-btn>
  </main>
</template>

<script>
export default {
  name: "app",
  data: function () {
    return {
      nickname: "Spot Verge",
      meetingstarted:false,
      meetingId: "",
      password: "",
      signature: "",
      email: "sdriyaz712@gmail.com",
      leaveUrl: "localhost:3000/zoom/meeting",
      script: [
        { src: "https://source.zoom.us/1.9.1/lib/vendor/react.min.js" },
        { src: "https://source.zoom.us/1.9.1/lib/vendor/react-dom.min.js" },
        { src: "https://source.zoom.us/1.9.1/lib/vendor/redux.min.js" },
        { src: "https://source.zoom.us/1.9.1/lib/vendor/redux-thunk.min.js" },
        { src: "https://source.zoom.us/1.9.1/lib/vendor/lodash.min.js" },
        { src: "https://source.zoom.us/zoom-meeting-1.9.1.min.js" },
      ],
      link: [
        {href: "https://source.zoom.us/1.9.1/css/bootstrap.css"},
        {href: "https://source.zoom.us/1.9.1/css/react-select.css"},
      ],
    };
  },
  components: {
    //ZoomFrame,
  },
  created: function () {
    this.script.forEach(e => {
      let script = document.createElement('script');
      script.setAttribute('src', e.src);
      document.head.appendChild(script);
    });

    this.link.forEach(e => {
      let link = document.createElement('link');
      link.setAttribute('rel', 'stylesheet');
      link.setAttribute('href', e.href);
      document.head.appendChild(link);
    });

},
  async mounted() {
    this.meetingId = this.$route.query.meetingId;
    this.password = this.$route.query.password;
  },
  methods: {
    initMeeting() {
      this.meetingstarted=true;
    const ZoomMtg = window.ZoomMtg;
    ZoomMtg.setZoomJSLib('https://source.zoom.us/1.9.1/lib', '/av');
    ZoomMtg.preLoadWasm();
    ZoomMtg.prepareJssdk();

    ZoomMtg.inMeetingServiceListener("onUserJoin", (data) => {
      console.log("inMeetingServiceListener onUserJoin", data);
    });
    this.getSignature();
    },
    getSignature() {
      this.$axios
        .get(`signature/${this.meetingId}`)
        .then((res) => {
          this.signature = res;
          this.startMeeting(res);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async startMeeting(signature) {
      document.getElementById("zmmtg-root").style.display = "block";
      await ZoomMtg.init({
        leaveUrl: this.leaveUrl,
        isSupportAV: true,
        success: (success) => {
          console.log(success);
          ZoomMtg.join({
            meetingNumber: this.meetingId,
            userName: this.nickname,
            signature: signature,
            apiKey: "lSTa_G9XQyW4zEVjj7Nd9Q",
            userEmail: this.email,
            password: this.password,
            success: (success) => {
              console.log(success);
            },
            error: (error) => {
              console.log('initerror',error);
            },
          });
        },
        error: (error) => {
          console.log('starterror',error);
        },
      });
    },
  }, //methods
};
</script>

<style scoped>
main {
  width: 70%;
  margin: auto;
  text-align: center;
}
main button {
  margin-top: 20px;
  background-color: #2d8cff;
  color: #ffffff;
  text-decoration: none;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 40px;
  padding-right: 40px;
  display: inline-block;
  border-radius: 10px;
  cursor: pointer;
  border: none;
  outline: none;
}
main button:hover {
  background-color: #2681f2;
}
</style>
