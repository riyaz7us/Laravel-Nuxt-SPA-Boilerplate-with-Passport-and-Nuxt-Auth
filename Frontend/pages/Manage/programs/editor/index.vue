<template>
  <v-layout justify-center container>
    <v-card v-if="!loading" width="800px">
      <v-container>
        <v-card-title v-once>{{ $route.params.id ? title + "- Industry Connect Program" : "" }}</v-card-title>
        <v-card-subtitle>Program Introduction</v-card-subtitle>
        <v-card-text>
          <v-text-field outlined v-model="title" label="Program Title"></v-text-field>
          <div class="d-flex">
            <v-img width="150" class="ma-4" contain :src="`${$store.state.image_url}/${cover_image}`" />
            <div>
              <label for="coverImg">Replace Cover Image</label>
              <br />
              <input type="file" id="coverImg" label="image" @input="addCoverImage($event)" />
            </div>
          </div>
          <div class="d-flex">
            <v-img width="150" class="ma-4" contain :src="`${$store.state.image_url}/${school_logo}`" />
            <div>
              <label for="schoolLogo">Replace Logo</label>
              <br />
              <input type="file" id="schoolLogo" label="image" @input="replaceLogo($event)" />
            </div>
          </div>
          <div class="my-4">
            <label for="introVid">Upload Video</label>
            <br />
            <input type="file" id="introVid" label="Video" @input="uploadVideo($event)" />
          </div>
          <v-textarea outlined v-model="desc_1" rows="2" label="Short Description 1"></v-textarea>
          <v-textarea outlined v-model="desc_2" rows="2" label="Short Description 2"></v-textarea>
          <v-textarea outlined v-model="introduction" label="Program Introduction"></v-textarea>
          <v-textarea outlined v-model="intro_video_desc" label="Intro Video Description"></v-textarea>
          <div class="d-flex">
            <v-text-field outlined v-model="school_name" class="mr-1" label="School Name"></v-text-field>
            <v-text-field outlined v-model="intro_video_link" class="mr-1" label="Intro Video Link"></v-text-field>
          </div>
          <!-- HERO BENEFITS -->
          <h3 class="my-1">Banner Benefits</h3>
          <div v-for="(hb, i) in hero_benefits" :key="i + 'hb'">
            <v-text-field outlined v-model="hb.icon" class="mr-1" label="Icon"></v-text-field>
            <v-textarea rows="2" outlined v-model="hb.desc" label="Description"></v-textarea>
          </div>
          <!-- PROGRAM BENEFITS -->
          <h3 align="center" class="my-2">Program Benefits</h3>
          <div v-for="(b, i) in program_benefits" :key="i + 'pb'">
            <div class="d-flex flex-row">
              <v-text-field outlined v-model="b.title" label="Title" class="mx-1"></v-text-field>
              <v-text-field outlined v-model="b.icon" label="Icon" class="mx-1"></v-text-field>
            </div>
            <v-textarea rows="3" outlined v-model="b.desc" label="Description"></v-textarea>
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
          <v-btn :loading="submitting" @click="$route.query.id ? updateProgram() : createProgram()" color="primary">Save Changes</v-btn>
          <v-btn text>Cancel</v-btn>
        </v-card-actions>
        <v-card-actions>
          <div v-if="$route.query.id">
            <v-btn outlined :to="`/manage/programs/editor/live_session?id=${$route.query.id}`" color="primary">
              Jump to Live Chat Page
            </v-btn>
            <v-btn outlined :to="`/manage/programs/editor/visit?id=${$route.query.id}`" color="primary">Jump to Visit Page</v-btn>
          </div>
          <div v-else>
            <v-btn outlined :disabled="!newId" :to="`/manage/programs/editor/live_session?id=${newId}`" color="primary">
              Create Live Chat Page
            </v-btn>
            <v-btn outlined :disabled="!newId" :to="`/manage/programs/editor/visit?id=${newId}`" color="primary">Create Visit Page</v-btn>
          </div>
        </v-card-actions>
      </v-container>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  props: ["id"],
  layout: "adminDesktop",
  data: () => ({
    title: "",
    cover_image: "",
    school_logo: "",
    desc_1: "",
    desc_2: "",
    hero_benefits: [],
    program_benefits: [],
    intro_video_desc: "",
    introduction: "",
    school_name: "",
    intro_video_link: "",
    program: [],
    orientation: {},
    live_session: {},
    visit: {},
    certificate: {},
    loading: true,
    submitting: false,
    newId: 0,
  }),
  created() {
    this.fetchProgram();
  },
  methods: {
    async fetchProgram() {
      await this.$axios.get(`/programs/${this.$route.query.id || 1}`, { progress: true }).then(res => {
        (this.title = res.data.title),
          (this.cover_image = res.data.cover_image),
          (this.desc_1 = res.data.desc_1),
          (this.desc_2 = res.data.desc_2),
          (this.school_logo = res.data.school_logo),
          (this.hero_benefits = JSON.parse(res.data.hero_benefits)),
          (this.program_benefits = JSON.parse(res.data.program_benefits)),
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
    updateProgram() {
      this.submitting = true;
      this.$axios
        .put(`programs/${this.$route.query.id}`, {
          title: this.title,
          school_name: this.school_name,
          school_logo: "icbm.png",
          cover_image: this.cover_image,
          desc_1: this.desc_1,
          desc_2: this.desc_2,
          hero_benefits: JSON.stringify(this.hero_benefits),
          program_benefits: JSON.stringify(this.program_benefits),
          introduction: this.introduction,
          intro_video_link: this.intro_video_link,
          intro_video_desc: this.intro_video_desc,
          orientation: JSON.stringify(this.orientation),
          live_session: JSON.stringify(this.live_session),
          visit: JSON.stringify(this.visit),
          certificate: JSON.stringify(this.certificate),
        })
        .then(res => {
          this.submitting = false;
        });
    }, //UpdateProgram
    createProgram() {
      this.submitting = true;
      this.$axios
        .post("programs", {
          title: this.title,
          school_name: this.school_name,
          school_logo: "icbm.png",
          cover_image: this.cover_image,
          desc_1: this.desc_1,
          desc_2: this.desc_2,
          hero_benefits: JSON.stringify(this.hero_benefits),
          program_benefits: JSON.stringify(this.program_benefits),
          introduction: this.introduction,
          intro_video_link: this.intro_video_link,
          intro_video_desc: this.intro_video_desc,
          orientation: JSON.stringify(this.orientation),
          live_session: JSON.stringify(this.live_session),
          visit: JSON.stringify(this.visit),
          certificate: JSON.stringify(this.certificate),
        })
        .then(res => {
          this.submitting = false;
          this.newId = res.data.id;
        });
    }, //CreateProgram
    addCoverImage(e) {
      let image = e.target.files[0];
      e.target.value = "";
      if (image === null) {
        return;
      }
      let formdata = new FormData();
      formdata.append("image", image);
      formdata.append("path", "cover_images/");
      //formdata.append("delete", this.school_logo);
      this.$axios
        .post(`images`, formdata, {
          headers: { "Content-type": "multipart/form-data" },
        })
        .then(
          res => {
            this.cover_image = res.data.image;
          },
          err => {}
        );
    },
    uploadVideo(e) {
      let video = e.target.files[0];
      e.target.value = "";
      if (video === null) {
        return;
      }
      let formdata = new FormData();
      formdata.append("video", video);
      formdata.append("path", "videos/");
      //formdata.append("delete", this.school_logo);
      this.$axios
        .post(`videos`, formdata, {
          headers: { "Content-type": "multipart/form-data" },
        })
        .then(
          res => {
            this.intro_video_link = res.data.video;
          },
          err => {}
        );
    },
  },
};
</script>
