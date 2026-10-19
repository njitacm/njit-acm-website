<template>
  <button class="NavButton" :class="{ selected: $store.state.navBtnSelected === id }">
    <RouterLink :to="to" class="router-link">{{ text }}</RouterLink>
  </button>
</template>

<script>
export default {
  name: "NavButton",
  props: {
    to: {
      type: String,
      required: true,
    },
    text: {
      type: String,
      required: true,
    },
    id: {
      type: Number,
      required: true,
    },
  },
}
</script>

<style scoped>
.NavButton {
  background-color: transparent;
  border-radius: var(--border-radius);
  border: none;
  height: 1.75em;
  font-size: 1.25em;
  cursor: pointer;
  transition: background-color var(--hover-speed) var(--hover-func);
  align-content: center;
  line-height: 1.5em;
}

.NavButton.selected {
  background-color: var(--red);
}

.router-link {
  border-radius: var(--border-radius);
  display: block;
  padding: 0 16px;
  align-content: center;
  color: var(--red);
  font-weight: bold;
  text-decoration: none;
  flex: 1 1 0px;
  border: none;
  background-color: transparent;
  cursor: pointer;
  width: 100%;
  height: 100%;
}

.NavButton.selected .router-link {
  color: var(--bkg-color);
}

@media (hover: hover) and (pointer: fine) {
  button:hover:not(.selected) {
    background-color: var(--light-red);
  }
}

@media (pointer: coarse) {
  button:active:not(.selected) {
    background-color: var(--light-red);
  }
}
</style>
