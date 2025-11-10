<template>
  <div class="events-calendar">
    <PrimaryButton class="button"><a target="_blank" :href="href">{{ buttonText }}</a></PrimaryButton>
    <iframe :src="src" frameborder="0" scrolling="auto"></iframe>
  </div>
</template>

<script>
import PrimaryButton from './PrimaryButton.vue';

export default {
  components: { PrimaryButton },
  props: [ 'src', 'href', 'buttonText' ],
}
</script>

<style scoped>
.events-calendar {
  margin: 5rem auto;
  display: grid;
  grid-template-columns: 100%;
  justify-content: space-around;
  max-width: 1250px;
}
.events-calendar iframe {
  width: 100%;
  height: 600px;
  border-radius: var(--large-border-radius);
  box-shadow: var(--light-shadow-gray) 0px 0px 10px;
}

.events-calendar .button {
  margin: 0 auto;
  margin-bottom: 2rem;
  width: 80%;
  display: none;
}

@media (max-width: 750px) {
  .events-calendar iframe {
    display: none;
  }

  .events-calendar .button {
    display: block;
  }
}
</style>