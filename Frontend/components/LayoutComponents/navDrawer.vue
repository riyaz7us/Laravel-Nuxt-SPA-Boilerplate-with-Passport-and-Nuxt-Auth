<template>
  <v-navigation-drawer :value="value" @input="$emit('input',$event)" app fixed temporary z-index="999999">
    <v-list nav outlined>
      <v-list-item v-for="item in items" :key="item.title" :to="item.to" router exact>
        <v-list-item-action>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-action>
        <v-list-item-content>
          <v-list-item-title v-text="item.title" />
        </v-list-item-content>
      </v-list-item>
      </v-list>
      <v-divider></v-divider>
          <v-list v-if="$auth.loggedIn">
                  <v-subheader>Business</v-subheader>
      <v-list-item v-for="item in secretItems" :key="item.title" :to="item.to" router exact>
        <v-list-item-action>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-action>
        <v-list-item-content>
          <v-list-item-title v-text="item.title" />
        </v-list-item-content>
      </v-list-item>
      </v-list>


  </v-navigation-drawer>
</template>

<script>
export default {
  props: {value:{
	  type:Boolean,
	  default:false
  }},
  data: () => ({
    items: [
      {
        icon: "mdi-home-outline",
        title: "Home",
        to: "/",
      },
      {
        icon: "mdi-tag-multiple-outline",
        title: "Link 1",
        to: "#",
      },
      {
        icon: "mdi-store",
        title: "Link 2",
        to: "#",
      },
      {
        icon: "mdi-information-outline",
        title: "About us",
        to: "#",
      },
    ],
    secretItems:[
      {
        icon:'mdi-account',
        title:'My Account',
        to:'#'
      },
    ]
  }),
};
</script>

<style>
</style>