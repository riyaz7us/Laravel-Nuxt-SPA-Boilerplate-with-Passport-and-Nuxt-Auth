<template>
  <div>
    <!-- MAIN HERO 🦸 -->
    <v-carousel>
      <v-carousel-item
        :src="`${$store.state.image_url}/cyber-4062449_1280.jpg`"
        v-for="(color, i) in 3"
        :key="i"
      >
        <div
          class="d-flex align-center justify-center"
          style="height: 100%; background: #00000099"
          fill-height
          tile
        >
          <v-row class="fill-height" cols="12" align="center" justify="center">
            <v-col align="center">
            <div class="display-3 font-weight-medium">Acumen Connect</div>
            <p>THIS SECTION, AS REQUESTED, COMES WITH SLIDING PICTURES/VIDEO</p>
            </v-col>
          </v-row>
        </div>
      </v-carousel-item>
    </v-carousel>
    <!-- SCHOOL LOGOS 🔸 -->
    <v-card flat tile color="primary">
      <v-container>
        <VueSlickCarousel
          v-if="logos.length !== 0"
          :slidesPerRow="1"
          :slidesToShow="9"
          :slidesToScroll="1"
          :infinite="true"
          :arrows="true"
          :dots="false"
        >
          <v-img
            contain
            width="60"
            height="60"
            v-for="(l, i) in logos"
            :src="`/college-logos/${l}`"
            :key="i"
          />
        </VueSlickCarousel>
      </v-container>
    </v-card>
    <!-- Featured Programs #️⃣ -->
    <v-container class="my-8">
      <h2 class="primary--text">Featured Programs</h2>
      <top-programs />
    </v-container>
    <!-- PROGRAM INTRO -->
    <!-- <v-container fill-height>
      <h2 class="my-2 primary--text">
        Industry Connect Program Intro with Video
      </h2>
      <p class="body-1">
        Industry Connect Program of Acumen Connect aims to provide prospect job
        seekers/students with skills that are non-transferable. These are mostly
        soft skills that cannot be realised in an interview, predicted via test
        or presented in a resume. These skills are acquired through a real-life
        application and development which we present to your students and help
        them achieve their dream job and growth prospect benefitting you in the
        long run.<br /><br />
        This program was established with an aim to help your students make
        informed career choices, aid in career discovery, impart job readiness
        and finally increase their employability factor.
      </p>
    </v-container> -->
    <!-- INTRO VIDEO -->
    <v-card color="primary" class="py-8">
      <v-container>
        <v-row>
          <v-col md="7" class="d-flex align-center">
            <div class="white--text">
              <h2 class="font-weight-medium my-2">Industry connect program Intro with video
</h2>
              <p class="justify-inter-word" v-html="intro">
              </p>
            </div>
          </v-col>
        <v-col class="d-flex flex-column  justify-center">
<div class="plyr__video-embed" autoplay="true" id="player">
  <iframe
    src="https://www.youtube.com/embed/NuPolrd9yuo?origin=https://plyr.io&amp;rel=0&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;autoplay=1"
    allowfullscreen
    allowtransparency
    frameborder="0"
    allow="autoplay"
  ></iframe>
</div>
</v-col>
        </v-row>
      </v-container>
    </v-card>
    <!-- JOURNEY MAP 🚓 -->
    <v-layout container column justify-center>
      <!-- PROGRAMMATIC SLIDES 🏞️ -->
      <v-container>
        <ProgrammaticSlides :slides="domains" />
      </v-container>
      <!-- PROGRAM FEATURES 🍨 -->
      <v-container>
        <CdpBenefits :benefits="benefits" />
      </v-container>
      <!-- PROGRAM HOWITWORKS 🍨 -->
      <v-container class="my-4">
        <h3 class="primary--text">How It Works</h3>
        <CdpHowitworks class="my-8" />
      </v-container>
    </v-layout>
      <!-- OUR TESTIMONIALS 🗨️ -->
    <Testimonials2 :testimonials="testimonials"/>
    <v-card color="accent" flat tile>
      <v-container
        class="white--text py-8 d-flex flex-column align-center justify-center"
      >
        <h1>Need Help Planning?</h1>
        <p class="body-1 mb-0">
          Talk to our experts and curate your perfect<br/>
        </p>
        <p class="mt-0">
          Industry Connect Program
        </p>
        <v-btn color="white" rounded class="accent--text font-weight-bold">
          Schedule a Call
        </v-btn>
      </v-container>
    </v-card>
  </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
// optional style for arrows & dots
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
export default {
  components: {
    GetQuote: () => import("~/components/Forms/get-quote.vue"),
    TopPrograms: () => import("~/components/Blocks/top-programs.vue"),
    TopArticles: () => import("~/components/Blocks/top-articles.vue"),
    CdpBenefits: () => import("~/components/Blocks/cdp-benefits.vue"),
    ProgrammaticSlides: () => import("~/components/Blocks/programmatic-slides.vue"),
    CdpHowitworks: () => import("~/components/Blocks/cdp-howitworks.vue"),
    CDPJourneyMap: () => import("~/components/Patterns/cdp-journey-map.vue"),
    Testimonials2: ()=> import("~/components/Blocks/testimonials-2.vue"),

    VueSlickCarousel,
  },

  head:{
    link:[
      {rel:"stylesheet", href:"https://cdn.plyr.io/3.6.5/plyr.css" }
    ],
    script:[
      {src:"https://cdn.plyr.io/3.6.5/plyr.js", callback: () => { const player = new Plyr('#player'); } }
    ],
  },
  created(){this.fetchIcp()},
  data: () => ({
    intro: "",
    benefits:[],
    domains:[],
    testimonials:[],
    logos: [],
  }),
  methods:{
    fetchIcp(){
      this.$axios.get('icp')
      .then(res=>{
        this.intro = res.data.intro;
        this.benefits = JSON.parse(res.data.benefits);
        this.domains = JSON.parse(res.data.domains);
        this.testimonials = JSON.parse(res.data.testimonials);
        this.logos = JSON.parse(res.data.college_logos);
      })
    }
  },
};
</script>

<style scoped>
.styleCard {
  clip-path: polygon(0 0, 80% 0, 100% 20%, 100% 100%, 20% 100%, 0 80%);
}
.plyr__controls {
  opacity: 0;
  pointer-events: none;
}

.plyr__video-embed iframe {
	top: -50%;
	height: 200%;
}

</style>