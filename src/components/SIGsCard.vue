<template>
  <div class="card" ref="card">
    <img :src="imagePath" ref="img" />
    <div class="content">
      <div class="title">
        <div class="name-leader">
          <h3>{{ name }}</h3>
          <h4>Led by {{ leaders }}</h4>
        </div>
        <div class="loc-time">
          <h5>{{ loc }}</h5>
          <h5>{{ time }}</h5>
        </div>
      </div>
      <div class="desc" ref="desc">{{ desc }}</div>
    </div>
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
.card {
  border: red var(--border-width) solid;
  display: flex;
  align-items: center;
  vertical-align: center;
  gap: 1rem;
  padding: 1.5rem;
  border-radius: var(--large-border-radius);
  justify-self: center;
  width: 100%;
  transition: box-shadow var(--hover-speed) linear;
}

.title {
  display: grid;
  grid-template-columns: max-content auto;
  margin-bottom: 1rem;
}

.loc-time {
  margin: auto 0;
}

h3 {
  font-size: 3.6rem;
  text-align: left;
  align-self: center;
  color: var(--red);
}

h4 {
  text-align: left;
  font-size: 2.4rem;
}

h5 {
  text-align: right;
  font-size: 1.8rem;
}

.content {
  
}

.desc {
  font-size: 2rem;
  align-content: center;
  text-align: left;
  overflow: auto;
  max-height: 20rem;
  background-color: var(--bkg-color);
}

img {
  width: 20%;
  border-radius: var(--large-border-radius);
}

@media (max-width: 750px) {
  h3 {
    font-size: 2.3rem;
  }
  div.desc {
    font-size: 1.7rem;
  }
}
</style>