<template>
  <div>
    <HomePageHeader />
    <!-- Horizontal Sections -->
    <section class="outer-container">
      <HorizontalSection
        imagePath="HomePage/Fall_2024_GBM.jpg"
        class="border-bottom"
        :keepFloating="true"
      >
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
      <HorizontalSection
        imagePath="HomePage/HackNJIT2023Crowd.jpg"
        class="border-bottom"
        :keepFloating="true"
      >
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
      <HorizontalSection
        imagePath="HomePage/TheOffice.jpg"
        class="border-bottom"
        :keepFloating="true"
      >
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
    <FAQ :qas="qas" :cols="2"></FAQ>
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
  data() {
    return {
      qas: [
        {
          title: "How Can I Become A Member?",
          content:
            " To be considered an active member of ACM all you have to do is come regularly to our general body meetings! Being an active member gives you a few perks including the ability to run for e-board, and to vote in elections. You can also be a part of ACM by coming to our office or volunteering at/going to our many events. NOTE: To use ACM's online resources, you must sign up for ACM's National Membership. Being a member of ACM National costs a yearly fee and provides you with many professional resources. YOU DO NOT HAVE TO BE PART OF ACM NATIONAL TO BE PART OF OUR BRANCH. ",
        },
        {
          title: "What Do You Offer At Meetings?",
          content:
            " General body meetings are a place for us to share club news and to help members better get to know each other. Each meeting will largely consist of us sharing events run by us or our partner organizations. Afterwards we sometimes run computer science related discussions or challenges to do before the meeting officially ends. At this point members can talk amongst themselves or with the e-board if they wish to stay. These meetings are also the way we determine active members, who will be eligible to run for e-board or vote. ",
        },
        {
          title: "What's The Time and Location of Meetings?",
          content:
            "Our meetings are currently held every Friday at 12 pm in GITC 3600. You can join our Highlander Hub or our Discord to be notified when general body meetings happen, or other important events. \n If you happen to miss a meeting, we keep all our meeting slides for the semester in a channel on our discord for anyone to download and view. ",
        },
        {
          title: "What Are The Office Rules?",
          content:
            "Just be courteous. While there is an official set of rules in the office, most of it comes down to common sense behavior, such as not being too loud, or to not touch anyone else's belongings without their permission. On that note we have 24/7 video surveilance in the office, so if anything is moved without permission, stolen or you break a rule when an e-board member isn't there, we will know who did it.",
        },
        {
          title: "I Still Have A Question!",
          content:
            "Any e-board member will be happy to help! You can come to our office at GITC 3704 anytime to find us, or you can ask your question through email (acm@njit.edu) or on our Discord.",
        },
      ],
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.outer-container {
  margin-inline: auto;
}
.border-bottom {
  border-bottom: 4px solid red;
}
</style>
