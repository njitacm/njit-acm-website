<template>
  <main class="EmbeddedCalendar">
    <iframe :src="embedSrc" title="Calendar" frameborder="0" scrolling="auto"></iframe>
    <PrimaryButton class="button">
      <a target="_blank" :href="href">{{ buttonText }}</a>
    </PrimaryButton>
  </main>
</template>

<script>
import { useMediaQuery } from '@vueuse/core';
import PrimaryButton from './PrimaryButton.vue';

export default {
  name: "EmbeddedCalendar",
  components: { PrimaryButton },
  setup() {
    return { isNarrow: useMediaQuery('(max-width: 750px)') };
  },
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
  computed: {
    embedSrc() {
      if (!this.isNarrow) return this.src;

      const url = new URL(this.src);
      url.searchParams.set('mode', 'AGENDA');
      return url.toString();
    },
  },
}
</script>

<style scoped>
.EmbeddedCalendar {
  width: 100%;
  display: flex;
  flex-direction: column;
}

.EmbeddedCalendar iframe {
  display: block;
  width: 100%;
  height: 70vh;
  max-height: 600px;
  min-height: 400px;
  border-radius: var(--large-border-radius, 8px);
  filter: drop-shadow(0px var(--shadow-offset-y) var(--shadow-blur) var(--shadow-gray));
}

.EmbeddedCalendar .button {
  display: none;
}

@media (max-width: 750px) {
  .EmbeddedCalendar iframe {
    display: block;
    height: 60vh;
  }

  .EmbeddedCalendar .button {
    display: block;
    width: 100%;
    margin-top: 16px;
  }
}
</style>
