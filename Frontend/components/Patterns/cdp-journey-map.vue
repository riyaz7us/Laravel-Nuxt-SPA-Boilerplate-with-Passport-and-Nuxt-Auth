<template>
  <v-container>
    <v-row>
      <v-col v-for="(j, i) in journey" :key="i">
        <v-card
					color="linear-gradient(90deg,red,blue)"
          style="height: 200px"
          class="journey d-flex flex-wrap align-center"
        >
          <v-container>
            <h2 class="primary--text">{{ j.title }}</h2>
            <p class="body-2 ">{{ j.desc }}</p>
          </v-container>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  props: ["journey"],
};
</script>

<style>
.journey:hover {
  transition: transform 1s;
  transform: scale(1.2, 1.2);
  z-index: 9999;
}
</style>