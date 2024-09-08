<template>
  <section class="main-event">
    <div>
      <h3>{{ title }}</h3>
      <p class="main-event-desc">
        {{ desc }}
      </p>
      <button>Learn More</button>
    </div>
    <img :src="imagePath" alt="{{ title }} Logo" />
  </section>
</template>

<script>
export default {
  props: ["title", "desc", "imgName"],
  data() {
    return {
      imagePath: require("../assets/EventsPage/" + this.$props.imgName),
    };
  },
};
</script>

<style scoped>
.main-event {
  margin: 4.8rem 0;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 40%;
  border: 2px red solid;
  border-radius: 8px;
  position: relative;
  height: 50rem;
  min-width: 550px;
}
/*
- Font sizes (px)
10 / 12 / 14 / 16 / 18 / 20 / 24 / 30 / 36 / 44 / 52 / 62 / 74/ 86 / 98

- Spacing system (px)
2 / 4 / 8 / 12 / 16 / 24 / 32 /48 /64 /80 /96 / 128
*/
.main-event h3 {
  font-size: 3.6rem;
  text-align: center;
}
.main-event p {
  font-size: 3rem;
  padding: 1.6rem;
  font-weight: 400;
}
.main-event img {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 50%;
  left: 50%;
  z-index: -1;
  transform: translateX(-50%) translateY(-50%);
  opacity: 0.4;
}
.main-event button {
  font-size: 2.4rem;
  border-radius: 0.8rem;
  padding: 0.8rem;
  display: block;
  margin-left: auto;
  margin-right: auto;
  /* position: absolute;
  bottom: 4rem;
  left: 50%; */
  transform: translateX(-50%);
}
</style>