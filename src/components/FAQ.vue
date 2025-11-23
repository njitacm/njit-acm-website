<template>
  <div class="FAQ outer-container">
    <h2 class="title">FAQ</h2>
    <div class="container">
      <div v-for="(item, index) in faq" :key="item.title" class="faq-container">
        <div>
          <button @click="selectItem(index)" class="faq" :class="{ selected: selectedItem === index }">
            {{ item.title }}
          </button>
          <TransitionExpand :duration="375">
            <div v-if="index === selectedItem" class="answer-container">
              <p class="answer" v-if="index === selectedItem">
                {{ item.content }}
              </p>
            </div>
          </TransitionExpand>
        </div>
        <hr v-if="index < faq.length - 1" />
      </div>
    </div>
  </div>
</template>

<script>
import TransitionExpand from "./TransitionExpand.vue";
import faq from "../assets/data/faq.js";

export default {
  name: "FAQ",
  components: { TransitionExpand },
  data() {
    return {
      selectedItem: -1,
      faq: faq,
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
  },
};
</script>

<style scoped>
.outer-container {
  margin-top: 32px;
  border: var(--border-width) var(--red) solid;
  border-radius: 10px;
  padding: 32px;
  padding-top: 16px;
  display: grid;
}

.container {
  display: grid;
  gap: 8px;
}

.title {
  font-size: 3em;
  text-align: center;
}

.faq-container {
  display: grid;
  gap: 8px;
}

hr {
  border: none;
  border-bottom: var(--gray) var(--border-width) solid;
}

.faq {
  background-color: var(--bkg-color);
  width: 100%;
  padding: 8px;
  text-align: center;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  color: var(--text-color);
}

@media(hover: hover) and (pointer: fine) {
  .faq {
    transition: background-color var(--hover-speed) ease;
  }

  .faq:not(.selected):hover {
    background-color: var(--gray);
  }
}

@media (pointer: coarse) {
  .faq:not(.selected):active {
    background-color: var(--gray);
  }
}

.faq.selected {
  background-color: var(--red);
  color: var(--bkg-color);
}

.answer-container {
  overflow: hidden;
  text-overflow: clip;
}

p.answer {
  padding: 16px;
  overflow: hidden;
  text-overflow: clip;
}

@media (max-width: 500px) {
  .outer-container {
    border: none;
    margin-top: 0;
  }
}
</style>