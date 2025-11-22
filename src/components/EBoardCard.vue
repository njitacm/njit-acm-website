<template>
  <main class="EBoardCard">
    <img :src="imgSrc" />
    <div class="info">
      <h3 class="name">{{ name }}</h3>
      <p class="position">{{ position }}</p>
    </div>
  </main>
</template>

<script>
import { getImageUrl } from '../util';

export default {
  name: "EBoardCard",
  props: {
    name: {
      type: String,
      required: true,
    },
    position: {
      type: String,
      required: true,
    },
    imagePath: {
      type: String,
      default: "",
    }
  },
  data() {
    return {
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
  }
};
</script>

<style scoped>
.EBoardCard {
  text-align: center;
  height: 100%;
}

img {
  border-radius: var(--border-radius);
  width: 100%;
  aspect-ratio: 1;
  border: var(--border-width) var(--red) solid;
}

.name {
  color: var(--red);
}

.position {
  font-weight: bold;
  font-size: 1.5em;
}
</style>