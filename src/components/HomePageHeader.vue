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
  border-bottom: 4px solid red;
  z-index: 10;
}
header > img {
  position: absolute;
  border: gray 4px solid;
  border-radius: 8px;
  width: 50%;
  z-index: -5;
}
h2 {
  font-size: 9.8rem;
}
#header-centerpiece {
  width: 80%;
  margin: 0 auto;
  margin-top: 0.8rem;
  text-align: center;
  z-index: 50;
}

#header-centerpiece > h2 {
  text-shadow: 0px 0px 20px white;
  text-align: center;
}
#main-logo {
  width: 81.25%;
  opacity: 0.8;
  min-width: 50rem;
  max-width: 62.4rem;
}

#img1 {
  top: 1rem;
  left: 1.5rem;
  width: 24.58vw;
  height: 25%;
  object-fit: fill;
}
#img2 {
  bottom: 6.5rem;
  left: 3.5rem;
  width: 45.8rem;
}
#img3 {
  top: 1rem;
  right: 1.5rem;
  width: 45.8rem;
  object-fit: cover;
  object-position: 10% 100%;
  z-index: -1;
  height: 25%;
}
#img4 {
  bottom: 7.5rem;
  right: 1.5rem;
  width: 45.8rem;
}
#img5 {
  top: 1rem;
  left: 56rem;
  width: 27.16rem;
}
#img6 {
  top: 17.5rem;
  right: 35rem;
  width: 17.2rem;
  z-index: -1;
  object-fit: cover;
  height: 10rem;
}
#img7 {
  top: 26.5rem;
  right: 65rem;
  width: 41.2rem;
}
#img8 {
  top: 19rem;
  left: 38rem;
  width: 27.16rem;
  z-index: -4;
}
#img9 {
  top: 13rem;
  left: 5.5rem;
  width: 30.2rem;
}
#img10 {
  top: 0.5rem;
  left: 108rem;
  width: 37.2rem;
  object-fit: cover;
  object-position: 50% 95%;
  height: 23rem;
  z-index: -5;
}
#img11 {
  bottom: 46.5rem;
  left: 33rem;
  width: 29.2rem;
  z-index: -3;
}
#img12 {
  bottom: 10.5rem;
  left: 49rem;
  width: 37.2rem;
  object-fit: cover;
  height: 22rem;
  object-position: 0 100%;
}
#img13 {
  top: 3rem;
  left: 83rem;
  width: 29.2rem;
  z-index: -6;
  transform: scaleX(-1);
}
#img14 {
  bottom: 9.5rem;
  right: 47.45rem;
  width: 17.5rem;
}
#img15 {
  top: 14.5rem;
  right: 48rem;
  width: 27.16rem;
}
#img16 {
  top: 17.5rem;
  right: 7rem;
  width: 30rem;
}

/* 1400px SCREEN WIDTH */
@media (max-width: 1400px) {
  #header-centerpiece {
    width: 80%;
  }
  #img8 {
    top: 19rem;
    left: 35rem;
    width: 27.16rem;
    z-index: -5;
  }
  #img10 {
    right: 1.3rem;
    z-index: 11;
    left: unset;
  }
  #img11 {
    top: 0.5rem;
    left: 25%;
  }
  #img13 {
    transform: scaleX(1);
    left: 76rem;
  }
}

/* 1200px SCREEN WIDTH */
@media (max-width: 1200px) {
  #header-centerpiece {
    width: 80%;
  }
  #img2 {
    bottom: 9.5rem;
    left: 3.5rem;
    width: 39.8rem;
  }
  #img4 {
    bottom: 9.5rem;
    right: 1.5rem;
    width: 32.8rem;
    z-index: -1;
  }
  #img7 {
    bottom: 14rem;
    right: 65rem;
    width: 22.2rem;
  }
  #img8 {
    top: 19rem;
    left: 35rem;
    width: 27.16rem;
    z-index: -5;
  }
  #img9 {
    top: 13rem;
    left: 5.5rem;
    width: 30.2rem;
    z-index: -11;
  }
  #img10 {
    right: 1.3rem;
    z-index: -1;
    left: unset;
  }
  #img11 {
    top: 0.5rem;
    left: 25%;
  }
  #img13 {
    transform: scaleX(1);
    left: unset;
    right: 28rem;
    top: 24rem;
    z-index: -1;
    width: 18rem;
  }
  #img14 {
    bottom: 9.5rem;
    right: unset;
    width: 17.5rem;
    left: 35rem;
  }
  #img16 {
    top: 23.5rem;
    right: 1rem;
    width: 34rem;
  }
}

@media (max-width: 940px) {
  h2 {
    font-size: 8em;
  }
  #img4 {
    bottom: 9.5rem;
    right: 9%;
    width: 32.8rem;
    z-index: -1;
  }
  #img5 {
    top: 1rem;
    left: 12.5%;
    width: 10.2rem;
  }
  #img7 {
    bottom: 14rem;
    right: 65rem;
    width: 22.2rem;
    right: unset;
    left: 3%;
  }
  #img12 {
    bottom: 7.5rem;
    left: unset;
    width: 27.2rem;
    object-fit: cover;
    height: 22rem;
    object-position: 0 100%;
    right: 1rem;
    z-index: -1;
    object-position: 5% 75%;
    height: 14rem;
  }
  #img16 {
    top: 23.5rem;
    right: 1rem;
    width: 39rem;
  }
}

@media (max-width: 775px) {
  h2 {
    font-size: 7.4rem;
  }
  #img15 {
    top: 14.5rem;
    right: unset;
    width: 25.2rem;
    left: 1%;
  }
}

@media (max-width: 700px) {
  h2 {
    font-size: 6.2rem;
  }
  #img8 {
    top: 19rem;
    left: unset;
    width: 27.16rem;
    z-index: -5;
    right: 1rem;
  }
}

@media (max-width: 600px) {
  h2 {
    font-size: 5.2rem;
  }
  #main-logo {
    min-width: 100%;
  }
  #img6 {
    left: 1%;
    right: unset;
  }
  #img7 {
    bottom: 6rem;
    top: unset;
  }
  #img12 {
    bottom: 4.5rem;
  }
  #img14 {
    bottom: 4.5rem;
    width: 6.5rem;
    left: 1%;
  }
  #img16 {
    top: unset;
    right: 24rem;
    width: 20rem;
    bottom: 10%;
    z-index: -1;
  }
}

@media (max-width: 500px) {
  #header-centerpiece {
    width: 80%;
  }
  h2 {
    font-size: 4.4rem;
  }
  #header-centerpiece > img {
    opacity: 0.8;
    min-width: 0;
    max-width: none;
    width: 100%;
  }
  img {
    object-fit: contain;
  }
  #img1 {
    object-fit: contain;
    height: unset;
    width: 48%;
  }
  #img2 {
    object-fit: contain;
    height: unset;
    width: 43%;
    bottom: 6.5rem;
    left: 0.25rem;
  }
  #img3 {
    object-fit: contain;
    height: unset;
    width: 46%;
    z-index: -1;
    bottom: unset;
    left: unset;
    right: 1rem;
    top: 1rem;
    transform: scaleX(-1);
  }
  #img4 {
    width: 33%;
    bottom: 17rem;
    right: unset;
    left: 1rem;
  }
  #img5 {
    top: unset;
    bottom: 5rem;
    right: 0.75rem;
    width: 45%;
    left: unset;
    z-index: -6;
  }
  #img6 {
    width: 19%;
  }
  #img7 {
    width: 15%;
  }
  #img8 {
    width: 30%;
    top: 13rem;
    left: unset;
    right: 0.5rem;
  }
  #img9 {
    width: 40%;
  }
  #img10 {
    object-fit: contain;
    height: unset;
    width: 35%;
    z-index: -1;
    left: 15rem;
    bottom: 18rem;
    top: unset;
  }
  #img11 {
    width: 38%;
    top: -0.5rem;
    left: unset;
    bottom: unset;
    right: 13rem;
    z-index: -1;
  }
  #img12 {
    object-fit: contain;
    height: unset;
    width: 32%;
    z-index: -1;
    left: 19rem;
    bottom: 6rem;
  }
  #img13 {
    width: 15%;
  }
  #img14 {
    width: 15%;
  }
  #img15 {
    width: 15%;
  }
  #img16 {
    width: 41%;
    z-index: -6;
  }
  #header-centerpiece > h2 {
    width: fit-content;
  }
}
</style>