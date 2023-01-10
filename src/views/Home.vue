<template>
  <div>
    <h1 class="title">Welcome to NJIT ACM</h1>
    <b-row style="margin: 0px">
      <b-col offset="0" offset-sm="2" cols="12" sm="8">
        <b-carousel
          class="im"
          id="carousel-1"
          v-model="slide"
          controls
          responsive
          indicators
        >
          <!-- Slides with image only -->
          <b-carousel-slide
            v-for="i in 6"
            :key="i"
            :img-src="require('../assets/ACM' + i + '.jpg')"
          ></b-carousel-slide>
        </b-carousel>
      </b-col>
    </b-row>
    <b-card
      style="
        text-align: center;
        width: 100%;
        margin: 30px 0px 30px 0px;
        border-radius: 0 !important;
        margin: auto;
      "
    >
      <b-card-body class="about">
        <h2>Who We Are</h2>

        We are a part of the national organization,
        <a href="https://www.acm.org/about-acm" target="_blank"
          >Association for Computing Machinery</a
        >, which is the world's largest educational computer science
        organization. ACM is divided up into many student chapters, and we are
        the one that is located at, you guessed it, NJIT! If you're a student
        studying CS, IT, IS, or any other computer-related field, chances are
        that you'll find joining ACM will provide you with many opportunities
        and resources that will help you in your career. Whether you join for
        tutoring, use of ACM's vast array of online resources, or just to
        connect with fellow programmers, ACM is a great organization to be a
        part of. <br /><br />
        <h2>What We Offer</h2>
        NJIT ACM offers many things to club members and other students. Firstly,
        we provision free tutoring for CS, IT, and IS classes, offering
        assistance to students of all levels. We also run SIGs, or special
        interest groups, which are student run initiatives dedicated to teaching
        various computer science topics, or creating various computer
        science-related projects. and works closely with the NJIT YWCC
        department to host a number events including HackNJIT, NJIT's own
        24-hour hackathon. We work closely with YWCC to host a number of events,
        including HackNJIT, NJIT's own 24-hour hackathon, and JerseyCTF, a
        beginner-friendly Capture the Flag competition. More information on any
        of these services can be found on the site, or by asking any e-board
        member.
        <br /><br />
        <h2>The Office</h2>
        While ACM is a professional organization, we also pride ourselves on
        providing a fun, safe, and friendly work environment. The ACM office,
        located at GITC 3704, is a place we maintain for people to go do work,
        relax after a hard day of work, or even play games. The office is an
        excellent place to get to know the eboard and other members of the club
        or to just hang out there. We urge all students to take advantage of our
        professional services, and to join our passionate and friendly
        community. We hope to see you around.
      </b-card-body>
    </b-card>
    <div class="about" style="margin-bottom: 5%">
      <h1 class="subheading">FAQ</h1>
      <div
        class="accordion"
        role="tablist"
        v-for="(item, index) in FAQ"
        v-bind:key="item.question"
      >
        <b-button
          block
          squared
          v-b-toggle="'accordion-' + index"
          class="button"
          onclick="this.blur();"
          ><h4>{{ item.question }}</h4></b-button
        >
        <b-collapse
          :id="'accordion-' + index"
          visible
          accordion="my-accordion"
          role="tabpanel"
        >
          <p class="FAQAnswer"><span v-html="item.answer"></span></p>
        </b-collapse>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      FAQ: [
        {
          question: "How Can I Become A Member?",
          answer:
            "To be considered an active member of ACM all you have to do is come regularly to our general body meetings! Being an active member gives you a few perks including the ability to run for e-board, and to vote in elections. You can also be a part of ACM by coming to our office or volunteering at/going to our many events. <br/><br/>NOTE: To use ACM's online resources, you must sign up for <a href='http://www.acm.org/membership/join-acm' target='_blank'> ACM's National Membership</a>. Being a member of ACM National costs a yearly fee and provides you with many professional resources. YOU DO NOT HAVE TO BE PART OF ACM NATIONAL TO BE PART OF OUR BRANCH.",
        },
        {
          question: "What Do You Offer At Meetings?",
          answer:
            "General body meetings are a place for us to share club news and to help members better get to know each other. Each meeting will largely consist of us sharing events run by us or our partner organizations. Afterwards we sometimes run computer science related discussions or challenges to do before the meeting officially ends. At this point members can talk amongst themselves or with the e-board if they wish to stay. These meetings are also the way we determine active members, who will be eligible to run for e-board or vote.",
        },
        // {
        //   question: "Are You a Game Club?",
        //   answer:
        //     "No. While we urge students to unwind with video games or other fun activities after class, we are not a video game club. Before anything else, NJIT ACM is a club dedicated to connecting students who share common interests in computers and programming. While we will not necessarily kick you out for only playing video games in our office, we strongly reccomend that you also participate in some of the other services or activities that we offer.",
        // },
        {
          question: "When/Where Are Meetings? What If I Miss One?",
          answer:
            "Our meetings are currently held every Friday at 12 pm in GITC 3600. You can join our <a href='https://njit.campuslabs.com/engage/organization/acm' target='_blank'>Highlander Hub</a> or our <a href='https://njit.acm.org/discord' target='_blank'>Discord</a> to be notified when general body meetings happen, or other important events. <br/><br/> If you happen to miss a meeting, we keep all our meeting slides for the semester in a channel on our discord for anyone to download and view.",
        },
        {
          question: "What are the Office Rules?",
          answer:
            "Just be courteous. While there is an official set of rules in the office, most of it comes down to common sense behavior, such as not being too loud, or to not touch anyone else's belongings without their permission. On that note we have 24/7 video surveilance in the office, so if anything is moved without permission, stolen or you break a rule when an e-board member isn't there, we will know who did it.",
        },
        {
          question: "I Still Have A Question!",
          answer:
            "Any e-board member will be happy to help! You can come to our office at GITC 3704 anytime to find us, or you can ask your question through email (<a href='mailto:acm@njit.edu'>acm@njit.edu</a>) or on our <a href='https://njit.acm.org/discord' target='_blank'>Discord</a>.",
        },
      ],
    };
  },
};
</script>

<style>
.title {
  text-align: center;
  display: block;
  margin: 35px auto 20px auto !important;
  font-size: 3.5em !important;
}
.im {
  width: 75%;
  margin: 0 auto 20px auto;
}
.about {
  margin-left: 5%;
  margin-right: 5%;
  padding-top: 0 !important;
}
.subheading {
  font-size: 3em;
  margin: 20px 0 10px 0;
  text-align: center;
}
.FAQAnswer {
  font-size: 1em;
  margin: 15px;
}
.button {
  background-color: #dd2020 !important;
  border-color: #b81c1c !important;
}
</style>
