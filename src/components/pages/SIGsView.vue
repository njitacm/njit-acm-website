<template>
  <div class="outer-container">
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
          :filename="sig.filename"
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
          name: "sig-print",
          desc: "A place to discuss and learn about 3D-Printers and 3D-Printing. From maintenance to modeling, if you have any interest in the hobby, feel free to stop by!",
          leaders: "Max Hammond",
          time: "Mondays 3:00-4:00 P.M.",
          loc: "GITC 3700",
          filename: "sig-print.png",
        },
        {
          name: "sig-ai",
          desc: "Join us for this semester's project, where we will be coding a transformer model and utilizing its different capabilities, like text summarization!",
          leaders: "Ashwin Selvendran",
          time: "Thursdays 11:30-1:00 P.M.",
          loc: "GITC 3700",
          filename: "sig-ai.png",
        },
        {
          name: "sig-embedded",
          desc: "We'll cover serial communications protocols, the basics of microcontrollers, and the importance of C/C++ within this and more!",
          leaders: "Mathew Padilla",
          time: "Fridays 2:15-3:15 P.M.",
          loc: "GITC 3700",
          filename: "sig-embedded.png",
        },
        {
          name: "sig-emulation-development",
          desc: "Interested in learning about developing emulators to play games like Zelda, Kirby, Mario, etc? Build one with us this semester and leave with a great resume project.",
          leaders: "Yonden Sawyers",
          time: "Tuesdays 5:00-6:00 P.M.",
          loc: "GITC 3700",
          filename: "sig-emu.png",
        },
        {
          name: "sig-data-engineering",
          desc: "Join our SIG and jump into the essentials of data engineering, including data pipelines, ETL processes, and how to design data to be utilized by ML models.",
          leaders: "Kamil Arif",
          time: "Tuesdays 3:00-4:00 P.M.",
          loc: "Online",
          filename: "sig-data.png",
        },
        {
          name: "sig-quantum",
          desc: "Learn all about quantum computing! We're open to all experience levels, so come join to learn and play around with some really cool stuff!",
          leaders: "Sameer Butt",
          time: "Thursdays 5:30-6:00 P.M.",
          loc: "GITC 3700",
          filename: "sig-quantum.png",
        },
        {
          name: "sig-supercomputer",
          desc: "SIG-Supercomputer is a group dedicating to learning about advanced computing, and competing in the national Student Cluster Competition.",
          leaders: "Garrett Gonzalez-Rivas",
          time: "Time TBA",
          loc: "TBA",
          filename: "sig-supercomputer.png",
        },
        {
          name: "sig-vue",
          desc: "Sig-Vue is an ACM Special Interest Group that focuses on teaching the Vue web development framework through a series of workshops.",
          leaders: "Abdullah Imran",
          time: "Fridays 4:00-5:00 P.M.",
          loc: "GITC 3700",
          filename: "sig-vue.svg",
        },
      ],
    };
  },
};
</script>

<style scoped>
.outer-container {
  width: 80%;
  margin: 0 auto;
  margin-bottom: 10rem;
}
.sig-container {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(3, 33%);
  grid-template-rows: 700px 700px 700px;
  row-gap: 8rem;
  column-gap: 5rem;
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
@media (max-width: 1400px) {
  .sig-container {
    grid-template-columns: repeat(2, 50%);
  }
}
@media (max-width: 900px) {
  .sig-container {
    grid-template-columns: repeat(1, 100%);
    margin: 0 auto;
  }
}
</style>