<template>
  <div>
    <button @click="toggleNav" id="mmmBorger" :class="{'nav-open': navOpen}">
      <span class="menu-text">Menu</span>
      <span class="material-symbols-sharp menu-icon" ref="menuIcon">format_align_justify</span>
    </button>
    <Transition>
      <nav class="open-nav" v-show="showNav" ref="nav">
        <slot></slot>
      </nav>
    </Transition>
  </div>
</template>

<script>
export default {
  emits: [ 'collapsableNavOpened' ],
  data() {
    return {
      navOpen: false,
      windowWidth: window.innerWidth,
    };
  },
  methods: {
    toggleNav(event) {
      if (!this.navOpen) {
        this.$refs.menuIcon.style.transform = "rotate(-90deg)";
        // this.$refs.nav.style.transform = "translateY(10px)";
        event.currentTarget.style.backgroundColor = "var(--red)";
        event.currentTarget.style.color = "white";
        this.navOpen = true;
        this.$emit('collapsableNavOpened');
      } else {
        this.$refs.menuIcon.style.transform = "";
        // this.$refs.nav.style.transform = "translateY(-10px)";
        event.currentTarget.style.backgroundColor = "white";
        event.currentTarget.style.color = "var(--red)";
        this.navOpen = false;
      }
    },
    onResize() {
      this.windowWidth = window.innerWidth;
    },
  },
  computed: {
    showNav() {
      return this.navOpen || this.windowWidth > 550;
    },
  },
  mounted() {
    this.$nextTick(() => {
      window.addEventListener("resize", this.onResize);
    });
  },

  beforeUnmount() {
    window.removeEventListener("resize", this.onResize);
  },
};
</script>

<style scoped>
* {
  transition: transform var(--hover-speed) linear,
  background-color var(--hover-speed) linear,
}

#mmmBorger {
  display: none;
  box-sizing: margin-box;
  background-color: white;
  border: none;
  border-left: var(--red) 2px solid;
  /* border-radius: var(--border-radius); */
  color: var(--red);
  height: calc(var(--nav-height) - var(--nav-border-width));
  width: auto;
  right: 0;
  /* font-size: 4rem   */
}

#mmmBorger .menu-icon {
  font-size: 4rem;
  padding: 10px;
}

#mmmBorger .menu-text {
  display: block;
  height: inherit;
  font-size: 3rem;
  padding: 0px 0px 0px 10px;
  line-height: var(--nav-height);
}

@media (hover: hover) {
  #mmmBorger:hover:not(.nav-open) {
    /* mark as important bc JavaScript overriding it disables hover */
    background-color: var(--light-red) !important;
  }
}

@media (hover: none) {
  #mmmBorger:active:not(.nav-open) {
    /* mark as important bc JavaScript overriding it disables hover */
    background-color: var(--light-red) !important;
  }
}

.v-enter-to {
  opacity: 1;
}
.v-enter-active {
  transition: transform var(--hover-speed) linear;
}
.v-leave-active {
  transition: all var(--hover-speed) linear;
}

.v-enter-from, .v-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0;
  transform: translateY(-10px);
}

/* Desktop styles for nav */
@media (min-width: 551px) {
  .open-nav {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 0.75rem;
    margin-right: 1rem;
  }
}

@media (max-width: 550px) {
  #mmmBorger {
    display: flex;
  }
  .open-nav {
    position: absolute;
    right: 0px;
    display: flex;
    flex-direction: column;
    top: 61px;
    background-color: white;
    border-radius: 12px;
    padding: 5px;
    border: 2px red solid;
    margin-top: 0.8rem;
    z-index: 100;
    box-shadow: var(--medium-shadow-black) 0px 0px 25px;
  }

  div {
    position: relative;
  }
}
</style>