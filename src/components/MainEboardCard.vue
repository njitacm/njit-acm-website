<template>
  <main>
    <div class="container">
      <div
        class="front"
        :class="{ frontFlipped: id == store.currEboardFlipped }"
        @mouseenter="hideFront()"
      >
        <img :src="imagePath" />
      </div>
      <div
        class="back"
        :class="{ backFlipped: id == store.currEboardFlipped }"
        @mouseleave="showFront()"
      >
        <p class="text">{{ personalDesc }}</p>
      </div>
    </div>
    <div class="subtitle">
      <p class="name">{{ name }}</p>
      <p class="position">ACM {{ position }}</p>
    </div>
  </main>
</template>
  
  <script>
import { store } from "../store.js";

export default {
  props: ["position", "name", "personalDesc", "imageName", "id"],
  data() {
    return {
      flipped: false,
      store,
    };
  },
  computed: {
    imagePath() {
      return require("../assets/eboard/" + this.$props.imageName);
    },
  },
  methods: {
    hideFront() {
      this.store.currEboardFlipped = this.id;
    },
    showFront() {
      this.store.currEboardFlipped = -1;
    },
  },
};
</script>
  
  <style scoped>
* {
  transition: all 0.25s ease-in-out;
}

.container {
  position: relative;
  width: 350px;
  height: 350px;
}
.front {
  position: absolute;
  z-index: 1;
  width: 100%;
  height: 100%;
}
.back {
  position: absolute;
  height: 100%;
  width: 100%;
  padding: 0 1rem;
  z-index: 0;
  transform: rotateY(-180deg);
  background: white;
  border: 4px red solid;
  border-radius: 16px;
  display: grid;
  grid-template-columns: 100%;
  grid-template-rows: 100%;
}
.frontFlipped {
  transform: rotateY(180deg);
  z-index: 0;
}
.backFlipped {
  transform: rotateY(0deg);
  z-index: 1;
}

.front img {
  width: 100%;
  height: 100%;
  border-radius: 16px;
}
.back .text {
  align-self: center;
  justify-self: center;
  font-size: 2rem;
  text-align: center;
}
.subtitle {
  margin: 1rem;
  width: 100%;
}
.name {
  padding-bottom: 0.5rem;
  font-size: 2rem;
  font-weight: 550;
}
.position {
  font-size: 1.75rem;
  font-weight: 350;
}
</style>