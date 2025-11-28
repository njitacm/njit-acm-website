<template>
  <main class="AboutView outer-container">
    <HorizontalSection imagePath="eboard/2025/WholeBoard.jpg" objPosY="47.5%">
      <template #title>About Us</template>
      <template #content>
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
      <div class="section-container">
        <div
          v-for="year in Array.from({ length: currEboardYear - firstEboardYear }, (_, i) => i + firstEboardYear).reverse()"
          :key="year">
          <button @click="toggleEboard(year)" class="accordion-toggle" :class="{ 'selected': showEboard[year] }">
            <h3>{{ year }}</h3>
          </button>
          <TransitionExpand>
            <!-- 2024 and beyond uses list items instead of cards since they have desc -->
            <div v-if="year >= 2024" v-show="showEboard[year]" class="section-container prev-eboard list-container">
              <EBoardListItem v-for="(member, index) in getEboard(year)" :key="index" :name="member.name"
                :position="member.position" :desc="member.desc"
                :imagePath="getImagePath(member.position, member.term)" />
            </div>
            <!-- the older ones use cards since they don't have desc -->
            <div v-else v-show="showEboard[year]" class="section-container prev-eboard">
              <div class="spacer"></div>
              <div class="card-sub-container">
                <EBoardCard v-for="(member, index) in getEboard(year)" :key="index" :position="member.position"
                  :name="member.name" :imagePath="getImagePath(member.position, member.term)" />
              </div>
              <div class="spacer"></div>
            </div>
          </TransitionExpand>
          <hr v-if="year > firstEboardYear" />
        </div>
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
    // toggle methods for accordions
    toggleEboard(year) {
      this.showEboard[year] = !this.showEboard[year];
      for (let index = this.firstEboardYear; index < this.currEboardYear; index++) {
        if (index != year) {
          this.showEboard[index] = false;
        }
      }
    },
    togglePosDesc() {
      this.showPosDesc = !this.showPosDesc;
    },
    // sort into constitution order
    sortEboard(eboard) {
      const sorted = [];

      for (const pos of EBOARD_POS) {
        const officer = eboard.find(officer => officer.position.toLowerCase() === pos.toLowerCase());

        if (officer) {
          sorted.push(officer);
        }
      }

      if (sorted.length !== eboard.length) {
        console.log(`Lost members for year ${eboard[0]?.term}`);
      }

      return sorted;
    }
  },
};
</script>

<style scoped>
.curr-eboard-container {
  display: grid;
  justify-items: center;
}

.curr-eboard-sub-container,
.prev-eboard .card-sub-container,
.prev-eboard.list-container {
  display: grid;
  margin: 0 auto;
}

.curr-eboard-sub-container,
.prev-eboard .card-sub-container {
  gap: 16px;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  justify-content: center;
  justify-items: center;
}

.curr-eboard-sub-container {
  width: 100%;
}

.prev-eboard>*:first-child {
  margin-top: 32px;
}

.prev-eboard>*:last-child {
  margin-bottom: 64px;
}

.prev-eboard.list-container {
  height: fit-content;
  gap: 64px;
}

.accordion-toggle {
  font-size: 1em;
  text-align: center;
  color: var(--text-color);
  cursor: pointer;
  padding: 8px 16px;
  width: 100%;
  border: none;
  background-color: transparent;
  border-radius: var(--border-radius);
  margin-block: 8px;
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
  font-weight: bold;
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
    transition: background-color var(--hover-speed) var(--hover-func), color var(--hover-speed) var(--hover-func);
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

@media (max-width: 750px) {
  .accordion-toggle.pos-desc {
    width: 100%;
  }
}

@media (max-width: 500px) {
  .accordion-toggle.pos-desc {
    font-size: 1em;
  }
}
</style>