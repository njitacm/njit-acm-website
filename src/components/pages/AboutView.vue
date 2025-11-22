<template>
  <div class="outer-container">
    <HorizontalSection imagePath="eboard/2025/WholeBoard.jpg" objPosY="47.5%">
      <template v-slot:title>About Us</template>
      <template v-slot:content>
        <p>
          If you're new to clubs at NJIT, the e-board is the group of students,
          elected at the end of every Fall, that run ACM! We handle all event
          planning and daily operations of the club. The current e-board is
          comprised on eight position listed below. Scroll down further to find
          out more about out current e-board!
        </p>
      </template>
    </HorizontalSection>
    <section>
      <h2 class="section-header">Current E-Board</h2>
      <div class="section-container curr-eboard-container">
        <MainEboardCard v-for="(member, index) in getEboard(currEboardYear)" :key="index" :name="member.Name"
          :position="member.Role" :desc="member.Desc" :imagePath="getImagePath(member.Role, member.Term)" :id="index" />
      </div>
    </section>
    <section>
      <h2 class="section-header">Office Hours</h2>
      <div class="section-container office-hours">
        <p>Every e-board member has office hours at the ACM Office (located in GITC 3700).
          Check out the calendar below for the schedule and feel free to stop by and have a chat!</p>
        <EmbeddedCalendar
          src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=America%2FNew_York&mode=WEEK&title=ACM%20E-Board%20Office%20Hours&src=Y19hMjMwMTgzOGVhZTU0YzE1YjkzODk0ZTE0ZTUxMWEyNmNkZWEwMGUyN2VmNThjNjIxNjYyMjNkMjk2NDg0M2MyQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%233F51B5"
          href="https://calendar.google.com/calendar/u/0?cid=Y19hMjMwMTgzOGVhZTU0YzE1YjkzODk0ZTE0ZTUxMWEyNmNkZWEwMGUyN2VmNThjNjIxNjYyMjNkMjk2NDg0M2MyQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20"
          buttonText="Add Calendar"></EmbeddedCalendar>
      </div>
    </section>
    <section>
      <h2 class="section-header">Previous E-Board</h2>
      <div
        v-for="year in Array.from({ length: currEboardYear - firstEboardYear }, (_, i) => i + firstEboardYear).reverse()"
        :key="year">
        <button @click="toggleEboard(year)" class="accordion-toggle" :class="{ 'selected': showEboard[year] }">
          {{ year }} Eboard
        </button>
        <TransitionExpand :duration="500">
          <!-- 2024 and beyond uses list items instead of cards -->
          <div v-if="year >= 2024" class="prev-eboard list-container" :ref="year.toString()" v-show="showEboard[year]">
            <EBoardListItem v-for="member in getEboard(year)" :key="member.Role" :name="member.Name"
              :position="member.Role" :desc="member.Desc" :imagePath="getImagePath(member.Role, member.Term)" />
          </div>
          <div v-else class="prev-eboard card-container" :ref="year.toString()" v-show="showEboard[year]">
            <EBoardCard v-for="member in getEboard(year)" :key="member.Role" :position="member.Role"
              :incumbent="member.Name" :incumbentDesc="member.Desc"
              :imageName="getImagePath(member.Role, member.Term)" />
          </div>
        </TransitionExpand>
        <hr v-if="year > firstEboardYear" />
      </div>
    </section>
  </div>
</template>

<script>
import "material-symbols";
import EBoardCard from "../EBoardCard.vue";
import jsonEboard from "../../assets/data/eboard.js";
import TransitionExpand from "../TransitionExpand.vue";
import MainEboardCard from "../MainEboardCard.vue";
import HorizontalSection from "../HorizontalSection.vue";
import EBoardListItem from "../EBoardListItem.vue";
import EmbeddedCalendar from "../EmbeddedCalendar.vue";

const EBOARD_POS = [
  "President",
  "Vice President",
  "Treasurer",
  "Secretary",
  "Public Relations",
  "Webmaster",
  "Graphic Designer",
  "SIG Master",
  "Event Master",
  "Hack Master"
];

export default {
  name: "AboutView",
  components: {
    EBoardCard,
    TransitionExpand,
    MainEboardCard,
    HorizontalSection,
    EBoardListItem,
    EmbeddedCalendar
  },
  data() {
    return {
      selectedPosition: "President",
      currEboardYear: 2025,
      firstEboardYear: 2016,
      showEboard: {
        2024: true
      },
      // TODO: add section with general descriptions
      eboardDescs: {

      },
      eboard: jsonEboard,

    };
  },
  methods: {
    getImagePath(role, year) {
      let path = "webmaster.png";
      switch (role) {
        case "President":
          path = "president.png";
          break;
        case "Vice President":
          path = "vice_president.png";
          break;
        case "Treasurer":
          path = "treasurer.png";
          break;
        case "Secretary":
          path = "secretary.png";
          break;
        case "Public Relations":
          path = "public_relations.png";
          break;
        case "Graphic Designer":
          path = "graphic_designer.png";
          break;
        case "SIG Master":
          path = "sig_master.png";
          break;
        case "Event Master":
          path = "event_master.png";
          break;
        case "Hack Master":
          path = "hack_master.png";
          break;
        default:
          break;
      }

      return year + "/" + path;
    },
    getEboard(year) {
      return this.sortEboard(this.eboard.filter((member) => member.Term == year));
    },
    setPosition(position) {
      this.selectedPosition = position;
    },
    toggleEboard(year) {
      if (!this.showEboard[year]) {
        this.showEboard[year] = false;
      }

      this.showEboard[year] = !this.showEboard[year];
      for (let index = 2000; index < this.currEboardYear; index++) {
        if (index != year) {
          this.showEboard[index] = false;
        }
      }
    },
    sortEboard(eboard) {
      // constitution order
      const sorted = [];

      for (const role of EBOARD_POS) {
        const officer = eboard.find(officer => officer.Role.toLowerCase() === role.toLowerCase());

        if (officer) {
          sorted.push(officer);
        }
      }

      if (sorted.length !== eboard.length) {
        console.log(`Lost memebers for year ${eboard[0]?.Term}`);
      }

      return sorted;
    }
  },
};
</script>

<style scoped>
.outer-container {
  margin-inline: auto;
}

.position-button {
  background: none;
  border: none;
}

.selected_position {
  transform: scale(1.05);
  color: var(--red);
}

.curr-eboard-container {
  margin: 0 auto;
  display: grid;
  gap: 16px;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  justify-content: center;
  justify-items: center;
}

.prev-eboard > *:first-child {
  margin-top: 32px;
}

.prev-eboard > *:last-child {
  margin-bottom: 64px;
}

.prev-eboard.card-container>div {
  display: grid;
  /* grid-template-rows: 250px 250px; */
  grid-template-columns: repeat(4, auto);
  gap: 2rem;
  width: 90%;
  margin: 0 auto;
  justify-content: space-evenly;
}

.prev-eboard.card-container>div * {
  justify-self: center;
}

.prev-eboard.list-container {
  width: calc(100% - var(--indentation));
  height: fit-content;
  display: grid;
  margin: 0 auto;
  gap: 64px;
  justify-content: space-evenly;
}

.accordion-toggle {
  font-size: 2em;
  text-align: center;
  color: var(--text-color);
  cursor: pointer;
  padding: 0 32px;
  width: 100%;
  border: none;
  background-color: transparent;
  border-radius: var(--border-radius);
  margin-block: 8px;
  padding-block: 8px;
}

hr {
  border: none;
  border-bottom: var(--gray) var(--border-width) solid;
}

.accordion-toggle.selected {
  background-color: var(--red);
  color: var(--bkg-color);
}

@media (hover: hover) and (pointer: fine) {
  .accordion-toggle {
    transition: background-color var(--hover-speed) ease-in-out, color var(--hover-speed) ease-in-out;
  }

  .accordion-toggle:hover:not(.accordion-toggle.selected) {
    background-color: var(--gray);
  }
}

@media (pointer: coarse) {
  .accordion-toggle:active:not(.accordion-toggle.selected) {
    background-color: var(--light-red);
  }
}

.accordion-toggle.selected>.arrow {
  color: var(--bkg-color);
}

.arrow {
  cursor: pointer;
  align-self: center;
  font-size: 2em;
}

.arrow.open {
  transform: rotate(180deg);
}

.v-enter-active,
.v-leave-active {
  transition: all 1s ease-in-out;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
  transform: translateY(-60px);
}

@media (max-width: 1800px) {
  .curr-eboard-container {
    grid-template-columns: repeat(3, 33%);
  }
}

@media (max-width: 1700px) {
  .prev-eboard.card-container>div {
    grid-template-columns: repeat(3, auto);
  }
}

@media (max-width: 1400px) {
  .curr-eboard-container {
    grid-template-columns: repeat(2, 50%);
  }
}

@media (max-width: 1350px) {
  .card {
    min-width: 30%;
  }

  .prev-eboard.card-container>div {
    grid-template-columns: repeat(2, auto);
  }

  .spacer1 {
    display: none;
  }

  .spacer2 {
    display: none;
  }
}

@media (max-width: 1000px) {
  .curr-eboard-container {
    grid-template-columns: repeat(1, 100%);
  }
}

@media (max-width: 750px) {
  header {
    margin: 0 1rem;
  }

  .prev-eboard.card-container>div {
    grid-template-columns: repeat(1, auto);
  }
}
</style>