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
        science-related projects. and works closely with the NJIT CCS department
        to host a number events including HackNJIT, NJIT's own 24-hour
        hackathon. We work closely with YWCC to host a number of events,
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
    <!--
    <div style="margin: 300px"></div>

    <b-card
      style="
        width: 100%;
        margin: 30px 0px 30px 0px;
        border-radius: 0 !important;
      "
    >
      <b-card-body style="margin-bottom: 300px"
        >Some quick example text to build on the card title and make up the bulk
        of the card's content.</b-card-body
      >
    </b-card>
    <div style="margin-bottom: 300px"></div>
    -->
  </div>
</template>

<script>
export default {
  name: "Home",
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
  text-align: center;
  margin-left: 5%;
  margin-right: 5%;
  padding-top: 0 !important;
}
</style>
