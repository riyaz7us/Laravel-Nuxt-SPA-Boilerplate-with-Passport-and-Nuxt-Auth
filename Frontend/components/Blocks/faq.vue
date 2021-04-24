<template>
  <div>
    <v-expansion-panels>
      <v-expansion-panel v-for="(item, i) in 3" :key="i">
        <v-expansion-panel-header expand-icon="expand_more">
          FAQ {{ i + 1 }}
        </v-expansion-panel-header>
        <v-expansion-panel-content>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
          minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat.
        </v-expansion-panel-content>
      </v-expansion-panel>
    </v-expansion-panels>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>