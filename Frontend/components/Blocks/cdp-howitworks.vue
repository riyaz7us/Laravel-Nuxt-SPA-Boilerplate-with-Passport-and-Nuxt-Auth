<template>
	<v-row>
		<v-col v-for="(s,i) in steps" :key="i">
			<v-card class="d-flex flex-column align-center justify-center" flat>
				<div style="width:100%" class="d-flex flex-row justify-space-between align-center">
				<hr style="width:40%">
				<v-icon large>{{`mdi-numeric-${i+1}-circle-outline`}}</v-icon>
				<hr style="width:40%">
				</div>
				<h4 align="center">{{s.title}}</h4>
				<p align="center" class="body-2">{{s.desc}}</p>
			</v-card>
		</v-col>
	</v-row>
</template>

<script>
export default {
data:()=>({
	steps:[
		{title:"Schedule a call", desc:"Get in touch with us to get assistance"},
		{title:"Meet with our executive", desc:"Chalkout a high impact program that matches all your needs and wants with our executives"},
		{title:"Industry Speak", desc:"Get your students to interact with industry experts"},
		{title:"Industry immersion", desc:"Help your students to gain practical knowledge and insight into numerous domains"},
		{title:"Certification and Documentation", desc:"Get the entire program documented as per NAAC requirements and to benefit your marketing goals"},
	]
})
}
</script>

<style>

</style>