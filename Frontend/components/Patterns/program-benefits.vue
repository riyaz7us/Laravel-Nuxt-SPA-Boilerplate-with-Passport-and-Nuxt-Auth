<template>
  <v-container>
    <h2 class="my-4 primary--text">Benefits of this Industry Connect Program</h2>
    <v-spacer></v-spacer>
    <v-row align="start">
      <v-col v-for="(ben, i) in benefits" :key="i" sm="6" md="4">
        <v-card flat class=" row align-start">
          <v-icon color="black" class="col" size="56" v-text="ben.icon"></v-icon>
          <v-col cols="9">
            <h3>{{ ben.title }}</h3>
            <p class="body-2">{{ ben.desc }}</p>
          </v-col>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
	props:['benefits'],
  data: () => ({

  }),
};
</script>

<style>
</style>