<template>
  <VueSlickCarousel
    v-if="kit.length !== 0"
    :slidesPerRow="3"
    :multiple="true"
    :arrows="true"
  >
    <div v-for="(p, i) in kit" :key="i">
      <v-card class="ma-2 rounded-lg" :to="`/programs/${p.id}#intro`">
        <v-img
          class="rounded-lg"
          src="https://picsum.photos/300"
          height="15em"
        ></v-img>
        <v-container>
          <h3 class="mt-1 primary--text" v-text="p.title"></h3>
          <p class="body-2">{{ p.description | excerpt }}</p>
          <v-btn outlined color="primary"> <v-icon left>download</v-icon> Download</v-btn>
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
  data: () => ({
    kit: [
      {
        title: "Learning Kit 1",
        description:
          "Accounting and taxation is an important aspect to study for economists and businessmen",
      },
      {
        title: "Learning Kit 2",
        description:
          "Here are the 15 top mistakes made by the systems designers who continue to make",
      },
      {
        title: "Learning Kit 3",
        description:
          "Accounting and taxation is an important aspect to study for Engineers and Programmers",
      },
    ],
  }),
  components: {
    VueSlickCarousel,
  },
  created() {},
  filters: {
    excerpt(val) {
      return val ? val.substring(0, 60) + "..." : "";
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