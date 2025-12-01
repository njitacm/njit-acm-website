<template>
  <div class="UpcomingEventCard">
    <div class="content">
      <img v-if="imagePath !== ''" :src="imgSrc" class="thumbnail">
      <div class="info">
        <h3 class="title">{{ name }}</h3>
        <div v-if="datetime !== '' || location !== ''" class="when-where">
          <div v-if="datetime !== ''" class="datetime">
            <img src="../assets/icons/date.svg" alt="Date" class="icon">
            <span>{{ datetime }}</span>
          </div>
          <div v-if="location !== ''" class="location">
            <img src="../assets/icons/location.svg" alt="Location" class="icon">
            <span>{{ location }}</span>
          </div>
        </div>
        <p v-if="desc !== ''">{{ desc }}</p>
      </div>
    </div>
    <div v-if="links && Object.keys(links).length > 0" class="links">
      <PrimaryButton v-for="(href, text, index) in links" :key="index">
        <a :href="href" target="_blank">{{ text }}</a>
      </PrimaryButton>
    </div>
  </div>
</template>

<script>
import { getImageUrl } from '../util';
import PrimaryButton from './PrimaryButton.vue';

export default {
  name: "UpcomingEventCard",
  components: { PrimaryButton },
  props: {
    name: {
      type: String,
      required: true,
    },
    datetime: {
      type: String,
      required: true,
    },
    location: {
      type: String,
      default: "",
    },
    imagePath: {
      type: String,
      default: "",
    },
    desc: {
      type: String,
      default: "",
    },
    links: {
      type: Object,
      default: () => ({}),
    },
  },
  data() {
    return {
      imgSrc: "",
    };
  },
  async mounted() {
    if (this.$props.imagePath) {
      this.imgSrc = await getImageUrl(`EventsPage/${this.$props.imagePath}`);
    }
  }
}
</script>

<style scoped>
.UpcomingEventCard {
  padding: 32px;
  display: flex;
  gap: 32px;
}

.content {
  display: flex;
  height: fit-content;
  gap: 32px;
  flex-grow: 1;
}

.thumbnail {
  width: 250px;
  border: var(--red) var(--border-width) solid;
  border-radius: var(--border-radius);
}

.info,
.links {
  align-content: start;
}

.info {
  display: grid;
  gap: 16px;
  width: 100%;
}

.title {
  color: var(--red);
}

.when-where {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
}

.datetime,
.location {
  font-weight: bold;
  display: flex;
  gap: 8px;
  align-items: center;
}

.icon {
  width: 25px;
  height: 25px;
}

.links {
  width: 250px;
  display: flex;
  flex-direction: column;
  gap: 16px;
}

@media (max-width: 1100px) {
  .UpcomingEventCard {
    flex-direction: column;
  }

  .links {
    flex-direction: row;
    width: 100%;
  }

  .links .PrimaryButton {
    width: 100%;
  }
}

@media (max-width: 750px) {
  .content {
    align-items: center;
    flex-direction: column;
  }
}

@media (max-width: 500px) {
  .links {
    flex-direction: column;
  }
}
</style>
