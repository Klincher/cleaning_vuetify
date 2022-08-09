<template>
  <v-app>

    <!-- <v-toolbar>
      <v-toolbar-side-icon></v-toolbar-side-icon>
      <v-btn flat to="/">Cleaning</v-btn>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat to="/client">Client</v-btn>
        <v-btn flat to="/admin">Admin</v-btn>
      </v-toolbar-items>
    </v-toolbar> -->

    <div class="d-flex">
      <v-app-bar app>
      <v-app-bar-title>
        <router-link to="/">Cleaning</router-link>
      </v-app-bar-title>

      <div class="d-flex justify-end">
        <v-btn text to="/client">Client</v-btn>
        <v-btn text to="/admin">Admin</v-btn>
      </div>
    </v-app-bar>
    </div>

    <v-main>
      <router-view />
    </v-main>

  </v-app>
</template>

<script>
export default {
  name: 'App'
}
</script>