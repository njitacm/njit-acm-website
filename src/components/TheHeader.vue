<template>
  <div>
    <Transition>
      <header class="fixed-header" ref="pageHeader">
        <RouterLink to="/" class="router-link-left" @click="toTop()">
          <img src="../assets/logos/NJIT_ACM_LOGO.svg" />
          <div>ACM</div>
        </RouterLink>
        <RouterLink to="/" class="router-link-center" @click="toTop()">
          Association for Computing Machinery</RouterLink>
        <CollapsableNav @collapsableNavOpened="updateTabSelection">
          <NavButton v-for="(button, to) in navData" :key="button.id" :id="button.id" :to="to" :text="button.text"
            :selectedId="selectedId">
          </NavButton>
        </CollapsableNav>
      </header>
    </Transition>
  </div>
</template>

<script>
import CollapsableNav from "./CollapsableNav.vue";
import NavButton from "./NavButton.vue";

export default {
  components: { CollapsableNav, NavButton },
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
      // fixedHeader: false,
      lastScrollTop: 0
    };
  },
  watch: {
    $route(to) {
      console.log('changed path');
      console.log(to.fullPath);
      this.currPath = to.fullPath;
      this.updateTabSelection();
    }
  },
  methods: {
    updateDropShadow() {
      if (document.documentElement.scrollTop > 0) {
        this.$refs.pageHeader.style.boxShadow = "var(--light-shadow-black) 0px 0px 25px";
      } else {
        this.$refs.pageHeader.style.boxShadow = "none";
      }
    },
    updateTabSelection() {
      console.log('update tab selection');
      if (this.currPath === undefined)
        return;

      if (this.navData[this.currPath])
        this.selectedId = this.navData[this.currPath].id
      else    // no tab e.g. "home" etc.
        this.selectedId = -1;

      // if (this.$props.to !== this.currPath) {
      //   this.isSelected = false;
      //   console.log("left " + this.currPath);
      // } else {
      //   this.isSelected = true;
      //   console.log("entered " + this.currPath);
      // }
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

      // this.fixedHeader =
      //   window.scrollY > this.$refs.pageHeader.clientHeight + 400;
      // this.showHeader =
      //   window.scrollY > this.$refs.pageHeader.clientHeight + 1000;
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
  mounted() {
    this.updateDropShadow();
  },
};
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
  transition: top 0.25s ease-in-out;
}

header {
  background: white;
  z-index: 100;
  padding-left: 5px;
  display: flex;
  justify-content: space-between;
  border-bottom: red var(--nav-border-width) solid;
  align-items: center;
  top: 0;
  width: 100%;
  transition: box-shadow var(--hover-speed) linear;
  box-sizing: border-box;
}

.fixed-header {
  height: var(--nav-height);
  position: fixed;
}

@media (hover: hover) {

  .router-link-left:hover,
  .router-link-center:hover {
    color: var(--red);
  }
}

@media (hover: none) {

  .router-link-left:active,
  .router-link-center:active {
    color: var(--red);
  }
}


.router-link-left,
.router-link-center {
  -webkit-tap-highlight-color: transparent;
  transition: color var(--hover-speed) linear;
}

.router-link-left {
  padding: 0 2px;
  font-size: 4rem;
  text-decoration: none;
  color: black;
  font-weight: 500;
  display: flex;
  /* grid-template-columns: auto 50%; */
  align-items: center;
  column-gap: 1rem;
  height: 100%;
}

.router-link-left>img {
  height: 50px;
}

.router-link-center {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  font-size: 3.2rem;
  text-decoration: none;
  color: black;
}

/* nav {
  display: flex;
  align-items: center;
  gap: 1.2rem;
  margin: 0.4rem 0.8rem;
} */

@media (max-width: 1750px) {
  .router-link-center {
    display: none;
  }
}

@media (max-width: 750px) {
  .router-link-left>div {
    display: none;
  }
}
</style>