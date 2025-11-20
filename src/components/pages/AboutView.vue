<template>
  <div class="outer-container">
    <!-- <HorizontalSection :imagePath="['eboard/2024/WholeBoard.png', 'eboard/2025/treasurer.png']" -->
    <HorizontalSection :imagePath="['eboard/2025/WholeBoard.jpg', 'eboard/2024/WholeBoard.jpg']" :slideDuration="5000">
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
      <div class="section-container spotlight">
        <MainEboardCard v-for="(member, i) in getEboard(currEboardYear)" :key="member" :position="member.Role"
          :name="member.Name" :personalDesc="member.Desc" :imageName="getImagePath(member.Role, member.Term)" :id="i">
        </MainEboardCard>
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
    <div class="pastEboard">
      <div v-for="year in years" :key="year">
        <header @click="toggleEboard(year)" :class="{
          'eboard-header': true,
          'selected': showEboard[year]
        }">
          <h1>{{ year }} Eboard</h1>
          <span class="svg material-symbols-outlined" :class="{ open: showEboard[year] }">keyboard_arrow_down</span>
        </header>
        <TransitionExpand :duration="500">
          <div class="eboard-container" :ref="year.toString()" v-show="showEboard[year]" v-if="year < 2024">
            <div class="spacer1"></div>
            <div class="container">
              <EBoardCard v-for="member in getEboard(year)" :key="member.Role" :position="member.Role"
                :incumbent="member.Name" :incumbentDesc="member.Desc"
                :imageName="getImagePath(member.Role, member.Term)" />
            </div>
            <div class="spacer2"></div>
          </div>
          <!-- 2024 and beyond uses list items instead of cards -->
          <div v-else class="eboard-list-container" :ref="year.toString()" v-show="showEboard[year]">
            <div class="spacer1"></div>
            <div>
              <EBoardListItem v-for="member in getEboard(year)" class="eboard-list-item" :key="member.Role"
                :position="member.Role" :positionDesc="member.Desc" :incumbent="member.Name"
                :incumbentDesc="member.Desc" :imageName="getImagePath(member.Role, member.Term)">
              </EBoardListItem>
            </div>
            <div class="spacer2"></div>
          </div>
        </TransitionExpand>
      </div>
    </div>
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

export default {
  components: {
    EBoardCard,
    TransitionExpand,
    MainEboardCard,
    HorizontalSection,
    EBoardListItem,
    EmbeddedCalendar
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

      for (const role of this.eboardPositions) {
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

  data() {
    return {
      selectedPosition: "President",
      currEboardYear: 2025,
      years: [
        // "2025",
        "2024",
        "2023",
        "2022",
        "2021",
        "2020",
        "2019",
        "2018",
        "2017",
        "2016",
      ],
      showEboard: {
        2024: true
      },
      // positions in constitution order
      eboardPositions: [
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
      ],
      // TODO: add section with general descriptions
      eboardDescs: {
        President:
          "The President of ACM is responsible for leading the club. You'll see them take center stage during our general body meetings with a gavel passed down through generations of Presidents. The President presides over all functions of the club, with all other e-board officers reporting directly to and being managed by them.",

        "Vice President":
          "The Vice-President of ACM the second in command in the organization. They work directly alongside the President and take over for them if need be. They are also responsible for handling all tutoring done by ACM.",

        Secretary:
          "ACM's secretary managed all our out-of-school connections. They talk to outside organizations for the purposes of planning events and gathering sponsors.",

        Treasurer:
          "ACM's treasurer manages the club's budget and finances. They are responsible for procuring funding and overseeing the spending of that funding. It's thanks to them that we're able to support our SIGs financially, fund large-scale events, and buy computer parts for the office.",

        "Graphic Designer":
          "ACM's Graphic Designer oversees the creation of all promotional material and other art-work for the club, including SIG posters, social media posts, and event fliers. We have them to thank for much of our most iconic imagery, including the club logo and it's many variations.",

        Webmaster:
          "The Webmaster of ACM is responsible for building and maintaining ACM's websites, namely this ACM site, the Hacknjit site, and the JerseyCTF site. The websites are built in golang, vue, and bootstrap and can be viewed on our github.",

        "Event Master":
          "The event master is responsible for managing ACM's Special Interest Groups (SIGs) and is in charge of minor events. Organizations should feel free to reach out for collaboration!",

        // TODO - Write PR Position Desc
        "Public Relations":
          "ACM's Head of Public Relations is responsible for all advertisting, including running our various social media accounts, putting up posters, and spreading ACM news by word of mouth. ",
      },
      eboard: jsonEboard,

    };
  },
};
</script>

<style scoped>
.outer-container {
  margin-inline: auto;
}

header.page-header {
  margin: 1rem auto;
  display: flex;
  justify-content: center;
}

.position-button {
  background: none;
  border: none;
}

.selected_position {
  transform: scale(1.05);
  color: red;
}

.spotlight {
  margin: 0 auto;
  display: grid;
  row-gap: 2rem;
  grid-template-columns: repeat(auto-fit, 25%);
  justify-content: center;
  justify-items: center;
}

.eboard-container>div {
  display: grid;
  /* grid-template-rows: 250px 250px; */
  grid-template-columns: repeat(4, auto);
  gap: 2rem;
  width: 90%;
  margin: 0 auto;
  justify-content: space-evenly;
}

.eboard-container>div * {
  justify-self: center;
}

.eboard-list-container>div {
  display: grid;
  width: 90%;
  margin: 0 auto;
  grid-template-columns: repeat(2, auto);
  gap: 2rem;
  justify-content: space-evenly;
}


.spacer1 {
  height: 2rem;
}

.spacer2 {
  height: 4rem;
}

header {
  display: flex;
  justify-content: space-between;
  margin: 0 4rem;
  border-bottom: red 4px solid;
  padding-bottom: 1rem;
  padding-top: 2rem;
}

.eboard-header {
  transition: background-color var(--hover-speed) ease-in-out, color var(--hover-speed) ease-in-out;
  border-radius: 1rem;
  padding: 1em;
  cursor: pointer;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  display: flex;
  align-items: center;
}

.eboard-header.selected {
  background-color: var(--red);
  color: var(--bkg-color);
}

@media (hover: hover) and (pointer: fine) {
  .eboard-header:hover:not(.eboard-header.selected) {
    background-color: var(--light-red);
  }
}

@media (pointer: coarse) {
  .eboard-header:active:not(.eboard-header.selected) {
    background-color: var(--light-red);
  }
}

.eboard-header.selected>.svg {
  color: var(--bkg-color);
}

.svg {
  transition: all 0.25s ease-in-out;
  cursor: pointer;
  align-self: center;
}

.open {
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
  .spotlight {
    grid-template-columns: repeat(3, 33%);
  }
}

@media (max-width: 1700px) {
  .eboard-container>div {
    grid-template-columns: repeat(3, auto);
  }
}

@media (max-width: 1400px) {
  .spotlight {
    grid-template-columns: repeat(2, 50%);
  }
}

@media (max-width: 1350px) {
  .card {
    min-width: 30%;
  }

  .eboard-container>div {
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
  .spotlight {
    grid-template-columns: repeat(1, 100%);
  }
}

@media (max-width: 750px) {
  header {
    margin: 0 1rem;
  }

  .eboard-container>div {
    grid-template-columns: repeat(1, auto);
  }

  .eboard-list-container>div {
    grid-template-columns: repeat(1, auto);
  }
}
</style>