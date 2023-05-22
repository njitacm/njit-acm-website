<template>
  <div>
    <h1 class="m-0 title">Events</h1>
    <h6 class="subtitle">
      Our club runs a variety of events, including our biannual hackathon and
      capture the flag competition. We hope you'll join us in one of our events!
    </h6>
    <b-row>
      <b-col>
        <MajEvent :ev="HackNJIT" />
      </b-col>
      <b-col>
        <MajEvent :ev="JerseyCTF" />
      </b-col>
    </b-row>
    <hr />
    <h1 style="text-align: center">Upcoming</h1>
    <ItemGrid :li="MinorEv" :size="2"/>
  </div>
</template>

<script>
import MajEvent from "../components/MajEvent";
import ItemGrid from "../components/ItemGrid";

export default {
  components: {
    MajEvent,
    ItemGrid,
  },
  data() {
    return {
      HackNJIT: {
        name: "HackNJIT",
        desc: "HackNJIT is a 24-hour hackathon at the New Jersey Institute of Technology, run by its ACM student chapter in conjunction with the Ying Wu College of Computing.",
        siteURL: "https://hacknjit.org/",
      },
      JerseyCTF: {
        name: "JerseyCTF",
        desc: "JerseyCTF is a beginner-friendly Capture the Flag competition that aims to inspire interest in cybersecurity. Hosted by the NJIT ACM and NICC organizations and NJIT SCI program, it is geared towards students, beginners, and professionals alike.",
        siteURL: "https://jerseyctf.com/",
      },
      MinorEv: [
        {
          name: "BattleSnake",
          timedate: "March 25th-26th 3:00-6:00",
          location: "GITC 1400",
          desc: "Battlesnake is a multiplayer programming game where your code is your controller. Piloted by a web server you build, and the code you write, Battlesnakes move to find food, avoid others, and stay alive. All you need is a web server that responds to the Battlesnake API.",
        },
      ],
    };
  },
};
</script>

<style scoped>
.col {
  display: flex;
}
</style>
