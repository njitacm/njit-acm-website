<template>
  <main class="MainEboardCard">
    <div class="card" @mouseenter="toggleFrontHover" @mouseleave="toggleFrontHover" @click="toggleFrontClick"
      :class="{ flipped: id === store.currEboardFlipped }">
      <div class="front">
        <img :src="imgSrc" />
      </div>
      <div class="back">
        <p class="desc">{{ desc }}</p>
      </div>
    </div>
    <div class="info">
      <h3 class="name">{{ name }}</h3>
      <p class="position">{{ position }}</p>
    </div>
  </main>
</template>

<script>
import { store } from "../stores/eboard_card_store.js";
import { getImageUrl } from "../util.js";

export default {
  name: "MainEboardCard",
  props: {
    name: {
      type: String,
      required: true
    },
    position: {
      type: String,
      default: ""
    },
    desc: {
      type: String,
      default: ""
    },
    imagePath: {
      type: String,
      default: ""
    },
    id: {
      type: Number,
      required: ""
    }
  },
  data() {
    return {
      store,
      imgSrc: "",
    };
  },
  async mounted() {
    const imgPath = this.$props.imagePath;
    if (!imgPath || imgPath === "") {
      this.imgSrc = await getImageUrl("blank-pfp.png");
    } else {
      this.imgSrc = await getImageUrl(`eboard/${this.$props.imagePath}`);
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
      if (this.isMobile()) return;
      this.toggleFront();
    },
    toggleFrontClick() {
      if (!this.isMobile())
        return;
      this.toggleFront();
    },
    toggleFront() {
      if (this.$props.desc === undefined || this.$props.desc === '') return;
      if (this.store.currEboardFlipped == this.id)
        this.store.currEboardFlipped = -1;
      else
        this.store.currEboardFlipped = this.id;
    },
  },
};
</script>

<style scoped>
.MainEboardCard {
  width: 100%;
}

.card {
  position: relative;
  width: 100%;
  aspect-ratio: 1;
}

.front,
.back,
img {
  transition: transform 250ms linear;
  border-radius: var(--large-border-radius);
}

.front,
.back {
  position: absolute;
  height: 100%;
  width: 100%;
}

.front {
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

img {
  width: 100%;
  aspect-ratio: 1;
}

.back {
  opacity: 0;
  z-index: 0;
  transform: rotateY(-180deg);
  background-color: var(--bkg-color);
  align-content: center;
}

.flipped .front {
  transform: rotateY(180deg);
  z-index: 0;
  opacity: 0;
}

.flipped .back {
  box-shadow: var(--shadow-gray) 0px var(--shadow-offset-y) var(--shadow-blur);
  transform: rotateY(0deg);
  border: var(--border-width) var(--red) solid;
  z-index: 1;
  opacity: 1;
}

.back .desc {
  width: calc(100% - 32px);
  height: calc(100% - 32px);
  overflow: auto;
  text-align: center;
  align-content: center;
  margin: 0 auto;
}

.info {
  margin: 16px;
  width: calc(100% - 32px);
}

.name {
  color: var(--red);
}

.position {
  font-weight: bold;
  font-size: 1.5em;
}
</style>