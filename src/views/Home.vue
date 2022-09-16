<template>
  <div>
    <b-row style="margin:0px;">
      <b-col offset="0" offset-sm="2" cols="12" sm="8">
    <b-carousel
    class="caros"
      id="carousel-1"
      v-model="slide"
      controls
      responsive
      indicators
    >
      <!-- Slides with image only -->
      <b-carousel-slide
        img-src="https://picsum.photos/1024/480/?image=58"
      ></b-carousel-slide>

      <!-- Slides with img slot -->
      <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
      <b-carousel-slide>
        <template #img>
          <img
            class="d-block img-fluid w-100"
            width="1024"
            height="480"
            src="https://picsum.photos/1024/480/?image=55"
            alt="image slot"
          />
        </template>
      </b-carousel-slide>
    </b-carousel>
</b-col>
    </b-row>
    <b-card
      style="
        width: 100%;
        margin: 30px 0px 30px 0px;
        border-radius: 0 !important;
        margin:auto;
      "
    >
      <b-card-body class="about"
        >What is ACM you might ask? ACM stands for the
        <a href="https://www.acm.org/about-acm" target="_blank"
          >Association for Computing Machinery</a
        >, and it is the world's largest educational computer science
        organization. ACM is divided up into many student chapters, and this one
        just happens to be located at, you guessed it, NJIT! If you're a student
        studying CS, IT, IS, or any other computer-related field, chances are
        that you'll find joining ACM to be useful. Whether you join for
        tutoring, use of ACM's vast array of online resources, or just to
        connect with fellow programmers, ACM is a great organization to be a
        part of. <br /><br />
        More specifically, the NJIT chapter of ACM offers free tutoring for CS,
        IT, and IS classes, contains SIGs (special interest groups) dedicated to
        teaching various computer science topics, works on various computer
        science-related projects, and works closely with the NJIT CCS department
        to host a number events including HackNJIT, NJIT's own 24-hour
        hackathon. The NJIT chapter of ACM also occasionally takes trips to the
        headquarters of various companies to give students the opporunity to get
        an inside-look into real-world job environments. More information
        regarding our tutoring services, SIGs, projects, HackNJIT, and more is
        available through clicking the tabs above.
        <br /><br />
        While ACM is a professional organization, we also pride ourselves in
        trying to make our office a fun, safe, and friendly work environment.
        After quiet hours end at 6 PM, the office becomes a place where people
        can play video games, watch movies, and relax after a hard day of work.
        NJIT ACM also offers an unofficial SIG called SIG Melee, which is a
        group dedicated to teaching, playing, and modding the game Super Smash
        Bros. Melee. While we do not allow new SIGs that are dedicated to video
        games to be formed, SIG Melee is a SIG that has been grandfathered into
        NJIT ACM over the years for its popularity amongst the NJIT student
        body. We urge all students to join us for both our professional
        services, and to simply unwind after a long day of classes.</b-card-body
      >
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
.caros{
  margin-top: 20px; 
  margin-bottom: 20px; 

}
.about {
  text-align: center;
  margin-left:5%;
  margin-right:5%;
}
</style>
