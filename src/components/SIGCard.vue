<template>
  <main class="SIGCard">
    <img :src="imgSrc" />
    <div class="content">
      <div class="title">
        <div>
          <h3 class="name">{{ name }}</h3>
          <p class="leader">Led by {{ leaders }}</p>
        </div>
        <div class="loc-time">
          <p class="loc">{{ loc }}</p>
          <p class="time">{{ time }}</p>
        </div>
      </div>
      <p class="desc">{{ desc }}</p>
    </div>
  </main>
</template>

<script>
import { getImageUrl } from '../util';

export default {
  name: "SIGCard",
  props: {
    name: {
      type: String,
      required: true,
    },
    desc: {
      type: String,
      default: ""
    },
    leaders: {
      type: String,
      default: "",
    },
    time: {
      type: String,
      default: "TBA",
    },
    loc: {
      type: String,
      default: "TBA",
    },
    imagePath: {
      type: String,
      default: "",
    },
  },
  data() {
    return {
      imgSrc: "",
    };
  },
  async mounted() {
    const imgPath = this.$props.imagePath;
    if (imgPath && imgPath !== "") {
      this.imgSrc = await getImageUrl(`sigs/${this.$props.imagePath}`);
    }
  }
};
</script>

<style scoped>
.SIGCard {
  display: flex;
  align-items: center;
  vertical-align: center;
  gap: 32px;
  padding: 32px;
  width: 100%;
}

.content {
  align-self: start;
  width: 100%;
}

.title {
  display: flex;
  justify-content: space-between;
  gap: 32px;
  margin-bottom: 16px;
}

.name {
  color: var(--red);
}

.leader,
.loc,
.time {
  font-weight: bold;
}

.loc-time {
  margin: auto 0;
}

.loc,
.time {
  text-align: right;
}

.desc {
  overflow: auto;
}

img {
  width: 100px;
  border-radius: var(--border-radius);
}

@media (max-width: 775px) {
  .title {
    display: unset;
  }

  .loc-time {
    display: flex;
    gap: 16px;
  }
}

@media(max-width: 650px) {
  .SIGCard {
    flex-direction: column;
    align-items: center;
  }
}
</style>
