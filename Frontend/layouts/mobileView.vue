<template>
  <v-app>
    <v-app-bar hide-on-scroll elevate-on-scroll height="70" app color="white">
      <!-- NavBar Button -->
      <v-btn color="black" icon @click.stop="drawer = !drawer">
        <v-icon>mdi-sort-variant</v-icon>
      </v-btn>
      <!-- Site Title -->
      <nuxt-link to="/">
        <h4>LOGO</h4>
      </nuxt-link>
      <v-spacer></v-spacer>
      <!-- Auth Buttons -->
      <v-btn icon to="/login" v-if="!this.$auth.loggedIn">
        <v-icon>mdi-login</v-icon>
      </v-btn>
      <userMenu v-else />
    </v-app-bar>
    <!-- 🔥 MAIN RENDER -->
    <v-main>
      <nuxt />
    </v-main>
    <navDrawer v-model="drawer" />
    <bottomNav v-show="$vuetify.breakpoint.smAndDown"></bottomNav>
  </v-app>
</template>

<script>
import navDrawer from "../components/LayoutComponents/navDrawer.vue";
export default {
  name: "mobileView",
  data: () => ({
    drawer: false,
    title: "Ownear.dev",
  }), //DATA
  components: {
    bottomNav: () => import("../components/LayoutComponents/bottomNav.vue"),
    navDrawer,
    userMenu: () => import("../components/LayoutComponents/userMenu.vue"),
  },
};
</script>

<style>
</style>