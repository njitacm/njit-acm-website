<template>
  <img :src="currSrc" :alt="alt" />
</template>

<script>
// TODO: add photos
export default {
  // dur in ms
  props: [ 'src', 'alt', 'dur' ],
  data() {
    return {
      interval: null,
      imgIndex: 0,
      currSrc: null,
    }
  },
  methods: {
    startSlideshow() {
      console.log(this.$props.src);
      if (!Array.isArray(this.$props.src)) {
        this.currSrc = require('../assets/' + this.$props.src);
        console.log('same: ' + this.currSrc);
        return;
      }

      this.interval = setInterval(() => {
        this.currSrc = require('../assets/' + this.$props.src[this.imgIndex]);
        if (this.imgIndex < this.$props.src.length - 1)
          this.imgIndex++;
        else
          this.imgIndex = 0;
        console.log('changed')
      }, 1000)
    },
    stopSlideshow() {
      if (this.interval)
        clearInterval(this.interval)
    }
  },
  mounted() {
    console.log('started slideshow');
    this.startSlideshow();
  },
  unmounted() {
    console.log('stopped slideshow');
    this.stopSlideshow();
  }
}
</script>

<style scoped>

img {
  flex: 2;
  width: 100%;
  min-width: 60rem;
  border-radius: 8px;
  object-fit: cover;
  box-shadow: var(--shadow-gray) 0px 0px 25px;
}

@media (max-width: 1400px) {
  img {
    min-width: 80%;
  }
}

@media (max-width: 600px) {
  
}
</style>