<template>
  <div class="card" @mouseenter="showDesc" @mouseleave="hideDesc">
    <h3>{{ name }}</h3>
    <h4>Led by {{ leaders }}</h4>
    <h5>{{ time }} | {{ loc }}</h5>
    <section>
      <!-- wrapper with its own styles needed to prevent blur from leaking out -->
      <div class="wrapper"><img :src="imagePath" ref="img" /></div>
      <div class="desc" ref="desc">{{ desc }}</div>
    </section>
  </div>
</template>

<script>
export default {
  props: {
    name: String,
    desc: String,
    leaders: String,
    time: String,
    loc: String,
    filename: String,
  },
  data() {
    return {
      imagePath: require("../assets/sigs/" + this.$props.filename),
    };
  },
  methods: {
    showDesc() {
      this.$refs.desc.style.opacity = 1;
      this.$refs.img.style.filter = "blur(15px)";
    },
    hideDesc() {
      this.$refs.desc.style.opacity = 0;
      this.$refs.img.style.filter = "blur(0px)";
    }
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
div.card {
  border: red var(--border-width) solid;
  display: grid;
  /* grid-template-rows: 100px 50px 380px 1fr; */
  gap: 1rem;
  padding: 1.5rem;
  border-radius: var(--large-border-radius);
  justify-self: center;
  width: 100%;
}
/* .sig-header {
  display: grid;
  } */
  
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
    /* margin-top: 0.8rem; */
    text-align: center;
  font-size: 1.8rem;
}

section {
  /* display: flex;
  justify-content: center;
  align-items: center; */
  position: relative;
  width: 100%;
}

div.desc {
  position: absolute;
  width: 100%;
  height: 100%;
  font-size: 2.5rem;
  padding: 1rem;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  align-content: center;
  text-align: center;
  overflow: auto;
  opacity: 0;
  background-color: var(--bkg-color-a625);
  border-radius: var(--large-border-radius);
  transition: opacity var(--hover-speed) linear;
}

.wrapper {
  width: 100%;
  overflow: hidden;
  border-radius: var(--large-border-radius);
}

.wrapper img {
  width: 100%;
  border-radius: var(--large-border-radius);
  margin: -1px;
}
</style>