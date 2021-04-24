<template>
  <div>
    <v-app-bar
      hide-on-scroll
      app
      light
      color="white"
      elevate-on-scroll
      height="70"
    >
      <!-- title #00CCCC -->
      <nuxt-link style="text-decoration:none;color:unset;" to="/">
        <v-img width="140px" src="/acumenconnect-logo.png" />
      </nuxt-link>
      <!-- 
        *** 💻 DESKTOP VIEW ITEMS ***
      -->
      <v-spacer></v-spacer>
      <!-- Dark theme button if you need -->
      <v-btn text class="font-weight-bold" color="primary">Home</v-btn>
      <v-btn text class="font-weight-bold" color="primary">Explore Programs</v-btn>
      <v-btn text class="font-weight-bold" color="primary">Companies</v-btn>
      <v-btn text class="font-weight-bold" color="primary">Campus</v-btn>
      <!-- Auth Template -->
      <template v-if="$auth.loggedIn">
        <userMenu />
      </template>
      <template v-else>
      <v-btn text class="font-weight-bold" color="primary">Login</v-btn>
      <v-btn dark color="accent" class="glow-accent rounded-lg" to="/signup">
        <v-icon>login</v-icon>&nbsp;Sign Up
      </v-btn>
      </template>
    </v-app-bar>
    <!-- 🔥 MAIN RENDER [ADDED MIN HEIGHT TO PREVENT LARGE LAYOUT SHIFTS] -->
    <v-main style="min-height: 100vh">
      <nuxt />
    </v-main>
    <desktopFooter />
    <navDrawer v-model="drawer" />
  </div>
</template>

<script>
import { mapMutations } from "vuex";
import navDrawer from "../components/LayoutComponents/navDrawer.vue";
export default {
  name: "desktopView",
  prefetch: false,
  data: () => ({
    drawer: false,
  }),
  components: {
    navDrawer,
    userMenu: () => import("../components/LayoutComponents/userMenu.vue"),
    desktopFooter: () =>
      import("../components/LayoutComponents/footer.vue"),
  }, //components
};
</script>

<style lang="scss">

</style>