<template>
  <div class="outer">
    <div class="inner" v-for="col in columns" :key="col">
      <section v-for="(item, index) in col.data" :key="item.title">
        <button @click="selectItem(index + col.offset)" :class="{ selected : selectedItem === index + col.offset}">
          <p class="question">{{ item.title }}</p>
        </button>
        <TransitionExpand :duration="375">
          <div v-if="index + col.offset === selectedItem" class="answer-box">
            <p class="answer" v-if="index + col.offset === selectedItem">
              {{ item.content }}
            </p>
          </div>
        </TransitionExpand>
      </section>
    </div>
  </div>
</template>

<script>
import TransitionExpand from "./TransitionExpand.vue";

export default {
  components: {
    TransitionExpand,
  },
  data() {
    return {
      selectedItem: -1,
      columns: this.createColumns(),
    };
  },
  methods: {
    selectItem(value) {
      if (this.selectedItem === value) {
        this.selectedItem = -1;
      } else {
        this.selectedItem = value;
      }
    },
    createColumns() {
      var columns = [];
      var arraySplit = Math.ceil(this.$props.qas.length / this.$props.cols);
      for (let i = 0; i < this.$props.cols; i++) {
        columns.push({
          offset: arraySplit * i,
          data: this.$props.qas.slice(
            arraySplit * i,
            arraySplit * i + arraySplit
          ),
        });
      }
      return columns;
    },
  },
  props: {
    qas: Array,
    cols: Number,
  },
};
</script>

<style scoped>
.outer {
  width: 80%;
  margin: 4.8rem auto;
  background-color: none;
  border: 4px red solid;
  border-radius: 8px;
  display: flex;
  justify-content: space-around;
}
.inner {
  width: 50%;
  margin: 1.6rem;
  display: flex;
  flex-direction: column;
  padding: 1.6rem;
  gap: 0.8rem;
}

button {
  background-color: var(--bkg-color);
  width: 100%;
  padding: 0.8rem;
  text-align: center;
  border: var(--text-color) 3px solid;
  border-radius: 8px;
  cursor: pointer;
  transition: all var(--hover-speed) ease-in-out;
  color: var(--text-color);
}

button:not(.selected):hover {
  background-color: var(--light-gray);
}

button.selected {
  background-color: black;
  color: white;
}

[data-theme="dark"] button.selected {
  background-color: white;
  color: black;
}

p.question {
  
}
.answer-box {
  overflow: hidden;
  text-overflow: clip;
}
p.answer {
  padding: 0.8rem;
  overflow: hidden;
  text-overflow: clip;
}

@media (max-width: 1200px) {
  .outer {
    flex-direction: column;
    padding: 0.4rem;
    gap: 0px;
  }
  .inner {
    width: 100%;
    margin: 0;
    padding-top: 0.4rem;
    padding-bottom: 0.4rem;
  }
}
</style>