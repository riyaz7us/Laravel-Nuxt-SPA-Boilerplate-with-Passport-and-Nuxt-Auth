<template>
  <v-dialog :value="value" width="800" @change="$emit('input', $event)">
    <v-card>
      <v-container class="my-4">
        <h1 class="primary--text">Your Certificate</h1>
        <v-divider class="my-2"></v-divider>
        <v-row justify="center">
          <v-col cols="auto">
            <img width="200" src="/acumen-certificate.jpg" />
          </v-col>
          <v-col
            md="8"
            height="100%"
            class="d-flex flex-column align-center"
          >
            <v-card
              width="300"
              class="d-flex align-center justify-center"
              height="100%"
            >
              <v-container class="d-flex flex-column align-center">
                <v-img
                  src="/man-photo.jpg"
                  width="80"
                  height="80"
                  style="border-radius: 100px"
                ></v-img>
                <h2 class="blue-grey--text">Giovanni Auditore</h2>
                <v-btn color="primary" class="my-1" block tile
                  >Download Certificate</v-btn
                >
                <v-btn color="primary" class="my-1" outlined block tile
                  >Copy Link</v-btn
                >
              </v-container>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: ["value"],
};
</script>

<style>
</style>