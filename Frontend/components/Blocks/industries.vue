<template>
<v-container>
	<v-row>
		<v-col class="d-flex flex-column align-center justify-center" md="2.5" v-for="(l,i) in logos" :key="i">
			<v-img :src="`/companies/${l.image}`" contain width="80" />
			<p class="subtitle-1 font-weight-medium my-0">{{l.name}}</p>
			<p class="body-2 my-0">{{l.location}}</p>
		</v-col>
	</v-row>
	</v-container>
</template>

<script>
export default {
	props:['logos'],
}
</script>

<style>

</style>