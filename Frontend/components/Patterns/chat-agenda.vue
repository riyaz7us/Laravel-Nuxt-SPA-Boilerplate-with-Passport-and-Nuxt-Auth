<template>
  <v-container>
    <v-row>
      <v-col v-for="(a, i) in agenda" :key="i">
        <v-card
          color="primary"
          style="height: 200px"
          class="agenda d-flex flex-wrap align-center justify-center"
        >
          <v-container>
            <h1 class="white--text">#{{ i + 1 }}</h1>
            <h3 class="white--text font-weight-regular">{{ a }}</h3>
          </v-container>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  props:["agenda"],
  data:()=>({
  })
};
</script>

<style>
.agenda:hover {
  transition: transform 1s;
  transform: scale(1.2, 1.2);
  z-index: 9999;
}
</style>