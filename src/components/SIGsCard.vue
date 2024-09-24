<template>
  <div>
    <section>
      <h3>{{ name }}</h3>
      <h4>Led by {{ leaders }}</h4>
    </section>
    <section>
      <img :src="imagePath" />
      <p>{{ desc }}</p>
    </section>
    <h5>{{ time }} | {{ loc }}</h5>
  </div>
</template>

<script>
export default {
  data() {
    return {
      imagePath: require("../assets/sigs/" + this.$props.filename + ""),
    };
  },
  props: {
    name: String,
    desc: String,
    leaders: String,
    time: String,
    loc: String,
    filename: String,
  },
  mounted() {
    console.log("../assets/sigs/" + this.$props.filename);
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
div {
  background-color: inherit;
  border: red 3px solid;
  display: flex;
  flex-direction: column;
  width: 40rem;
  gap: 1.2rem;
  padding: 1.2rem;
  border-radius: 8px;
  justify-content: space-between;
}
h3 {
  font-size: 3.6rem;
  text-align: center;
}
h4 {
  margin-top: 0.8rem;
  text-align: center;
  font-size: 1.4rem;
}
h5 {
  margin-top: 0.8rem;
  text-align: center;
  font-size: 1.8rem;
}
p {
  height: 14rem;
  overflow: scroll;
  font-size: 1.8rem;
  padding: 0 10px;
}
img {
  width: 100%;
}
</style>