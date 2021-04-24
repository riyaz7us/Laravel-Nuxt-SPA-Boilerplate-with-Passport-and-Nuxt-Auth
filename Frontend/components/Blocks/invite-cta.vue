<template>
	<v-card flat color="#eee">
		<v-container>
			<v-card-title class="font-weight-bold subtitle-1">Invite a friend to complete the program together</v-card-title>
			<v-card-text>
				<p class="body-1">
				Know someone who would love this?<br/>
				Share this with them!
				</p>
				<v-btn color="primary">
					<v-icon left>mdi-content-copy</v-icon> Copy Link
				</v-btn>
				<div class="my-4">
					<p class="body-1 my-1">Send Via</p>
					<v-btn v-for="b in buttons" :key="b.key" large class="ma-1" :color="b.background" dark icon><v-icon large>{{b.icon}}</v-icon></v-btn>
				</div>
			</v-card-text>
		</v-container>
	</v-card>
</template>

<script>
export default {
	data:()=>({
		buttons:[
			{icon:"mdi-linkedin", background:"#0077b5"},
			{icon:"mdi-facebook", background:"#4267B2"},
			{icon:"mdi-facebook-messenger", background:"#00c6ff"},
			{icon:"mdi-twitter", background:"#00acee"},
			{icon:"mdi-whatsapp", background:"#25D366"},
		]
	})

}
</script>

<style>

</style>