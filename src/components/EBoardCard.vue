<template>
  <div class="card">
    <img :src="imagePath" />
    <h1>{{ incumbent }}</h1>
    <h2>{{ position }}</h2>
  </div>
</template>

<script>
import { getImageUrl } from '../util';


export default {
  props: [
    "position",
    "incumbent",
    "imageName",
  ],
  data() {
    return {
      imagePath: "",
    };
  },
  async mounted() {
    this.imagePath = await getImageUrl(`eboard/${this.$props.imageName}`);
  }
};
</script>

<style scoped>
/*
- Font sizes (px)
10 / 12 / 14 / 16 / 18 / 20 / 24 / 30 / 36 / 44 / 52 / 62 / 74/ 86 / 98

- Spacing system (px)
2 / 4 / 8 / 12 / 16 / 24 / 32 /48 /64 /80 /96 / 128
*/
* {
  transition: all 500ms ease-in-out;
}

.card {
  margin-top: 0.8rem;
  border-radius: 8px;
  text-align: center;
  box-shadow: none;
  transform: translateY(0);
  box-shadow: none;
  opacity: 0.9;
  width: fit-content;
  transform: translateY(1.6rem);
  height: 100%;
}

img {
  width: 20rem;
  height: 20rem;
  object-fit: cover;
  border-radius: 8px;
}

@media (max-width: 600px) {
  img {
    width: 18rem;
    height: 18rem;
  }
}

@media (max-width: 400px) {
  img {
    width: 15rem;
    height: 15rem;
  }
}
</style>