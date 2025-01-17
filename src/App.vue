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
  --navHeight: 60px;
  --red: rgb(204, 0, 0);  /* hsl(0, 100%, 40%) */
  --light-red: hsl(0, 100%, 90%);
  --hoverSpeed: 0.15s;
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

a {
  color: var(--red);
}

img {
  user-select: none;
}
</style>
