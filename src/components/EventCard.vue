<template>
  <div class="event-card">
    <img :src="require('../assets/EventsPage/' + imageUrl)" class="event-img">
    <div class="event-text">
      <h1>{{ name }}</h1>
      <h2>Location: {{ location }} | Date: {{ date }} @ {{ time }}</h2>
      <p class="desc">{{ desc }}</p>
      <a :href="url"></a>
    </div>
  </div>
</template>

<script>
export default {
  props: ['name', 'date', 'time', 'location', 'url', 'imageUrl', 'desc'],
  mounted() {
    console.log(this.$props.imageUrl)
  }
}
</script>

<style>
.event-card {
  border: var(--border-width) lightcoral solid;
  border-radius: var(--border-radius);
  height: fit-content;
}

.event-text {
  padding: 1rem;
  display: grid;
  row-gap: 1rem;
  grid-template-columns: 100%;
}

.event-img {
  width: 100%;
  border-radius: var(--border-radius);
}

.event-card h1 {
  color: var(--red);
  font-size: 3rem;
}

.event-card h2 {
  font-size: 1.8rem;
}

.desc {
  font-size: 2rem;
}
</style>
