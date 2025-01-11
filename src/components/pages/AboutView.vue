<template>
  <div class="outer-container">
    <HorizontalSection imagePath="eboard/2024/WholeBoard.png">
      <template v-slot:title>About Us</template>
      <template v-slot:content>
        <p style="font-size: 2.5rem">
          If you're new to clubs at NJIT, the Eboard is the group of students,
          elected at the end of every Fall, that run ACM! We handle all event
          planning and daily operations of the club. The current Eboard is
          comprised on eight position listed below. Scroll down further to find
          out more about out current Eboard!
        </p>
      </template>
    </HorizontalSection>
    <!-- <div class="positions-spotlight">
      <img style="width: 25%" src="../../assets/logos/NJIT_ACM_LOGO.svg" />
      <div class="positions">
        <div
          v-for="position in eboardPositions"
          :key="position"
          class="position-buttons"
        >
          <button
            class="position-button"
            :class="{
              selected_position: selectedPosition == position,
            }"
            @click="setPosition(position)"
          >
            {{ position }}
          </button>
        </div>
      </div>
      <div class="position-desc">
        <p>{{ eboardDescs[selectedPosition] }}</p>
      </div>
    </div> -->
    <header style="margin: 1.5rem 4rem">
      <h2>Current Eboard</h2>
    </header>
    <div class="spotlight">
      <MainEboardCard
        v-for="(member, i) in currentEboard"
        :key="member"
        :position="member.Role"
        :name="member.Name"
        :personalDesc="member.desc"
        :imageName="getImagePath(member.Role, member.Term)"
        :id="i"
      >
      </MainEboardCard>
    </div>
    <div class="pastEboard">
      <div v-for="year in years" :key="year">
        <header>
          <h2>{{ year }} Eboard</h2>
          <span
            class="svg material-symbols-outlined"
            :class="{ open: showEboard[year] }"
            @click="toggleEboard(year)"
            >keyboard_arrow_down</span
          >
        </header>
        <TransitionExpand>
          <div
            class="eboardContainer"
            :ref="year.toString()"
            v-show="showEboard[year]"
          >
            <div class="spacer1"></div>
            <EBoardCard
              v-for="member in getEboard(year)"
              :key="member.Role"
              :position="member.Role"
              :positionDesc="member.desc"
              :incumbent="member.Name"
              :incumbentDesc="member.desc"
              :imageName="getImagePath(member.Role, member.Term)"
            />
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
export default {
  components: {
    EBoardCard,
    TransitionExpand,
    MainEboardCard,
    HorizontalSection,
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
        default:
          break;
      }
      return year + "/" + path;
    },
    getEboard(year) {
      return this.eboard.filter((member) => member.Term == year);
    },
    setPosition(position) {
      this.selectedPosition = position;
    },
    toggleEboard(year) {
      if (!this.showEboard[year]) {
        this.showEboard[year] = false;
      }
      this.showEboard[year] = !this.showEboard[year];
      for (let index = 2000; index <= 2023; index++) {
        if (index != year) {
          this.showEboard[index] = false;
        }
      }
    },
  },

  data() {
    return {
      selectedPosition: "President",
      showEboard: {
        2024: true
      },
      eboardPositions: [
        "President",
        "Vice President",
        "Secretary",
        "Treasurer",
        "Graphic Designer",
        "Webmaster",
        "Event Master",
        "Public Relations",
      ],
      eboardDescs: {
        President:
          "The President of ACM is responsible for leading the club. You'll see them take center stage during our general body meetings with a gavel passed down through generations of Presidents. The President presides over all functions of the club, with all other eboard officers reporting directly to and being managed by them.",

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
      currentEboard: jsonEboard.filter((member) => member.Term == "2024"),
      years: [
        //"2024",
        "2023",
        "2022",
        "2021",
        "2020",
        "2019",
        "2018",
        "2017",
        "2016",
      ],
    };
  },
};
</script>

<style scoped>
.outer-container {
  width: 80%;
  margin: 0 auto;
}
header.page-header {
  margin: 1rem auto;
  display: flex;
  justify-content: center;
}
.position-button {
  background: none;
  border: none;
  font-size: 2rem;
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
/* .positions-spotlight {
  display: flex;
  gap: 1rem;
}
.positions-spotlight img {
  min-width: 25%;
} */
/* .positions {
  min-width: 17.5%;
  display: grid;
  grid-template-rows: repeat(8, 12.5%);
} */
/* .position-buttons {
  font-size: 2rem;
  padding-left: 2rem;
}
.position-buttons label {
  padding-left: 1rem;
} */
/* .position-desc p {
  font-size: 2.5rem;
} */
.eboardContainer {
  display: grid;
  grid-template-rows: 250px 250px;
  grid-template-columns: repeat(6, 17.5%);
  row-gap: 2rem;
  margin: 0 auto;
  flex-wrap: wrap;
  margin: 0 0;
}
.eboardContainer * {
  justify-self: center;
}

/* .eboard-hidden::after {
  margin: 0;
} */
/* .eboard-show {
  animation-name: open-margin;
  animation-duration: 1s;
  animation-timing-function: ease-in-out;
  animation-fill-mode: forwards;
}
.eboard-show::after {
  margin: 2.5rem 0;
} */
* .spacer1 {
  grid-column: 1;
  grid-row: 1/3;
}
.spacer2 {
  grid-column: 6;
  grid-row: 1/3;
}
header {
  display: flex;
  justify-content: space-between;
  margin: 0 4rem;
  border-bottom: red 4px solid;
  padding-bottom: 1rem;
  padding-top: 2rem;
}
h2 {
  font-size: 48px;
}
.svg {
  font-size: 5rem;
  transition: all 0.25s ease-in-out;
  cursor: pointer;
  color: black;
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
/* @keyframes close-margin {
  100% {
    margin: 0;
  }
} */
/* @keyframes open-margin {
  100% {
    margin: 2.5rem 0;
  }
} */
@media (max-width: 1800px) {
  .spotlight {
    grid-template-columns: repeat(3, 33%);
  }
}
@media (max-width: 1700px) {
  .eboardContainer {
    margin: 0 auto;
  }
}

@media (max-width: 1700px) {
  .eboardContainer {
    grid-template-columns: repeat(5, 20%);
  }

  .spacer1 {
    grid-column: 1;
    grid-row: 1/4;
  }
  .spacer2 {
    grid-column: 5;
    grid-row: 1/4;
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
  .eboardContainer {
    justify-content: space-between;
    grid-template-columns: repeat(4, 20%);
    gap: 1rem;
  }
  .spacer1 {
    display: none;
  }
  .spacer2 {
    display: none;
  }
}
@media (max-width: 1050px) {
  .eboardContainer {
    justify-content: space-between;
    grid-template-columns: repeat(3, 30%);
    gap: 1rem;
  }
}
@media (max-width: 1000px) {
  .spotlight {
    grid-template-columns: repeat(1, 100%);
  }
}
@media (max-width: 800px) {
  .eboardContainer {
    justify-content: space-between;
    grid-template-columns: repeat(2, 40%);
    gap: 1rem;
  }
}
@media (max-width: 550px) {
  .eboardContainer {
    justify-content: space-between;
    grid-template-columns: repeat(2, 40%);
    gap: 1rem;
  }
}
@media (max-width: 550px) {
  header {
    margin: 0 1rem;
  }
  h2 {
    font-size: 3.5rem;
  }
}
/* @media (max-width: 1250px) {
  .eboardContainer {
    width: 82.5%;
  }
}

@media (max-width: 1100px) {
  .eboardContainer {
    width: 82.5%;
  }
}

@media (max-width: 600px) {
  .eboardContainer {
    width: 100%;
  }
} */
</style>