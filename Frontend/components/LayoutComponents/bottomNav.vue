<template>
  <v-bottom-navigation
    v-model="bottomNav"
	app
  hide-on-scroll
	color="primary"
  :value="bottomNav"
  mandatory
  >
    <v-btn to="/" exact value="home">
      <span>Home</span>
      <v-icon>mdi-home</v-icon>
    </v-btn>

    <v-btn to="#1" value="link1">
      <span>Link 1</span>
      <v-icon>mdi-package-variant</v-icon>
    </v-btn>

    <v-btn to="#2" value="link2">
      <span>Link 2</span>
      <v-icon>mdi-heart</v-icon>
    </v-btn>

        <v-btn to="#3" value="link3">
      <span>Link 3</span>
      <v-icon>mdi-shopping</v-icon>
    </v-btn>

  </v-bottom-navigation>
</template>

<script>
  export default {
    data () {
      return {
        bottomNav: '',
      }
    },
  }
</script>
<style lang="scss">
.v-btn--contained{min-width:70px !important;span{font-size:0.75rem !important; font-weight:500;}.v-icon:before{font-size: 25px !important;}}
</style>