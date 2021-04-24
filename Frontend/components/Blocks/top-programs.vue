<template>
      <VueSlickCarousel
        v-if="programs.length !== 0"
        :slidesPerRow="1"
        :slidesToShow="4"
        :slidesToScroll="1"
        :multiple="true"
        :arrows="true"
        :infinite="true"
      >
        <div v-for="(p, i) in programs" :key="i">
          <v-card outlined class="ma-2"  :to="`/programs/${p.id}#intro`" >
              <v-container>
              <v-img src="https://picsum.photos/320" height="10em"></v-img>
                <h2>{{p.school_name}}</h2>
              <p class="body-2 my-0">Industry Connect Program</p>
              <h4 class="primary--text" v-text="p.title"></h4>
              <v-btn class="my-1" depressed color="accent">Know More</v-btn>
            </v-container>
          </v-card>
        </div>
        <div v-for="(p, j) in programs" :key="j+3">
          <v-card outlined class="ma-2" :to="`/programs/${p.id}#intro`" >
              <v-container>
              <v-img src="https://picsum.photos/320" height="10em"></v-img>
                <h2>{{p.school_name}}</h2>
              <p class="body-2 my-0">Industry Connect Program</p>
              <h4 class="primary--text" v-text="p.title"></h4>
              <v-btn class="my-1" depressed color="accent">Know More</v-btn>
            </v-container>
          </v-card>
        </div>
      </VueSlickCarousel>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
// optional style for arrows & dots
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
export default {
  data: () => ({ programs: [] }),
  components: {
    VueSlickCarousel,
  },
  created() {
    this.getPrograms();
  },
  filters: {
    excerpt(val) {
      return val ? val.substring(0,60) + "..." : "";
    },
  },
  methods: {
    getPrograms() {
      this.$axios.get("programs").then((res) => {
        this.programs = res.data;
      });
    },
  },
};
</script>

<style>
</style>