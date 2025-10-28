<template>
  <div class="event-card">
    <img :src="imageSrc" class="event-img">
    <div class="event-text">
      <h1>{{ name }}</h1>
      <h2><span class="red">When?</span> {{ datetime }}</h2>
      <h2><span class="red">Where?</span> {{ location }}</h2>
      <p class="desc">{{ desc }}</p>
      <a :href="url"></a>
    </div>
    <div v-if="links">
      <div v-for="[text, link] in Object.entries(links)" :key="link.id" class="links">
        <PrimaryButton class="primary-button">
          <a :href="link.link" target="_blank" class="button-link">{{ text }}</a>
        </PrimaryButton>
      </div>
    </div>
    
  </div>
</template>

<script>
import PrimaryButton from './PrimaryButton.vue';

export default {
  components: { PrimaryButton },
  props: ['name', 'date', 'time', 'datetime', 'location', 'url', 'imageUrl', 'desc', 'links'],
  data() {
    return {
      imageSrc: new URL(`../assets/EventsPage/${this.$props.imageUrl}`, import.meta.url).href,
    };
  },
  mounted() {
    console.log(this.$props.imageUrl)
  }
}
</script>

<style>
.red {
  color: var(--red);
}

.event-card {
  border: var(--border-width) lightcoral solid;
  border-radius: var(--large-border-radius);
  height: fit-content;
}

.event-text {
  padding: 1rem 2rem;
  display: grid;
  row-gap: 1rem;
  grid-template-columns: 100%;
}

.event-img {
  width: 100%;
  border-bottom: lightcoral var(--border-width) solid;
  border-radius: calc(var(--large-border-radius) - var(--border-width)) calc(var(--large-border-radius) - var(--border-width)) 0 0;
}

.links {
  display: grid;
  gap: 2rem;
  width: calc(100% - 2rem);
  margin: 0 auto 1rem auto;
}

.event-card h1 {
  color: var(--red);
}

.event-card h2 {
}

.desc {
}
</style>
