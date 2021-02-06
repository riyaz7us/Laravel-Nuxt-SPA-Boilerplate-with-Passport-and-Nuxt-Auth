<template>
  <v-layout align-center justify-center>
    <v-card class="elevation-6 my-4" width="600">
      <h2 align="center" class="mt-2 primary--text font-weight-black">
        Register Now
      </h2>
      <!-- Tab-Item :: REGISTER -->
      <v-container>
        <!-- ⚠ ALERTS -->
        <v-alert type="error" v-for="(value, key) in errors" :key="key">{{
          value[0]
        }}</v-alert>
        <!--  FORM -->
        <v-form
          ref="form"
          @submit.prevent="register"
          method="post"
          :lazy-validation="true"
        >
          <!-- 🅰 FULL NAME -->
          <v-text-field
            prepend-inner-icon="mdi-account-outline"
            outlined
            validate-on-blur
            dense
            v-model="name"
            :rules="[(v) => !!v || 'Full Name is Required']"
            label="Full Name *"
          ></v-text-field>
          <!-- ✉ EMAIL -->
          <v-text-field
            prepend-inner-icon="mdi-email-outline"
            outlined
            validate-on-blur
            dense
            v-model="email"
            :rules="emailRules"
            label="Your E-mail *"
          ></v-text-field>
          <!-- 🔑 PASSWORD -->
          <v-text-field
            prepend-inner-icon="mdi-lock-outline"
            outlined
            validate-on-blur
            dense
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="show1 = !show1"
            :type="show1 ? 'text' : 'password'"
            v-model="password"
            label="Password *"
            :rules="passwordRules"
          ></v-text-field>
          <!-- 📞 PHONE -->
          <v-text-field
            prepend-inner-icon="mdi-phone-outline"
            :rules="[(v) => !!v || 'Phone No. is Required']"
            outlined
            validate-on-blur
            hint="Enter Phone No. without country code Eg. 8123456789"
            dense
            counter
            maxlength="10"
            v-model="phone"
            label="Your Phone No. *"
          ></v-text-field>
          <!-- ✅ CHECKBOX - BUSINESS -->
          <v-checkbox
            class="my-0"
            label="Become OWNEAR-Preneur, Start selling with ownear"
            v-model="sellerMode"
          />
          <!-- ❕ ACTION -->
          <v-btn color="primary" type="submit" block :loading="loading"
            >Register Now</v-btn
          >
          <br />
          <!-- ! SIDE ACTIONS -->
          <v-btn
            color="primary"
            to="/login"
            text
            block
            style="text-transform: capitalize"
            >Already registered? Login here.</v-btn
          >
        </v-form>
        <!-- 📓 NOTES -->
        <p class="body-2">
          By registering with us, you agree to our Terms & Conditions and
          Privacy Policy
        </p>
      </v-container>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  data() {
    return {
      sellerMode: false,
      show1: false,
      name: null,
      email: null,
      phone: null,
      password: null,
      errors: {},
      success: false,
      loading: false,
      emailRules: [
        (v) => !!v || "E-mail is required",
        (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
      ],
      passwordRules: [(v) => !!v || "Password is required"],
    };
  }, //DATA
  mounted() {
    this.$route.query.business ? (this.sellerMode = true) : "";
  }, //MOUNTED
  methods: {
    async register() {
      this.errors = false;
      this.loading = true;
      let app = this;
      try {
        await this.$axios.post("auth/signup", {
          name: app.name,
          email: app.email,
          phone: app.phone,
          password: app.password,
        }),
          await this.$auth.loginWith("local", {
            data: {
              email: app.email,
              password: app.password,
            },
          });
        this.setPersonalizedNotifications();
        this.sellerMode
          ? this.$router.push("business/join")
          : this.$router.push("/");
      } catch (error) {
        this.errors = error.response.data;
        this.loading = false;
      }
    }, //Register()
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