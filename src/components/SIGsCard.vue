<template>
  <div>
    <h3>{{ name }}</h3>
    <h4>Led by {{ leaders }}</h4>

    <img :src="imagePath" />
    <section>
      <p>{{ desc }}</p>
      <h5>{{ time }} | {{ loc }}</h5>
    </section>
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
  display: grid;
  grid-template-rows: 100px 50px 380px 1fr;
  align-content: center;
  width: 40rem;
  gap: 1.2rem;
  padding: 1.2rem;
  border-radius: 8px;
  justify-self: center;
}
.sig-header {
  display: grid;
}

h3 {
  font-size: 3.6rem;
  text-align: center;
  align-self: center;
}
h4 {
  text-align: center;
  font-size: 2.4rem;
}
h5 {
  margin-top: 0.8rem;
  text-align: center;
  font-size: 1.8rem;
}
p {
  text-align: center;
  height: 14rem;
  overflow: scroll;
  font-size: 1.8rem;
  padding: 0 10px;
}
img {
  width: 100%;
  border-radius: 16px;
}
</style>