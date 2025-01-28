<template>
  <section id="who-we-are" :class="{ small: small, 'keep-floating': keepFloating }">
    <div class="section-content">
      <h3><slot name="title"></slot></h3>
      <p>
        <slot name="content"></slot>
      </p>
      <slot name="button"></slot>
    </div>
    <SlideshowImage :src="imagePath" :class="{ small: small, 'keep-floating': keepFloating, 'img': 'true' }"
      :dur="slideDuration"
      alt="NJIT ACM photo slideshow">
    </SlideshowImage>
  </section>
</template>

<script>
import SlideshowImage from './SlideshowImage.vue';
export default {
  components: { SlideshowImage },
  props: {
    imagePath: String,
    small: Boolean,
    slideDuration: Number,
    keepFloating: Boolean
  },
  data() {
    return {
      // imageSrc: require("../assets/" + this.$props.imagePath),
      imageSrc: [],
    };
  },
  // mounted() {
  //   if (Array.isArray(this.$props.imagePath)) {
  //     for (let i = 0; i < this.$props.imagePath.length; i++) {
  //       this.imageSrc.push(require("../assets/" + this.$props.imagePath[0]))
  //     }
  //     console.log(this.imageSrc);
  //   } else {
  //     console.log('requiring: ' + require("../assets/" + this.$props.imagePath));
  //     this.imageSrc.push(require("../assets/" + this.$props.imagePath));
  //   }
  // },
};
</script>

<style scoped>
section {
  margin: 10px 15px;
  display: flex;
  padding: 3.2rem;
  gap: 9.8rem;
}
.small {
  width: 50%;
}
section:nth-child(even) {
  flex-direction: row-reverse;
}
h3 {
  font-size: 7.4rem;
  margin-bottom: 0.8rem;
}
p {
  font-size: 2.4rem;
  line-height: 32px;
}
.section-content {
  margin: 10px 15px;
  flex: 2;
}

/* img {
  flex: 2;
  width: 100%;
  min-width: 60rem;
  border-radius: 8px;
  object-fit: cover;
  box-shadow: var(--shadow-gray) 0px 0px 25px;
} */

@media (max-width: 1400px) {
  section {
    flex-wrap: wrap-reverse;
    gap: 10px;
  }
  /* img {
    min-width: 80%;
  } */
  .section-content {
    min-width: 80%;
  }
  section {
    margin-left: auto;
    margin-right: auto;
  }
}
@media (max-width: 500px) {
  h3 {
    font-size: 4rem;
    text-align: center;
  }

  h3 {
    margin-top: 1rem;
  }

  section:not(.keep-floating) {
    margin: 0;
    padding: 0;
  }

  .img:not(.keep-floating) {
    width: 100%;
    border-radius: 0;
    border-bottom: var(--hor-sec-img-border-width) red solid;
    box-shadow: none;
  }
}

/* @media (max-width: 700px) {
  img {
    min-width: 80%;
  }
  .section-content {
    min-width: 80%;
  }
  section {
    margin-left: auto;
    margin-right: auto;
  }
} */
</style>