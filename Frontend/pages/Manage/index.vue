<template>
  <v-layout column container>
    <v-container>
      <v-row>
        <v-col v-for="(e,i) in overview" :key="i">
          <v-card nuxt :to="e.link" class="rounded-xl d-flex align-center justify-center" :style="'border:1px solid '+e.color+';'">
            <v-card-title class="title font-weight-bold" v-text="e.name" />
          </v-card>
        </v-col>
      </v-row>
    </v-container>
    <v-container class="row">
      <v-col>
        <v-card style="overflow-y:scroll;" height="300" class="pa-2">      
          <v-list>
            <v-subheader>Navigate</v-subheader>
            <v-list-item v-for="(e, i) in items" :key="i" :to="e.to">
              <v-list-item-action>
                <v-icon v-text="e.icon" />
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title v-text="e.title" />
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-card>
      </v-col>
    </v-container>
  </v-layout>
</template>

<script>
import { mapMutations } from "vuex";
export default {
  layout: "adminDesktop",
  data: () => ({
    items: [
      {
        icon: "mdi-collage",
        title: "Overview",
        to: "/manage#overview",
      },
      {
        icon: "mdi-tag-multiple",
        title: "Programs",
        to: "/manage/programs",
      },
      {
        icon: "mdi-cards-variant",
        title: "Program Content",
        to: "/manage/program_content",
      },
      {
        icon: "mdi-account-multiple",
        title: "Users",
        to: "/manage/users",
      },
      {
        icon: "mdi-basket",
        title: "Purchases",
        to: "/manage/purchases",
      },
      {
        icon: "mdi-home",
        title: "Home",
        to: "/",
      },
    ],
    overview:{
      Programs:{name:'View Programs', icon:'mdi-widgets',score:'',link:'/admin/products',color:'red'},
      Users:{name:'View Users', icon:'mdi-store',score:'',link:'/admin/stores',color:'green'},
      Add:{name:'Add Program', icon:'mdi-account-multiple',score:'',link:'',color:'blue'},
      Orders:{name:'View Purchases', icon:'mdi-cart',score:'',link:'/admin/orders',color:'orange'}
    },
    labels:[],
    value:[]
  }),
  created() {this.getAnalytics();},
  mounted() {
    //if (!this.$auth.loggedIn){this.$router.push('/manage/login')}
  },
  methods: {
    async getAnalytics(){
      await this.$axios.get('admin/analytics/overview')
      .then(res=>{
        this.overview.Products.score=res.data.products;
        this.overview.Stores.score=res.data.stores;
        this.overview.Users.score=res.data.users;
        this.overview.Orders.score=res.data.orders;
      },err=>{});
      await this.$axios.get('admin/analytics/sales')
      .then(res=>{
        this.labels=res.data.days;
        this.value=res.data.sales;
      });
    }
  },//METHODS
  computed:{
    maxSale(){
      return Math.max.apply(Math,this.value);
    },
    minSale(){
      return Math.min.apply(Math,this.value);
    }
  }
};
</script>
