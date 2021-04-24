<template>
	<v-layout justify-center container>
		<v-card v-if="!loading" width="800px">
			<v-container>
				<v-card-title v-once>{{title}} - Industry Connect Program</v-card-title>
				<v-card-subtitle>Program Introduction</v-card-subtitle>
				<v-card-text>
				<v-textarea outlined v-model="intro" label="Visit Introduction"></v-textarea>
				<v-textarea outlined v-model="video_intro" label="Video Introduction"></v-textarea>
				<v-text-field outlined v-model="video_link" label="Video Link"></v-text-field>
								<!-- PRE_CONNECT_AGENDA -->
					<v-divider></v-divider>
				<h3 class="title my-1">Pre-Connect Agenda</h3>
				<v-text-field outlined v-model="pre_connect_agenda.name" label="Title"></v-text-field>
				<h4 class="my-2">Activities</h4>
				<div v-for="(a,i) in pre_connect_agenda.activities" :key="i">
					<v-row>
						<v-col>
					<v-text-field outlined label="Activity Title" v-model="a.name"></v-text-field>
					</v-col>
					<v-col>
					<v-text-field small outlined label="Skills" v-model="a.skills"></v-text-field>
					</v-col>
					</v-row>
				</div>
								<!-- DAY_AGENDA -->
					<v-divider></v-divider>
				<h3 class="title my-1">Day Agenda</h3>
				<v-text-field outlined v-model="day_agenda.name" label="Title"></v-text-field>
				<h4 class="my-2">Activities</h4>
				<div v-for="(a,i) in day_agenda.activities" :key="i+'a'">
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
					<v-btn color="primary">Save Changes</v-btn>
					<v-btn text >Cancel</v-btn>
				</v-card-actions>
				<v-card-actions>
					<v-btn outlined to="edit_intro" color="primary">Jump to Intro Page</v-btn>
					<v-btn outlined to="edit_live_session" color="primary">Jump to Live Chat Page</v-btn>
				</v-card-actions>
			</v-container>
		</v-card>
	</v-layout>
</template>

<script>
export default {
	props:['id'],
	layout:"adminDesktop",
	data:()=>({
		title:"",
		intro:"",
		video_intro:"",
		video_link:"",
		school_name:"",
		intro_video_link:"",
		program:[],
		loading:true
	}),
	created(){this.fetchIndustrialVisit()},
	methods:{
    fetchIndustrialVisit() {
      let id = this.$route.params.id;
      this.$axios.get(`programs/${id}/industrial-visit`).then((res) => {
        this.program = res.data;
				if (res.data.industrial_visit){
				this.intro = res.data.industrial_visit.intro;
				this.video_intro = res.data.industrial_visit.video_intro;
				this.video_link = res.data.industrial_visit.video_link;
        /*this.chat_agenda = JSON.parse(
          res.data.live_session && res.data.live_session.agenda
        );*/
        this.pre_connect_agenda = JSON.parse(res.data.industrial_visit.pre_connect_agenda);
				this.day_agenda = JSON.parse(res.data.industrial_visit.day_agenda);
					}
					this.loading=false
      });
    },
	}
}
</script>