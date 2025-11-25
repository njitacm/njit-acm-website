<template>
  <main class="CollapsableNav">
    <OnClickOutside @trigger="setNavOpen(false)">
      <button @click="toggleNav" ref="menuButton" id="mmmBorger" :class="{ 'selected': navOpen }">
        <span class="material-symbols-sharp menu-icon" ref="menuIcon">
          format_align_justify
        </span>
      </button>
      <Transition>
        <nav class="open-nav" v-show="showNav" ref="nav">
          <slot></slot>
        </nav>
      </Transition>
    </OnClickOutside>
  </main>
</template>

<script>
import { OnClickOutside } from "@vueuse/components";

export default {
  name: "CollapsableNav",
  components: { OnClickOutside },
  data() {
    return {
      navOpen: false,
      windowWidth: window.innerWidth,
    };
  },
  watch: {
    $route() {
      // after switching pages, close the collapsable nav
      this.setNavOpen(false);
    }
  },
  methods: {
    toggleNav() {
      this.setNavOpen(!this.navOpen);
    },
    setNavOpen(open) {
      this.navOpen = open;
      this.$refs.menuIcon.style.transform = open ? "rotate(-90deg)" : "rotate(0deg)";
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
    window.addEventListener("resize", this.onResize);
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
  color: var(--red);
  height: calc(var(--nav-height) - var(--nav-border-width));
  width: auto;
  right: 0;
}

#mmmBorger .menu-icon {
  aspect-ratio: 1;
  border-radius: var(--border-radius);
  height: calc(var(--nav-height) - 16px);
  font-size: 1.5em;
  transition: transform var(--hover-speed) ease;
  display: grid;
  align-items: center;
}

#mmmBorger.selected .menu-icon {
  background-color: var(--red);
  color: var(--bkg-color);
}

#mmmBorger .menu-text {
  font-size: 2em;
  display: block;
  height: inherit;
  padding: 0px 0px 0px 10px;
  line-height: var(--nav-height);
}

@media (hover: hover) and (pointer: fine) {
  #mmmBorger:hover:not(.selected) .menu-icon {
    /* mark as important bc JavaScript overriding it disables hover */
    background-color: var(--light-red) !important;
  }
}

@media (pointer: coarse) {
  #mmmBorger:active:not(.selected) .menu-icon {
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
  gap: 8px;
}

/* make sure this number matches the one in in the <script> section! */
@media (max-width: 625px) {
  #mmmBorger {
    display: unset;
  }

  .open-nav {
    position: absolute;
    display: flex;
    top: calc(var(--nav-height) + 5px);
    right: 5px;
    flex-direction: column;
    align-items: stretch;
    background-color: var(--bkg-color);
    border-radius: 12px;
    padding: 5px;
    border: 2px var(--red) solid;
    z-index: 100;
    filter: drop-shadow(0px var(--shadow-offset-y) var(--shadow-blur) var(--shadow-gray));
  }
}
</style>