<template>
  <div
    class="card"
    @click="selectEboard"
    :class="[{ selected: isSelected }, { currEboard: currEboard }]"
  >
    <img :src="imagePath" />
    <h1>{{ incumbent }}</h1>
    <h2>{{ position }}</h2>
  </div>
</template>

<script>
export default {
  emits: ["selectEboard"],
  data() {
    return {
      imagePath: require("../assets/eboard/" + this.$props.imageName),
    };
  },
  props: [
    "position",
    "positionDesc",
    "incumbent",
    "incumbentDesc",
    "imageName",
    "isSelected",
    "currEboard",
  ],
  methods: {
    selectEboard() {
      this.$emit("selectEboard", this.$props.position);
    },
  },
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
  /* background-color: coral; */
  margin-top: 0.8rem;
  border-radius: 8px;
  text-align: center;
  box-shadow: none;
  transform: translateY(0);
  box-shadow: none;
  opacity: 0.9;
  width: fit-content;
}
.currEboard {
  cursor: pointer;
}
.currEboard img {
  filter: grayscale(85%);
}
img {
  width: 20rem;
  height: 20rem;
  object-fit: cover;
  border-radius: 8px;
}
.selected {
  transform: translateY(-1.6rem);
  box-shadow: 0px 0px 7.5px 1px red;
  scale: 1.05;
  opacity: 1;
}
.selected img {
  filter: grayscale(0%);
  border-radius: 8px 8px 0px 0px;
}

@media (max-width: 600px) {
  /* .card {
    width: 12rem;
  } */
}
</style>