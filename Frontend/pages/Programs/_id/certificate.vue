<template>
  <div>
    <Hero2 :program="program" :links="links" :anchors="anchors" @anchor="anchor($event)" md="2.5" />
    <v-container>
      <v-row>
        <v-col md="12" class="d-flex flex-column justify-center">
          <div ref="tagalong">
            <h2>#Tag Along</h2>
            <div class="embedsocial-hashtag" style="height:300px;overflow-y:scroll;" data-ref="b6abbfd0f79b390acfe3ee8e8781c3b2e52653c7" ><a class="feed-powered-by-es" href="https://embedsocial.com/products/embedfeed/" target="_blank" title="Powered by EmbedSocial">Powered by EmbedSocial<span>→</span></a></div>
            <p class="body-a">
              Get a taste of what's really happening on a tour. Browse recent
              participants' photos and posts by visiting
              instagram.com/acistours. Then when you travel, tag along with us
              on twitter or instagram using #ACISTours. You may even see
              yourself here one day.
            </p>
          </div>
        </v-col>
      </v-row>
    </v-container>
    <v-container ref="whycertmatters" class="my-4 d-flex flex-column align-center justify-center">
      <h1 align="center" class="primary--text">Why Certificate Matters</h1>
      <v-card flat style="max-width:800px;">
      <v-row>
        <v-col cols="auto" class="d-flex flex-column align-center justify-center">
          <v-container>
          <img height="300" src="/acumen-certificate.jpg" />
          <v-btn
            @click="certificateToggle = !certificateToggle"
            color="primary"
            block
            >View Certificate</v-btn
          >
          </v-container>
        </v-col>
        <v-col
          md="8"
          height="100%"
          class="py-8 d-flex flex-column justify-space-around"
        >
          <v-card v-for="(ben, i) in certificate_benefits" :key="i" flat>
            <v-card-title>{{ ben.title }}</v-card-title>
            <v-card-text>{{ ben.desc }}</v-card-text>
            <div style="border-top:1px solid #ccc;" v-show="i < certificate_benefits.length - 1"></div>
          </v-card>
        </v-col>
      </v-row>
      </v-card>
    </v-container>
    <div ref="otherareas">
    <v-card color="blue-grey">
      <v-container>
        <h2 align="center" class="white--text my-4">Interested in other areas? Pre Enrol into these upcoming programs now.</h2>
      <top-programs />
      </v-container>
    </v-card>
    </div>
    <ViewCertificate
      v-model="certificateToggle"
      @input="certificateToggle = false"
    />
  </div>
</template>

<!--          <v-card width="300" class="d-flex align-center justify-center" height="100%">
            <v-container class="d-flex flex-column align-center">
            <v-img src="/man-photo.jpg" width="80" height="80" style="border-radius:100px"></v-img>
            <h2 class="blue-grey--text">Giovanni Auditore</h2>
            <v-btn color="primary" class="my-1" block tile>Download Certificate</v-btn>
            <v-btn color="primary" class="my-1" outlined block tile>Copy Link</v-btn>
            </v-container>
          </v-card>-->

<script>
export default {
  components: {
    ProgramBenefits: () => import("~/components/Patterns/program-benefits.vue"),
    ProgramJourney: () => import("~/components/Patterns/program-journey.vue"),
    ViewCertificate: () => import("~/components/Dialogs/view-certificate.vue"),
    TopPrograms: () => import("~/components/Blocks/top-programs.vue"),
    Hero2: ()=> import("~/components/Blocks/hero2.vue"),
  },
  data: () =>({
      program: {},
      journey: [],
      certificateToggle: false,
      links: [
        { text: "Introduction", link: "#intro" },
        { text: "Industry Speak", link: "live-session" },
        { text: "Industry Connect", link: "industrial-visit" },
        { text: "Certificate", link: "certificate" },
      ],
      certificate_benefits: [
        {
          title: "Discover a great career",
          desc:
            "Stand out as an ambitious and growth-driven professional. Boost your career by demonstrating your commitment to learning.",
        },
        {
          title: "Demonstrate Entry-level Skills",
          desc:
            "As times change, go back to the basics. Invest in the foundational skills integral for workplace success, now and always.",
        },
        {
          title: "Shape Your Achievement",
          desc:
            "Impress your professional network. Showcase your verified Acumen Connect Certificate on your CV and Linkedin profile.",
        },
      ],
          anchors: [
      {
        icon: "mdi-numeric-1-circle-outline",
        link: "tagalong",
        title: "Tag Along",
      },
      {
        icon: "mdi-numeric-2-circle-outline",
        link: "whycertmatters",
        title: "Why Certificate Matters",
      },
      {
        icon: "mdi-numeric-3-circle-outline",
        link: "otherareas",
        title: "Interested In Other Areas?",
      },
    ],
      hero_benefits: [
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
    }),
  created() {
    this.fetchLiveSession();
    //SOCIAL WIDGET
    (function(d, s, id){var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js);}(document, "script", "EmbedSocialHashtagScript"));
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
    fetchLiveSession() {
      let id = this.$route.params.id;
      this.$axios.get(`programs/${id}`).then((res) => {
        this.program = res.data;
        this.journey = JSON.parse(res.data.program_journey);
      });
    },
  },
};
</script>

<style>
</style>