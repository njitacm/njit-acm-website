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
      console.log('update selection to ' + this.isSelected);
    }
  },
  // e.g. when collapsable nav opens
  mounted() {
    this.updateSelection()
    console.log('mounted');
  },
  // e.g. when user clicks & changes "tab"
  updated() {
    this.updateSelection()
    console.log('updated');
  }
}
</script>

<style scoped>
button {
  background-color: white;
  border-radius: 10px;
  margin: 0.25rem;
  padding: 0.8rem;
  border: none;
  height: 150%;

  font-size: 2.4rem;
  /* flex: 1 1 0px; */
  /* background-color: inherit; */
  cursor: pointer;
  transition: background-color var(--hover-speed) ease-in-out;
}

button:not(.selected) {
  background-color: white;
}

button.selected {
  background-color: var(--red);
}

button.selected>.router-link {
  color: white;
}

@media (hover: hover) {
  button:hover:not(.selected) {
    background-color: var(--light-red);
  }
}

@media (hover: none) {
  button:active:not(.selected) {
    background-color: var(--light-red);
  }
}

.router-link {
  text-decoration: none;
  color: var(--red);
  font-weight: bold;
  text-decoration: none;
  font-size: 2.4rem;
  flex: 1 1 0px;
  padding: 0.8rem;
  border: none;
  background-color: transparent;
  cursor: pointer;
}
</style>