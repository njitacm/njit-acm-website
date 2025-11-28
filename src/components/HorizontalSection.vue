<template>
  <main class="HorizontalSection" :class="{ 'keep-floating': keepFloating, 'banner': banner }">
    <img v-if="imagePath !== ''" :src="imgSrc" :style="{ 'object-position': objPosX + ' ' + objPosY }" />
    <div class="content">
      <h1 class="title">
        <slot name="title"></slot>
      </h1>
      <p>
        <slot name="content"></slot>
      </p>
      <slot name="button"></slot>
    </div>
  </main>
</template>

<script>
import { getImageUrl } from '../util';
export default {
  name: "HorizontalSection",
  props: {
    banner: {
      type: Boolean,
      default: true
    },
    objPosX: {
      type: String,
      default: "0px"
    },
    objPosY: {
      type: String,
      default: "0px"
    },
    imagePath: {
      type: String,
      default: ""
    },
    keepFloating: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      imgSrc: ""
    };
  },
  async mounted() {
    this.imgSrc = await getImageUrl(this.$props.imagePath);
  }
};
</script>

<style scoped>
.HorizontalSection {
  display: flex;
  gap: 32px;
}

.HorizontalSection.banner {
  padding-block: 32px;
  flex-direction: column;
}

.HorizontalSection:not(.banner) {
  padding: 32px;
}

img {
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-gray) 0px var(--shadow-offset-y) var(--shadow-blur);
  width: 400px;
  object-fit: cover;
}

.banner img {
  width: 100%;
  height: 300px;
}

.title {
  text-align: center;
}

.content {
  width: calc(100% - var(--indentation));
  margin: 0 auto;
}

@media(max-width: 1000px) {
  img {
    width: 100%;
  }

  .HorizontalSection:not(.banner) {
    flex-direction: column;
    align-items: center;
  }
}

@media (max-width: 750px) {
  .content {
    max-width: var(100% - calc(--indentation));
  }

  .HorizontalSection:not(.keep-floating) {
    margin: 0;
    padding: 0;
  }

  img:not(.keep-floating) {
    box-shadow: none;
    border-radius: 0;
    border-bottom: var(--border-width) var(--red) solid;
  }
}
</style>
