<template>
  <v-app>
    <!-- Dynamic component based on device breakpoint -->
    <!-- If you don't need separate layouts for desktop & mobile, simply replace the below tag with your desired layout -->
    <component :is="currentComponent"></component>
    <v-snackbar v-model="update">
      New Update Available
      <v-btn text color="primary" @click="reloadWindow()">Update Now</v-btn>
    </v-snackbar>
  </v-app>
</template>

<script>
export default {
  components: {
    desktopView: () => import("./desktopView.vue"),
    mobileView: () => import("./mobileView.vue"),
  },
  data() {
    return {
      update: false,
    };
  }, //data
  mounted() {
    /*this.$echo.private("Ownear."+this.$auth.user.id).listen("NewOrder", (res) => {
    console.log(res);
});*/
    this.checkPWAUpdate();
  },
  methods: {
    async checkPWAUpdate() {
      const workbox = await window.$workbox;
      if (workbox) {
        workbox.addEventListener("installed", (event) => {
          console.log("installed", event);
          if (event.isUpdate) {
            this.update = true;
            console.log("update needed");
          }
        });
      }
    },
    reloadWindow() {
      window.location.reload(true);
    },
  }, //METHODS
  computed: {
    currentComponent() {
      //Returns components based on device breakpoint
      return this.$vuetify.breakpoint.mdAndUp ? "desktopView" : "mobileView";
    },
  },
};
</script>
