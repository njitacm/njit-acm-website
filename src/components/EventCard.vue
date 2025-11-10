<template>
  <div class="event-card">
    <img v-if="imageUrl !== ''" :src="imageSrc" class="event-img">
    <div class="event-text">
      <h1>{{ name }}</h1>
      <h2 vif="datetime !== ''"><span class="red">When?</span> {{ datetime }}</h2>
      <h2 v-if="location !== ''"><span class="red">Where?</span> {{ location }}</h2>
      <p class="desc" v-if="desc !== ''">{{ desc }}</p>
    </div>
    <div v-if="links && Object.keys(links).length > 0" class="links">
      <PrimaryButton v-for="(href, text, index) in links" :key="index">
        <a :href ="href" target="_blank">{{ text }}</a>
      </PrimaryButton>
    </div>
  </div>
</template>

<script>
import PrimaryButton from './PrimaryButton.vue';

export default {
  components: { PrimaryButton },
  props: ['name', 'date', 'time', 'datetime', 'location', 'imageUrl', 'desc', 'links'],
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

<style scoped>
.red {
  color: var(--red);
}

.event-card {
  border: 1px var(--gray) solid;
  border-radius: 10px;
}

.event-text {
  padding: 32px;
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
  display: flex;
  gap: 16px;
  padding: 16px;
  justify-content: center;
  flex-wrap: wrap;
}

.PrimaryButton {
  flex-grow: 1;
}

.event-card h1 {
  color: var(--red);
}
</style>
