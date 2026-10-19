<template>
  <main class="EmbeddedCalendar">
    <PrimaryButton class="button">
      <a target="_blank" :href="href">{{ buttonText }}</a>
    </PrimaryButton>
    <iframe :src="src" frameborder="0" scrolling="auto"></iframe>
  </main>
</template>

<script>
import PrimaryButton from './PrimaryButton.vue';

export default {
  name: "EmbeddedCalendar",
  components: { PrimaryButton },
  props: {
    src: {
      type: String,
      required: true,
    },
    href: {
      type: String,
      required: true,
    },
    buttonText: {
      type: String,
      required: true,
    },
  },
}
</script>

<style scoped>
.EmbeddedCalendar {
  margin: 64px auto;
}

.EmbeddedCalendar iframe {
  width: 100%;
  height: 600px;
  border-radius: var(--large-border-radius);
  filter: drop-shadow(0px var(--shadow-offset-y) var(--shadow-blur) var(--shadow-gray));
}

.EmbeddedCalendar .PrimaryButton {
  margin: 0 auto;
  width: calc(100% - var(--indentation));
  display: none;
}

@media (max-width: 750px) {
  .EmbeddedCalendar iframe {
    display: none;
  }

  .EmbeddedCalendar .button {
    display: block;
  }
}
</style>
