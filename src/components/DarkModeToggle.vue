<!-- src/components/DarkModeToggle.vue -->
<template>
  <button
    @click="toggleTheme"
    class="toggle-btn"
    :aria-label="isDarkMode ? 'Switch to light mode' : 'Switch to dark mode'"
  >
    <span class="icon" v-if="isDarkMode">🌞</span>
    <span class="icon" v-else>🌙</span>
  </button>
</template>

<script>
import { useTheme } from "../composables/useTheme";

export default {
  setup() {
    const { isDarkMode, toggleTheme } = useTheme();

    return {
      isDarkMode,
      toggleTheme,
    };
  },
};
</script>

<style scoped>
.toggle-btn {
  background: transparent;
  border: 2px solid var(--red);
  border-radius: var(--border-radius);
  height: 1.5em;
  font-size: 1.5em;
  cursor: pointer;
  transition: all var(--hover-speed) ease;
  display: flex;
  align-items: center;
  justify-content: center;
  aspect-ratio: 1;
}

.toggle-btn:hover {
  background: var(--red);
}

.icon {
  display: block;
  line-height: 1;
}
</style>
