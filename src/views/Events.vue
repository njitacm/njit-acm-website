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
          name: "Guardian Life: AI + Automation",
          timedate: "October 11th 2023 2:30-3:15",
          location: "GITC 3600",
          desc: "Learn how artificial intelligence can be applied to enhance and scale with automation!",
        },
        {
          name: "Guardian Life: Security",
          timedate: "October 25th 2023 2:30-3:15",
          location: "GITC 3700",
          desc: "Join us to see how cybersecurity practices are implemented to protect important data!",
        },
        {
          name: "Guardian Life: Networking",
          timedate: "November 15th 2023 2:30-3:15",
          location: "GITC 3700",
          desc: "Learn about the inner workings of computer networks!",
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
