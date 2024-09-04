<template>
  <div>
    <HorizontalSection imagePath="sigs/SIG_Frontline_Meeting.jpg">
      <template v-slot:title>SIGs</template>
      <template v-slot:content>
        <p>
          Student Interest Groups, or SIGs for short, are student run
          initiatives where a student teaches about a subject they are
          passionate in, gathers a group to collectively learn a subject, or
          work on a project. SIGs run for a semester at a time, but can be
          reoccuring, and recieve funding from ACM in order to buy educational
          assets such as microcontrollers, server hosting, and single board
          computers!
        </p>
        <br />
        <p>
          SIGs are also a great way to start your own organization. You can
          utilize our resources to help you garner interest and grow your org
          before branching out into a stand-alone club! Other large
          organizations at NJIT, like SIGCHI and IGDA, were once SIGs!
        </p>
        <br />
        <p>
          To learn more about and get involved with currently running SIGs, or
          start your own, join our
          <a href="https://njit.gg/acm" target="_blank">Discord Server!</a>
        </p>
      </template>
    </HorizontalSection>
    <div class="current-sigs">
      <h3>Current SIGs</h3>
      <div class="sig-container">
        <SIGsCard
          v-for="sig in sigs"
          :key="sig.name"
          :name="sig.name"
          :desc="sig.desc"
          :leaders="sig.leaders"
          :time="sig.time"
          :loc="sig.loc"
        ></SIGsCard>
      </div>
    </div>
    <!-- <div class="past-sigs">
      <h3>Past SIGs</h3>
      <HorizontalSection imagePath="HomePage/Fall_2024_GBM.jpg">
        <template v-slot:title>SIG-GameDev &rArr; IGDA</template>
        <template v-slot:content>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis
          similique labore, tenetur incidunt eligendi possimus itaque impedit
          placeat ullam, culpa quaerat, saepe explicabo qui unde totam? Laborum
          similique minima quibusdam!
        </template>
      </HorizontalSection>
      <HorizontalSection imagePath="HomePage/Fall_2024_GBM.jpg">
        <template v-slot:title>SIG-CHI &rArr; SIGCHI</template>
        <template v-slot:content>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis
          similique labore, tenetur incidunt eligendi possimus itaque impedit
          placeat ullam, culpa quaerat, saepe explicabo qui unde totam? Laborum
          similique minima quibusdam!
        </template>
      </HorizontalSection>
    </div> -->
  </div>
</template>

<script>
import HorizontalSection from "../HorizontalSection.vue";
import SIGsCard from "../SIGsCard.vue";

export default {
  components: { SIGsCard, HorizontalSection },
  data() {
    return {
      sigs: [
        {
          name: "sig-bioinformatics",
          desc: "SIG Bioinformatics goes over bioinformatics and computational biology",
          leaders: "Olivia Gorska and Brian Ochoa",
          time: "Time TBD",
          loc: "Location TBD",
        },
        {
          name: "sig-cloud",
          desc: "SIG Cloud focuses on learning and understanding how and what cloud computing is by exploring its principles, benefits, and use-cases together.",
          leaders: "Isaac Guerrero",
          time: "Time TBD",
          loc: "Location TBD",
        },
        {
          name: "sig-embedded",
          desc: "SIG-Embedded is dedicating to exploring different embedded systems and related fields. We will be  going over computer networking, operating systems, RaspberryPi programming, CDH Engineering basics, Core Flight System Framework, and other topics.",
          leaders: "Brian Ochoa",
          time: "Wednesdays 1:00-2:00 P.M.",
          loc: "GITC 3600",
        },
        {
          name: "sig-frontline",
          desc: "SIG Frontline is all about using each other's skills and strengths to build large scale projects for ourselves and other students! The team is currently working on building a new version of NJIT's Schedule Builder app.",
          leaders: "Ethan Ho",
          time: "Tuesdays 6:00-7:00 P.M.",
          loc: "GITC 3700 / Virtual",
        },
        {
          name: "sig-web-dev",
          desc: "SIG Web Dev is all about web development, including frontend, backend. Utilizes  HTML, javascript, and CSS",
          leaders: "Tergel Sukhee",
          time: "Thursays 1:00-2:00 P.M.",
          loc: "GITC 3600",
        },
        {
          name: "sig-xr",
          desc: "SIG XR aims to explore what VR tech can do, have fun playing games, and discuss general design topics. The SIG will also delve into project set-up, programming, and designing interactions. ",
          leaders: "David Garcia",
          time: "Mondays 6:00-7:00 P.M.",
          loc: "GITC 3700",
        },
        {
          name: "sig-supercomputer",
          desc: "SIG SuperComputer is a group dedicating to learning about advanced computing, and competing in the national Student Cluster Competition.",
          leaders: "Garrett",
          time: "Time TBD",
          loc: "GITC 3600",
        },
        {
          name: "sig-cog-comp",
          desc: "SIG CogComp is a learning group for Computational Neuroscience. We will be trying to learn more about brain computation by looking at mathematical modeling, computer simulation and AI.",
          leaders: "Maciej Gajda",
          time: "Time TBD",
          loc: "Location TBD",
        },
      ],
    };
  },
};
</script>

<style scoped>
.sig-container {
  width: 90%;
  display: flex;
  gap: 3rem;
  flex-wrap: wrap;
  margin-left: auto;
  margin-right: auto;
  justify-content: center;
}
h3 {
  font-size: 6.2rem;
  text-align: center;
  margin: 2.4rem;
  text-decoration: underline;
}
p {
  font-size: 3rem;
}
</style>