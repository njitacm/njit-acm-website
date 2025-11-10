<template>
  <OnClickOutside @trigger="setNavOpen(false)">
    <div>
      <button @click="toggleNav" ref="menuButton" id="mmmBorger" :class="{ 'nav-open': navOpen }">
        <span class="menu-text">Menu</span>
        <span class="material-symbols-sharp menu-icon" ref="menuIcon">format_align_justify</span>
      </button>
      <Transition>
        <nav class="open-nav" v-show="showNav" ref="nav">
          <slot></slot>
        </nav>
      </Transition>
    </div>
  </OnClickOutside>
</template>

<script>
import { OnClickOutside } from "@vueuse/components";

export default {
  emits: ['collapsableNavOpened'],
  components: { OnClickOutside },
  data() {
    return {
      navOpen: false,
      windowWidth: window.innerWidth,
    };
  },
  watch: {
    $route() {
      this.setNavOpen(false);
    }
  },
  methods: {
    toggleNav() {
      if (!this.navOpen) {
        this.setNavOpen(true);
      } else {
        this.setNavOpen(false);
      }
    },
    setNavOpen(open) {
      if (open) {
        this.$refs.menuIcon.style.transform = "rotate(-90deg)";
        this.$refs.menuButton.style.backgroundColor = "var(--red)";
        this.$refs.menuButton.style.color = "var(--bkg-color)";
        this.navOpen = true;
        this.$emit('collapsableNavOpened');
      } else {
        this.$refs.menuIcon.style.transform = "rotate(0deg)";
        this.$refs.menuButton.style.backgroundColor = "var(--bkg-color)";
        this.$refs.menuButton.style.color = "var(--red)";
        this.navOpen = false;
      }
    },
    onResize() {
      this.windowWidth = window.innerWidth;
    },
  },
  computed: {
    showNav() {
      return this.navOpen || this.windowWidth > 625;
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
#mmmBorger {
  display: none;
  box-sizing: margin-box;
  background-color: var(--bkg-color);
  border: none;
  border-left: var(--red) 2px solid;
  color: var(--red);
  height: calc(var(--nav-height) - var(--nav-border-width));
  width: auto;
  right: 0;
}

#mmmBorger .menu-icon {
  padding: 10px;
  transition: transform var(--hover-speed) ease;
}

#mmmBorger .menu-text {
  font-size: 2em;
  display: block;
  height: inherit;
  padding: 0px 0px 0px 10px;
  line-height: var(--nav-height);
}

@media (hover: hover) and (pointer: fine) {
  #mmmBorger:hover:not(.nav-open) {
    /* mark as important bc JavaScript overriding it disables hover */
    background-color: var(--light-red) !important;
  }
}

@media (pointer: coarse) {
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

.v-enter-from,
.v-leave-to

/* .fade-leave-active in <2.1.8 */
  {
  opacity: 0;
  transform: translateY(-10px);
}

/* Desktop styles for nav */
.open-nav {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 0.5em;
  margin-right: 1rem;
}

@media (max-width: 625px) {
  #mmmBorger {
    display: flex;
    align-items: center;
  }

  .open-nav {
    position: absolute;
    display: flex;
    gap: 0.5rem;
    top: calc(var(--nav-height) + 5px);
    flex-direction: column;
    align-items: stretch;
    background-color: var(--bkg-color);
    border-radius: 12px;
    padding: 5px;
    border: 2px red solid;
    z-index: 100;
    box-shadow: var(--medium-shadow-black) 0px 0px 25px;
  }

  div {
    position: relative;
  }
}
</style>