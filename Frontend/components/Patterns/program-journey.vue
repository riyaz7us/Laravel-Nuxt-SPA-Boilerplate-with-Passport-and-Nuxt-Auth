<template>
  <v-container>
    <h1 class="my-4 primary--text">Program Journey</h1>
    <v-row>
      <v-col v-for="(j, i) in journey" :key="i">
        <v-card
          color="primary"
          style="height: 200px"
          class="journey d-flex align-center justify-center"
        >
          <h2 align="center" class="white--text">{{ j }}</h2>
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
.journey:hover{
  transition: transform 1s;
  transform:scale(1.2,1.2);
  z-index:9999;
}
</style>