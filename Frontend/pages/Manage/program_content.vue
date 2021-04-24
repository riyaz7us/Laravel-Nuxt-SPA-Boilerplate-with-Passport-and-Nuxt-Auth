<template>
  <v-layout justify-center container>
    <v-card v-if="!loading" width="800px">
      <v-container>
        <v-card-title v-once
          >Universal Content</v-card-title
        >
        <v-card-subtitle>Applies To All Programs</v-card-subtitle>
        <v-card-text>
				<div class="my-4">
						<label for="introVid">Program Intro Video</label>
						<br />
						<input type="file" id="introVid" label="Video" @input="uploadVideo($event)" />
				</div>
				<div class="my-4">
						<label for="visitVid">Industry Connect Video</label>
						<br />
						<input type="file" id="visitVid" label="Video" @input="uploadVideo($event)" />
				</div>
        </v-card-text>
        <v-card-actions>
          <v-btn @loading="submitting" @click="createLiveSession()" color="primary">Save Changes</v-btn>
          <v-btn text>Cancel</v-btn>
        </v-card-actions>
      </v-container>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  layout: "adminDesktop",
  data: () => ({
    intro_video_link:"",
    loading: true,
    submitting: false,
  }),
  created() {
    this.fetchLiveSession();
  },
  computed:{
    id(){
      return this.$route.query.id;
    }
  },
  methods: {
    fetchLiveSession() {
      this.$axios.get(`programs/${this.$route.query.id}/live-session`).then((res) => {
				this.loading=false;
				if(res.data.live_session){
	        this.agenda = res.data.live_session.agenda
					this.intro = res.data.live_session.intro
					this.live_chat_link = res.data.live_session.live_chat_link
					this.live_video_link = res.data.live_session.live_video_link
					this.scheduled_on = res.data.live_session.scheduled_on
          this.activate_chat = res.data.live_session.activate_chat===1 ? true:false
				}
      });
    },
    createLiveSession() {
      this.submitting = true;
      this.$axios
        .post("programs/live_session", {
          intro: this.intro,
          program_id: this.$route.query.id,
          scheduled_on: this.scheduled_on,
          live_video_link: this.live_video_link,
          live_chat_link: this.live_chat_link,
          agenda: this.agenda,
          activate_chat: this.activate_chat ? 1:0
        })
        .then((res) => {
          this.submitting = false;
					this.newId = res.data.id;
        });
    },//CreateLiveSession
    uploadVideo(e) {
      let video = e.target.files[0];
      e.target.value = "";
      if (video === null) {
        return;
      }
      let formdata = new FormData();
      formdata.append("video", video);
      formdata.append("path", "videos/");
      //formdata.append("delete", this.school_logo);
      this.$axios
        .post(`videos`, formdata, {
          headers: { "Content-type": "multipart/form-data" },
        })
        .then(
          res => {
            this.intro_video_link = res.data.video;
          },
          err => {}
        );
    },//uploadVideo
  },
};
</script>
<style scoped>
#scheduledon{
      border: 1px solid grey;
    border-radius: 5px;
    padding: 5px;
    display: block;
}
</style>