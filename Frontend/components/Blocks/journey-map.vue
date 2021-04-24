<template>
  <v-container>
    <h2 class="primary--text my-2">{{ title }}</h2>
    <v-expansion-panels>
    <v-expansion-panel v-for="(j, i) in agenda" :key="i">
      <v-expansion-panel-header class="title" expand-icon="expand_more">
        {{ j.name }}
      </v-expansion-panel-header>
      <v-expansion-panel-content>
        <v-timeline align-top dense>
          <v-timeline-item fill-dot v-for="(c, i) in j.activities" :key="i">
            <template v-slot:icon>
              <div class="title white--text">{{ i + 1 }}</div>
            </template>
            <h2 class="font-weight-regular">{{ c.name }}</h2>
            <p class="body-2" v-if="c.desc">{{ c.desc }}</p>
            <div v-if="c.video">
              <iframe
                width="300"
                height="200"
                :src="`https://www.youtube.com/embed/${c.video}`"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              ></iframe>
            </div>
            <div v-if="c.skills">
            <v-chip
              v-for="(s, i) in c.skills.split(',')"
              label
              class="mx-2"
              color="info"
              v-show="s.length!==0"
              :key="i"
              >{{ s }}</v-chip
            >
            </div>
            <div v-if="c.learning_kit">
              <v-card
                class="my-2"
                color="blue lighten-4"
                width="200px"
                v-for="(lk, i) in c.learning_kit"
                :key="i"
              >
                <v-container
                  class="d-flex flex-column align-center justify-center"
                >
                  <h3 class="primary--text">{{ lk.name }}</h3>
                  <v-btn icon large>
                    <v-icon color="primary" large>mdi-download</v-icon>
                  </v-btn>
                </v-container>
              </v-card>
            </div>
          </v-timeline-item>
        </v-timeline>
      </v-expansion-panel-content>
    </v-expansion-panel>
    </v-expansion-panels>
  </v-container>
</template>

<script>
export default {
  props: ["title", "agenda"],
  data: () => ({}),
};
</script>

<style>
</style>