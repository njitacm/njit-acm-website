import { ref } from "vue";
const THEME_OPTIONS = ["auto", "light", "dark"];

export function useTheme() {
  const mq = window.matchMedia('(prefers-color-scheme: dark)');
  const theme = ref("auto");

  const onThemeUpdate = (e) => {
    if (e.matches) {
      // dark
      document.documentElement.setAttribute("data-theme", "dark");
    } else {
      // light
      document.documentElement.setAttribute("data-theme", "light");
    }
  }

  const applyTheme = (newTheme) => {
    localStorage.setItem("theme", newTheme);

    // TOOD
    if (newTheme === "auto") {
      onThemeUpdate({ matches: mq.matches });
      mq.addEventListener("change", onThemeUpdate);
    } else {
      mq.removeEventListener("change", onThemeUpdate);
      document.documentElement.setAttribute("data-theme", newTheme);
    }
  };

  // Check for saved theme preference or default to system preference
  const savedTheme = localStorage.getItem("theme");

  console.log("saved theme:", savedTheme);

  if (savedTheme) {
    theme.value = savedTheme;
    applyTheme(savedTheme);
  }

  const setTheme = (newTheme) => {
    theme.value = newTheme;
    applyTheme(theme.value);
  };

  return {
    theme,
    setTheme,
    THEME_OPTIONS,
  };
}
