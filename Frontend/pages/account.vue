<template>
	<v-layout row align-start justify-center>
		<v-col md="8">
			<v-container class="ma-4">
				<h2 class="display-1 my-2">Your Programs</h2>
				<v-container>
				<v-card v-show="i<2" v-for="(p,i) in programs" :key="i" class="row my-4">
					<v-col cols="4" class="d-flex justify-center">
						<v-img :src="`${$store.state.image_url}/cyber-4062449_1280.jpg`" />
					</v-col>
					<v-col cols="8">
						<v-card-title>{{p.title}}</v-card-title>
						<v-card-text>{{p.desc_1}}</v-card-text>
						<v-card-actions>
							<v-btn text color="primary">Go To Program</v-btn>
						</v-card-actions>
					</v-col>
				</v-card>
				</v-container>
				<h2 class="display-1 my-2">Certified Programs</h2>
				<v-container>
				<v-card v-for="(p,i) in programs" :key="i" v-show="i==1" class="row my-4">
					<v-col cols="4" class="d-flex justify-center">
						<v-img :src="`${$store.state.image_url}/cyber-4062449_1280.jpg`" />
					</v-col>
					<v-col cols="8">
						<v-card-title>{{p.title}}</v-card-title>
						<v-card-text>{{p.desc_1}}</v-card-text>
						<v-card-actions>
							<v-btn text color="primary">View Certificate</v-btn>
						</v-card-actions>
					</v-col>
				</v-card>
				</v-container>
			</v-container>
		</v-col>
		<v-col md="4" >
			<v-container>
				<v-card flat color="#fafafa">
					<v-container>
			<v-card flat color="#00000000" class="row my-4">
				<v-col cols="4">
					<v-img style="border-radius:100px; width:100px;height:100px;" src="/man-photo.jpg"/>
				</v-col>
				<v-col>
					<v-card-title>User Name</v-card-title>
					<v-card-subtitle>User Designation</v-card-subtitle>
				</v-col>
			</v-card>
			<h3>LinkedIn Profile</h3>
			<p>@myProfile</p>
			<h3>Your Bio</h3>
			<p>This area covers the student's entire bio that shall be fulfilled when the student enters all the information about himself.</p>
			<h3>Total 4 Certificate(s) Earned</h3>
			</v-container>
			</v-card>
			</v-container>
		</v-col>
	</v-layout>
</template>

<script>
export default {
	data:()=>({
		programs:[]
	}),
  created() {
    this.getPrograms();
  },
	  methods: {
    getPrograms() {
      this.$axios.get("programs").then((res) => {
        this.programs = res.data;
      });
    },
  },

}
</script>

<style>

</style>