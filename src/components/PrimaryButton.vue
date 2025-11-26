<template>
  <button class="PrimaryButton">
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: "PrimaryButton",
};
</script>

<style scoped>
.PrimaryButton {
  --btn-hov-col: color-mix(in srgb, var(--red), var(--bkg-color) 25%);
  color: var(--bkg-color);
  background-color: var(--red);
  border-radius: var(--border-radius);
  border: none;
  cursor: pointer;
  height: 50px;
  transition: all var(--hover-speed) var(--hover-func);
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  font-size: 1.25em;
}

:slotted(a),
:slotted(.router-link),
:slotted(span),
:slotted(.red-button-text) {
  border-radius: var(--border-radius);
  display: block;
  align-content: center;
  margin: 0;
  padding: 0 1em;
  text-decoration: none;
  font-weight: bold;
  color: inherit;
  width: 100%;
  height: 100%;
}

@media (hover: hover) and (pointer: fine) {
  button:hover {
    background-color: var(--btn-hov-col);
  }
}

@media (pointer: coarse) {
  button:active {
    background-color: var(--btn-hov-col);
  }
}
</style>