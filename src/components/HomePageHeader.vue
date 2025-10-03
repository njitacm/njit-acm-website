<template>
  <header @mousedown="pause" @mouseup="play" @mouseleave="play">
    <div class="background-container">
      <div ref="bg1" class="bg1" :style="styles"></div>
      <div class="content">
        <img src="../assets/logos/NJIT_ACM_LOGO.svg" alt="NJIT ACM Logo" id="main-logo" />
        <GitHubEventForm id="GitHubEventForm" />
      </div>
    </div>
  </header>
</template>

<script>
import GitHubEventForm from "./GitHubEventForm.vue";
export default {
  components: { GitHubEventForm },
  data() {
    return {
      styles: { animationPlayState: 'running' }
    };
  },
  methods: {
    pause() {
      this.styles.animationPlayState = 'paused';
    },
    play() {
      this.styles.animationPlayState = 'running';
    }
  }
};
</script>

<style scoped>
/* 1920px SCREEN WIDTH; NORMAL RULES */
header {
  width: 100vw;
  height: calc(100vh - var(--nav-height));
  /* max-height: calc(100vh - var(--nav-height)); */
  position: relative;
  margin-bottom: 1rem;
  border-bottom: var(--hor-sec-img-border-width) solid red;
  z-index: 10;
  overflow: hidden;
}

#GitHubEventForm {
  /* position: absolute; */
  z-index: 10;
}

#main-logo {
  width: 35vw;
  opacity: 0.8;
}

.background-container {
  display: flex;
  flex-wrap: nowrap;
  /* width: 100vw; */
  height: 100%;
  overflow: hidden;
}

.content {
  position: absolute;
  /* transform-origin: 50% 50%; */
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 75vw;
  height: 75vh;
}

.bg1 {
  background-image: url("../assets/HomePage/photo-collage.png");
  position: relative;
  width: 100vw;
  height: 100%;
  background-size: 100%;
  object-fit: fill;
}

@media(max-width: 1000px) {
  .content {
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
  }
}

@media(max-width: 900px) {
  #main-logo {
    width: 50vw;
  }
}

@media(max-width: 500px) {
  #main-logo {
    width: 75vw;
  }
}

@media(prefers-reduced-motion: no-preference) {
  .bg1 {
    animation: scroll-left 30s linear infinite, zoom 30s ease-in-out infinite;
  }
}

@keyframes throb {
  0% {
    opacity: 0.75;
  }

  50% {
    opacity: 1;
  }

  100% {
    opacity: 0.75;
  }
}

@keyframes zoom {
  0% {
    transform: scale(100%);
  }

  50% {
    transform: scale(125%);
  }

  100% {
    transform: scale(100%);
  }
}

@keyframes scroll-left {
  to {
    background-position: -100vw -56.25vw;
  }
}

</style>