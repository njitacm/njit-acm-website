<template>
  <div>
    <span @click="toggleNav" id="mmmBorger" class="material-symbols-sharp"
      >format_align_justify</span
    >
    <Transition>
      <nav class="openNav" v-if="showNav">
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
        event.target.style.transform = "rotate(-90deg)";
        this.navOpen = true;
        console.log("nav open!!");
        this.$emit('collapsableNavOpened');
      } else {
        event.target.style.transform = "";
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
  transition: all 0.2s linear;
}
#mmmBorger {
  display: none;
}
.v-enter-to {
  opacity: 1;
}
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s;
}
/* .collapsableNav {
  display: block;
} */
.v-enter-from, .v-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0;
}

@media (max-width: 550px) {
  #mmmBorger {
    font-size: 4.8rem;
    display: block;
  }
  .nav {
    display: none;
  }
  .openNav {
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
  }

  div {
    position: relative;
  }
}
</style>