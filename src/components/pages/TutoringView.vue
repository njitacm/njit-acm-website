<template>
  <div>
    <button @click="getTutors">Get Tutors</button>
    <button @click="getAttendance">Get Attendance</button>
    <button @click="getVisits">Get Visits</button>
    <button @click="getBusiness">Get Business</button>
    <!-- <table>
      <th v-for="header in headers" :key="header">{{ header }}</th>
      <tr v-for="tutor in tutors" :key="tutor.FirstName">
        <td>{{ tutor.Email }}</td>
        <td>{{ tutor.LastName }}</td>
        <td>{{ tutor.FirstName }}</td>
        <td>{{ tutor.FullName }}</td>
        <td>{{ tutor.TimeSlots }}</td>
        <td>{{ tutor.ParsedTimeSlots }}</td>
        <td>{{ tutor.Courses }}</td>
      </tr>
    </table> -->
    <div class="container">
      <header class="tutoring-header">
        <button>MON</button>
        <button>TUE</button>
        <button>WED</button>
        <button>THU</button>
        <button>FRI</button>
        <button>SAT</button>
      </header>
      <nav class="tutoring-sidebar">
        <h1 class="title">YWCC Undergraduate Tutoring Schedule</h1>
        <h2 class="subtitle">
          YWCC tutoring is walk-in only. We do not have reservations.
        </h2>
        <div class="dropdown">
          <select
            @change="selectClass"
            v-model="selectedCourse"
            :class="{ usingDefault: selectedCourse == -1 }"
          >
            <option selected disabled value="-1" style="display: none">
              Select A Course...
            </option>
            <option v-for="course in courses" :key="course">
              {{ course }}
            </option>
          </select>
          <img
            class="reset-button"
            @click="reset"
            src="../../assets/reset.svg"
            alt="reset-button"
          />
        </div>
        <div v-if="dateSelected && classSelected" class="selectionInfo">
          <h1 class="day-time">
            {{ selectionInfo.day }} {{ selectionInfo.time }}
          </h1>
          <h3>In-Person AND Virtual</h3>
          <br />
          <h2>
            Typically <b>{{ selectionInfo.business }}</b>
          </h2>
          <br />
          <h2>Tutors</h2>
          <div class="tutors-container">
            <p v-for="tutor in selectionInfo.tutors" :key="tutor">
              {{ tutor }}
            </p>
          </div>
        </div>
        <div v-else-if="dateSelected" class="selectionInfo">
          <h1 class="day-time">
            {{ selectionInfo.day }} {{ selectionInfo.time }}
          </h1>
          <h3>In-Person AND Virtual</h3>
          <br />
          <h2 class="courses-title">Tutoring Offered</h2>
          <div class="courses-container">
            <p v-for="course in selectionInfo.courses" :key="course">
              {{ course }}
            </p>
          </div>
          <br />
          <h2>Tutors</h2>
          <div class="tutors-container">
            <p v-for="tutor in selectionInfo.tutors" :key="tutor">
              {{ tutor }}
            </p>
          </div>
        </div>
      </nav>
      <main class="tutoring-calendar">
        <div
          v-for="index in 72"
          :key="index"
          class="date"
          :style="getPosition(index)"
          :class="{ 'even-row': (Math.floor((index - 1) / 6) + 1) % 2 == 0 }"
        >
          <button :ref="index" @click="selectDate(index)"></button>
        </div>

        <div class="calendar-time">9AM</div>
        <div class="calendar-time">10AM</div>
        <div class="calendar-time">11AM</div>
        <div class="calendar-time">12PM</div>
        <div class="calendar-time">1PM</div>
        <div class="calendar-time">2PM</div>
        <div class="calendar-time">3PM</div>
        <div class="calendar-time">4PM</div>
        <div class="calendar-time">5PM</div>
        <div class="calendar-time">6PM</div>
        <div class="calendar-time">7PM</div>
        <div class="calendar-time">8PM</div>
      </main>
    </div>
  </div>
</template>

<script>
import chroma from "chroma-js";
import tutors from "../../assets/data/tutors.json";
import business from "../../assets/data/business.json";
export default {
  methods: {
    async getTutors() {
      this.tutors = tutors;
      this.getCourses();
    },
    async getAttendance() {
      const response = await fetch("/api/attendance");
      var data = await response.json();
      console.log(data);
    },
    async getVisits() {
      const response = await fetch("/api/visits");
      var data = await response.json();
      console.log(data);
    },
    async getBusiness() {
      this.business = business;
      this.colorClasses();
      console.log(business);
    },
    getRow(index) {
      return Math.floor((index - 1) / 6) + 1;
    },
    getCol(index) {
      return index - (this.getRow(index) - 1) * 6 + 1;
    },
    getPosition(index) {
      var row = this.getRow(index);
      var col = this.getCol(index);
      return "grid-column: " + col + "; grid-row: " + row + ";";
    },
    getDay(index) {
      var row = Math.floor((index - 1) / 6) + 1;
      var col = index - (row - 1) * 6 + 1;
      return col - 2;
    },
    getTime(index) {
      var row = Math.floor((index - 1) / 6) + 1;
      return row + 8;
    },
    inTime(slot, time) {
      return slot.StartTime <= time && slot.EndTime > time;
    },
    getTutorsBySlot(day, time) {
      return this.tutors.filter((tutor) =>
        tutor.ParsedTimeSlots.some(
          (slot) => (slot.Day == day) & this.inTime(slot, time)
        )
      );
    },
    selectDate(index) {
      const day = this.getDay(index);
      const time = this.getTime(index);

      var selectedTutors = [];
      var coursesSet = new Set();
      var tutors = this.getTutorsBySlot(day, time);
      tutors.forEach((tutor) => {
        selectedTutors.push(tutor.FirstName + " " + tutor.LastName);
        tutor.Courses.forEach((course) => {
          coursesSet.add(course);
        });
      });

      this.selectionInfo.tutors = selectedTutors;
      this.selectionInfo.day = this.dayIntToString(day);
      this.selectionInfo.time = this.timeIntToString(time);
      this.selectionInfo.courses = Array.from(coursesSet);
      this.dateSelected = true;
    },
    dayIntToString(day) {
      switch (day) {
        default:
        case 0:
          return "MON";
        case 1:
          return "TUE";
        case 2:
          return "WED";
        case 3:
          return "THU";
        case 4:
          return "FRI";
        case 5:
          return "SAT";
      }
    },
    timeIntToString(timeStart) {
      var timeEnd = timeStart + 1;
      var timeOfDayStart = getTimeOfDay(timeStart);
      var timeOfDayEnd = getTimeOfDay(timeEnd);
      if (timeStart > 12) timeStart -= 12;
      if (timeEnd > 12) timeEnd -= 12;

      return timeStart + timeOfDayStart + "-" + timeEnd + timeOfDayEnd;

      function getTimeOfDay(time) {
        if (time >= 12) {
          return "PM";
        }
        return "AM";
      }
    },
    selectClass() {
      this.dateSelected = false;
      if (this.selectedCourse == "-1") return;
      var tutors = this.getTutorsByClass(this.selectedCourse);
      var selectedTutors = [];
      tutors.forEach((tutor) => {
        console.log(tutor);
        selectedTutors.push(tutor.FirstName + " " + tutor.LastName);
      });
      this.selectionInfo.tutors = selectedTutors;
    },
    getTutorsByClass(selectedCourse) {
      console.log(
        this.tutors.filter((tutor) =>
          tutor.Courses.some((course) => course == selectedCourse)
        )
      );
      return this.tutors.filter((tutor) =>
        tutor.Courses.some((course) => course == selectedCourse)
      );
    },
    getCourses() {
      console.log(this.tutors);
      var courseSet = new Set();
      this.tutors.forEach((tutor) => {
        tutor.Courses.forEach((course) => {
          courseSet.add(course);
        });
      });
      console.log(courseSet);
      this.courses = Array.from(courseSet);
    },
    reset() {
      this.selectedCourse = "-1";
      this.dateSelected = false;
    },
    colorClasses() {
      for (var i = 1; i <= 72; i++) {
        this.$refs[i][0].style.background = this.getColor(i);
      }
    },
    getBusinessFromIndex(index) {
      var row = this.getRow(index);
      var col = this.getCol(index);
      if (row >= this.business.length) {
        console.log("Too large", row, col);
        return 0;
      }
      console.log(
        this.business[row],
        this.business[row].Data,
        this.business[row].Data[col - 2]
      );
      return this.business[row].Data[col - 2];
    },
    getColor(index) {
      var business = this.getBusinessFromIndex(index);
      var percent = business / this.maxBusiness;
      var gradientFunction = chroma.scale(["green", "yellow", "red"]);
      var gradient = gradientFunction(percent);
      console.log(business, this.maxBusiness, percent, gradient);
      return gradient;
    },
  },
  data() {
    return {
      dateSelected: false,
      selectionInfo: {},
      headers: [
        "Email",
        "Last Name",
        "First Name",
        "Full Name",
        "Time Slots",
        "Parsed Time Slots",
        "Courses",
      ],
      tutors: [],
      courses: [],
      business: [],
      selectedCourse: "-1",
      maxBusiness: 32,
    };
  },
  computed: {
    classSelected() {
      return this.selectedCourse != "-1";
    },
  },
  mounted() {
    this.getTutors();
    this.getBusiness();
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
* {
  transition: all 0.2s linear;
}
.container {
  font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
  display: grid;
  grid-template-rows: 75px 1fr;
  grid-template-columns: 25% 1fr;
}
.tutoring-header {
  background: #b73232;
  width: 100%;
  grid-row: 1;
  grid-column: 2 / 8;
  display: flex;
  justify-content: space-around;
  padding-left: 50px;
}
.tutoring-header button {
  border: none;
  background: none;
  font-size: 4rem;
  color: white;
}

.tutoring-sidebar {
  background: #780c0c;
  width: 100%;
  grid-row: 1 / 3;
  grid-column: 1;
  color: white;
  text-align: center;
  padding: 2rem;
}
.tutoring-sidebar h1.title {
  font-size: 4rem;
}
.tutoring-sidebar h1 {
  font-size: 3.25rem;
}
.tutoring-sidebar h2 {
  font-size: 2rem;
  width: 65%;
  margin: 0 auto;
}
.tutoring-sidebar h2.subtitle {
  font-weight: initial;
  margin-bottom: 1rem;
}
.tutoring-sidebar select {
  width: 80%;
  margin: 1rem;
  font-size: 2.4rem;
  padding: 1rem;
}
select.usingDefault {
  font-style: italic;
  font-weight: 100;
}
option {
  font-style: initial;
  font-weight: initial;
}
.tutoring-calendar {
  background: white;
  width: 100%;
  grid-row: 2;
  grid-column: 2;
  display: grid;
  grid-template-columns: 4% repeat(6, 16%);
  grid-template-rows: repeat(12, 1fr);
}
.tutoring-calendar .times {
  grid-row: 1 / 12;
  grid-column: 1;
  background: red;
}
.calendar-time:nth-child(even),
.even-row {
  background-color: #f2f2f2;
}
.calendar-time {
  padding-top: 4px;
  padding-left: 8px;
  grid-column: 1;
  font-size: 1.25rem;
}
.date {
  font-size: 3.2rem;
  margin: 0;
  height: 100%;
  display: flex;
  justify-content: center;
  align-content: center;
}
button {
  box-sizing: border-box;
  width: 100%;
  margin: 0.25rem;
  font-size: 2.4rem;
  height: 5rem;
  align-self: center;
  justify-self: center;
}
.day-time {
  font-size: 3.6rem;
  text-align: left;
  margin-left: 4rem;
  margin-top: 2rem;
}
.selectionInfo h3 {
  font-size: 1.8rem;
  text-align: left;
  margin-left: 4rem;
  margin-top: 2rem;
  text-decoration: none;
  font-weight: initial;
  font-style: italic;
}
.selectionInfo h2 {
  font-size: 2rem;
  text-align: left;
  margin-left: 4rem;
  margin-top: 2rem;
  text-decoration: none;
}
.courses-title {
  margin-left: 2rem;
}
.courses-container {
  margin-left: 4rem;
  margin-top: 0.5rem;
  display: grid;
  gap: 2rem;
  grid-template-columns: 20% 20% 20% 20%;
  justify-content: space-around;
  row-gap: 0.25rem;
}
.courses-container p {
  font-size: 2rem;
  margin-top: 1rem;
  width: 100%;
  text-align: center;
}
.tutors-container {
  font-size: 2rem;
  text-align: left;
  margin-left: 4rem;
  margin-top: 0.5rem;
}
.tutors-container p {
  font-size: 2rem;
  padding: 0.25rem 0;
}
.dropdown {
  display: flex;
  align-content: center;
  justify-content: center;
}
.reset-button {
  width: 4.25rem;
  cursor: pointer;
}
/* h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
table {
  margin-left: auto;
  margin-right: auto;
  margin-top: 12px;
}
th {
  border: 2px gray solid;
  padding: 8px;
  margin: 0px;
  border-collapse: collapse;
} */
</style>
