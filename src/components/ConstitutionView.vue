<template>
  <div>
    <div class="constitution-bg" @click="closeModal"></div>
    <div id="constitution">
      <header>
        <h1 class="constTitle">NJIT ACM Constitution</h1>
      </header>
      <div v-for="(item, index) in constitution" :key="index">
        <component v-if="item" :is="item.tag" :class="item.className" v-html="item.content" />
      </div>
    </div>
  </div>
</template>

<script>
import { parseConstitution } from "../util";
import rawConstTxt from "../assets/data/constitution.txt?raw";

export default {
  name: "ConstitutionView",
  data() {
    return {
      constitution: parseConstitution(rawConstTxt)
    };
  }
};
</script>

<style scoped>
#constitution {
  width: 97.5vw;
  max-width: 1000px;
  padding: 2rem;
  margin: 1rem auto;
  border-radius: 16px;
  z-index: 1;
}

.constTitle {
  margin-top: 1% !important;
}

.section-num {
  font-weight: bold;
}

h3 {
  text-align: center;
}

h5 {
  text-align: center;
}

ul {
  width: 90%;
  margin: 0 auto;
}

p,
li {
  margin: 1.5rem 0rem;
}

header {
  text-align: center;
}

button {
  position: relative;
  right: 50rem;
}

@media(max-width: 600px) {

  p,
  li {}
}
</style>