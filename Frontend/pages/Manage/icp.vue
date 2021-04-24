<template>
  <v-layout justify-center container>
    <v-card v-if="!loading" width="800px">
      <v-container>
        <v-card-title v-once>Industry Connect Program</v-card-title>
        <v-card-subtitle>Program Introduction</v-card-subtitle>
        <v-card-text>
          <!-- INTRO -->
          <v-textarea
            outlined
            v-model="intro"
            label="Introduction"
          ></v-textarea>
          <!-- COLLEGE LOGOS -->
          <div class="d-flex flex-wrap">
            <div
              class="d-flex align-center justify-center flex-column"
              v-for="(l, i) in logos"
              :key="i"
            >
              <v-img
                contain
                width="50"
                :src="`${$store.state.image_url}/college-logos/${l}`"
              />
              <v-btn text small color="red" @click="deleteImage(l, i)">
                Delete
              </v-btn>
            </div>
          </div>
          <!-- ADD COLLEGE LOGOS -->
          <v-file-input
            outlined
            v-model="image"
            :loading="uploading"
            label="File input"
            @change="uploadImage()"
          ></v-file-input>

          <!-- ** BENEFITS ** -->
          <h3 align="center" class="my-2">Benefits</h3>
          <div v-for="(b, i) in benefits" :key="i">
            <div class="d-flex flex-row">
              <v-text-field
                outlined
                v-model="b.title"
                label="Title"
                class="mx-1"
              ></v-text-field>
              <v-text-field
                outlined
                v-model="b.icon"
                label="Icon"
                class="mx-1"
              ></v-text-field>
            </div>
            <v-textarea
              rows="3"
              outlined
              v-model="b.desc"
              label="Description"
            ></v-textarea>
          </div>

          <!-- DOMAINS -->
          <div v-for="(d, i) in domains" :key="i + 'd'">
            <v-row class="mb-2">
              <v-col md="2">
                <v-img
                  contain
                  width="100"
                  :src="`${$store.state.image_url}/domains/${d.image}`"
                />
              </v-col>
              <v-col md="4">
                <v-text-field
                  outlined
                  hide-details
                  v-model="d.name"
                  label="Title"
                ></v-text-field>
                <label for="domainImg">Replace Image</label>
                <input type="file" id="domainImg" label="image" @input="changeDomainImage($event,d.image,i)" />
              </v-col>
              <v-col md="6">
                <v-textarea
                  rows="2"
                  outlined
                  v-model="d.desc"
                  label="Description"
                ></v-textarea>
              </v-col>
            </v-row>
          </div>

                    <!-- DOMAINS -->
          <div v-for="(t, i) in testimonials" :key="i + 'd'">
            <v-row class="mb-2">
              <v-col md="2">
                <v-img
                  contain
                  width="100"
                  :src="`${$store.state.image_url}/testimonials/${d.image}`"
                />
              </v-col>
              <v-col md="4">
                <v-text-field
                  outlined
                  hide-details
                  v-model="d.name"
                  label="Name"
                ></v-text-field>
                <v-text-field
                  outlined
                  hide-details
                  v-model="d.college"
                  label="College"
                ></v-text-field>
                <label for="testimonialImg">Replace Image</label>
                <input type="file" id="testimonialImg" label="image" @input="changeDomainImage($event,d.image,i)" />
              </v-col>
              <v-col md="6">
                <v-textarea
                  rows="2"
                  outlined
                  v-model="t.desc"
                  label="Description"
                ></v-textarea>
              </v-col>
            </v-row>
          </div>
        </v-card-text>
        <v-card-actions>
          <v-btn @click="createProgram()" color="primary">Save Changes</v-btn>
          <v-btn text>Cancel</v-btn>
        </v-card-actions>
        <v-card-actions></v-card-actions>
      </v-container>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  layout: "adminDesktop",
  data: () => ({
    intro: "",
    benefits: [],
    domains: [],
    testimonials: [],
    logos: [],
    files: [],
    image: null,
    uploading: false,
    loading: false,
  }),
  created() {
    this.fetchIcp();
  },

  methods: {
    fetchIcp() {
      this.$axios.get("icp").then((res) => {
        this.intro = res.data.intro;
        this.benefits = JSON.parse(res.data.benefits);
        this.domains = JSON.parse(res.data.domains);
        this.testimonials = JSON.parse(res.data.testimonials);
        this.logos = JSON.parse(res.data.college_logos);
      });
    },
    uploadImage(folder) {
      if (this.image === null) {
        return;
      }
      this.uploading = true;
      let formdata = new FormData();
      formdata.append("image", this.image);
      formdata.append("path", "/college-logos");
      this.$axios
        .post(`images`, formdata, {
          headers: { "Content-type": "multipart/form-data" },
        })
        .then(
          (res) => {
            this.uploading = false;
            this.logos.push(res.data.image);
            this.image = null;
          },
          (err) => {
            this.uploading = false;
            this.image = null;
          }
        );
    },
    deleteImage(name, index) {
      this.logos.splice(index, 1);
      this.$axios.post("images/delete", {
        filename: "college-logos/" + name,
      });
    },
    changeDomainImage(e,oldImg,index){
      let image = e.target.files[0];
      e.target.value = "";
      if (image === null) {
        return;
      }
      let formdata = new FormData();
      formdata.append("image", image);
      formdata.append("path", "domains/");
      formdata.append("delete",oldImg);
      this.$axios
        .post(`images/replace`, formdata, {
          headers: { "Content-type": "multipart/form-data" },
        })
        .then(
          (res) => {
            this.domains[index].image=res.data.image;
          },
          (err) => {
          }
        );
    }
  },
};
</script>