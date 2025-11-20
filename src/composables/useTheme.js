import { ref, onMounted } from "vue";

export function useTheme() {
  const mq = window.matchMedia('(prefers-color-scheme: dark)');
  const theme = ref("auto");

  const onThemeUpdate = (e) => {
    if (e.matches) {
      // dark
      console.log("match");
      document.documentElement.setAttribute("data-theme", "dark");
    } else {
      // light
      console.log("not match");
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
    console.log(newTheme);
    applyTheme(theme.value);
  };

  return {
    theme,
    setTheme,
  };
}
