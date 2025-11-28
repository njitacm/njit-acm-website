<template>
  <main class="EventsView outer-container">
    <HorizontalSection imagePath="EventsPage/HackNJIT2023.jpg">
      <template v-slot:title>Events</template>
      <template v-slot:content>
        <p>
          ACM hosts a varierty of events throughout the year, both professional
          and social. In addition to our biannual hackathon and capture the flag
          competition, we regularly host workshops, networking events, social
          events, and more!
        </p>
        <br />
        <p>
          To learn more about what we have to offer, follow ACM on
          <a href="https://njit.campuslabs.com/engage/organization/acm" target="_blank">Highlander Hub</a>, or stop by
          one of our weekly
          General Body Meetings to learn how you
          can get involved with ACM!
        </p>
      </template>
    </HorizontalSection>
    <section>
      <h2 v-show="upcomingEvents.length" class="section-header">Upcoming Events</h2>
      <div class="section-container upcoming-events">
        <p class="info">Event details are subject to change, so make sure to check back often!</p>
        <div v-show="upcomingEvents.length" class="upcoming-events-grid">
          <div v-for="(event, index) in upcomingEvents" :key="index">
            <UpcomingEventCard :name="event.name" :datetime="event.datetime" :location="event.location"
              :imagePath="event.imagePath" :desc="event.desc" :links="event.links" />
            <hr v-if="index < upcomingEvents.length - 1" />
          </div>
        </div>
      </div>
    </section>
    <section>
      <h2 class="section-header">Events Calendar</h2>
      <div class="section-container">
        <EmbeddedCalendar
          src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=America%2FNew_York&mode=MONTH&src=Y183N2U5ZWQ0Y2Q3NzZhOGM4ZDI1MmRiYTY5ODNkZmI4YmQ5ODQ5OGFhYzI2MzVkOTYwMTNjYjQ0MmEwMzAzMTFhQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23795548"
          href="https://calendar.google.com/calendar/u/0?cid=Y183N2U5ZWQ0Y2Q3NzZhOGM4ZDI1MmRiYTY5ODNkZmI4YmQ5ODQ5OGFhYzI2MzVkOTYwMTNjYjQ0MmEwMzAzMTFhQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20"
          buttonText="Add Calendar" />
      </div>
    </section>
    <section>
      <h2 class="section-header">Annual Events</h2>
      <div class="section-container annual-events-container">
        <AnnualEventCard v-for="(event, index) in annualEvents" :key="index" v-bind="event" />
      </div>
    </section>
  </main>
</template>

<script>
import HorizontalSection from "../HorizontalSection.vue";
import AnnualEventCard from "../AnnualEventCard.vue";
import UpcomingEventCard from "../UpcomingEventCard.vue";
import EmbeddedCalendar from "../EmbeddedCalendar.vue";
import upcomingEventsData from "../../assets/data/upcomingEvents.js";
import annualEventsData from "../../assets/data/annualEvents.js";

export default {
  name: "EventsView",
  components: { HorizontalSection, AnnualEventCard, UpcomingEventCard, EmbeddedCalendar },
  data() {
    return {
      currYear: '2025',
      upcomingEventsRaw: upcomingEventsData['fa2025'],
      upcomingEvents: [],
      annualEvents: annualEventsData,
    };
  },
  methods: {
    isObject(o) {
      return typeof (o) === 'object' && o !== null && !Array.isArray(o)
    }
  },
  mounted() {
    // filter out old events automatically (don't display them)
    for (let i = 0; i < this.upcomingEventsRaw.length; i++) {
      let event = this.upcomingEventsRaw[i];
      let dates = event.dates;
      let times = event.times;
      let delim = event.delimiter;

      if (dates == null)
        dates = [event.date];
      if (times == null)
        times = [event.time];
      if (delim == null)
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
      // if the event hasn't already passed by more than 1 day
      if (diffDays <= 1) {
        this.upcomingEvents.push(event);
      }
    }
  },
};
</script>

<style scoped>
.upcoming-events .info {
  padding-inline: 32px;
}

.upcoming-events-grid {
  display: grid;
  gap: 16px;
}

hr {
  margin-top: 16px;
}

.annual-events-container {
  gap: 32px;
  display: grid;
  grid-template-columns: auto auto;
}

@media (max-width: 950px) {
  .annual-events-container {
    grid-template-columns: auto;
  }
}
</style>
