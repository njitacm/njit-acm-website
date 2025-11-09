<template>
  <div>
    <HomePageHeader />
    <!-- Horizontal Sections -->
    <section class="outer-container container">
      <HorizontalSection imagePath="HomePage/Fall_2024_GBM.jpg" class="border-bottom" :keepFloating="true">
        <template v-slot:title>Who We Are</template>
        <template v-slot:content>
          We are a part of the national organization, Association for Computing
          Machinery, which is the world's largest educational computer science
          organization. ACM is divided up into many student chapters, and we are
          the one that is located at, you guessed it, NJIT! If you're a student
          studying CS, IT, IS, or any other computer-related field, chances are
          that you'll find joining ACM will provide you with many opportunities
          and resources that will help you in your career. Whether you join for
          tutoring, use of ACM's vast array of online resources, or just to
          connect with fellow programmers, ACM is a great organization to be a
          part of.
        </template>
      </HorizontalSection>
      <HorizontalSection imagePath="HomePage/HackNJIT2023Crowd.jpg" class="border-bottom" :keepFloating="true">
        <template v-slot:title>What We Offer</template>
        <template v-slot:content>
          NJIT ACM offers many things to club members and other students.
          Firstly, we provision free tutoring for CS, IT, and IS classes,
          offering assistance to students of all levels. We also run SIGs, or
          special interest groups, which are student run initiatives dedicated
          to teaching various computer science topics, or creating various
          computer science-related projects. and works closely with the NJIT
          YWCC department to host a number events including HackNJIT, NJIT's own
          24-hour hackathon. We work closely with YWCC to host a number of
          events, including HackNJIT, NJIT's own 24-hour hackathon, and
          JerseyCTF, a beginner-friendly Capture the Flag competition. More
          information on any of these services can be found on the site, or by
          asking any e-board member.
        </template>
      </HorizontalSection>
      <HorizontalSection imagePath="HomePage/TheOffice.jpg" class="border-bottom" :keepFloating="true">
        <template v-slot:title>The Office</template>
        <template v-slot:content>
          While ACM is a professional organization, we also pride ourselves on
          providing a fun, safe, and friendly work environment. The ACM office,
          located at GITC 3704, is a place we maintain for people to go do work,
          relax after a hard day of work, or even play games. The office is an
          excellent place to get to know the e-board and other members of the
          club or to just hang out there. We urge all students to take advantage
          of our professional services, and to join our passionate and friendly
          community. We hope to see you around.
        </template>
      </HorizontalSection>
    </section>

    <!-- FAQ -->
    <FAQ />
  </div>
</template>

<script>
import HomePageHeader from "../HomePageHeader.vue";
import HorizontalSection from "../HorizontalSection.vue";
import FAQ from "../FAQ.vue";
export default {
  name: "HelloWorld",
  props: {
    msg: String,
  },
  components: { HomePageHeader, HorizontalSection, FAQ },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.container {
  margin-inline: auto;
  margin-bottom: 0;
}

.border-bottom {
  border-bottom: 4px solid red;
}
</style>
