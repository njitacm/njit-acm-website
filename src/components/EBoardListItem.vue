<template>
  <main class="EBoardListItem">
    <img :src="imgSrc" />
    <div class="info">
      <h3 class="name">{{ name }}</h3>
      <p class="position">{{ position }}</p>
      <p class="desc">{{ desc }}</p>
    </div>
  </main>
</template>

<script>
import { getImageUrl } from '../util';

export default {
  name: "EBoardListItem",
  props: {
    name: {
      type: String,
      required: true
    },
    position: {
      type: String,
      required: true
    },
    desc: {
      type: String,
      default: ""
    },
    imagePath: {
      type: String,
      default: ""
    },
  },
  data() {
    return {
      imgSrc: "",
    };
  },
  async mounted() {
    if (!this.$props.imagePath || this.$props.imagePath === "") {
      this.imgSrc = await getImageUrl("blank-pfp.png");
    } else {
      this.imgSrc = await getImageUrl(`eboard/${this.$props.imagePath}`);
    }
  },
};
</script>

<style scoped>
.EBoardListItem {
  display: flex;
  flex-direction: row;
  text-align: left;
  justify-content: center;
  align-items: center;
  gap: 32px;
}

.info {
  height: calc(100% - 16px);
}

.name {
  margin-top: 16px;
  color: var(--red);
}

.position {
  font-weight: bold;
  font-size: 1.5em;
  margin-bottom: 16px;
}

img {
  width: 300px;
  height: auto;
  aspect-ratio: 1;
  border-radius: var(--border-radius);
  border: var(--border-width) var(--red) solid;
}

@media(max-width: 1000px) {
  img {
    width: 200px;
  }
}

@media(max-width: 750px) {
  img {
    width: 300px;
  }

  .EBoardListItem {
    flex-direction: column;
    align-items: center;
  }
}

@media (max-width: 400px) {
  img {
    width: 250px;
  }
}
</style>