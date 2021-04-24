<template>
  <div>
    <v-carousel
      width="100%"
      height="320px"
      hide-delimiters
      :show-arrows="false"
      v-model="carousel"
    >
      <v-carousel-item
        v-for="(t, i) in data"
        :key="i"
        class="citem"
        :src="$store.state.image_url + '/industry-3087393_1920.jpg'"
      >
        <v-sheet
          style="background: unset"
          fill-height
          class="row align-center justify-start"
          height="100%"
        >
          <v-col md="2"></v-col>
          <div style="width: 60%" class="container quote">
            <p align="left" class="white--text body-1 font-italic">
              {{ t.quote || t }}
            </p>
            <p align="left" class="white--text font-italic">
              - {{t.name || ''}}
            </p>
              {{i+1}}/{{data.length}}&nbsp;
              <v-icon @click="prevItem" color="blue accent-2">mdi-chevron-left</v-icon>
              <v-icon @click="nextItem" color="blue accent-2">mdi-chevron-right</v-icon>
          </div>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
  </div>
</template>

<script>
export default {
	props:['data'],
  data:()=>({
    carousel:0
  }),
  methods:{
    nextItem(){
      this.carousel+=1;
    },
    prevItem(){
      this.carousel-=1;
    },
  }
};
</script>

<style>
.citem .v-image__image--cover {
  box-shadow: inset 0 0 0 50vw rgba(255, 255, 255, 0.3);
}
.citem .v-image__image::before {
  content: "";
  width: 1000px;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  position: absolute;
  right: 0px;
  z-index: 1;
  clip-path: polygon(0 0, 100% 0, 100% 100%, 15% 100%);
}
.quote::before {
  content: "\201D";
  color: #ffffffcc;
  font-size: 8em;
  position: absolute;
  top: 0;
  right: 10%;
}
</style>