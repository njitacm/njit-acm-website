<template>
  <main clas="Header">
    <Transition>
      <header class="header" ref="pageHeader">
        <RouterLink to="/" class="home-link" @click="toTop">
          <img src="../assets/logos/NJIT_ACM_LOGO.svg" class="logo" />
          <span class="home-link-text">Association for Computing Machinery</span>
        </RouterLink>
        <CollapsableNav @collapsableNavOpened="updateTabSelection">
          <NavButton v-for="(button, to) in navData" :key="button.id" :id="button.id" :to="to" :text="button.text"
            :selectedId="selectedId">
          </NavButton>
          <DarkModeToggle />
        </CollapsableNav>
      </header>
    </Transition>
  </main>
</template>

<script>
import CollapsableNav from "./CollapsableNav.vue";
import DarkModeToggle from "./ThemeToggle.vue";
import NavButton from "./NavButton.vue";

export default {
  name: "Header",
  components: { CollapsableNav, NavButton, DarkModeToggle },
  data() {
    return {
      selectedId: -1,
      currPath: undefined,
      navData: {
        '/sigs': { id: 0, text: 'SIGs' },
        '/events': { id: 1, text: 'Events' },
        '/tutoring': { id: 2, text: 'Tutoring' },
        '/about': { id: 3, text: 'About' }
      },
      showHeader: false,
      lastScrollTop: 0
    };
  },
  watch: {
    $route(to) {
      this.currPath = to.fullPath;
      this.updateTabSelection();
    }
  },
  methods: {
    updateDropShadow() {
      if (document.documentElement.scrollTop > 0) {
        this.$refs.pageHeader.style.boxShadow = "var(--shadow-gray) 0px 0px 25px";
      } else {
        this.$refs.pageHeader.style.boxShadow = "none";
      }
    },
    updateTabSelection() {
      if (this.currPath === undefined)
        return;

      if (this.navData[this.currPath])
        this.selectedId = this.navData[this.currPath].id
      else    // no tab e.g. "home" etc.
        this.selectedId = -1;
    },
    handleScroll() {
      if (window.innerWidth < 550) {
        this.showHeader = true;
        return;
      }
      let scrollTop = window.scrollY || document.documentElement.scrollTop;

      if (scrollTop < 2 * this.$refs.pageHeader.clientHeight) {
        this.lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        return;
      }

      if (scrollTop > this.lastScrollTop) // scrolled down
        this.showHeader = false;
      else if (scrollTop < this.lastScrollTop) // scrolled up
        this.showHeader = true;

      // For mobile or negative scrolling
      this.lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    },
    toTop() {
      window.scrollTo({ top: 0, behavior: "smooth" });
    },
  },
  created() {
    window.addEventListener("scroll", this.updateDropShadow);
  },
  unmounted() {
    window.removeEventListener("scroll", this.updateDropShadow);
  },
  toTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
  },
  created() {
    window.addEventListener("scroll", this.updateDropShadow);
  },
  unmounted() {
    window.removeEventListener("scroll", this.updateDropShadow);
  },
  mounted() {
    this.updateDropShadow();
  },
};
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
  transition: top 250ms ease-in-out;
}

.header {
  background-color: var(--bkg-color) !important;
  color: var(--text-color);
  z-index: 100;
  padding-inline: 5px;
  display: flex;
  justify-content: space-between;
  border-bottom: var(--red) var(--nav-border-width) solid;
  align-items: center;
  width: 100%;
  top: 0;
  transition: box-shadow var(--hover-speed) linear;
  box-sizing: border-box;
  height: var(--nav-height);
  position: fixed;
  overflow-y: hidden;
}

.logo {
  height: calc(var(--nav-height) * 2);
}

a {
  font-size: 1.5em;
}

.home-link {
  color: var(--text-color);
  -webkit-tap-highlight-color: transparent;
  transition: color var(--hover-speed) linear;
  display: flex;
  align-items: center;
  text-decoration: none;
  gap: 32px;
}

@media (hover: hover) and (pointer: fine) {

  .home-link:hover,
  .router-link-center:hover {
    color: var(--red);
  }
}

@media (pointer: coarse) {

  .home-link:active,
  .router-link-center:active {
    color: var(--red);
  }
}

@media (max-width: 1100px) {
  .home-link-text {
    display: none;
  }
}
</style>