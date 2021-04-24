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
              <v-switch
                v-model="activate_chat"
                label="Activate Chat"
              ></v-switch>
          <v-textarea
            outlined
						rows="2"
            v-model="live_video_link"
            label="Live Video/Chat Link"
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
    title: "",
    intro: "",
    scheduled_on: "",
    live_video_link: "",
    live_chat_link: "",
    agenda: "",
    loading: true,
    submitting: false,
    activate_chat: false
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
      this.$axios.get(`programs/${this.$route.query.id}/live-session`).then((res) => {
				this.loading=false;
				if(res.data.live_session){
	        this.agenda = res.data.live_session.agenda
					this.intro = res.data.live_session.intro
					this.live_chat_link = res.data.live_session.live_chat_link
					this.live_video_link = res.data.live_session.live_video_link
					this.scheduled_on = res.data.live_session.scheduled_on
          this.activate_chat = res.data.live_session.activate_chat===1 ? true:false
				}

      });
    },
    createLiveSession() {
      this.submitting = true;
      this.$axios
        .post("programs/live_session", {
          intro: this.intro,
          program_id: this.$route.query.id,
          scheduled_on: this.scheduled_on,
          live_video_link: this.live_video_link,
          live_chat_link: this.live_chat_link,
          agenda: this.agenda,
          activate_chat: this.activate_chat ? 1:0
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