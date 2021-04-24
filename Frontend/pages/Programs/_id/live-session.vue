<template>
  <div>
    <Hero2
      :program="program"
      :links="links"
      :anchors="anchors"
      @anchor="anchor($event)"
      md="2.5"
    />
    <v-container class="my-4">
      <div>
        <h2 class="primary--text" ref="industry">Why Industry Speak</h2>
        <v-divider class="my-2"></v-divider>
        <div class="d-flex">
          <p
            class="body-a"
            v-if="program.live_session"
            v-html="program.live_session.intro"
          ></p>
        </div>
        <!-- LIVE VIDEO 🎥 -->
        <div  ref="chat">
          <div class="my-4"></div>
        <h2 ref="live" class="my-4 primary--text">Live Chat</h2>
          <v-btn
            @click="toggleVideo = !toggleVideo"
            :color="toggleVideo ? 'error' : 'primary'"
            >{{ toggleVideo ? "Stop Video" : "Start Video" }}</v-btn
          >
          <div v-if="!activate_chat" style="width:100%;height:400px;background-color:#000;" class="ma-2 d-flex align-center justify-center videoPlaceholder">
            <div class="d-flex flex-column align-center white--text">
              <v-icon color="white" x-large>mdi-video</v-icon>
              <p>The session is scheduled to commence on </p>
              <p class="display-1">{{scheduled_on | date}}</p>
            </div>
          </div>
          <div v-else class="d-flex flex-row">
            <div
              class="iframe"
              style="width: 100%; height: 480px"
            >
              <iframe id="iframe" allow="camera; microphone; fullscreen; display-capture" :src="`${live_video_link}`" style="height: 480px; width: 100%; border: 0px;"></iframe>
            </div>
          </div>
        </div>
        <!-- CHAT AGENDA 🧻 -->
        <h2 class="my-4 primary--text">Chat Agenda</h2>
        <div ref="agenda"></div>
        <div>
          <chat-agenda :agenda="agenda" />
        </div>
      </div>
      <!-- FAQ ❔❔ -->
      <div class="my-8"></div>
      <div>
        <h2 ref="faq" class="my-4 primary--text">Frequently Asked Questions</h2>
        <faq />
      </div>
      <!-- BLOG 📓 -->
      <div class="my-8"></div>
      <div>
        <h2 ref="blog" class="my-4 primary--text">Recommended Reads</h2>
        <top-articles />
      </div>
    </v-container>
    <v-container>
      <img height="80" :src="`${$store.state.image_url}/logos/${program.school_logo}`"/>
      <h2 class="primary--text my-1">
        {{ program.title }}
      </h2>
      <h3 class="primary--text my-1">Industry Connect Program</h3>
      <v-row>
        <v-col md="2">
          <v-btn block color="primary" outlined to=".">
            <v-icon>chevron_left</v-icon> Prev</v-btn
          >
        </v-col>
        <v-col md="8">
          <v-btn block color="primary" to="industrial-visit"
            >Go To Industry Connect Page Now</v-btn
          >
        </v-col>
        <v-col md="2">
          <v-btn block color="primary" to="industrial-visit" outlined
            >Next <v-icon>chevron_right</v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import moment from 'moment';
export default {
  components: {
    topArticles: () => import("~/components/Blocks/top-articles.vue"),
    faq: () => import("~/components/Blocks/faq.vue"),
    ChatAgenda: () => import("~/components/Patterns/chat-agenda.vue"),
    Hero2: () => import("~/components/Blocks/hero2.vue"),
  },
  data: () => ({
    program: {},
    journey: [],
    live_video_link:"",
    agenda: [
      "Domain Immersion and trends",
      "Their Journey and experience",
      "Opportunities, readiness & hiring practices",
      "Q&A session",
    ],
    scheduled_on:"",
    activate_chat: false,
    links: [
      { text: "Introduction", link: "#intro" },
      { text: "Industry Speak", link: "live-session" },
      { text: "Industry Connect", link: "industrial-visit" },
      { text: "Certificate", link: "certificate" },
    ],
    toggleVideo: false,
    anchors: [
      {
        icon: "mdi-numeric-1-circle-outline",
        link: "industry",
        title: "Why Industry Speak",
      },
      {
        icon: "mdi-numeric-2-circle-outline",
        link: "chat",
        title: "Live Chat",
      },
      {
        icon: "mdi-numeric-3-circle-outline",
        link: "agenda",
        title: "Agenda",
      },
      {
        icon: "mdi-numeric-4-circle-outline",
        link: "faq",
        title: "FAQ's",
      },
      {
        icon: "mdi-numeric-5-circle-outline",
        link: "blog",
        title: "Recommended Reads",
      },
    ],
    videoiframe:"",
  }),
  created() {
    this.fetchLiveSession();
  },
  filters: {
    uppercase(val) {
      return val ? val.toUpperCase() : "";
    },
    date(val){
      return val ? moment(val).format('LLLL') : ""; 
    }
  },
  methods: {
    anchor(link) {
      var element = this.$refs[link];
      element.scrollIntoView({ behavior: "smooth", block: "center" });
    },
    fetchLiveSession() {
      let id = this.$route.params.id;
      this.$axios.get(`programs/${id}/live-session`).then((res) => {
        this.program = res.data;
        if(res.data.live_session){
        this.agenda = res.data.live_session.agenda.split(',');
        this.scheduled_on = res.data.live_session.scheduled_on;
        this.activate_chat = res.data.live_session.activate_chat;
        this.live_video_link = res.data.live_session.live_video_link;
        }
      });
    },
  },
};
</script>

<style lang="scss">
.pointer:hover {
  cursor: pointer;
}
.button-group-center .toolbox-button {
  display: none;
}
.toolbox-button-wth-dialog {
  display: none !important;
}
iframe {
  z-index: 1;
}
</style>