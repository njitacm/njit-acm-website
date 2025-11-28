<template>
  <main class="SIGsView outer-container">
    <HorizontalSection imagePath="sigs/SIG_Frontline_Meeting.jpg">
      <template #title>SIGs</template>
      <template #content>
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
          start your own, join our <a href="https://njit.gg/acm" target="_blank">Discord Server!</a>
        </p>
      </template>
    </HorizontalSection>
    <section>
      <h2 class="section-header">Current SIGs</h2>
      <div v-if="sigs.length > 0" class="section-container sig-container">
        <div v-for="(sig, index) in sigs" :key="index">
          <SIGsCard :name="sig.name" :desc="sig.desc" :leaders="sig.leaders" :time="sig.time" :loc="sig.loc"
            :imagePath="sig.filename" />
          <hr v-if="index < sigs.length - 1" />
        </div>
      </div>
      <div v-else class="section-container no-sig-container">
        <p>This semester's SIGs are coming soon, hang tight!</p>
      </div>
    </section>
    <section>
      <h2 class="section-header">SIG Calendar</h2>
      <div class="section-container">
        <EmbeddedCalendar
          src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=America%2FNew_York&mode=WEEK&title=ACM%20SIG%20Schedule&src=Y19hNTM1ZWI4ZmY0NTA3NTg2NDk0MjY3MjE0ODdiMjc3NjE0MjA3OTc1MWY2YjRhODFhZTVhNDA0MmI2NzlmMmFiQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%234285F4"
          href="https://calendar.google.com/calendar/embed?src=c_a535eb8ff450758649426721487b2776142079751f6b4a81ae5a4042b679f2ab%40group.calendar.google.com&ctz=America%2FNew_York"
          buttonText="View Calendar" />
      </div>
    </section>
    <section>
      <h2 class="section-header">How to Join SIGs</h2>
      <div class="section-container">
        <ol>
          <li>Join the <a :href="discordLink" target="_blank">ACM Discord</a>.</li>
          <li>Go to <b>Channels & Roles</b>.</li>
          <li>Assign yourself the role for the SIG you want to join.</li>
          <li>Now you should have access to that SIG channel!
            Make sure to introduce yourself and communicate with the SIG leader(s)!</li>
        </ol>
      </div>
    </section>
    <section>
      <h2 class="section-header">How to Make Your Own SIG</h2>
      <div class="section-container">
        <p>At the start of every semester, a form is sent out on the
          <a :href="discordLink" target="_blank">ACM Discord</a> to request a SIG of your own.
          After filling it out, you'll be lightly interviewed about how you plan to run the SIG.
          If your interview goes well, you now have your own SIG! Note: SIGs <i>cannot</i>
          be created mid-semester. Please adhere to the form's deadline.
        </p>
      </div>
    </section>
  </main>
</template>

<script>
import sigsData from '../../assets/data/sigs.js';
import HorizontalSection from "../HorizontalSection.vue";
import SIGsCard from "../SIGCard.vue";
import EmbeddedCalendar from "../EmbeddedCalendar.vue";

export default {
  name: "SIGsView",
  components: { SIGsCard, HorizontalSection, EmbeddedCalendar },
  data() {
    return {
      sigs: sigsData['sp2025'] ?? [],
      discordLink: 'https://discord.gg/XR6qPze'
    };
  },
};
</script>

<style scoped>
.sig-container {
  display: grid;
  gap: 16px;
  flex-wrap: wrap;
  margin-left: auto;
  margin-right: auto;
  justify-content: center;
}

hr {
  margin-top: 16px;
}

@media (max-width: 750px) {
  ol {
    list-style: inside decimal;
  }
}
</style>