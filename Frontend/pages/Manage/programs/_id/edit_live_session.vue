<template>
  <v-layout justify-center container>
    <v-card v-if="!loading" width="800px">
      <v-container>
        <v-card-title v-once
          >{{ title }} - Industry Connect Program</v-card-title
        >
        <v-card-subtitle>Industry Speak</v-card-subtitle>
        <v-card-text>
          <v-textarea
            outlined
            v-model="intro"
            rows="2"
            label="Why Industry Speak"
          ></v-textarea>
          <div class="my-2 v-card outlined">
          <label for="input-70" class="v-label theme--light">Program Title</label>
          <input id="scheduledon" type="datetime-local" v-model="scheduled_on" />
          </div>
          <v-textarea
            outlined
            v-model="chat_frame"
            label="Chat iFrame"
          ></v-textarea>
          <v-textarea
            outlined
            rows="2"
            v-model="agenda"
            placeholder="Agenda Items Separated By Comma"
            hint="Eg: First, Second, Third (Separated By Comma)"
            label="Chat Agenda"
          ></v-textarea>
        </v-card-text>
        <v-card-actions>
          <v-btn color="primary">Save Changes</v-btn>
          <v-btn text>Cancel</v-btn>
        </v-card-actions>
        <v-card-actions>
          <v-btn outlined to="edit_intro" color="primary">Jump to Intro Page</v-btn>
          <v-btn outlined to="edit_visit" color="primary">Jump to Visit Page</v-btn>
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
    program:{},
    title: "",
    intro: "",
    scheduled_on: "",
    chat_frame: "",
    agenda: "",
    loading: true,
  }),
  created() {
    this.fetchLiveSession();
  },
  methods: {
    fetchLiveSession() {
      let id = this.$route.params.id;
      this.$axios.get(`programs/${id}/live-session`).then((res) => {
				this.loading=false;
        this.program = res.data;
        if (res.data.live_session){
        this.agenda = res.data.live_session.agenda
        this.intro = res.data.live_session.intro
        }
      });
    },
  },
};
</script>
<style scoped>
#scheduledon{
      border: 1px solid grey;
    border-radius: 5px;
    padding: 5px;
    display: block;
}
</style>