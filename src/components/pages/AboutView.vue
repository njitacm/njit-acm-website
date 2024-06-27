<template>
  <div>
    <EboardSpotlight
      id="spotlight"
      :position="selectedEboard.Role"
      :positionDesc="eboardDescs[selectedEboard.Role]"
      :incumbent="selectedEboard.Name"
      :incumbentDesc="selectedEboard.desc"
      :imageName="getImagePath(selectedEboard.Role, selectedEboard.Term)"
    ></EboardSpotlight>
    <h2>2024 Eboard</h2>
    <div class="eboardContainer">
      <EBoardCard
        @selectEboard="setSelected"
        v-for="member in currentEboard"
        :key="member.Role"
        :position="member.Role"
        :positionDesc="member.desc"
        :incumbent="member.Name"
        :incumbentDesc="member.desc"
        :imageName="getImagePath(member.Role, member.Term)"
        :isSelected="member.isSelected"
        currEboard="true"
      />
    </div>
    <div class="pastEboard">
      <div v-for="year in years" :key="year">
        <h2>{{ year }} Eboard</h2>
        <div class="eboardContainer">
          <EBoardCard
            v-for="member in getEboard(year)"
            :key="member.Role"
            :position="member.Role"
            :positionDesc="member.desc"
            :incumbent="member.Name"
            :incumbentDesc="member.desc"
            :imageName="getImagePath(member.Role, member.Term)"
            :isSelected="member.isSelected"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import EBoardCard from "../EBoardCard.vue";
import EboardSpotlight from "../EboardSpotlight.vue";
import jsonEboard from "../../assets/data/eboard.js";

export default {
  components: {
    EBoardCard,
    EboardSpotlight,
  },
  methods: {
    setSelected(position) {
      this.selectedEboard.isSelected = false;
      this.selectedEboard = this.currentEboard.filter(
        (member) => member.Role === position && member.Term == "2024"
      )[0];
      this.selectedEboard.isSelected = true;
      document.getElementById("spotlight").scrollIntoView();
    },
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
  },

  data() {
    let currEboard = jsonEboard.filter((member) => member.Term == "2024");
    currEboard[0].isSelected = true;
    return {
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
      selectedEboard: currEboard[0],
      currentEboard: currEboard,
      years: ["2023", "2022", "2021", "2020", "2019", "2018", "2017", "2016"],
    };
  },
};
</script>

<style scoped>
.eboardContainer {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  width: 95%;
  margin: 0 auto;
}
h2 {
  margin: 2.5rem 4rem;
  font-size: 48px;
  border-bottom: red 4px solid;
}

@media (max-width: 1700px) {
  .eboardContainer {
    width: 70%;
  }
}

@media (max-width: 1250px) {
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
}
</style>