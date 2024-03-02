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
    <ItemGrid :li="MinorEv" :size="3"/>
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
          name: "Spring Involvement Fair",
          timedate: "January 17th 2024 2:30-4:00",
          location: "Campus Center Atrium",
          desc: "Get involved in Student Life! Come by our booth to learn more about ACM and our partner organizations",
        },
        {
          name: "SAC Arcade Night",
          timedate: "January 24th 2024 12:00-4:00",
          location: "Campus Center Atrium",
          desc: "Join us for a day of retro fun with arcade machines!",
        },
        {
          name: "IGDA Game Jam",
          timedate: "January 26th 2024 - January 28th 2024",
          location: "TBD",
          desc: "Compete to conceptualize, design, and build a functioning game within 48hrs",
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
