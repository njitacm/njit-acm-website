<template>
  <section :class="{ small: small, 'keep-floating': keepFloating}">
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
    imagePath: String | Array | null,
    small: Boolean,
    slideDuration: Number,
    keepFloating: Boolean
  },
};
</script>

<style scoped>
section {
  /* margin-top: 2rem; */
  display: flex;
  padding: 3rem;
  gap: 3rem;
}
.small {
  width: 50%;
}
section:nth-child(even) {
  flex-direction: row-reverse;
}
h3 {
  font-size: 3rem;
  margin-bottom: 0.8rem;
}
p {
  line-height: 32px;
}
.section-content {
  margin: auto;
  flex: 2;
}

@media (max-width: 1400px) {
  section {
    flex-wrap: wrap-reverse;
    gap: 1rem;
  }
  section {
    margin-left: auto;
    margin-right: auto;
  }

  h3 {
    text-align: center;
  }

  h3 {
    margin-top: 1rem;
  }

  .img {
    width: 100%;
  }
}
@media (max-width: 500px) {
  .section-content {
    max-width: 90%;
  }

  section:not(.keep-floating) {
    margin: 0;
    padding: 0;
  }
  
  .img:not(.keep-floating) {
    box-shadow: none;
    border-radius: 0;
    border-bottom: var(--hor-sec-img-border-width) red solid;
  }
}
</style>