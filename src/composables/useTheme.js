import { ref, readonly } from "vue";
const THEME_OPTIONS = ["auto", "light", "dark"];

export function useTheme() {
  const mq = window.matchMedia('(prefers-color-scheme: dark)');
  const theme = ref("auto");
  const readonlyTheme = readonly(theme);

  // sync to system
  const onThemeUpdate = (e) => {
    if (e.matches) {
      // dark
      document.documentElement.setAttribute("data-theme", "dark");
    } else {
      // light
      document.documentElement.setAttribute("data-theme", "light");
    }
  }

  // manually apply theme and update local storage
  const applyTheme = (newTheme) => {
    localStorage.setItem("theme", newTheme);

    if (newTheme === "auto") {
      onThemeUpdate({ matches: mq.matches });
      mq.addEventListener("change", onThemeUpdate);
    } else {
      mq.removeEventListener("change", onThemeUpdate);
      document.documentElement.setAttribute("data-theme", newTheme);
    }
  };

  // Retrieve saved theme
  const savedTheme = localStorage.getItem("theme");

  const setTheme = (newTheme) => {
    theme.value = newTheme;
    applyTheme(theme.value);
  };

  if (savedTheme) {
    setTheme(savedTheme);
  } else {
    setTheme("auto");
  }

  return {
    theme: readonlyTheme,
    setTheme,
    THEME_OPTIONS,
  };
}
