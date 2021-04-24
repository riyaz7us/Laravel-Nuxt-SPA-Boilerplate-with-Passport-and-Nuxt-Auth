<template>
  <v-bottom-navigation v-model="bottomNav" app dark hide-on-scroll active-class="active-link" background-color="black">
    <v-btn to="/business#overview" value="home">
      <span>Overview</span>
      <v-icon>mdi-home-outline</v-icon>
    </v-btn>

    <v-btn to="/business/products" value="search">
      <span>Products</span>
      <v-icon>mdi-tag-multiple-outline</v-icon>
    </v-btn>

    <v-btn to="/business/orders" value="orders">
      <span>Orders</span>
      <v-icon>mdi-basket-outline</v-icon>
    </v-btn>

    <v-btn @click="$emit('more')" value="more">
      <span>More</span>
      <v-icon>mdi-dots-horizontal</v-icon>
    </v-btn>

    <v-btn to="/" value="business">
      <span>Exit</span>
      <v-icon>mdi-arrow-left</v-icon>
    </v-btn>
  </v-bottom-navigation>
</template>

<script>
export default {
  props: {
    value: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      bottomNav: "",
    };
  },
};
</script>
<style>
.v-btn--contained {
  font-size: 0.4rem !important;
  min-width: 70px !important;
}
</style>