<template>
  <div class="list-item">
    <img :src="imagePath" />
    <div>
      <h1>{{ incumbent }}</h1>
      <h2>{{ position }}</h2>
      <p class="desc">{{ incumbentDesc }}</p>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      imagePath: new URL(`../assets/eboard/${this.$props.imageName}`, import.meta.url).href,
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

p {
}

h2 {
  color: var(--red);
}

.list-item {
  /* background-color: coral; */
  display: flex;
  border-radius: 20px;
  text-align: left;
  box-shadow: none;
  opacity: 0.9;
  width: fit-content;
  transform: translateY(1.6rem);
  height: auto;
  justify-content: center;
}

.list-item > div, .list-item > img {
  margin: auto 2rem;
}

.list-item > img {
  display: block;
  width: 20rem;
  height: 20rem;
  object-fit: cover;
  border-radius: 8px;
  box-shadow: var(--light-shadow-gray) 0px 0px 25px;
}

@media (max-width: 1750px) {
  .list-item {
    display: inline;
  }
  .list-item > div {
    /* margin: 0 0; */
    margin: 2rem auto;
  }

  /* center the img in .list-item horizontally */
  .list-item > img {
    margin: auto;
  }

  .list-item > img {
    width: 25rem;
    height: 25rem;
  }
}

@media (max-width: 600px) {
  .list-item > img {
    width: 18rem;
    height: 18rem;
  }
}
@media (max-width: 400px) {
  .list-item > img {
    width: 15rem;
    height: 15rem;
  }
}
</style>