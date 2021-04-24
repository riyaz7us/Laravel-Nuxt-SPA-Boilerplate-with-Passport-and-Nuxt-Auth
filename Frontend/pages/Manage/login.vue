<template>
  <v-layout style="background-color:#4A6572;" column align-center justify-center>
								<img width="160px" class="my-2 mx-auto" src="/ownear-fd.png" />
    <v-card class="my-4 elevation-6" width="600">
      <v-container>
        <!-- Tab-item :: LOGIN  -->
        <v-form ref="form" @submit.prevent="login" method="post">
          <v-alert type="error" v-if="errors">{{ errors }}</v-alert>
          <h2 align="center" class="mt-2 info--text font-weight-black">
            Login as Admin
          </h2>
          <!-- ✉ E-MAIL -->
          <v-text-field
            v-model="email"
            label="E-mail"
            prepend-inner-icon="mdi-email-outline"
            outlined
          ></v-text-field>
          <!-- 🔑 PASSWORD -->
          <v-text-field
            v-model="password"
            label="Password"
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="show1 = !show1"
            :type="show1 ? 'text' : 'password'"
            prepend-inner-icon="mdi-lock-outline"
            outlined
          ></v-text-field>
          <!-- ❕ ACTIONS -->
          <v-btn color="secondary" class="mx-auto" large :loading="loading" type="submit" block
            >Login</v-btn
          >
          <!-- ! SIDE ACTIONS -->
          <br />
          <!-- <v-btn
            color="primary"
            to="/register"
            text
            large
            style="text-transform: capitalize"
            >New User? Register Here.</v-btn
          > -->
          <br />
          <v-btn
            color="primary"
            to="/forgotPassword"
            text
            style="text-transform: capitalize"
            >Forgot your Password?</v-btn
          >
        </v-form>
      </v-container>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  layout:"adminLogin",
  data() {
    return {
      show1: false,
      email: null,
      password: null,
      success: false,
      loading: false,
      errors: "",
    };
  }, //DATA
  mounted(){
    if (this.$auth.loggedIn){this.$router.push('/admin');}
    let redirect = this.$route.query && this.$route.query.redirect;
  },
  methods: {
    async login() {
      this.loading = true;
      try {
        await this.$auth.loginWith("local", {
          data: {
            email: this.email,
            password: this.password,
          },
        });
        this.setPersonalizedNotifications();
        let redirect = this.$route.query && this.$route.query.redirect;
        redirect ? this.$router.push(redirect) : this.$router.push("/admin");
      } catch (error) {
        this.errors = error.response.data.error;
        this.loading = false;
      }
    }, //Login()
    setPersonalizedNotifications() {
      let externalId = this.$auth.user.id;
      OneSignal.push(function () {
        OneSignal.setExternalUserId(externalId);
        // (Output) OneSignal User ID: 270a35cd-4dda-4b3f-b04e-41d7463a2316
      });
    }, //setPersonalizedNotifications()
  }, //METHODS
}; //EXPORT
</script>