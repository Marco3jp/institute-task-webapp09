<template>
  <v-app dark>
    <v-toolbar height="48px" class="flex-grow-0">
      <v-toolbar-title>
        <span>Kadai 09</span>
      </v-toolbar-title>

      <v-spacer/>

      <v-toolbar-items>
        <v-btn>
          <a href="https://github.com/Marco3jp/institute-task-webapp09" target="_blank">Raw source code</a>
        </v-btn>
      </v-toolbar-items>
    </v-toolbar>

    <v-content class="flex-grow-1">
      <nuxt/>
    </v-content>

    <v-footer height="32px">
      <span class="mr-2">&copy; 2019 Marco</span>
      <span>MIT LICENSE</span>
    </v-footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  </v-app>
</template>

<style>
  html {
    overflow: hidden !important;
  }
</style>
