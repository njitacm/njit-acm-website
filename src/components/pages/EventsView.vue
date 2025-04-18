<template>
  <div class="outer-container">
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
          <a href="https://njit.campuslabs.com/engage/organization/acm" target="_blank">Highlander Hub</a>, or stop by
          one of our weekly
          General Body Meetings to learn how you
          can get involved with ACM!
        </p>
      </template>
    </HorizontalSection>
    <h2 v-show="upcomingEvents.length" class="section-header">Upcoming Events</h2>
    <div v-show="upcomingEvents.length" class="upcoming-events">
      <EventCard v-for="event in upcomingEvents" :key="event.id" :name="event.name" :datetime="event.datetime"
        :location="event.location" :imageUrl="event.image" :desc="event.desc" :links="event.links">
      </EventCard>
    </div>
    <h2 class="section-header">Events Calendar</h2>
    <EmbeddedCalendar
      src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=America%2FNew_York&mode=MONTH&src=Y183N2U5ZWQ0Y2Q3NzZhOGM4ZDI1MmRiYTY5ODNkZmI4YmQ5ODQ5OGFhYzI2MzVkOTYwMTNjYjQ0MmEwMzAzMTFhQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23795548"
      href="https://calendar.google.com/calendar/u/0?cid=Y183N2U5ZWQ0Y2Q3NzZhOGM4ZDI1MmRiYTY5ODNkZmI4YmQ5ODQ5OGFhYzI2MzVkOTYwMTNjYjQ0MmEwMzAzMTFhQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20"
      buttonText="Add Calendar"></EmbeddedCalendar>
    <div>
      <h2 class="section-header">Annual Events</h2>
      <div class="main-events-container">
        <MainEvent v-for="event in mainEvents" :key="event.title" :title="event.title" :desc="event.desc"
          :imgName="event.imgName">
        </MainEvent>
      </div>
    </div>
  </div>
</template>

<script>
import HorizontalSection from "../HorizontalSection.vue";
import MainEvent from "../MainEvent.vue";
import eventsJSON from "../../assets/data/events.json";
import EventCard from "../EventCard.vue";
import EmbeddedCalendar from "../EmbeddedCalendar.vue";
import upcomingEventsData from "../../assets/data/upcomingEvents.js";

export default {
  components: { HorizontalSection, MainEvent, EventCard, EmbeddedCalendar },
  mounted() {
    // filter out old events automatically (don't display them)
    for (let i = 0; i < this.upcomingEventsRaw.length; i++) {
      let event = this.upcomingEventsRaw[i];
      let dates = event.dates;
      let times = event.times;
      let delim = event.delimiter;

      if (dates === undefined)
        dates = [event.date];

      if (times === undefined)
        times = [event.time];

      if (delim === undefined)
        delim = "; ";

      let evDate = new Date(dates[dates.length - 1] + ", " + this.currYear);
      let now = new Date();
      let diffDays = (now - evDate) / (1000 * 3600 * 24);
      let dt = "";

      for (let d = 0; d < dates.length; d++) {
        let time = times[d];
        dt += dates[d] + " (";
        if (this.isObject(time)) {
          if (time.start !== undefined && time.end !== undefined) {
            dt += time.start + " - " + time.end + ")";
          } else if (time.start !== undefined) {
            dt += "Starts at " + time.start + ")";
          } else if (time.end !== undefined) {
            dt += "Ends at " + time.end + ")";
          }
        } else {
          dt += time + ")";
        }

        if (d < dates.length - 1)
          dt += delim;
      }

      event['datetime'] = dt;
      console.log(event);

      console.log("diffdays: " + diffDays)

      // if the event hasn't already passed by more than 1 day
      if (diffDays <= 1) {
        this.upcomingEvents.push(event);
        console.log("added");
      }
    }
  },
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
      currYear: '2025',
      upcomingEventsRaw: upcomingEventsData['sp2025'],
      upcomingEvents: [],
      events: eventsJSON,
    };
  },
  methods: {
    isObject(o) {
      return typeof(o) === 'object' && o !== null && !Array.isArray(o)
    }
  }
};
</script>

<style scoped>
.outer-container {
  margin: 0 auto;
}

/* .main {
  display: flex;
  justify-content: center;
  gap: 7.5rem;
  flex-wrap: wrap;
} */

/*
- Font sizes (px)
10 / 12 / 14 / 16 / 18 / 20 / 24 / 30 / 36 / 44 / 52 / 62 / 74/ 86 / 98

- Spacing system (px)
2 / 4 / 8 / 12 / 16 / 24 / 32 /48 /64 /80 /96 / 128
*/

p {
  font-size: 2.5rem;
  line-height: 4rem;
}

.no-events {
  width: 100%;
  text-align: center;
  margin: auto 0;
}

.no-events h1 {
  font-size: 4rem;
}

.events-grid {
  display: grid;
  grid-template-rows: 1fr;
  grid-template-columns: repeat(4, 25%);
}

.main-events-container {
  margin-top: 5rem;
  justify-content: space-around;
  gap: 5%;
  display: grid;
  grid-template-rows: 400px;
  grid-template-columns: 40% 40%;
}

.upcoming-events {
  margin-top: 4rem;
  display: grid;
  grid-template-columns: repeat(2, 50%);
  justify-content: space-around;
}

@media (max-width: 1800px) {
  .events-grid {
    grid-template-columns: repeat(3, 33%);
  }
}

@media (max-width: 1400px) {
  .events-grid {
    grid-template-columns: repeat(2, 50%);
  }
}

@media (max-width: 950px) {
  .main-events-container {
    grid-template-rows: 400px 400px;
    grid-template-columns: 80%;
  }

  .events-grid {
    grid-template-rows: 1fr 1fr 1fr;
    grid-template-columns: 80%;
    justify-content: center;
  }
}

@media (max-width: 650px) {

  .upcoming-events {
    grid-template-columns: 90%;
  }

  .events-grid {
    grid-template-rows: auto;
  }
}
</style>
