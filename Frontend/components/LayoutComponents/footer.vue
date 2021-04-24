<template>
  <v-footer
    dark
    padless
    inset
    style="border-top: 5px solid #7ebda7"
    class="justify-center pl-0 pr-0"
  >
    <v-card
      flat
      style="width: 100%"
      color="secondary"
      class="white--text text-center"
    >
      <v-card-text>
        <v-btn
          v-for="icon in icons"
          :key="icon.name"
          :href="icon.link"
          target="_blank"
          class="mx-2 white--text"
          icon
        >
          <v-icon size="24px">{{ icon.name }}</v-icon>
        </v-btn>
      </v-card-text>

      <v-card-text class="white--text pt-0">
        <v-container class="text-justify">
          <h1 class="my-2">AcumenConnect <sup>®</sup></h1>
          <span v-for="(l, i) in links" :key="i">
            <nuxt-link :to="l.link" class="body-1 footerLink">{{l.name}}</nuxt-link>&emsp;
          </span>
        </v-container>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="black--background white--text"
        >© {{ new Date().getFullYear() }} — ✨&nbsp;<strong
          >AcumenConnect | All Rights Reserved! </strong
        >| Crafted with ❤ by <a href="https://spotverge.com">Spotverge Inc.</a>
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
export default {
  data: () => ({
    icons: [
      { name: "mdi-facebook", link: "https://www.facebook.com/ownearweb" },
      { name: "mdi-twitter", link: "https://twitter.com/Ownearweb" },
      {
        name: "mdi-whatsapp",
        link: "https://www.linkedin.com/company/ownearweb",
      },
      { name: "mdi-instagram", link: "https://www.instagram.com/ownearweb/" },
    ],
    links: [
      { name: "Our Team", link: "our-team" },
      { name: "Press", link: "press" },
      { name: "Privacy policy", link: "privacy-policy" },
      { name: "Terms of use", link: "terms-of-use" },
      { name: "FAQ’s", link: "faqs" },
      { name: "Security", link: "security" },
      { name: "Sitemap", link: "sitemap" },
      { name: "Featured programs", link: "featured-programs" },
    ],
  }),
};
</script>
<style>
.footerLink,
.footerLink:link {
  color: #fff !important;
  text-decoration: none !important;
}
</style>