<template>
  <div>
    <Transition>
      <header class="fixed-header" ref="pageHeader">
        <RouterLink to="/" class="router-link-left" @click="toTop()">ACM</RouterLink>
        <RouterLink
          to="/"
          class="router-link-center meme-title"
          @click="toTop()"
        >
          Association for Computing Machinery</RouterLink
        >
        <CollapsableNav>
          <RouterLink to="/sigs" class="router-link">SIGs</RouterLink>
          <RouterLink to="/events" class="router-link">Events</RouterLink>
          <RouterLink to="/tutoring" class="router-link">Tutoring</RouterLink>
          <RouterLink to="/about" class="router-link">About</RouterLink>
        </CollapsableNav>
      </header>
    </Transition>
    <!-- <header>
      <RouterLink to="/" class="router-link-left" @click="toTop()">ACM</RouterLink>
      <RouterLink to="/" class="router-link-center meme-title" @click="toTop()">
        Association for Computing Machinery</RouterLink
      >
      <CollapsableNav>
        <RouterLink to="/sigs" class="router-link">SIGs</RouterLink>
        <RouterLink to="/events" class="router-link">Events</RouterLink>
        <RouterLink to="/tutoring" class="router-link">Tutoring</RouterLink>
        <RouterLink to="/about" class="router-link">About</RouterLink>
      </CollapsableNav>
    </header> -->
  </div>
</template>

<script>
import CollapsableNav from "./CollapsableNav.vue";
export default {
  components: { CollapsableNav },
  data() {
    return {
      showHeader: false,
      // fixedHeader: false,
      lastScrollTop: 0
    };
  },
  methods: {
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
    // window.addEventListener("scroll", this.handleScroll);
  },
  unmounted() {
    // window.removeEventListener("scroll", this.handleScroll);
  },
  mounted() {
    // this.handleScroll();
  },
};
</script>

<style scoped>
/* * {
  transition: all linear 0.25s;
} */

.v-enter-active,
.v-leave-active {
  /* top: -15px; */
  /* opacity: 0; */
  transition: top 0.25s ease-in-out;
}
.v-enter-from,
.v-leave-to {
  /* opacity: 0; */
  /* top: -60px; */
}
header {
  background: white;
  z-index: 100;
  padding: 0px 15px;
  display: flex;
  justify-content: space-between;
  border-bottom: red 4px solid;
  align-items: center;
  top: 0;
  width: 100%;
}

.fixed-header {
  height: 60px;
  position: fixed;
}

.router-link-left {
  padding: 0 2px;
  font-size: 4.8rem;
  text-decoration: none;
  color: black;
  font-weight: 500;
}
.router-link-center {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  font-size: 3.6rem;
  text-decoration: none;
  color: black;
}
/* nav {
  display: flex;
  align-items: center;
  gap: 1.2rem;
  margin: 0.4rem 0.8rem;
} */
.router-link {
  text-decoration: none;
  color: black;
  text-decoration: none;
  font-size: 2.4rem;
  flex: 1 1 0px;
  padding: 0.8rem;
  border: none;
  background-color: inherit;
  cursor: pointer;
}

@media (max-width: 1300px) {
  .meme-title {
    display: none;
  }
}
</style>