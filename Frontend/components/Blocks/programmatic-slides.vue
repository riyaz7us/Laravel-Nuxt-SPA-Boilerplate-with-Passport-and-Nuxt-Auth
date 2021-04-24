<template>
<v-container v-if="slides.length!==0">
<v-row class="mx-8">
	<v-col md="8">
      <div transition="fade-transition">
			<div :key="curSlide" style="margin:auto;position:relative;">
			<v-img v-if="slides[curSlide]" eager style="margin:10px 20px 10px 10px;box-shadow:0 0 10px grey;" :src="`${$store.state.image_url}/${slides[curSlide].image}`" />
			<v-card v-if="slides[curSlide]" flat light color="#eee" style="width:90%;bottom:-20px;right:-10px;position:absolute;">
				<v-container>
					<p class="body-1" v-text="slides[curSlide].desc"></p>
				</v-container>
			</v-card>
			</div>
		</div>
	</v-col>
	<v-col>
		<v-list
		>
		<v-list-item-group class="domainList" mandatory v-model="curSlide" color="primary">
		<v-list-item @click.prevent="changeSlide(i)" v-for="(s,i) in slides" :key="i">
			<v-list-item-title v-text="s.name"></v-list-item-title>
		</v-list-item>
		</v-list-item-group>		
		</v-list>
	</v-col>
	</v-row>
	<div class="my-8 d-flex align-center justify-center">
	<v-btn rounded color="primary">Schedule A Call</v-btn>
	</div>
	</v-container>
</template>

<script>
export default {
props:['slides'],
data:()=>({
	curSlide:0,
}),
methods:{
	changeSlide(v){
		if(this.curSlide!==v){
		this.curSlide=v;
		}
		console.log(this.curSlide);
	}
}
}
</script>

<style>
.slide-leave-active,
.slide-enter-active {
  transition: 1s;
}
.slide-enter {
  transform: translate(100%, 0);
}
.slide-leave-to {
  transform: translate(-100%, 0);
}

.slideback-leave-active,
.slideback-enter-active {
  transition: 1s;
}
.slideback-enter {
  transform: translate(-100%, 0);
}
.slideback-leave-to {
  transform: translate(100%, 0);
}
.div-slider{
  overflow: hidden;
  position: relative;
  height: 100px;
  width: 90%;
}
.domainList .v-item--active{
	border-bottom: 2px solid;
}
</style>