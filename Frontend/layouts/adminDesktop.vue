<template>
<v-app>
    <!-- 🔥 MAIN RENDER -->
    <v-main>
      <nuxt />
    </v-main>
    <adminNavDrawer v-model="drawer" />
    <v-bottom-sheet temporary v-model="more">
      <v-sheet class="text-center" height="200px">
        <v-list>
          <v-list-item @click="more=!more" v-for="item in moreItems" :to="item.link" :key="item.name">
            <v-list-item-icon>
              <v-icon v-text="item.icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-title style="text-align:left;">{{item.name}}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-sheet>
    </v-bottom-sheet>
</v-app>
</template>

<script>
import { mapMutations } from "vuex";
export default {
  name: "adminDesktop",
  data: () => ({
    location: "",
    searchterm: "",
    drawer:null,
    more:false,
    moreItems:[
      {name:'Jobs',link:'/business/jobs',icon:'mdi-briefcase-outline'},
      {name:'Freelancer',link:'/freelancer',icon:'mdi-account-tie-outline'},
      {name:'Close',link:'',icon:'mdi-close'},
    ]
  }),
  created(){
    this.drawer = this.$vuetify.breakpoint.mdAndUp ? true:false;
  },
  methods:{
  },
  watch:{
    location: function(val){
      this.$store.commit('add', val);
      localStorage.setItem("location",val);
    }
  },
  components: {
    adminNavDrawer:()=>import("../components/adminLayouts/adminNavDrawer.vue"),
    adminBottomNav : ()=>import("../components/adminLayouts/adminBottomNav.vue"),
  }, //components
  computed: {
    locations() {
      return this.$store.state.locations;
    },
  }, //computed
};
</script>

<style>
.v-text-field.shrink {
  max-width: 200px !important;
}

</style>
