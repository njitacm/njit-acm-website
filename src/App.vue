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

  --bkg-color: whitesmoke;
  --bkg-color-a625: rgba(245, 245, 245, 0.625);
  --red: rgb(204, 0, 0);
  /* hsl(0, 100%, 40%) */
  --light-red: hsl(0, 100%, 90%);
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

html {
  height: 100%;
}

body {
  height: calc(100% - var(--nav-height));
}

#app {
  height: 100%;
}

html {
  background-color: whitesmoke;
  font-size: 62.5%;
  overflow-x: hidden;
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

p {
  font-size: 2.5rem;
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
  margin-bottom: 10rem !important;
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
  width: 100%;
  margin: 2.5rem auto;
  font-size: 48px;
  border-bottom: red 4px solid;
}

@media (max-width: 500px) {
  .outer-container {
    width: 100%;
  }

  .section-header {
    width: 90%;
    font-size: 36px;
  }
}

@media (hover: hover) and (pointer: fine) {
  a:hover:not(.button-link, .router-link) {
    opacity: 0.625;
  }

  [data-theme="dark"] a:hover:not(.button-link, .router-link) {
    opacity: 0.75;
  }
}

@media (pointer: coarse) {
  a:active:not(.button-link, .router-link) {
    opacity: 0.625;
  }
}
</style>
