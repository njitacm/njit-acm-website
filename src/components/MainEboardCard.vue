<template>
  <main>
    <div class="container" @mouseenter="toggleFrontHover" @mouseleave="toggleFrontHover" @click="toggleFrontClick">
      <div class="front">
        <img :src="imagePath" :class="{ frontFlipped: id === store.currEboardFlipped }" />
      </div>
      <div class="back" :class="{ backFlipped: id === store.currEboardFlipped }">
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
import { getImageUrl } from "../util.js";

export default {
  props: ["position", "name", "personalDesc", "imageName", "id"],
  data() {
    return {
      store,
      imagePath: "",
    };
  },
  async mounted() {
    try {
      this.imagePath = await getImageUrl(`eboard/${this.$props.imageName}`);
    } catch (err) {
      console.log(err);
      console.log('resorting to the blank-pfp instead')
      this.imagePath = await getImageUrl("blank-pfp.png");
    }
  },
  methods: {
    isMobile() {
      return (navigator.userAgent.match(/Android/i)
        || navigator.userAgent.match(/webOS/i)
        || navigator.userAgent.match(/iPhone/i)
        || navigator.userAgent.match(/iPad/i)
        || navigator.userAgent.match(/iPod/i)
        || navigator.userAgent.match(/BlackBerry/i)
        || navigator.userAgent.match(/Windows Phone/i));
    },
    toggleFrontHover() {
      if (this.isMobile())
        return;
      this.toggleFront();
    },
    toggleFrontClick() {
      if (!this.isMobile())
        return;
      this.toggleFront();
    },
    toggleFront() {
      if (this.$props.personalDesc === undefined || this.$props.personalDesc === '')
        return;
      if (this.store.currEboardFlipped == this.id)
        this.store.currEboardFlipped = -1;
      else
        this.store.currEboardFlipped = this.id;
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
  background-color: var(--bkg-color);
  border: var(--border-width) lightcoral solid;
  border-radius: 16px;
  display: grid;
  grid-template-columns: 100%;
  grid-template-rows: 100%;
}

.frontFlipped {
  transform: rotateY(180deg);
  box-shadow: var(--shadow-gray) 0px 0px var(--shadow-radius);
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
  text-align: center;
}

.subtitle {
  margin: 1rem;
  width: 100%;
}

.name {
  padding-bottom: 0.5rem;
  font-weight: 550;
}

.position {
  font-weight: 350;
}
</style>