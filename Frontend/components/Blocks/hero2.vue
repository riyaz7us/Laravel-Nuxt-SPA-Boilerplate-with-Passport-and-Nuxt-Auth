<template>
	    <div
      class="fill-height d-flex flex-column justify-space-around"
      :style="`background:url(${$store.state.image_url}/cyber-4062449_1280.jpg);height:100vh;background-size:cover; box-shadow:inset 0 0 0 50vw rgba(0, 0, 0, 0.5);text-shadow:0px 0px 10px black;`"
    >
      <div class="pl-4 white--text justify-self-start">
        <img height="80" :src="`${$store.state.image_url}/logos/${program.school_logo}`"/>
        <div class="d-flex flex-row mb-3">
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
        <h2 class="display-1 my-2">
          {{ program.title }}
        </h2>
        <h2 class="title my-2">Industry Connect Program</h2>
        <p style="max-width: 800px" class="body-1">{{ program.desc_1 }}</p>
        <p class="body-1 my-2">
          {{ program.desc_2 }}
        </p>
      </div>
      <div v-if="anchors" class="align-self-center white--text" style="width: 90%">
        <v-row>
          <v-col v-for="(a, i) in anchors" :key="i" :md="md">
            <div @click="$emit('anchor',a.link)" class="row pointer">
              <v-icon color="white" class="col col-md-2 ma-0" large v-text="a.icon"></v-icon>
              <v-col cols="10">
                <p class="subtitle-1 my-auto">{{ a.title }}</p>
              </v-col>
            </div>
          </v-col>
        </v-row>
      </div>
    </div>
</template>

<script>
export default {
	props:["program","anchors","links","md"]
}
</script>

<style>

</style>