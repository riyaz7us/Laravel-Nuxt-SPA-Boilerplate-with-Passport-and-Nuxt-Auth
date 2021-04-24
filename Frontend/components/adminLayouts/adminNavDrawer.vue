<template>
  <v-navigation-drawer
    left
    width="200"
    :value="value"
    @input="$emit('input', $event)"
    dark
    color="#101135"
    app
    :permanent="$vuetify.breakpoint.mdAndUp"
  >
    <v-list dense nav>
      <v-list-item
        v-for="(item, key) in items"
        :key="key"
        :to="item.to"
        router
        exact
      >
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
  props: {
    value: {
      type: Boolean,
      default: false,
    },
  },
  data: () => ({
    items: [
      {
        icon: "mdi-collage",
        title: "Overview",
        to: "/manage#overview",
      },
      {
        icon: "mdi-script",
        title: "ICP Page",
        to: "/manage/icp",
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
        icon: "mdi-basket",
        title: "Purchases",
        to: "/manage/purchases",
      },
            {
        icon: "mdi-account-multiple",
        title: "Users",
        to: "/manage/users",
      },
      {
        icon: "mdi-home",
        title: "Frontend",
        to: "/",
      },
    ],
  }),
};
</script>

<style>
.v-navigation-drawer--temporary.v-navigation-drawer--clipped {
  z-index: 3;
  padding-top: 64px;
}
</style>