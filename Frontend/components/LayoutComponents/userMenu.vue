<template>
  <v-menu left bottom>
    <template v-slot:activator="{ on: menu, attrs }">
      <v-btn :color="color" icon v-bind="attrs" v-on="{ ...menu }">
        <v-icon>mdi-account-circle-outline</v-icon>
      </v-btn>
    </template>
    <v-list>
      <v-list-item>
        <v-list-item-title>Welcome{{this.$auth.loggedIn && ', '+this.$auth.user.name.split(' ')[0]}}</v-list-item-title>
      </v-list-item>
      <v-divider />
      <v-list-item :to="item.link" v-for="(item,i) in items" :key="i">
        <v-list-item-icon>
          <v-icon v-text="item.icon" />
        </v-list-item-icon>
        <v-list-item-title v-text="item.title" />
      </v-list-item>
      <v-list-item @click="$auth.logout()">
        <v-list-item-icon>
          <v-icon>mdi-logout</v-icon>
        </v-list-item-icon>
        <v-list-item-title>Logout</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-menu>
</template>

<script>
export default {
  props:['color'],
  data: () => ({
    items: [
      { title: "Account", icon: "mdi-account-outline", link:"#" },
    ],
  }),
};
</script>

<style>
</style>