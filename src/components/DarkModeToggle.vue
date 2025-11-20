<!-- src/components/DarkModeToggle.vue -->
<template>
  <button
    @click="toggleTheme"
    class="toggle-btn"
  >
  <span class="icon" v-if="theme === 'light'">🌕</span>
  <span class="icon" v-else-if="theme === 'dark'">🌑</span>
  <!-- auto -->
  <span class="icon" v-else>🌓</span>
  </button>
</template>

<script>
import { useTheme } from "../composables/useTheme";
const { theme, setTheme } = useTheme();

export default {
  setup() {

    return {
      theme,
      setTheme,
    };
  },
  methods: {
    toggleTheme() {
      if (theme.value === "light") {
        setTheme("dark");
      } else if (theme.value === "dark") {
        setTheme("auto");
      } else {
        setTheme("light")
      }
    }
  }
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
