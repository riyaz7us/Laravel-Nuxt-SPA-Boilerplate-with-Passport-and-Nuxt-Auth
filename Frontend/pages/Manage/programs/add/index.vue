<template>
  <v-layout justify-center container>
    <v-card v-if="!loading" width="800px">
      <v-container>
        <v-card-title v-once
          >{{ title }} - Industry Connect Program</v-card-title
        >
        <v-card-subtitle>Program Introduction</v-card-subtitle>
        <v-card-text>
          <v-text-field outlined v-model="title" label="Program Title"></v-text-field>
          <div class="d-flex">
            <v-img width="150" class="ma-4" contain :src="`${$store.state.image_url}/${cover_image}`" />
            <div>
              <label for="coverImg">Replace Cover Image</label>
              <br />
              <input type="file" id="coverImg" label="image" @input="replaceCoverImage($event)" />
            </div>
          </div>
          <v-textarea outlined v-model="desc_1" rows="2" label="Short Description 1"></v-textarea>
          <v-textarea outlined v-model="desc_2" rows="2" label="Short Description 2"></v-textarea>
          <v-textarea outlined v-model="introduction" label="Program Introduction"></v-textarea>
          <v-textarea outlined v-model="intro_video_desc" label="Intro Video Description"></v-textarea>
          <div class="d-flex">
            <v-text-field outlined v-model="school_name" class="mr-1" label="School Name"></v-text-field>
            <v-text-field outlined v-model="intro_video_link" class="mr-1" label="Intro Video Link"></v-text-field>
          </div>
          <!-- ORIENTATION SESSION -->
          <v-divider></v-divider>
          <h3 class="title my-1">Program Orientation</h3>
          <v-text-field outlined v-model="orientation.name" label="Title"></v-text-field>
          <h4 class="my-2">Activities</h4>
          <div v-for="(a, i) in orientation.activities" :key="i">
            <v-row>
              <v-col>
                <v-text-field outlined label="Activity Title" v-model="a.name"></v-text-field>
              </v-col>
              <v-col>
                <v-text-field small outlined label="Skills" v-model="a.skills"></v-text-field>
              </v-col>
            </v-row>
          </div>
          <!-- CHAT SESSION -->
          <v-divider></v-divider>
          <h3 class="title my-1">Chat Session</h3>
          <v-text-field outlined v-model="live_session.name" label="Title"></v-text-field>
          <h4 class="my-2">Activities</h4>
          <div v-for="(a, i) in live_session.activities" :key="i + 's'">
            <v-row>
              <v-col>
                <v-text-field outlined label="Activity Title" v-model="a.name"></v-text-field>
              </v-col>
              <v-col>
                <v-text-field small outlined label="Skills" v-model="a.skills"></v-text-field>
              </v-col>
            </v-row>
          </div>
          <!-- VISIT -->
          <v-divider></v-divider>
          <h3 class="title my-1">Industrial Visit</h3>
          <v-text-field outlined v-model="visit.name" label="Title"></v-text-field>
          <h4 class="my-2">Activities</h4>
          <div v-for="(a, i) in visit.activities" :key="i + 'v'">
            <v-row>
              <v-col>
                <v-text-field outlined label="Activity Title" v-model="a.name"></v-text-field>
              </v-col>
              <v-col>
                <v-text-field small outlined label="Skills" v-model="a.skills"></v-text-field>
              </v-col>
            </v-row>
          </div>
          <!-- CERTIFICATE -->
          <v-divider></v-divider>
          <h3 class="title my-1">Certification</h3>
          <v-text-field outlined v-model="certificate.name" label="Title"></v-text-field>
          <h4 class="my-2">Activities</h4>
          <div v-for="(a, i) in certificate.activities" :key="i + 'c'">
            <v-row>
              <v-col>
                <v-text-field outlined label="Activity Title" v-model="a.name"></v-text-field>
              </v-col>
              <v-col>
                <v-text-field small outlined label="Skills" v-model="a.skills"></v-text-field>
              </v-col>
            </v-row>
          </div>
        </v-card-text>
        <v-card-actions>
          <v-btn :loading="submitting" @click="createProgram()" color="primary"
            >Save Changes</v-btn
          >
          <v-btn text>Cancel</v-btn>
        </v-card-actions>
        <v-card-actions>
          <v-btn
            outlined
            :disabled="!newId"
            :to="`add/live_session?id=${newId}`"
            color="primary"
            >Create Live Chat Page</v-btn
          >
        </v-card-actions>
      </v-container>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  layout: "adminDesktop",
  data: () => ({
    title: "",
    cover_image: "",
    desc_1: "",
    desc_2: "",
    intro_video_desc: "",
    introduction: "",
    school_name: "",
    intro_video_link: "",
    program: [],
    loading: true,
    orientation: {},
    live_session: {},
    visit: {},
    certificate: {},
    submitting: false,
    newId: 0,
  }),
  created() {
    this.fetchProgram();
  },
  computed: {
    id() {
      return this.$route.query.id;
    },
  },
  methods: {
    async fetchProgram() {
      await this.$axios.get(`/programs/1`, { progress: true }).then((res) => {
        (this.title = res.data.title),
          (this.cover_image = res.data.cover_image),
          (this.desc_1 = res.data.desc_1),
          (this.desc_2 = res.data.desc_2),
          (this.intro_video_desc = res.data.intro_video_desc),
          (this.introduction = res.data.introduction),
          (this.school_name = res.data.school_name),
          (this.intro_video_link = res.data.intro_video_link),
          (this.orientation = JSON.parse(res.data.orientation)),
          (this.live_session = JSON.parse(res.data.live_session)),
          (this.visit = JSON.parse(res.data.visit)),
          (this.certificate = JSON.parse(res.data.certificate)),
          (this.loading = false);
      });
    }, //FetchProducts()
    createProgram() {
      this.submitting = true;
      this.$axios
        .post("programs", {
          title: this.title,
          school_name: this.school_name,
          school_logo: "icbm.png",
          cover_image: "cyber-4062449_1280.jpg",
          desc_1: this.desc_1,
          desc_2: this.desc_2,
          introduction: this.introduction,
          intro_video_link: this.intro_video_link,
          intro_video_desc: this.intro_video_desc,
          orientation: JSON.stringify(this.orientation),
          live_session: JSON.stringify(this.live_session),
          visit: JSON.stringify(this.visit),
          certificate: JSON.stringify(this.certificate),
        })
        .then((res) => {
          this.submitting = false;
					this.newId = res.data.id;
        });
    },
  },
};
</script>