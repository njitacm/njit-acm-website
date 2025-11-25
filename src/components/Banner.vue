<template>
  <main class="Banner">
    <img src="../assets/logos/NJIT_ACM_LOGO.svg" alt="NJIT ACM Logo" class="logo" />
    <div class="bkg-container">
      <div class="bg"></div>
    </div>
  </main>
</template>

<script>
export default {
  name: "Banner"
};
</script>

<style scoped>
.Banner {
  width: 100vw;
  max-height: calc(100vh - var(--nav-height));
  position: relative;
  margin-bottom: 64px;
  border-bottom: var(--red) 5px solid;
  z-index: 10;
  overflow: hidden;
}

.logo {
  position: absolute;
  z-index: 50;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  max-width: 500px;
  height: calc(100% - 64px);
  opacity: 1;
}

.bkg-container {
  display: flex;
  flex-wrap: nowrap;
  width: 100vw;
  height: 56.25vw;
  overflow: hidden;
}

.bg {
  background-image: url("../assets/HomePage/photo-collage.png");
  position: relative;
  width: 100vw;
  height: 56.25vw;
  background-size: 100%;
  object-fit: fill;
}

@media(prefers-reduced-motion: no-preference) {
  .bg {
    animation: scroll-left 45s linear infinite, zoom 45s ease-in-out infinite alternate;
  }

  .logo {
    animation: throb 2s ease-in-out infinite alternate;
  }
}

@keyframes throb {
  from {
    opacity: 1;
  }

  to {
    opacity: 0.75;
  }
}

@keyframes zoom {
  from {
    transform: scale(125%);
  }

  to {
    transform: scale(100%);
  }
}

@keyframes scroll-left {
  to {
    background-position: -100vw -56.25vw;
  }
}
</style>