<template>
  <v-layout justify-center container>
    <v-card v-if="!loading" width="800px">
      <v-container>
        <v-card-title v-once
          >{{ title }} - Industry Connect Program</v-card-title
        >
        <v-card-subtitle>Industry Speak</v-card-subtitle>
        <v-card-text>
          <v-text-field
            outlined
            v-model="title"
            label="Program Title"
          ></v-text-field>
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
          <v-btn @loading="submitting" @click="createLiveSession()" color="primary">Save Changes</v-btn>
          <v-btn text>Cancel</v-btn>
        </v-card-actions>
        <v-card-actions>
          <v-btn @click="createLiveSession()" outlined :to="`visit?id=${id}`" color="primary">Create Visit Page</v-btn>
        </v-card-actions>
      </v-container>
    </v-card>
  </v-layout>
</template>

<script>
export default {
  layout: "adminDesktop",
  data: () => ({
    program:{},
    title: "",
    intro: "",
    scheduled_on: "",
    chat_frame: "",
    agenda: "",
    loading: true,
    submitting: false
  }),
  created() {
    this.fetchLiveSession();
  },
  computed:{
    id(){
      return this.$route.query.id;
    }
  },
  methods: {
    fetchLiveSession() {
      this.$axios.get(`programs/1/live-session`).then((res) => {
				this.loading=false;
        this.program = res.data;
        this.agenda = res.data.live_session && res.data.live_session.agenda
      });
    },
    createLiveSession() {
      this.submitting = true;
      this.$axios
        .post("programs/live_session", {
          intro: this.intro,
          program_id: this.id,
          scheduled_on: this.scheduled_on,
          live_video_link: this.chat_frame,
          live_chat_link: this.chat_frame,
          agenda: this.agenda,
        })
        .then((res) => {
          this.submitting = false;
					this.newId = res.data.id;
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