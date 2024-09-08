<template>
  <header>
    <div id="header-centerpiece">
      <img
        src="../assets/logos/NJIT_ACM_LOGO.svg"
        alt="NJIT ACM Logo"
        id="main-logo"
      />
      <h2>Welcome to ACM</h2>
    </div>
    <div class="background-container">
      <div ref="bg1" class="bg1"></div>
      <div ref="bg2" class="bg2"></div>
    </div>
    <!-- <div>
      <img src="../assets/HomePage/HomePageCenterpiece/IMG1.jpg" id="img1" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG2.jpg" id="img2" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG3.jpg" id="img3" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG4.jpg" id="img4" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG5.jpg" id="img5" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG6.jpg" id="img6" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG7.jpg" id="img7" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG8.jpg" id="img8" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG9.jpg" id="img9" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG10.jpg" id="img10" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG11.jpg" id="img11" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG12.jpg" id="img12" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG13.jpg" id="img13" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG14.jpg" id="img14" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG15.jpg" id="img15" />
      <img src="../assets/HomePage/HomePageCenterpiece/IMG16.jpg" id="img16" />
    </div> -->
  </header>
</template>

<script>
export default {
  data() {
    return {
      interval: null,
    };
  },
  methods: {
    moveBackground() {
      this.moveBG(true);
      this.moveBG(false);
    },
    moveBG1() {
      var bg = this.$refs["bg1"];
      var bgL = bg.style.left;
      if (bgL == "") {
        bgL = 0;
      } else {
        bgL.replace("vw", "");
      }
      bgL = parseFloat(bgL) - 10;
      if (bgL < -100) {
        bgL = 100;
      }
      bg.style.left = bgL + "vw";
      console.log(bg.style.left);
    },
    moveBG(firstBG) {
      var refName;
      if (firstBG) {
        refName = "bg1";
      } else {
        refName = "bg2";
      }
      var bg = this.$refs[refName];
      var bgL = bg.style.left;
      if (bgL == "") {
        bgL = 0;
      } else {
        bgL.replace("vw", "");
      }
      bgL = parseFloat(bgL) - 0.01;
      if (firstBG && bgL < -100) {
        bgL = 100;
      } else if (!firstBG && bgL < -200) {
        bgL = 0;
      }
      bg.style.left = bgL + "vw";
      console.log(bg.style.left);
    },
  },
  mounted() {
    this.interval = setInterval(this.moveBackground, 1);
  },
  unmounted() {
    clearInterval(this.interval);
  },
};
</script>

<style scoped>
/* 1920px SCREEN WIDTH; NORMAL RULES */
header {
  position: relative;
  width: 100vw;
  margin-bottom: 1rem;
  border-bottom: 4px solid red;
  z-index: 10;
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
  top: 40%;
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
  min-width: 50rem;
  max-width: 62.4rem;
}
.background-container {
  display: flex;
  flex-wrap: nowrap;
  width: 200vw;
  height: 56.25vw;
}
.bg1 {
  background-image: url("../assets/HomePage/photo-collage.png");
  position: relative;
  left: -2vw;
  width: 100vw;
  height: 56.25vw;
  object-fit: fill;
}
.bg2 {
  background-image: url("../assets/HomePage/photo-collage.png");
  position: relative;
  left: -2vw;
  width: 100vw;
  height: 56.25vw;
  object-fit: fill;
}

/* 1400px SCREEN WIDTH */
@media (max-width: 1400px) {
  #header-centerpiece {
    width: 80%;
  }
}

/* 1200px SCREEN WIDTH */
@media (max-width: 1200px) {
  #header-centerpiece {
    width: 80%;
  }
}

@media (max-width: 500px) {
  #header-centerpiece {
    width: 80%;
  }
  #header-centerpiece > img {
    opacity: 0.8;
    min-width: 0;
    max-width: none;
    width: 100%;
  }
  #header-centerpiece > h2 {
    width: fit-content;
  }
}
</style>