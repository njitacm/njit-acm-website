<template>
  <TheHeader />
  <div class="main-body">
    <router-view v-slot="{ Component }" class="router-view">
      <Transition name="fade" mode="out-in">
        <component :is="Component" />
      </Transition>
    </router-view>
    <TheFooter />
  </div>
</template>

<script>
import { RouterView } from "vue-router";

export default {
  name: "NJIT_ACM",
  components: { RouterView },
};
</script>

<style>
/* Global styles */
:root {
  --nav-height: 60px;
  --nav-border-width: 3px;
  --hor-sec-img-border-width: 4px;
  --border-width: 3px;
  --border-radius: 10px;
  --large-border-radius: 20px;
  --indentation: 64px;
  --shadow-blur: 25px;
  --shadow-offset-y: 10px;

  --bkg-color: whitesmoke;
  --text-color: #333;
  --red: rgb(204, 0, 0);
  --light-red: hsl(0, 100%, 90%);
  --gray: rgb(225, 225, 225);
  --shadow-gray: rgb(100, 100, 100);

  --hover-speed: 0.15s;
  --hover-opacity: 0.625;
}

[data-theme="dark"] {
  --text-color: #ddd;

  --bkg-color: rgb(40, 40, 40);
  --red: rgb(255, 133, 133);
  --light-red: hsl(0, 60%, 25%);
  --gray: rgb(60, 60, 60);
  --shadow-gray: black;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}

html {
  height: 100%;
  overflow-x: hidden;
  background-color: var(--bkg-color);
  color: var(--text-color);
}

body {
  background-color: var(--bkg-color);
  color: var(--text-color);
  height: calc(100% - var(--nav-height));
}

#app {
  height: 100%;
}

section {
  margin: 32px auto;
}

.section-header {
  text-align: center;
  color: var(--text-color);
  border-bottom: var(--border-width) solid var(--red);
  font-size: 2.25em;
  margin: 0 auto;
  margin-bottom: 32px;
}

.section-container {
  width: calc(100% - var(--indentation));
  margin: 0 auto;
}

.outer-container {
  width: calc(100% - var(--indentation));
  max-width: 1250px;
  margin-bottom: 64px;
}

h1 {
  font-size: 3em;
  line-height: 2em;
}

h2 {
  font-size: 2.25em;
  line-height: 2em;
}

h3 {
  font-size: 1.9em;
  line-height: 1.75em;
}

h4 {
  font-size: 1.5em;
  line-height: 1.25em;
}

p,
li,
button {
  font-size: 1.25em;
  line-height: 1.5em;
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

/* App-specific styles */
.main-body {
  margin-top: var(--nav-height);
  display: grid;
  grid-template-rows: 1fr auto;
  height: 100%;
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

@media (max-width: 750px) {
  .outer-container {
    width: 100%;
  }

  :root {
    --indentation: 32px;
  }
}

/* Desktop hover */
@media (hover: hover) and (pointer: fine) {
  :not(.PrimaryButton)>a:not(.router-link):hover {
    opacity: 0.625;
  }

  [data-theme="dark"] :not(.PrimaryButton)>a:hover:not(.router-link) {
    opacity: 0.75;
  }
}

/* Mobile tap */
@media (pointer: coarse) {
  a:active:not(.button-link, .router-link) {
    opacity: 0.625;
  }
}
</style>
