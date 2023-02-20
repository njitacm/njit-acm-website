<template>
  <div>
    <h1 class="m-2 title">Eboard</h1>
    <h6 class="subtitle">
      Below is a list of our current-acting EBoard members and their positions.
      EBoard elections are held every fall semester. In order to be qualified to
      vote, you must attend at least one-half of our meetings throughout the
      semester.
    </h6>
    <div v-for="(item, i) in EboardMembers" :key="i">
      <div class="row w-100 r" v-if="i % 2 == 0">
        <div class="col c" v-for="j in 2" :key="j">
          <div v-if="i + j <= EboardMembers.length">
            <h1>{{ EboardMembers[i + j - 1].role }}</h1>
            <img
              :src="
                require('../assets/eboard/' +
                  EboardMembers[i + j - 1].role
                    .toLowerCase()
                    .replace(' ', '_') +
                  '.png')
              "
            />
            <h5>
              {{ EboardMembers[i + j - 1].name }}
            </h5>
            <h5>
              {{
                EboardMembers[i + j - 1].year +
                " " +
                EboardMembers[i + j - 1].major +
                " Major"
              }}
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
export default {
  name: "Eboard",
  data() {
    return {
      EboardMembers: [
        {
          role: "President",
          name: "Ethan Ho",
          year: "Sophomore",
          major: "CS",
        },
        {
          role: "Vice President",
          name: "Anthony Siracusa",
          year: "Junior",
          major: "CS/Math Sci",
        },
        {
          role: "Treasurer",
          name: "Will Simkins",
          year: "Junior",
          major: "CS/Math",
        },
        {
          role: "Secretary",
          name: "Isaac Guererro",
          year: "Senior",
          major: "IT",
        },
        {
          role: "SIG Master",
          name: "Ryan Pupia",
          year: "Sophomore",
          major: "Data Sci",
        },
        {
          role: "Webmaster",
          name: "Alex Druzenko",
          year: "Junior",
          major: "CS",
        },
        {
          role: "Public Relations",
          name: "Jayden Alexis",
          year: "Freshman",
          major: "IT",
        },
        {
          role: "Graphic Designer",
          name: "Kapila Mane",
          year: "Freshman",
          major: "HCI",
        },
      ],
    };
  },
};
</script>
  
<style>
.r {
  margin: 5% 0 5% 0 !important;
  padding-left: 15% !important;
  padding-right: 10% !important;
}
.c {
  justify-content: center;
  display: grid;
  text-align: center;
}
</style>
  