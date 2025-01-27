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
  padding-bottom: 0;
  padding: 5px;
  border-radius: 8px;
  font-size: 2rem;
  /* border: 2px var(--light-gray) solid; */
  border-color: var(--gray);
  border-width: 2px;
  border-style: solid;
  cursor: pointer;
  height: 50px;
  transition: all var(--hover-speed) linear;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
}

:slotted(a), :slotted(.router-link), :slotted(span) {
  /* box-sizing: border-box; */
  display: block;
  align-content: center;
  margin: 0;
  text-decoration: none;
  font-weight: bold;
  color: var(--red);
  width: 100%;
  height: 100%;
}

@media (hover: hover) {
  button:hover {
    border-color: var(--red);
    background-color: var(--mid-red);
  }
}
@media (hover: none) {
  button:active {
    border-color: var(--red);
    background-color: var(--mid-red);
  }
}

</style>