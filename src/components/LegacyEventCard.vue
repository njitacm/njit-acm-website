<template>
  <div class="event-card">
    <div :style="'background-image: url(' + imageUrl + ')'" class="event-image"></div>
    <div class="event-text">
      <h1>{{ title }}</h1>
      <p>{{ time }}</p>
      <p>Location: {{ location }}</p>
      <a :href="url"></a>
    </div>
  </div>
</template>

<script>
export default {
  props: ['name', 'time', 'location', 'url', 'imageUrl'],
  mounted() {
    console.log(this.$props.imageUrl)
  }
}
</script>

<style>
.event-card {
  border: 2px lightcoral solid;
  border-radius: 8px;
  height: fit-content;
}

.event-text {
  padding: 8px;
}

.event-image {
  width: 100%;
  min-height: 180px;
  height: 60%;
}

.event-card h1 {

  font-size: 3rem;
}

.event-card p {
  font-size: 1.8rem;
}
</style>
