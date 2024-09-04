<template>
  <transition mode="out-in">
    <div class="spotlight" :key="position">
      <img :src="imagePath" />
      <div class="text">
        <section>
          <h1>{{ position }}</h1>
          <p>{{ positionDesc }}</p>
        </section>
        <section>
          <h1>Current {{ position }}: {{ incumbent }}</h1>
          <p>{{ incumbentDesc }}</p>
        </section>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  computed: {
    imagePath() {
      return require("../assets/eboard/" + this.$props.imageName);
    },
  },
  props: [
    "position",
    "positionDesc",
    "incumbent",
    "incumbentDesc",
    "imageName",
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

.v-enter-active,
.v-leave-active {
  transition: all 500ms ease-in-out;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}

.spotlight {
  width: 60%;
  margin: 2.4rem auto;
  border: 4px red solid;
  padding: 0.4rem;
  border-radius: 8px;
  display: flex;
}
section {
  padding: 0.8rem;
}
h1 {
  font-size: 3rem;
}
.text {
  margin-left: 1.2rem;
}
p {
  font-size: 2rem;
}
img {
  width: 36rem;
  height: 36rem;
  aspect-ratio: 1 / 1;
  object-fit: cover;
  border-radius: 8px;
}

@media (max-width: 1500px) {
  .spotlight {
    width: 80%;
  }
}

@media (max-width: 1050px) {
  .spotlight {
    width: 90%;
    padding: 0;
  }
  img {
    /* padding: 0.4rem; */
    width: 100%;
    margin: auto 0;
    flex: 1;
  }
  .text {
    flex: 1.25;
    background-color: whitesmoke;
    margin: 0;
  }
}

@media (max-width: 900px) {
  .spotlight {
    width: 97.5%;
  }
  img {
    padding: 0.4rem;
  }
  .text {
    background-color: whitesmoke;
    margin: 0;
  }
}

@media (max-width: 600px) {
  .spotlight {
    flex-direction: column;
  }
  img {
    padding: 0.4rem;
  }
  .text {
    background-color: whitesmoke;
    margin: 0;
  }
}
</style>