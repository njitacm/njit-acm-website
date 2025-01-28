<template>
  <TheHeader />
  <router-view v-slot="{ Component }">
    <transition name="fade" mode="out-in">
      <component :is="Component" />
    </transition>
  </router-view>
  <TheFooter />
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
  --border-width: 1px;
  --border-radius: 10px;
  --large-border-radius: 20px;

  --red: rgb(204, 0, 0);  /* hsl(0, 100%, 40%) */
  --light-red: hsl(0, 100%, 90%);
  --mid-red: hsl(0, 100%, 85%);
  --light-gray: rgb(225, 225, 225);
  --gray: rgb(200, 200, 200);
  --shadow-gray: rgb(100, 100, 100);
  --light-shadow-gray: rgb(150, 150, 150);
  --medium-shadow-black: rgba(0,0,0,0.75);
  --light-shadow-black: rgba(0,0,0,0.5);

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
  background-color: whitesmoke;
  font-size: 62.5%;
  margin-top: 60px;
  overflow-x: hidden;
}

p {
  font-size: 1.6rem;
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
  margin: 2.5rem 4rem;
  font-size: 48px;
  border-bottom: red 4px solid;
}

@media (max-width: 500px) {
  .outer-container {
    width: 100%;
  }
}

@media (hover: hover) {
  a:hover:not(.button-link, .router-link) {
    opacity: 0.625;
  }
}

@media (hover: none) {
  a:active:not(.button-link, .router-link) {
    opacity: 0.625;
  }
}

</style>
