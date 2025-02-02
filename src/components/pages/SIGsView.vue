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
      <h3 class="section-header">Current SIGs</h3>
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
  </div>
</template>

<script>
import HorizontalSection from "../HorizontalSection.vue";
import SIGsCard from "../SIGsCard.vue";
import sigData from '../../assets/data/sigs.js';

export default {
  components: { SIGsCard, HorizontalSection },
  data() {
    return {
      sigs: sigData['sp2025']
    };
  },
};
</script>

<style scoped>
.outer-container {
  margin: 0 auto;
  margin-bottom: 10rem;
}
.sig-container {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(4, 25%);
  /* grid-template-columns: repeat(3, minmax(0, 1fr)); */
  /* grid-template-rows: repeat(3, minmax(0, 1fr)); */
  /* grid-template-rows: repeat(2, 50%); */
  gap: 2rem;
  flex-wrap: wrap;
  margin-left: auto;
  margin-right: auto;
  justify-content: center;
}
/* h3 {
  font-size: 6.2rem;
  text-align: center;
  margin: 2.4rem;
} */
p {
  font-size: 3rem;
}
@media (max-width: 1400px) {
  .sig-container {
    grid-template-columns: repeat(3, 33.33%);
  }
}
@media (max-width: 900px) {
  .sig-container {
    grid-template-columns: repeat(2, 50%);
    margin: 0 auto;
  }
}
</style>