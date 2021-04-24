<template>
	    <div
      class="fill-height d-flex flex-column justify-space-around"
      :style="`background:url(${$store.state.image_url}/cyber-4062449_1280.jpg);height:100vh;min-height:100%;background-size:cover; box-shadow:inset 0 0 0 50vw rgba(0, 0, 0, 0.5);text-shadow:0px 0px 10px black;`"
    >
      <div class="pl-6 white--text justify-self-start">
        <img height="80" :src="`${$store.state.image_url}/logos/${school_logo}`"/>
        <div class="d-flex flex-row my-2">
          <v-btn
            text
            small
            v-for="(link, i) in links"
            :to="`/programs/${$route.params.id}/${link.link}`"
            :key="i"
            color="white"
          >
            <v-icon small v-if="i > 0">double_arrow</v-icon>
            {{ link.text }}</v-btn
          >
        </div>
        <h2 class="display-1 my-2">{{ title }}</h2>
        <h2 class="title my-2">Industry Connect Program</h2>
        <p style="max-width: 800px" class="body-1">{{ desc_1 }}</p>
        <v-btn v-show="!$auth.loggedIn" tile x-large color="primary">
          <v-icon>check_circle_outline</v-icon> &nbsp;Enroll Now!</v-btn
        >
        <p class="body-1 my-2">
          {{ desc_2 }}
        </p>
      </div>
      <div class="align-self-center white--text" style="width: 90%">
        <v-row>
          <v-col v-for="(ben, i) in hero_benefits" :key="i" md="3">
            <div class="row align-start">
              <v-icon
                color="white"
                class="col"
                large
                v-text="ben.icon"
              ></v-icon>
              <v-col cols="9">
                <p class="body-2">{{ ben.desc }}</p>
              </v-col>
            </div>
          </v-col>
        </v-row>
      </div>
    </div>
</template>

<script>
export default {
props:["title", "desc_1","desc_2", "hero_benefits","links","school_logo"]
}
</script>

<style>

</style>