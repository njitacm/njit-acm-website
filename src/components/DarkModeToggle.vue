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
  padding: 8px 12px;
  border-radius: var(--border-radius);
  cursor: pointer;
  transition: all var(--hover-speed) ease;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 10px;
}

.toggle-btn:hover {
  background: var(--red);
  transform: scale(1.05);
}

.icon {
  font-size: 1.8rem;
  display: block;
  line-height: 1;
}

@media (max-width: 750px) {
  .toggle-btn {
    padding: 6px 10px;
    margin-right: 5px;
  }

  .icon {
    font-size: 1.6rem;
  }
}
</style>
