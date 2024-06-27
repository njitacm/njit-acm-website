<template>
  <div>
    <EventModal v-if="modalOpen" :event="event" @close-modal="closeModal" />
    <div class="container">
      <section class="date">
        <h4>{{ month }}</h4>
        <h3>{{ day }}</h3>
      </section>
      <main>
        <section class="event-desc">
          <h2 class="event-type">{{ type || "Miscellaneous" }}</h2>
          <h1>{{ name }}</h1>
          <div class="desc">
            <p id="element-to-truncate">{{ desc }}</p>
          </div>
        </section>
        <aside>
          <div class="wherewhen">
            {{ month }} {{ day }} {{ year }} @ {{ location }}
          </div>
          <button @click="openModal" v-if="link && imgName">Learn More</button>
        </aside>
      </main>
    </div>
  </div>
</template>

<script>
import EventModal from "./EventModal.vue";
export default {
  components: {
    EventModal,
  },
  props: {
    event: Object,
    name: String,
    desc: String,
    day: Number,
    month: String,
    year: Number,
    location: String,
    type: String,
    link: String,
    imgName: String,
  },
  data() {
    return {
      modalOpen: false,
      windowWidth: window.innerWidth,
    };
  },
  onResize() {
    this.windowWidth = window.innerWidth;
  },
  methods: {
    openModal() {
      window.open(this.$props.link);
    },
    closeModal() {
      this.modalOpen = false;
    },
    go(link) {
      window.open(link);
    },
  },
};
</script>

<style scoped>
/*
- Font sizes (px)
10 / 12 / 14 / 16 / 18 / 20 / 24 / 30 / 36 / 44 / 52 / 62 / 74/ 86 / 98

- Spacing system (px)
2 / 4 / 8 / 12 / 16 / 24 / 32 /48 /64 /80 /96 / 128
*/

.container {
  margin: 1.2rem auto;
  width: 60%;
  display: flex;
  height: 19rem;
}

.date {
  flex: 1;
  display: flex;
  flex-direction: column;
  background-color: lightcoral;
  text-align: center;
  justify-content: center;
  border: 2px rgb(206, 181, 181) solid;
  border-right: none;
  border-radius: 8px 0 0 8px;
}
h3 {
  font-size: 4.4rem;
}
h4 {
  font-size: 3.6rem;
}

main {
  border: 2px rgb(206, 181, 181) solid;
  border-left: none;
  border-radius: 0 8px 8px 0;
  padding: 0.8rem 1.8rem;
  flex: 7;
  display: flex;
  flex-direction: column;
  background-color: rgb(245, 235, 235);
  justify-content: space-between;
}
.event-type {
  font-size: 2.4rem;
  color: lightcoral;
}
main section h1 {
  font-size: 4.4rem;
  padding: 0.8rem 0;
  height: 6rem;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.desc {
  display: inline-grid;
}

main p {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  font-size: 2.4rem;
}

.event-desc {
  display: inline-grid;
}

aside {
  margin-top: 0.8rem;
  display: flex;
  justify-self: flex-end;
  justify-content: space-between;
}

.wherewhen {
  width: fit-content;
  padding: 0.8rem;
  font-size: 2rem;
  font-weight: bold;
  background-color: lightpink;
  border: 2px lightgrey solid;
  border-radius: 8px;
}

button {
  width: fit-content;
  padding: 0.8rem;
  font-size: 2rem;
  font-weight: bold;
  background-color: rgb(255, 167, 167);
  border: 2px rgb(206, 181, 181) solid;
  border-radius: 8px;
  cursor: pointer;
}

@media (max-width: 1400px) {
  .container {
    width: 75%;
  }
}
@media (max-width: 1250px) {
  .container {
    width: 90%;
  }
}
@media (max-width: 900px) {
  .container {
    flex-direction: column;
    height: fit-content;
  }
  main section h1 {
    font-size: 4.4rem;
    padding: 0.8rem 0;
    height: fit-content;
    overflow: initial;
    white-space: normal;
  }
  main p {
    white-space: normal;
    overflow: initial;
    font-size: 2.4rem;
  }
  main {
    border-radius: 0px 0px 8px 8px;
    border: 2px rgb(206, 181, 181) solid;
  }
  .date {
    border: 2px rgb(206, 181, 181) solid;
    border-bottom: none;
    border-radius: 8px 8px 0 0;
  }
}

@media (max-width: 500px) {
  aside {
    flex-direction: column;
  }
  aside * {
    width: 100%;
  }
  .wherewhen {
    width: 100%;
    text-align: center;
  }
}
</style>