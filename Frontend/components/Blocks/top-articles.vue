<template>
  <v-container>
    <VueSlickCarousel
      v-if="articles.length !== 0"
      :slidesPerRow="4"
      :multiple="true"
      :arrows="true"
      :dots="true"
    >
      <div v-for="(p, i) in articles" style="height:100%;" :key="i">
        <v-card class="ma-2" :to="`/programs/${p.id}#intro`">
          <v-container>
            <v-img
              class="rounded-lg"
              src="https://picsum.photos/300"
              height="200px"
            ></v-img>
            <h3 class="mt-1 primary--text" v-text="p.title"></h3>
            <p class="body-2">{{ p.description | excerpt }}</p>
            <v-btn text color="primary">Read More...</v-btn>
          </v-container>
        </v-card>
      </div>
    </VueSlickCarousel>
  </v-container>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
// optional style for arrows & dots
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
export default {
  data: () => ({
    articles: [
      {
        title: "Things to know about accounting and taxation",
        description:
          "Accounting and taxation is an important aspect to study for economists and businessmen",
      },
      {
        title: "15 Mistakes Systems Designers Make",
        description:
          "Here are the 15 top mistakes made by the systems designers who continue to make",
      },
      {
        title: "Things to know about Software Development",
        description:
          "Accounting and taxation is an important aspect to study for Engineers and Programmers",
      },
      {
        title: "15 Mistakes Systems Designers Make",
        description:
          "Here are the 15 top mistakes made by the systems designers who continue to make",
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