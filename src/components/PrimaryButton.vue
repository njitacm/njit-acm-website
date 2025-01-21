<template>
  <button>
    <slot></slot>
  </button>
</template>

<script>
export default {

}
</script>

<style scoped>
button {
  background-color: var(--light-red);
  padding: 5px;
  border-radius: 8px;
  font-size: 2rem;
  /* border: 2px var(--light-gray) solid; */
  border-color: var(--gray);
  border-width: 2px;
  border-style: solid;
  cursor: pointer;
  transition: all var(--hover-speed) linear;
}

:slotted(a), :slotted(.router-link) {
  /* box-sizing: border-box; */
  color: white;
  text-decoration: none;
  font-weight: bold;
  color: var(--red);
  display: block;
  width: 100%;
  height: 100%;
}

button:hover {
  border-color: var(--red);
  background-color: var(--mid-red);
}
</style>