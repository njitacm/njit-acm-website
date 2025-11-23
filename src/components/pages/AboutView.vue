<template>
  <main class="AboutView outer-container">
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
        <div class="curr-eboard-sub-container">
          <FlippableEBoardCard v-for="(member, index) in getEboard(currEboardYear)" :key="index" :name="member.name"
            :position="member.position" :desc="member.desc" :imagePath="getImagePath(member.position, member.term)"
            :id="index" />
        </div>
        <button @click="togglePosDesc" class="accordion-toggle pos-desc" :class="{ selected: showPosDesc }">
          Descriptions of E-Board Positions
        </button>
        <TransitionExpand>
          <div v-show="showPosDesc" class="section-container">
            <div v-for="(pos, index) in EBOARD_POS" :key="index">
              <h3>{{ pos }}</h3>
              <p class="pos-desc">{{ eboardPosDesc[pos] }}</p>
            </div>
          </div>
        </TransitionExpand>
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
          button-text="Add Calendar" />
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
          <!-- 2024 and beyond uses list items instead of cards since they have desc -->
          <div v-if="year >= 2024" v-show="showEboard[year]" class="section-container prev-eboard list-container"
            :ref="year.toString()">
            <EBoardListItem v-for="(member, index) in getEboard(year)" :key="index" :name="member.name"
              :position="member.position" :desc="member.desc" :imagePath="getImagePath(member.position, member.term)" />
          </div>
          <!-- the older ones use cards since they don't have desc -->
          <div v-else v-show="showEboard[year]" class="section-container prev-eboard" :ref="year.toString()">
            <div class="spacer-start"></div>
            <div class="card-sub-container">
              <EBoardCard v-for="(member, index) in getEboard(year)" :key="index" :position="member.position"
                :name="member.name" :imagePath="getImagePath(member.position, member.term)" />
            </div>
            <div class="spacer-end"></div>
          </div>
        </TransitionExpand>
        <hr v-if="year > firstEboardYear" />
      </div>
    </section>
  </main>
</template>

<script>
import eboardData from "../../assets/data/eboard.js";
import defaultImgPaths from "../../assets/data/eboard_default_img_paths.js";
import eboardPosDesc from "../../assets/data/eboard_pos_desc.js";
import TransitionExpand from "../TransitionExpand.vue";
import HorizontalSection from "../HorizontalSection.vue";
import EmbeddedCalendar from "../EmbeddedCalendar.vue";
import FlippableEBoardCard from "../FlippableEBoardCard.vue";
import EBoardListItem from "../EBoardListItem.vue";
import EBoardCard from "../EBoardCard.vue";

// in constituion order
const EBOARD_POS = ["President", "Vice President", "Treasurer", "Secretary", "Public Relations",
  "Webmaster", "Graphic Designer", "SIG Master", "Event Master", "Hack Master"];

export default {
  name: "AboutView",
  components: {
    EBoardCard, TransitionExpand, FlippableEBoardCard,
    HorizontalSection, EBoardListItem, EmbeddedCalendar
  },
  data() {
    return {
      EBOARD_POS,
      selectedPosition: "President",
      currEboardYear: 2025,
      firstEboardYear: 2016,
      showPosDesc: false,
      showEboard: { 2024: true },
      eboardPosDesc,
      eboardData,
    };
  },
  methods: {
    getImagePath(role, year) {
      return `${year}/${defaultImgPaths[role]}`;
    },
    getEboard(year) {
      return this.sortEboard(this.eboardData.filter((member) => member.term == year));
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
    togglePosDesc() {
      this.showPosDesc = !this.showPosDesc;
    },
    sortEboard(eboard) {
      // constitution order
      const sorted = [];

      for (const role of EBOARD_POS) {
        const officer = eboard.find(officer => officer.position.toLowerCase() === role.toLowerCase());

        if (officer) {
          sorted.push(officer);
        }
      }

      if (sorted.length !== eboard.length) {
        console.log(`Lost memebers for year ${eboard[0]?.term}`);
      }

      return sorted;
    }
  },
};
</script>

<style scoped>
.position-button {
  background: none;
  border: none;
}

.selected_position {
  transform: scale(1.05);
  color: var(--red);
}

.curr-eboard-container {
  display: grid;
  justify-items: center;
}

.curr-eboard-sub-container {
  width: 100%;
  margin: 0 auto;
  display: grid;
  gap: 16px;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  justify-content: center;
  justify-items: center;
}

.prev-eboard>*:first-child {
  margin-top: 32px;
}

.prev-eboard>*:last-child {
  margin-bottom: 64px;
}

.prev-eboard .card-sub-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 16px;
  margin: 0 auto;
  justify-items: center;
}

.prev-eboard.list-container {
  height: fit-content;
  display: grid;
  margin: 0 auto;
  gap: 64px;
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

.accordion-toggle.pos-desc {
  width: fit-content;
  font-size: 1.5em;
  color: var(--red);
  border: var(--border-width) solid var(--red);
}

.accordion-toggle.pos-desc.selected {
  color: var(--bkg-color);
}

p.pos-desc {
  margin-bottom: 16px;
}

@media (hover: hover) and (pointer: fine) {
  .accordion-toggle {
    transition: background-color var(--hover-speed) ease-in-out, color var(--hover-speed) ease-in-out;
  }

  .accordion-toggle:hover:not(.accordion-toggle.selected) {
    background-color: var(--gray);
  }

  .accordion-toggle.pos-desc:hover:not(.accordion-toggle.selected) {
    background-color: var(--light-red);
  }
}

@media (pointer: coarse) {
  .accordion-toggle:active:not(.accordion-toggle.selected) {
    background-color: var(--gray);
  }

  .accordion-toggle.pos-desc:active:not(.accordion-toggle.selected) {
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

@media (max-width: 750px) {
  .accordion-toggle.pos-desc {
    width: 100%;
  }
}
</style>