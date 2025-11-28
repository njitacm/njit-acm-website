<template>
  <main class="ConstitutionView outer-container">
    <header class="header">
      <h1 class="title">ACM Constitution</h1>
      <div class="section-container">
        <p>The following is NJIT ACM's official constitution. Our constitution defines the rules and
          regulations of our
          ACM chapter and is upheld by the NJIT Student Senate. As stated in our constitution, we also abide by the
          <a href="https://www.acm.org/code-of-ethics" target="_blank">
            National ACM Code of Ethics and Professional
            Conduct
          </a>.
        </p>
      </div>
    </header>
    <div>
      <template v-for="(item, index) in constitution" :key="index">
        <component v-if="item != null" :is="item.tag" :class="item.className" v-html="item.content" />
      </template>
    </div>
  </main>
</template>

<script>
import { parseConstitution } from "../../util";
import rawConstTxt from "../../assets/data/constitution.txt?raw";

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
.header {
  margin-top: 32px;
}

:deep(.title) {
  text-align: center;
}

:deep(.article-title) {
  margin-top: 32px;
}

:deep(.section-title) {
  text-align: center;
}

:deep(.section-content) {
  margin-bottom: 32px;
}

/* 
  make it obnoxious so we can see it,
  then adjust the raw text file to 
  format text correctly to remove 
  stray content 
*/
:deep(.stray-content) {
  color: red;
}
</style>