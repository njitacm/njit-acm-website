<template>
  <section class="main-event-container" :style="cssProps">
    <h1>{{ title }}</h1>
    <p class="main-event-desc">
      {{ desc }}
    </p>
    <!-- <PrimaryButton><span>Learn More</span></PrimaryButton> -->
  </section>
</template>

<script>
// import PrimaryButton from './PrimaryButton.vue';

export default {
  // components: { PrimaryButton },
  props: ["title", "desc", "imgName"],
  data() {
    return {
      cssProps: {
        backgroundImage: `url(${require('../assets/EventsPage/' + this.$props.imgName)})`,
        backgroundSize: `contain`,
        backgroundRepeat: `no-repeat`,
        backgroundPosition: `center`,
      },
      imagePath: require("../assets/EventsPage/" + this.$props.imgName),
    };
  },
};
</script>

<style scoped>
.main-event-container {
  display: grid;
  grid-template-rows: 20% 1fr 5%;
  text-align: center;
}

h1 {
  font-size: 5rem;
}

.main-event-desc {
  font-size: 2rem;
  align-self: center;
  font-weight: 450;
}

button {
  width: 50%;
  justify-self: center;
}

img {
  width: 100%;
}
</style>
