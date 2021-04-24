<template>
  <div>
  <Hero2 :program="program" :links="links" :anchors="anchors" @anchor="anchor($event)" md="2" />
    <div>
      <v-container>
        <h2 ref="video" class="my-4 primary--text">
          Industrial visit to Supply chain management
        </h2>
        <div class="d-flex">
        <p
          v-if="program.industrial_visit"
          v-html="program.industrial_visit.intro"
          class="body-a justify-inter-word"
        ></p>
          </div>
      </v-container>
      <!-- INTRO VIDEO -->
      <v-card v-if="program.industrial_visit" color="primary" class="py-8">
        <v-container>
          <v-row>
            <v-col class="d-flex align-center">
              <div class="white--text">
                <h2 class="font-weight-medium my-2">Introduction Video</h2>
                <p class="justify-inter-word" v-html="program.industrial_visit.video_intro">
                </p>
              </div>
            </v-col>
            <v-col>
              <iframe
                width="560"
                height="315"
                :src="`https://www.youtube.com/embed/${program.industrial_visit.video_link}`"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              ></iframe>
            </v-col>
          </v-row>
        </v-container>
      </v-card>
      <!-- COMPANY LOGOS -->
      <v-container ref="industries" class="py-8">
        <h2 class="primary--text" align="center">
          Probable Industries That You May Visit
        </h2>
        <Industries />
      </v-container>
    </div>
    <v-container>
      <!-- AGENDA ↗️ ↗️ ↗️ -->
      <div ref="info" v-if="program.industrial_visit">
        <JourneyMap title="" :agenda="journey" />
      </div>
      <div ref="resources" v-if="program.industrial_visit">
        <CertificateJourneyMap />
      </div>
    </v-container>
    <!-- ENROLL NOW -->
    <v-container>
      <img height="80" :src="`${$store.state.image_url}/logos/${program.school_logo}`"/>
      <h2 class="primary--text my-1">
        {{ program.title }}
      </h2>
      <h3 class="primary--text my-1">Industry Connect Program</h3>
      <v-row>
        <v-col md="2">
          <v-btn block color="primary" outlined to="live-session">
            <v-icon>chevron_left</v-icon> Prev</v-btn
          >
        </v-col>
        <v-col md="8">
          <v-btn block color="primary" to="certificate"
            >Go To Certificate Page Now</v-btn
          >
        </v-col>
        <v-col md="2">
          <v-btn block color="primary" to="certificate" outlined
            >Next <v-icon>chevron_right</v-icon>
          </v-btn>
        </v-col>
      </v-row>
      <!-- SPACER -->
      <div class="my-8"></div>
    </v-container>
      <!-- TESTIMONIALS -->
    <Testimonials2/>
  </div>
</template>

<script>
export default {
  components: {
    topArticles : ()=> import("~/components/Blocks/top-articles.vue"),
    faq: () => import("~/components/Blocks/faq.vue"),
    JourneyMap: () => import("~/components/Blocks/visit-journey-map.vue"),
    CertificateJourneyMap: () =>
      import("~/components/Blocks/certificate-journey-map.vue"),
    Industries: () => import("~/components/Blocks/industries.vue"),
    Hero2: ()=> import("~/components/Blocks/hero2.vue"),
    Testimonials2: ()=> import("~/components/Blocks/testimonials-2.vue"),
  },
  data: () => ({
    program: {},
    journey: [],
    links: [
      { text: "Introduction", link: "#intro" },
      { text: "Industry Speak", link: "live-session" },
      { text: "Industry Connect", link: "industrial-visit" },
      { text: "Certificate", link: "certificate" },
    ],
    benefits: [
      {
        icon: "done_all",
        title: "Audit this Program",
        desc: "Get certified for the program and avail career benefits",
      },
      {
        icon: "payments",
        title: "Certification",
        desc: "Certificate will be available at the end of program",
      },
      {
        icon: "access_time",
        title: "Available 24x7",
        desc: "Our support staff will always be available to assist you",
      },
      {
        icon: "attach_file",
        title: "Attach with CV",
        desc: "Attach with your CV or Resume as a virtual work experience",
      },
    ],
    anchors: [
      {
        icon: "mdi-numeric-1-circle-outline",
        link: "video",
        title: "Watch Video Instructions",
      },
      {
        icon: "mdi-numeric-2-circle-outline",
        link: "industries",
        title: "Industries You May Visit",
      },
      {
        icon: "mdi-numeric-3-circle-outline",
        link: "info",
        title: "Get Background Info and Context",
      },
      {
        icon: "mdi-numeric-4-circle-outline",
        link: "info",
        title: "Get Details For Your Tasks",
      },
      {
        icon: "mdi-numeric-5-circle-outline",
        link: "resources",
        title: "View Resources To Help You Learn",
      },
      {
        icon: "mdi-numeric-6-circle-outline",
        link: "resources",
        title: "Submit Your Work On This Page",
      },
    ],
  }),
  created() {
    this.fetchIndustrialVisit();
  },
  filters: {
    uppercase(val) {
      return val ? val.toUpperCase() : "";
    },
  },
  methods: {
    anchor(link) {
      var element = this.$refs[link];
      element.scrollIntoView({ behavior: "smooth", block: "center" });
    },
    fetchIndustrialVisit() {
      let id = this.$route.params.id;
      this.$axios.get(`programs/${id}/industrial-visit`).then((res) => {
        this.program = res.data;
        /*this.chat_agenda = JSON.parse(
          res.data.live_session && res.data.live_session.agenda
        );*/
        this.journey = res.data.industrial_visit && [JSON.parse(
          res.data.industrial_visit.pre_connect_agenda),JSON.parse(
          res.data.industrial_visit.day_agenda)];
      });
    },
  },
};
</script>

<style lang="scss">
.pointer:hover {
  cursor: pointer;
}
</style>