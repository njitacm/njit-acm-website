<template>
  <button :class="{selected: isSelected}">
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
    props: [ 'to', 'text' ],
    methods: {
        updateTabSelection(newTab) {
            if (this.$props.to !== newTab) {
                this.isSelected = false;
                console.log("left " + newTab);
            } else {
                this.isSelected = true;
                console.log("entered " + newTab);
            }
        }
    },
    watch: {
        $route (to) {
            this.updateTabSelection(to.fullPath);
        }
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
    transition: background-color var(--hoverSpeed) ease-in-out;
}

button:not(.selected) {
    background-color: white;
}

button.selected {
    background-color: var(--red);
}

button.selected > .router-link {
    color: white;
}

button:hover:not(.selected) {
    background-color: var(--light-red);
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