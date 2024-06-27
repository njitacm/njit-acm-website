<template>
  <section id="who-we-are" :class="{ small: small }">
    <div class="section-content">
      <h3><slot name="title"></slot></h3>
      <p>
        <slot name="content"></slot>
      </p>
      <slot name="button"></slot>
    </div>
    <img :src="imageSrc" :class="{ small: small }" alt="NJIT ACM Logo" />
  </section>
</template>

<script>
export default {
  data() {
    return {
      imageSrc: require("../assets/" + this.$props.imagePath),
    };
  },
  props: {
    imagePath: String,
    small: Boolean,
  },
};
</script>

<style scoped>
section {
  margin: 10px 15px;
  display: flex;
  padding: 3.2rem;
  gap: 9.8rem;
}
.small {
  width: 50%;
}
section:nth-child(even) {
  flex-direction: row-reverse;
}
h3 {
  font-size: 7.4rem;
  margin-bottom: 0.8rem;
}
p {
  font-size: 2.4rem;
  line-height: 32px;
}
.section-content {
  flex: 2;
}

img {
  flex: 2;
  width: 100%;
  min-width: 60rem;
  border-radius: 8px;
  object-fit: cover;
}

@media (max-width: 1400px) {
  section {
    flex-wrap: wrap-reverse;
    gap: 10px;
  }
  img {
    min-width: 80%;
  }
  .section-content {
    min-width: 80%;
  }
  section {
    margin-left: auto;
    margin-right: auto;
  }
  h3 {
    text-align: center;
  }
}

@media (max-width: 500px) {
  h3 {
    font-size: 6.2rem;
    text-align: center;
  }
  p {
    text-indent: 25px;
  }
}
</style>