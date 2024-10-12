<template>
  <div class="outer">
    <HorizontalSection imagePath="EventsPage/HackNJIT2023.jpg">
      <template v-slot:title>Events</template>
      <template v-slot:content>
        <p>
          ACM hosts a varierty of events throughout the year, both professional
          and social. In addition to our biannual hackathon and capture the flag
          competition, we regularly host workshops, networking events, social
          events, and more!
        </p>
        <p>
          To learn more about what we have to offer, follow ACM on
          <a href="https://njit.campuslabs.com/engage/organization/acm"
            >Highlander Hub</a
          >, or stop by one of our weekly General Body Meetings to learn how you
          can get involved with ACM!
        </p>
      </template>
    </HorizontalSection>
    <div class="main">
      <MainEvent
        v-for="event in mainEvents"
        :key="event.title"
        :title="event.title"
        :desc="event.desc"
        :imgName="event.imgName"
      >
      </MainEvent>
    </div>
    <div class="upcoming-events">
      <h2>Upcoming Events</h2>
      <EventCard
        v-for="event in events"
        :event="event"
        :key="event.name"
        :name="event.name"
        :desc="event.desc"
        :day="event.day"
        :month="event.month"
        :year="event.year"
        :location="event.location"
        :type="event.type"
        :link="event.link"
        :imgName="event.img"
      ></EventCard>
    </div>
  </div>
</template>

<script>
import HorizontalSection from "../HorizontalSection.vue";
import EventCard from "../EventCard.vue";
import MainEvent from "../MainEvent.vue";
export default {
  components: { HorizontalSection, EventCard, MainEvent },
  data() {
    return {
      mainEvents: [
        {
          title: "HackNJIT",
          desc: "HackNJIT is a 24-hour hackathon at the New Jersey Institute ofTechnology, run by its ACM student chapter in conjunction with the Ying Wu College of Computing.",
          imgName: "hacknjit.png",
        },
        {
          title: "JerseyCTF",
          desc: "JerseyCTF is a beginner-friendly Capture the Flag competition that aims to inspire interest in cybersecurity. Hosted by the NJIT ACM and NICC organizations and NJIT SCI program, it is geared towards students, beginners, and professionals alike.",
          imgName: "jerseyctf.png",
        },
      ],
      events: [
        {
          name: "Test Driven Development Workshop with Guardian Life",
          type: "Workshop",
          desc: "Come join Guardian Life, a life insurance company, ACM, GDSC, and WiCS for a test driven development (TDD) workshop. This event is open to anybody with an interest TDD! ",
          month: "April",
          day: 12,
          location: "GITC 1400",
          year: 2024,
          img: "ShazamBuzzer.gif",
        },
        {
          name: "Movie/Video Game Pool Night!!",
          type: "Fun Event",
          desc: "Join us to watch a movie, play some games, and swim! Meet people of different passions at the WEC Pool. Collaborating with Anime Club, Esports Club, ACM, and RHA.",
          month: "April",
          day: 19,
          year: 2024,
          location: "WEC Pool",
          link: "https://njit.campuslabs.com/engage/event/10081972",
          img: "Movie__Game_Night.png",
        },
        {
          name: "Shazam Buzzer Beater",
          type: "Fun Event",
          desc: "Join Association of Computing Machinery and Society of Musical Arts in night of friendly tourament-style competition, music, or just hang out and enjoy free pizza! Individuals will verse each other and test their musical knowledge by being the first one to guess a random song as quick as possible! One person will make it out in the end and win a Squishmellow!",
          month: "April",
          day: 23,
          year: 2024,
          location: "GITC 3700",
          link: "https://njit.campuslabs.com/engage/event/10126079",
          img: "ShazamBuzzer.gif",
        },
      ],
    };
  },
};
</script>

<style scoped>
.outer {
  width: 80%;
  margin: 0 auto;
}
.main {
  display: flex;
  justify-content: center;
  gap: 7.5rem;
  flex-wrap: wrap;
}
.main-event {
  margin: 4.8rem 0;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 40%;
  border: 2px red solid;
  border-radius: 8px;
  position: relative;
  height: 50rem;
  min-width: 550px;
}
/*
- Font sizes (px)
10 / 12 / 14 / 16 / 18 / 20 / 24 / 30 / 36 / 44 / 52 / 62 / 74/ 86 / 98

- Spacing system (px)
2 / 4 / 8 / 12 / 16 / 24 / 32 /48 /64 /80 /96 / 128
*/
.main-event h3 {
  font-size: 3.6rem;
  text-align: center;
}
.main-event p {
  font-size: 3rem;
  padding: 1.6rem;
  font-weight: 400;
}
.main-event img {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 50%;
  left: 50%;
  z-index: -1;
  transform: translateY(-50%);
  opacity: 0.4;
}
.main-event button {
  font-size: 2.4rem;
  border-radius: 0.8rem;
  padding: 0.8rem;
  display: block;
  margin-left: auto;
  margin-right: auto;
  /* position: absolute;
  bottom: 4rem;
  left: 50%; */
}
h2 {
  margin: 2.5rem 4rem;
  font-size: 48px;
  border-bottom: red 4px solid;
}
p {
  font-size: 3.6rem;
  line-height: 4rem;
}

@media (max-width: 600px) {
  .main-event {
    width: 90%;
    min-width: 0;
  }
  .main-event p {
    margin-bottom: 50px;
  }
}

@media (max-width: 500px) {
  p {
    font-size: 2.4rem;
  }
}
</style>