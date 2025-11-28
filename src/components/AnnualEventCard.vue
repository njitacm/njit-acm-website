<template>
  <div class="AnnualEvent">
    <h3 class="title">{{ title }}</h3>
    <p class="main-event-desc">{{ desc }}</p>
    <div v-if="links && Object.keys(links).length > 0" class="links-container">
      <PrimaryButton v-for="(href, name, index) in links" :key="index">
        <a :href="href" target="_blank">{{ name }}</a>
      </PrimaryButton>
    </div>
  </div>
</template>

<script>
import PrimaryButton from './PrimaryButton.vue';

export default {
  name: "AnnualEventCard",
  components: { PrimaryButton },
  props: {
    title: {
      type: String,
      required: true,
      default: "",
    },
    desc: {
      type: String,
      required: true,
      default: "",
    },
    imgName: {
      type: String,
      default: "",
    },
    links: {
      type: Object,
      default: () => ({}),
    }
  },
};
</script>

<style scoped>
.AnnualEvent {
  border: var(--border-width) solid var(--red);
  border-radius: 10px;
  padding: 32px;
  display: grid;
  align-content: start;
  gap: 32px;
}

.title {
  text-align: center;
}

.links-container {
  display: grid;
  gap: 16px;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}
</style>