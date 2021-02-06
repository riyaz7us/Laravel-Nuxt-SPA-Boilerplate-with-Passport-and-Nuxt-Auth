<template>
  <v-footer
    dark
    padless
    inset
    style="border-top:5px solid #45526e"
    class="justify-center pl-0 pr-0"
  >
    <v-card
      flat
      style="width:100%"
      color="#1c2331"
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
        <v-row>
			<v-col cols="12" md="6" sm="12">
				<v-container class="text-justify">
					<h1>LOGO.</h1>
          <br />
					<p class="body-1">This is the footer description of your app. You can explain about it or simply replace it with something else </p>

				<p class="body-1">Thank you for using our app!</p>
				</v-container>
			</v-col>
      <v-col cols="12" md="3" sm="6">
				<v-container class="text-justify">
					<h3 class="title">Quick Links</h3>
          <nuxt-link to="#" class="body-1 footerLink">Search</nuxt-link><br>
          <nuxt-link to="/register" class="body-1 footerLink">Register</nuxt-link><br>
          <nuxt-link to="/login" class="body-1 footerLink">Login</nuxt-link><br>
          <nuxt-link to="#" class="body-1 footerLink">Link 1</nuxt-link><br>
          <nuxt-link to="#" class="body-1 footerLink">Link 2</nuxt-link>
				</v-container>
			</v-col>
      <v-col cols="12" md="3" sm="6">
				<v-container class="text-justify">
					<h3 class="title">Know More</h3>
          <nuxt-link to="#" class="body-1 footerLink">Terms & Conditions</nuxt-link><br>
          <nuxt-link to="#" class="body-1 footerLink">Privacy Policy</nuxt-link><br>
          <nuxt-link to="#" class="body-1 footerLink">Refund Policy</nuxt-link><br>
          <nuxt-link to="#" class="body-1 footerLink">Contact us</nuxt-link><br>
          <nuxt-link to="#" class="body-1 footerLink">About us</nuxt-link>
				</v-container>
			</v-col>
		</v-row>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="black--background white--text">©
        {{ new Date().getFullYear() }} — ✨&nbsp;<strong>My Company | All Rights Reserved!</strong>
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
  export default {
    data: () => ({
      icons: [
        {name:'mdi-facebook',link:'https://www.facebook.com/ownearweb'},
        {name:'mdi-twitter',link:'https://twitter.com/Ownearweb'},
        {name:'mdi-linkedin',link:'https://www.linkedin.com/company/ownearweb'},
        {name:'mdi-instagram',link:'https://www.instagram.com/ownearweb/'},
      ],
	}),
  }
</script>
<style>
.footerLink, .footerLink:link{color:#4f94ff !important; text-underline-offset: 0.2em !important;}
</style>