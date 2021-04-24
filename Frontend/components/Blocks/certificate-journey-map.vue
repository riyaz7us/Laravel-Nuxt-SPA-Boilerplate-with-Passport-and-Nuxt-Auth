<template>
  <div>
    <h2 class="grey--text text--darken-2">Post Industry immersion</h2>
    <v-timeline align-top dense>
      <v-timeline-item fill-dot>
        <template v-slot:icon>
          <div class="title white--text">1</div>
        </template>
        <h2 class="font-weight-regular">Here's Your Task</h2>
        <p class="body-2">
          Your task is to take the base shipping productivity tool and add in
          the new feature, the kanban board to move shipping requests, to two
          new lane statuses, in progress and complete. Don't worry about any
          backend updates for now.
        </p>
        <v-card elevation="10" style="width:300px;height:240px;background:linear-gradient(140deg,white 0%,white 80%,#aac 100%)">
          <v-container>
            <v-icon large>mdi-github</v-icon>
            <h3 class="mt-2"
              >Task 1 - Github repo - Shiptivitas Frontend</h3
            >
            <p class="body-1"
              >View this repo, download it, star it, watch it.</p
            >
              <v-btn text color="primary">Click to view Github repo</v-btn>
          </v-container>
        </v-card>
      </v-timeline-item>
      <v-timeline-item fill-dot>
        <template v-slot:icon>
          <div class="title white--text">2</div>
        </template>
        <h2 class="font-weight-regular">Submit Your Task and Unlock Your Certificate</h2>
        <input
          type="file"
          multiple
          ref="fileInput"
          hidden
        />
        <v-card @click="uploadFile()" flat color="orange lighten-4" width="800">
          <v-container class="d-flex flex-column align-center justify-center">
            <v-icon size="64">mdi-cloud-print</v-icon>
            <p class="display-1 font-weight-black">Click Here To Submit Your Task</p>
          </v-container>
        </v-card>
      </v-timeline-item>
    </v-timeline>
  </div>
</template>

<script>
export default {
  methods:{
    uploadFile(){
      this.$refs.fileInput.click();
    }
  }
};
</script>

<style>
</style>