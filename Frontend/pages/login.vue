<template>
  <v-layout align-center justify-center>
    <v-card class="my-4 elevation-6" width="600">
      <v-container>
        <!-- Tab-item :: LOGIN  -->
        <v-form ref="form" @submit.prevent="login" method="post">
          <v-alert type="error" v-if="errors">{{ errors }}</v-alert>
          <h2 align="center" class="mt-2 primary--text font-weight-black">
            Login Now
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
          <v-btn color="primary" large :loading="loading" type="submit" block
            >Login</v-btn
          >
          <!-- ! SIDE ACTIONS -->
          <br />
          <v-btn
            color="primary"
            to="/register"
            text
            large
            style="text-transform: capitalize"
            >New User? Register Here.</v-btn
          >
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
        //Useful if you include ?redirect=*your-desired-page*
        let redirect = this.$route.query && this.$route.query.redirect;
        redirect ? this.$router.push(redirect) : this.$router.push("/");
      } catch (error) {
        this.errors = error.response.data;
        this.loading = false;
      }
    }, //Login()
  }, //METHODS
}; //EXPORT
</script>