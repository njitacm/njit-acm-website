<template>
  <header>
    <div id="header-centerpiece">
      <img
        src="../assets/logos/NJIT_ACM_LOGO.svg"
        alt="NJIT ACM Logo"
        id="main-logo"
      />
    </div>
    <div class="background-container">
      <div ref="bg1" class="bg1"></div>
    </div>
  </header>
</template>

<script>
export default {};
</script>

<style scoped>
/* 1920px SCREEN WIDTH; NORMAL RULES */
header {
  position: relative;
  width: 100vw;
  margin-bottom: 1rem;
  border-bottom: 4px solid red;
  z-index: 10;
  overflow: hidden;
}
header > img {
  position: absolute;
  z-index: -5;
}
h2 {
  font-size: 9.8rem;
}
#header-centerpiece {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 80%;
  margin: 0 auto;
  margin-top: 0.8rem;
  text-align: center;
  z-index: 50;
}
/* text-shadow: 1px 1px 0 #000,
    -1px 1px 0 #000,
    1px -1px 0 #000,
    -1px -1px 0 #000,
    0px 1px 0 #000,
    0px -1px 0 #000,
    -1px 0px 0 #000,
    1px 0px 0 #000,
    2px 2px 0 #000,
    -2px 2px 0 #000,
    2px -2px 0 #000,
    -2px -2px 0 #000,
    0px 2px 0 #000,
    0px -2px 0 #000,
    -2px 0px 0 #000,
    2px 0px 0 #000,
    1px 2px 0 #000,
    -1px 2px 0 #000,
    1px -2px 0 #000,
    -1px -2px 0 #000,
    2px 1px 0 #000,
    -2px 1px 0 #000,
    2px -1px 0 #000,
    -2px -1px 0 #000; */
#header-centerpiece > h2 {
  text-shadow: 0px 0px 20px black;
  text-align: center;
  color: white;
}
#main-logo {
  width: 81.25%;
  opacity: 0.8;
  max-width: 62.4rem;
}
.background-container {
  display: flex;
  flex-wrap: nowrap;
  width: 200vw;
  height: 56.25vw;
  overflow: hidden;
}
.bg1 {
  background-image: url("../assets/HomePage/photo-collage.png");
  position: relative;

  width: 100vw;
  height: 56.25vw;
  background-size: 100%;

  object-fit: fill;
  animation: scroll-left 20s linear infinite;
}

@keyframes scroll-left {
  to {
    background-position: -100vw 0;
  }
}
@media (max-width: 1550px) {
  .background-container {
  }
  .bg1 {
  }
}
@media (max-width: 1100px) {
  #main-logo {
    width: 71.25%;
  }
}
@media (max-width: 850px) {
  #main-logo {
    width: 60.25%;
  }
}
</style>