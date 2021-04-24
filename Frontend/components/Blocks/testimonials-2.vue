<template>
  <v-card color="secondary">
    <v-container>
      <h3 align="center" class="my-2 font-weight-regular white--text">
        Hear from our newest participants.
      </h3>
      <div class="testimonials d-flex flex-row" style="overflow-x:scroll;overflow-y:hidden;height:content-fit;">
        <v-card
          tile
          min-width="500px"
          color="primary"
          class="white--text my-2"
          outlined
          v-for="(t,i) in testimonials" :key="i"
        >
          <v-row>
            <v-col md="4">
              <v-img width="200" height="100%" src="/man-photo.jpg" />
            </v-col>
            <v-col md="8">
              <v-card-title>{{t.name}}</v-card-title>
              <v-card-subtitle class="white--text"
                >{{t.college}}</v-card-subtitle
              >
              <v-card-text>
                {{t.desc}}
              </v-card-text>
            </v-col>
          </v-row>
        </v-card>
      </div>
    </v-container>
  </v-card>
</template>

<script>
export default {
	data:()=>({
    testimonials:[]
  }),
  created(){
    this.$axios.get('testimonials')
    .then(res=>this.testimonials=JSON.parse(res.data))
  }
};
</script>

<style>
.testimonials::-webkit-scrollbar, .testimonials::-webkit-scrollbar-button {
  visibility:hidden;
}
</style>