<template>
  <button @click="toggleTheme" class="ThemeToggle" :title="themeTitle">
    {{ themeIcon }}
  </button>
</template>

<script>
import { useTheme } from "../composables/useTheme";
const { theme, setTheme, THEME_OPTIONS } = useTheme();
const THEME_ICONS = {
  auto: '🌓',
  light: '🌕',
  dark: '🌑'
};
const THEME_TITLES = {
  auto: "System default",
  light: "Light",
  dark: "Dark"
};

export default {
  name: "ThemeToggle",
  data() {
    return {
      themeIndex: 0,
    }
  },
  computed: {
    themeTitle() {
      return THEME_TITLES[theme.value];
    },
    themeIcon() {
      return THEME_ICONS[theme.value];
    }
  },
  methods: {
    toggleTheme() {
      this.themeIndex = (this.themeIndex + 1) % THEME_OPTIONS.length;
      setTheme(THEME_OPTIONS[this.themeIndex]);
    }
  }
};
</script>

<style scoped>
.ThemeToggle {
  aspect-ratio: 1;
  background: transparent;
  border: none;
  border-radius: var(--border-radius);
  height: 1.5em;
  font-size: 1.5em;
  line-height: 1em;
  cursor: pointer;
}

@media(hover: hover) and (pointer: fine) {
  .ThemeToggle {
    transition: background-color var(--hover-speed) var(--hover-func);
  }

  .ThemeToggle:hover {
    background-color: var(--light-red);
  }
}

@media(pointer: coarse) {
  .ThemeToggle:active {
    background: var(--light-red);
  }
}
</style>
