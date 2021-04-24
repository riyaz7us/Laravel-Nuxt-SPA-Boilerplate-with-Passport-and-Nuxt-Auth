<template>
    <v-row>
      <v-col v-for="(a, i) in data" :key="i">
        <v-card
          color="primary"
          style="height: 200px"
          class="visit d-flex flex-wrap container align-center"
        >
          <h2 class="white--text">{{ a.title }}</h2>
					<p class="body-1 white--text">{{a.desc}}</p>
        </v-card>
      </v-col>
    </v-row>
</template>

<script>
export default {
  props: ["data"],
};
</script>

<style>
.visit:hover{
  transition: transform 1s;
  transform:scale(1.2,1.2);
  z-index:9999;
}
</style>