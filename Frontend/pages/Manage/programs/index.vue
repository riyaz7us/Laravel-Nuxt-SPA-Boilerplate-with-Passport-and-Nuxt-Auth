<template>
  <v-layout column align-center justify-center>
    <v-container>
      <v-btn rounded to="programs/editor" large color="primary">
        <v-icon left>mdi-plus</v-icon>
        Add Program
      </v-btn>
    </v-container>
    <v-card outlined width="100%">
      <v-container>
        <v-card v-for="(p, i) in programs" :key="i" class="row ma-2">
          <v-col md="3">
            <v-img :src="`${$store.state.image_url}/${p.cover_image}`" />
          </v-col>
          <v-col md="6">
            <v-card-title>{{ p.title }} Industry Connect Program</v-card-title>
            <v-card-subtitle>{{ p.school_name }}</v-card-subtitle>
            <v-card-text>{{ p.desc_1 }}</v-card-text>
            <v-card-actions>
              <v-btn
                outlined
                :to="`/manage/programs/editor?id=${p.id}`"
                small
                class="ma-1"
                color="primary"
              >
                <v-icon left>mdi-pencil</v-icon>
                Intro
              </v-btn>
              <v-btn
                outlined
                :to="`/manage/programs/${p.id}/edit_live_session`"
                small
                class="ma-1"
                color="primary"
              >
                <v-icon left>mdi-pencil</v-icon>
                Connect
              </v-btn>
              <v-btn
                outlined
                :to="`/manage/programs/${p.id}/edit_visit`"
                small
                class="ma-1"
                color="primary"
              >
                <v-icon left>mdi-pencil</v-icon>
                Visit
              </v-btn>
              <v-btn outlined small class="ma-1" color="error">
                <v-icon left>mdi-delete</v-icon>
                Delete
              </v-btn>
            </v-card-actions>
          </v-col>
        </v-card>
      </v-container>
      <div class="text-center">
        <v-pagination
          v-model="pagination.current_page"
          :length="pagination.last_page"
          :total-visible="7"
          circle
          @input="onPageChange"
        ></v-pagination>
      </div>
    </v-card>
  </v-layout>
</template>

<script>
import { mapMutations } from "vuex";
export default {
  layout: "adminDesktop",
  data: () => ({
    programs: {},
    pagination: {},
    page: 1,
    viewProductToggle: false,
    productFocus: {},
  }), //DATA
  components: {},
  mounted() {
    this.fetchPrograms();
  },
  methods: {
    onPageChange() {
      this.page = this.pagination.current_page;
      this.fetchPrograms();
    },
    async fetchPrograms() {
      await this.$axios
        .get(`/programs`, { progress: true })
        .then((response) => {
          this.programs = response.data;
        });
    }, //FetchProducts()
    async deleteStore(id) {
      await this.$axios.$delete(`/admin/stores/${id}`, { progress: true }).then(
        (response) => {
          this.programs = resonse.data;
        },
        (err) => {}
      );
    }, //FetchStores()
    async toggleActive(e, id) {
      await this.$axios.post(`/admin/stores/${id}`, { active: e }).then(
        (response) => {},
        (err) => {}
      );
    }, //ToggleActive()
  },
};
</script>

<style>
</style>