<template>
  <v-layout column>
    <v-container>
      <h3 class="primary--text">My Favourites</h3>
      <v-divider></v-divider>
      <v-row>
        <v-col
          v-for="(favourite, key) in favourites"
          :key="key"
          cols="12"
          sm="6"
          md="4"
        >
          <v-card>
            <v-row>
              <v-col cols="3">
                <!-- ✨ FAVOURITE IMAGE -->
                <img
                  class="ma-1"
                  width="80"
                  height="80"
                  :src="
                    favourite.product.image
                      ? $store.state.image_url + '/' + favourite.product.image
                      : $store.state.image_url + '/uploads/images/image.jpg'
                  "
                  lazy-src="/placeholders/placeholder.jpg"
                  alt="order image"
                />
              </v-col>
              <v-col cols="9">
                <!-- ⭐ FAVOURITE - DESCRIPTION -->
                <v-card-text>
                  <p class="body-2">{{ favourite.product.name }}</p>
                  <p class="success--text body-1"></p>
                  <span
                    v-show="favourite.product.has_offer"
                    style="text-decoration: line-through"
                    class="grey--text my-1 caption"
                    >Rs. {{ favourite.product.reg_price }}</span
                  >
                  <span class="subtitle-2 my-1 green--text text--darken-2"
                    >Rs.
                    {{
                      favourite.product.has_offer
                        ? favourite.product.sale_price
                        : favourite.product.reg_price
                    }}</span
                  >
                </v-card-text>
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-layout>
</template>
<script>
export default {
  name: "favourites",
  data: () => ({
    favourites: {},
  }), //DATA
  mounted() {
    this.fetchFavourites();
  }, //MOUNTED
  methods: {
    fetchFavourites() {
      this.$axios.$get("auth/favourites").then((response) => {
        this.favourites = response;
      });
    }, //FETCHFAVOURITES()
  }, //METHODS
}; //EXPORT
</script>