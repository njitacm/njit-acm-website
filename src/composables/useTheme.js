import { ref, onMounted } from "vue";

export function useTheme() {
  const isDarkMode = ref(false);

  const applyTheme = (theme) => {
    document.documentElement.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
  };

  onMounted(() => {
    // Check for saved theme preference or default to system preference
    const savedTheme = localStorage.getItem("theme");

    if (savedTheme) {
      isDarkMode.value = savedTheme === "dark";
      applyTheme(savedTheme);
    } else {
      const prefersDark = window.matchMedia(
        "(prefers-color-scheme: dark)"
      ).matches;
      isDarkMode.value = prefersDark;
      applyTheme(prefersDark ? "dark" : "light");
    }
  });

  const toggleTheme = () => {
    isDarkMode.value = !isDarkMode.value;
    applyTheme(isDarkMode.value ? "dark" : "light");
  };

  return {
    isDarkMode,
    toggleTheme,
  };
}
