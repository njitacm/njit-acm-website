<template>
  <div :style="{'background-image': 'url(' + currBkgImg + ')'}" ref="div">
    <img :src="currSrc" :alt="alt" ref="img" />
  </div>
</template>

<script>
// TODO: add photos
import { getImageUrl } from '../util';

export default {
  // dur in ms
  props: [ 'src', 'alt', 'dur' ],
  data() {
    return {
      firstTime: true,
      interval: null,
      imgIndex: 0,
      currSrc: null,
      currBkgImg: null,
      transitionDur: 1000,
    }
  },
  methods: {
    async startSlideshow() {
      if (!this.$props.src) {
        return;
      }

      if (!Array.isArray(this.$props.src)) {
        this.currSrc = await getImageUrl(this.$props.src);
        return;
      }
      if (this.firstTime) {
        this.currSrc = await getImageUrl(this.$props.src[this.imgIndex]);
        this.currBkgImg = await getImageUrl(this.$props.src[this.imgIndex]);
        this.firstTime = false;
      }
      
      this.interval = setInterval(async () => {
        this.currBkgImg = await getImageUrl(this.$props.src[this.imgIndex]);
        this.$refs.img.style.opacity = "0";
        
        setTimeout(async () => {
          this.currSrc = await getImageUrl(this.$props.src[this.imgIndex]);
          
          if (this.$refs.img) {
            this.$refs.img.style.opacity = "1";
          }
        }, this.transitionDur);

        this.imgIndex = this.getNextIndex(this.imgIndex);

      }, this.$props.dur);
    },
    stopSlideshow() {
      if (this.interval) {
        clearInterval(this.interval)
      }
    },
    getNextIndex(i) {
      if (i < this.$props.src.length - 1)
        return i + 1;
      else
        return 0;
    },
  },
  mounted() {
    this.firstTime = true;
    this.$refs.img.style.transition = 'opacity ' + (this.transitionDur/1000) + 's linear';
    this.startSlideshow();
  },
  unmounted() {
    this.stopSlideshow();
  }
}
</script>

<style scoped>

div {
  background-size: cover;
  border-radius: var(--large-border-radius);
  width: 50%;
  height: fit-content;
  padding: 0;
  margin: auto;
  box-shadow: var(--shadow-gray) 0px 0px 25px;
}

img {
  display: block;
  margin: 0;
  padding: 0;
  width: 100%;
  border-radius: inherit;
  object-fit: cover;
}

@media (max-width: 1400px) {
  img {
    min-width: 80%
  }
}
</style>