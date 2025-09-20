<template>
  <div class="card" ref="card">
    <img :src="imagePath" ref="img" />
    <div class="content">
      <div class="title">
        <div class="name-leader">
          <h3 class="name">{{ name }}</h3>
          <h4 class="leader">Led by {{ leaders }}</h4>
        </div>
        <div class="loc-time">
          <h5 class="loc">{{ loc }}</h5>
          <h5 class="time">{{ time }}</h5>
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
      imagePath: new URL(`../assets/sigs/${this.$props.filename}`, import.meta.url).href,
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
  border: lightcoral var(--border-width) solid;
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
  width: 100%;
  display: grid;
  grid-template-columns: auto max-content;
  margin-bottom: 1rem;
  column-gap: 1rem;
}

.loc-time {
  margin: auto 0;
}

h3 {
  text-align: left;
  align-self: center;
  color: var(--red);
}

h4 {
  text-align: left;
}

.loc, .time {
  text-align: right;
  font-style: italic;
}

.desc {
  align-content: center;
  text-align: left;
  overflow: auto;
  max-height: 20rem;
  background-color: var(--bkg-color);
}

.content {
  width: 100%;
  display: grid;
  row-gap: 0.5rem;
}

img {
  width: 20%;
  border-radius: var(--large-border-radius);
}

@media (max-width: 775px) {
  .name {
  }
  .leader {
  }
  div.desc {
  }
  .title {
    display: unset;
  }
  .loc-time {
    display: grid;
    grid-template-columns: repeat(2, max-content);
    column-gap: 2rem;
  }
  .loc, .time {
    text-align: unset;
    font-weight: normal;
  }
}
</style>