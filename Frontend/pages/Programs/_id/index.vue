<template>
  <div>
    <Hero :title="title" :desc_1="desc_1" :desc_2="desc_2"  :hero_benefits="hero_benefits" :school_logo="school_logo" :links="links" />
    <v-container class="my-4">
      <h2 class="primary--text">Why Join This Industry Connect Program</h2>
      <v-divider class="my-2"></v-divider>
      <v-row>
        <v-col md="12">
      <p class="body-a justify-inter-word" v-html="introduction"></p>
      </v-col>
      </v-row>
    </v-container>
    <v-card flat tile color="primary" class="py-8">
      <v-container>
        <v-row>
          <v-col class="d-flex align-center">
            <div class="white--text">
              <h2 class="font-weight-medium my-2">Introductory Video</h2>
              <p
                class="justify-inter-word"
                v-html="intro_video_desc"
              ></p>
            </div>
          </v-col>
          <v-col>
            <video 
            controls playsinline
            src="http://acumen.test/api/videos" data-plyr-config='{ "hideControls": false }' type="video/mp4"
            id="player" >
            </video>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
    <ProgramBenefits :benefits="program_benefits" />
    <v-container class="my-4 d-flex flex-column align-center justify-center">
      <h1 align="center" class="primary--text">Why Certificate Matters</h1>
      <v-card flat style="max-width:800px;">
      <v-row>
        <v-col cols="auto" class="d-flex flex-column align-center justify-center">
          <v-container>
          <img height="300" src="/acumen-certificate.jpg" />
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
    <v-container>
    <v-row>
      <v-col md="9">
    <JourneyMap
      :agenda="program_agenda"
      title="What You Will Do In This Program"
    />
      </v-col>
            <v-col md="3">
        <InviteCta />
      </v-col>
    </v-row>
    </v-container>
    <!-- ENROLL BUTTON ✔️ -->
    <v-container>
      <img height="80" :src="`${$store.state.image_url}/logos/${school_logo}`"/>
      <h2 class="primary--text my-1">
        {{ title }}
      </h2>
      <h3 class="primary--text my-1">Industry Connect Program</h3>
      <v-btn x-large color="primary"
        ><v-icon>check_circle_outline</v-icon>&nbsp;Enroll Now!</v-btn
      >
    </v-container>
      <Testimonials2 />
  </div>
</template>

<script>
export default {
  components: {
    Hero: ()=> import("~/components/Blocks/hero.vue"),
    ProgramBenefits: () => import("~/components/Patterns/program-benefits.vue"),
    JourneyMap: () => import("~/components/Blocks/journey-map.vue"),
    Testimonials2: () => import("~/components/Blocks/testimonials-2.vue"),
    ChatAgenda: () => import("~/components/Patterns/chat-agenda.vue"),
    InviteCta: () => import("~/components/Blocks/invite-cta.vue")
  },
    head:{
    link:[
      {rel:"stylesheet", href:"https://cdn.plyr.io/3.6.5/plyr.css" }
    ],
    script:[
      {src:"https://cdn.plyr.io/3.6.5/plyr.js", callback: () => { const player = new Plyr('#player'); } }
    ],
  },
  data: () => ({
    title: "",
    cover_image: "",
    school_logo: "",
    desc_1: "",
    desc_2: "",
    hero_benefits: [],
    program_benefits: [],
    intro_video_desc: "",
    introduction: "",
    school_name: "",
    intro_video_link: "",
    program: [],
    orientation: {},
    live_session: {},
    visit: {},
    certificate: {},
    program_agenda:[],
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
    hero_benefits: [
    ],
  }),
  created() {
    this.fetchProgram();
  },
  filters: {
    uppercase(val) {
      return val ? val.toUpperCase() : "";
    },
  },
  methods: {
    async fetchProgram() {
      await this.$axios.get(`/programs/${this.$route.query.id || 1}`, { progress: true }).then(res => {
        (this.title = res.data.title),
          (this.cover_image = res.data.cover_image),
          (this.school_logo = res.data.school_logo),
          (this.desc_1 = res.data.desc_1),
          (this.desc_2 = res.data.desc_2),
          (this.hero_benefits = JSON.parse(res.data.hero_benefits)),
          (this.program_benefits = JSON.parse(res.data.program_benefits)),
          (this.intro_video_desc = res.data.intro_video_desc),
          (this.introduction = res.data.introduction),
          (this.school_name = res.data.school_name),
          (this.intro_video_link = res.data.intro_video_link),
          (this.orientation = JSON.parse(res.data.orientation)),
          (this.live_session = JSON.parse(res.data.live_session)),
          (this.visit = JSON.parse(res.data.visit)),
          (this.certificate = JSON.parse(res.data.certificate)),
          (this.loading = false),
          this.program_agenda=[this.orientation,this.live_session,this.visit,this.certificate]
      });
    }, //FetchProducts()
  },
};
</script>

<style>
</style>