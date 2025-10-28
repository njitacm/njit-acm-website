<template>
  <div class="modal-container">
    <div class="modal-bg" @click="closeModal"></div>
    <div class="modal">
      <h2 class="event-type">{{ event.type || "Miscellaneous" }}</h2>
      <button class="close-button" @click="closeModal">X</button>
      <section class="modal-content">
        <h1>{{ event.name }}</h1>
        <div class="desc">
          <p id="element-to-truncate">{{ event.desc }}</p>
        </div>
      </section>
      <img :src="imagePath" />
      <footer>
        <h3>
          {{ event.month }} {{ event.day }} {{ event.year }} @
          {{ event.location }}
        </h3>
        <button v-if="event.link" @click="go(event.link)">Register</button>
      </footer>
    </div>
  </div>
</template>

<script>

export default {
  emits: ["close-modal"],
  props: ["event", "modalOpen"],
  data() {
    return {
      imagePath: new URL(`../assets/EventsPage/events/${this.$props.event.img}`, import.meta.url).href,
    };
  },
  methods: {
    closeModal() {
      this.$emit("close-modal");
    },
    go(link) {
      window.open(link);
    },
  },
};
</script>

<style scoped>
/* MODAL */
/*
- Font sizes (px)
10 / 12 / 14 / 16 / 18 / 20 / 24 / 30 / 36 / 44 / 52 / 62 / 74/ 86 / 98

- Spacing system (px)
2 / 4 / 8 / 12 / 16 / 24 / 32 /48 /64 /80 /96 / 128
*/
.modal-bg {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgb(206, 181, 181, 0.35);
  display: flex;
  flex-direction: column;
  justify-content: center;
  z-index: 1;
}
.modal {
  position: fixed;
  top: 50%;
  right: 50%;
  transform: translate(50%, -50%);
  padding: 0 0.8rem;
  z-index: 5;
  margin: 0 auto;
  width: 80%;
  height: 80vh;
  background-color: whitesmoke;
  border: 4px rgb(243, 173, 173) solid;
  /* border-radius: 16px; */
  display: grid;
  grid-template-columns: 50% 50%;
  grid-template-rows: 5rem auto 6rem;
  column-gap: 0.8rem;
  row-gap: 0.8rem;
  z-index: 10;
}
h2 {
  color: lightcoral;
}
.modal .close-button {
  position: fixed;
  top: 0;
  right: 0;
  height: fit-content;
  background-color: transparent;
  border: none;
  /* grid-column-start: 2;
  grid-column-end: 3;
  justify-self: flex-end; */
  margin-bottom: 0.8rem;
  text-align: center;
  font-weight: 100;
  text-shadow: 1px 1px 20px white, 0 0 20px white, -1px -1px 20px white,
    1px -1px 20px white, -1px 1px 20px white, 1px 0px 20px white,
    0px 1px 20px white;
}
.modal section {
  padding-right: 0.8rem;
}
.modal h1 {
  margin-top: 0.8rem;
}
.modal p {
}
.modal h3 {
  grid-row-start: 3;
  grid-row-end: 4;
  align-content: center;
  align-self: center;
}
.modal img {
  width: 100%;
  align-self: center;
  height: 100%;
  grid-column-start: 2;
  grid-column-end: 3;
  grid-row-start: 1;
  grid-row-end: 4;
  /* border-radius: 8px; */
}

.modal button {
  align-content: center;
  height: 100%;
  padding: 0rem 1.2rem;
  margin-bottom: 240rem;
  font-weight: bold;
  background-color: rgb(255, 167, 167);
  border: 2px rgb(206, 181, 181) solid;
  border-radius: 8px;
  cursor: pointer;
}
.modal footer {
  display: flex;
  justify-content: space-between;
  padding-bottom: 0.8rem;
}

@media (max-height: 850px) {
  .modal {
    height: 90%;
    width: 80%;
    overflow: scroll;
  }
}
</style>