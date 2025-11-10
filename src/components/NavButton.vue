<template>
  <button :class="{ selected: isSelected }">
    <RouterLink :to="to" class="router-link">{{ text }}</RouterLink>
  </button>
</template>

<script>
export default {
  data() {
    return {
      isSelected: false
    };
  },
  props: ['to', 'text', 'id', 'selectedId'],
  methods: {
    updateSelection() {
      this.isSelected = this.$props.id == this.$props.selectedId;
    }
  },
  // e.g. when collapsable nav opens
  mounted() {
    this.updateSelection()
  },
  // e.g. when user clicks & changes "tab"
  updated() {
    this.updateSelection()
  }
}
</script>

<style scoped>
button {
  background-color: transparent;
  border-radius: var(--border-radius);
  border: none;
  height: 1.75em;
  font-size: 1.25em;
  cursor: pointer;
  transition: background-color var(--hover-speed) ease-in-out;
  align-content: center;
  line-height: 1.5em;
}

.router-link {
  border-radius: var(--border-radius);
  display: block;
  padding: 0 0.75em;
  align-content: center;
  text-decoration: none;
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

button.selected {
  background-color: var(--red);
}

button.selected>.router-link {
  color: var(--card-bg-color);
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