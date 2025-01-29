<template>
  <div class="events-calendar">
    <PrimaryButton class="button"><a target="_blank" :href="href">Add Events Calendar</a></PrimaryButton>
    <iframe :src="src" frameborder="0" scrolling="auto"></iframe>
  </div>
</template>

<script>
import PrimaryButton from './PrimaryButton.vue';

export default {
  components: { PrimaryButton },
  props: [ 'src', 'href' ],
}
</script>

<style scoped>
.events-calendar {
  margin: 5rem 0;
}
.events-calendar iframe {
  align-self: center;
  margin-left: 10%;
  width: 80%;
  height: 600px;
  border-radius: var(--large-border-radius);
  box-shadow: var(--light-shadow-gray) 0px 0px 10px;
}

.events-calendar .button {
  margin-left: 10%;
  margin-bottom: 2rem;
  width: 80%;
  display: none;
}

@media (max-width: 600px) {
  .events-calendar iframe {
    display: none;
  }

  .events-calendar .button {
    display: block;
  }
}
</style>