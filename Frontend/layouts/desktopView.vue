<template>
  <div>
    <v-app-bar
      hide-on-scroll
      app
      color="secondary"
      light
      elevate-on-scroll
      height="70"
    >
      <!-- title #00CCCC -->
      <nuxt-link to="/">
        <h4>LOGO</h4>
      </nuxt-link>
      <!-- 
        *** 💻 DESKTOP VIEW ITEMS ***
      -->
      <v-spacer></v-spacer>
      <!-- Dark theme button if you need -->
      <v-btn dark @click="$vuetify.theme.dark = !$vuetify.theme.dark" icon>
        <v-icon>mdi-moon-waning-crescent mdi-rotate-315</v-icon>
      </v-btn>
      <!-- Auth Template -->
      <template v-if="$auth.loggedIn">
        <userMenu color="white" />
      </template>
      <v-btn color="white" text to="/login" v-else>
        <v-icon>mdi-login</v-icon>Login
      </v-btn>
      <!-- Nav Drawer -->
      <v-btn color="white" icon @click.stop="drawer = !drawer">
        <v-icon>mdi-sort-variant mdi-flip-h</v-icon>
      </v-btn>
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