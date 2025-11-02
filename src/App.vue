<template>
  <!-- <div id="grand-container"> -->
  <TheHeader />
  <div class="main-body">
    <router-view v-slot="{ Component }" class="router-view">
      <transition name="fade" mode="out-in">
        <component :is="Component" class="page" />
      </transition>
    </router-view>
    <TheFooter />
  </div>
  <!-- </div> -->
</template>
<script>
import { RouterView } from "vue-router";

export default {
  name: "App",
  components: {
    RouterView,
  },
};
</script>

<style>
:root {
  --nav-height: 60px;
  --nav-border-width: 3px;
  --hor-sec-img-border-width: 4px;
  --border-width: 3px;
  --border-radius: 10px;
  --large-border-radius: 20px;
  --shadow-radius: 20px;

  --bg-color: #ffffff;
  --text-color: #333333;
  --primary-color: #007bff;
  --card-bg-color: #f8f9fa;

  /* Override default variables for light theme */
  --bkg-color: whitesmoke;
  --bkg-color-a625: rgba(245, 245, 245, 0.625);
  --red: rgb(204, 0, 0);
  --light-red: hsl(0, 100%, 90%);
  --btn-red: rgb(255, 151, 151);
  --mid-red: hsl(0, 100%, 85%);
  --light-gray: rgb(225, 225, 225);
  --gray: rgb(200, 200, 200);
  --shadow-gray: rgb(100, 100, 100);
  --light-shadow-gray: rgb(150, 150, 150);
  --medium-shadow-black: rgba(0, 0, 0, 0.75);
  --light-shadow-black: rgba(0, 0, 0, 0.5);

  --hover-speed: 0.15s;
  --hover-opacity: 0.625;
}

[data-theme="dark"] {
  --bg-color: #1a1a1a;
  --text-color: #ffffff;
  --primary-color: #0d6efd;
  --card-bg-color: #2d2d2d;

  --bkg-color: #1a1a1a;
  --bkg-color-a625: rgba(26, 26, 26, 0.625);
  --red: rgb(255, 133, 133);
  --btn-red: rgb(190, 52, 52);
  --light-red: hsl(0, 60%, 25%);
  --mid-red: hsl(0, 60%, 30%);
  --light-gray: rgb(60, 60, 60);
  --gray: rgb(80, 80, 80);
  --shadow-gray: rgb(200, 200, 200);
  --light-shadow-gray: rgb(150, 150, 150);
  --medium-shadow-black: rgba(255, 255, 255, 0.15);
  --light-shadow-black: rgba(255, 255, 255, 0.1);
}

/* Apply theme colors to common elements */
html[data-theme="dark"] {
  background-color: var(--bkg-color);
  color: var(--text-color);
}

[data-theme="dark"] body {
  background-color: var(--bkg-color);
  color: var(--text-color);
}

[data-theme="dark"] .section-header {
  color: var(--text-color);
  border-bottom-color: var(--red);
}

/*
- Font sizes (px)
10 / 12 / 14 / 16 / 18 / 20 / 24 / 30 / 36 / 44 / 52 / 62 / 74/ 86 / 98

- Spacing system (px)
2 / 4 / 8 / 12 / 16 / 24 / 32 /48 /64 /80 /96 / 128
*/
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}

body {
  height: calc(100% - var(--nav-height));
}

#app {
  height: 100%;
}

html {
  height: 100%;
  background-color: whitesmoke;
  overflow-x: hidden;
}

p, li, button {
  font-size: 1.25em;
}

.main-body {
  margin-top: var(--nav-height);
  display: grid;
  grid-template-rows: 1fr auto;
  height: 100%;
  box-sizing: border-box;
}

.page {
  box-sizing: border-box;
}

.fade-enter-active,
.fade-leave-active {
  transition: all 500ms ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.outer-container {
  width: 80%;
  max-width: 1500px;
  margin-bottom: 64px;
}

.section-container {
  width: 90%;
  margin: 0 auto;
}

a {
  transition: opacity var(--hover-speed) linear;
  color: var(--red);
}

img {
  user-select: none;
}

button {
  user-select: none;
  -webkit-tap-highlight-color: transparent;
}

.section-header {
  font-size: 2em;
  width: 100%;
  margin: 32px auto;
  padding-bottom: 0.5em;
  border-bottom: red 2px solid;
}

@media (max-width: 500px) {
  .outer-container {
    width: 100%;
  }

  .section-header {
    width: 90%;
  }
}

@media (hover: hover) and (pointer: fine) {
  :not(.PrimaryButton) > a:not(.router-link):hover {
    opacity: 0.625;
  }

  [data-theme="dark"] :not(.PrimaryButton) > a:hover:not(.router-link) {
    opacity: 0.75;
  }
}

@media (pointer: coarse) {
  a:active:not(.button-link, .router-link) {
    opacity: 0.625;
  }
}
</style>
