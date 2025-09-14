<template>
  <div>
    <div class="container">
      <header class="tutoring-header">
        <button>MON</button>
        <button>TUE</button>
        <button>WED</button>
        <button>THU</button>
        <button>FRI</button>
        <!--<button>SAT</button>-->
      </header>
      <nav class="tutoring-sidebar">

        <h1 class="title">YWCC Undergraduate Tutoring Schedule</h1>
        <h2 class="subtitle">
          YWCC tutoring is walk-in only. We do not have reservations. If you can't make it in-person, you can join
          virtually:
        </h2>
        <PrimaryButton class="meet-link-button">
          <div>
            <!-- <img src="../../assets/img/GoogleMeet.png"> -->
            <a href="https://meet.google.com/tng-yefx-fqd" target="_blank">Google Meet Link</a>
          </div>
        </PrimaryButton>
        <div class="dropdown">
          <select @change="selectClass" v-model="selectedCourse" :class="{ usingDefault: selectedCourse == -1 }">
            <option selected disabled value="-1" style="display: none">
              Select A Course...
            </option>
            <option v-for="course in courses" :key="course">
              {{ course }}
            </option>
          </select>
          <img class="reset-button" @click="reset" src="../../assets/reset.svg" alt="reset-button" />
        </div>
        <Transition mode="out-in">
          <div v-if="selectionInfo.empty">
            <h1 class="day-time">
              {{ selectionInfo.day }} {{ selectionInfo.time }}
            </h1>
            <h1 v-if="selectedCourse == -1" class="no-tutors">
              There is no tutoring available during this time slot
            </h1>
            <h1 v-else class="no-tutors">
              There is no tutoring available during this time slot for the course selected
            </h1>
          </div>
          <div v-else-if="dateSelected && classSelected" class="selectionInfo">
            <h1 class="day-time">
              {{ selectionInfo.day }} {{ selectionInfo.time }}
            </h1>
            <h3>In-Person AND Virtual</h3>
            <br />
            <h2>
              Typically
              <b :style="'color: ' + selectionInfo.businessColor">{{
                selectionInfo.business
              }}</b>
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
        </Transition>
      </nav>
      <main class="tutoring-calendar">
        <div v-for="index in (numDays * hoursPerDay)" :key="index" :id="index" class="date" :style="getPosition(index)">
        <!-- <div v-for="index in (numDays * hoursPerDay)" :key="index" :id="index" class="date" :style="getPosition(index)"
          :class="{ 'even-row': (Math.floor((index - 1) / numDays) + 1) % 2 == 0 }"> -->
          <button :ref="index" @click="selectDate(index)">
            {{ timeIntToString(this.getTime(index)) }}
          </button>
        </div>

      </main>
    </div>
  </div>
</template>

<script>
import chroma from "chroma-js";
import tutors from "../../assets/data/tutors.json";
import business from "../../assets/data/business.json";
import PrimaryButton from "../PrimaryButton.vue";
export default {
  components: { PrimaryButton },
  methods: {
    async getTutors() {
      this.tutors = tutors;
      this.getCourses();
    },
    async getBusiness() {
      this.business = business;
    },
    // starts at 1
    getRow(index) {
      return Math.floor((index - 1) / this.numDays) + 1;
    },
    // starts at 1
    getCol(index) {
      return index - (this.getRow(index) - 1) * this.numDays;
    },
    getPosition(index) {
      return "grid-column: " + this.getCol(index) + "; grid-row: " + this.getRow(index) + ";";
    },
    getDay(index) {
      return this.getCol(index) - this.mondayCol;
    },
    getTime(index) {
      return this.getRow(index) + (this.startHour - 1);
    },
    getTimeString(index) {
      let currTime = this.getTime(index) % 12;
      if (currTime == 0) {
        currTime = 12;
      }
      return (
        currTime +
        this.getTimeOfDay(index) +
        "-" +
        (currTime + 1) +
        this.getTimeOfDay(index)
      );
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
      this.undoStyle();
      const day = this.getDay(index);
      const time = this.getTime(index);
      this.$refs[index][0].style.border = "2px solid black";

      var selectedTutors = [];
      var coursesSet = new Set();
      var tutors = this.getTutorsBySlot(day, time);
      tutors.forEach((tutor) => {
        if (this.selectedCourse == - 1 || tutor.Courses.find((c) => c == this.selectedCourse)) {
          selectedTutors.push(
            tutor.FirstName + " " + tutor.LastName + " (" + tutor.Email + ")"
          );
        }
        tutor.Courses.forEach((course) => {
          coursesSet.add(course);
        });
      });
      this.selectionInfo.business = this.getBusinessDescription(index);
      this.selectionInfo.businessColor = this.getBusinessColor(index);
      this.selectionInfo.tutors = selectedTutors;
      this.selectionInfo.day = this.dayIntToString(day);
      this.selectionInfo.time = this.timeIntToString(time);
      this.selectionInfo.courses = Array.from(coursesSet);
      this.dateSelected = true;
      this.selectionInfo.empty = false;

      if (!this.selectionInfo.tutors.length) {
        this.selectionInfo.empty = true;
      }
    },
    undoStyle() {
      for (var i = 1; i <= this.numDays * this.hoursPerDay; i++) {
        this.$refs[i][0].style.border = "2px solid white";
      }
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
      var timeOfDayStart = this.getTimeOfDay(timeStart);
      var timeOfDayEnd = this.getTimeOfDay(timeEnd);
      if (timeStart > 12) timeStart -= 12;
      if (timeEnd > 12) timeEnd -= 12;

      return timeStart + timeOfDayStart + "-" + timeEnd + timeOfDayEnd;
    },
    getTimeOfDay(time) {
      return time >= 12 ? "PM" : "AM";
    },
    selectClass() {
      this.dateSelected = false;
      this.undoStyle();
      if (this.selectedCourse == "-1") return;
      var tutors = this.getTutorsByClass(this.selectedCourse);
      var selectedTutors = [];
      tutors.forEach((tutor) => {
        console.log(this.selectedCourse, tutor.FirstName);
        selectedTutors.push(tutor.FirstName + " " + tutor.LastName);
      });
      this.selectionInfo.tutors = selectedTutors;
      this.colorDatesByClass(this.selectedCourse);
    },
    getTutorsByClass(selectedCourse) {
      return this.tutors.filter((tutor) =>
        tutor.Courses.some((course) => course == selectedCourse)
      );
    },
    getCourses() {
      var courseSet = new Set();
      this.tutors.forEach((tutor) => {
        tutor.Courses.forEach((course) => {
          courseSet.add(course);
        });
      });
      // console.log(courseSet);
      this.courses = Array.from(courseSet);
    },
    reset() {
      this.selectedCourse = "-1";
      this.dateSelected = false;
      this.undoStyle();
      this.colorAllDates();
      this.selectionInfo.empty = false;
    },
    uncolorAllDates() {
      for (var i = 1; i <= this.numDays * this.hoursPerDay; i++) {
        this.$refs[i][0].style.background = "";
      }
    },
    colorAllDates() {
      for (var i = 1; i <= this.numDays * this.hoursPerDay; i++) {
        var coursesSet = new Set();
        var tutors = this.getTutorsBySlot(this.getDay(i), this.getTime(i));
        tutors.forEach((tutor) => {
          tutor.Courses.forEach((course) => {
            coursesSet.add(course);
          });
        });
        if (coursesSet.size > 0) {
          this.colorDate(i);
        } else {
          this.uncolorDate(i);
        }
      }
    },
    colorDatesByClass(selectedClass) {
      for (var i = 1; i <= this.numDays * this.hoursPerDay; i++) {
        var coursesSet = new Set();
        var tutors = this.getTutorsBySlot(this.getDay(i), this.getTime(i));
        tutors.forEach((tutor) => {
          tutor.Courses.forEach((course) => {
            coursesSet.add(course);
          });
        });
        if (coursesSet.has(selectedClass)) {
          this.colorDate(i);
        } else {
          this.uncolorDate(i);
        }
      }
    },
    colorDate(date) {
      this.$refs[date][0].style.background = this.getColor(date);
    },
    uncolorDate(date) {
      this.$refs[date][0].style.background = "white";
    },
    getBusinessFromIndex(index) {
      var row = this.getRow(index);
      var col = this.getCol(index);
      if (row >= this.business.length) {
        console.log("Too large", row, col);
        return 0;
      }
      // console.log(
      //   this.business[row],
      //   this.business[row].Data,
      //   this.business[row].Data[col - 2]
      // );
      return this.business[row].Data[col - 2];
    },
    getColor(index) {
      var business = this.getBusinessFromIndex(index);
      var percent = business / this.maxBusiness;
      var gradientFunction = chroma.scale(["green", "yellow", "red"]);
      var gradient = gradientFunction(percent);
      console.log(business, this.maxBusiness, percent, gradient);
      return "#00bf5f";
      // return gradient;
    },
    getBusinessDescription(index) {
      var business = this.getBusinessFromIndex(index);
      var percent = business / this.maxBusiness;
      if (percent < 0.33) {
        return "Not Busy";
      } else if (percent < 0.67) {
        return "Moderately Busy";
      } else {
        return "Busy";
      }
    },
    getBusinessColor(index) {
      console.log(index);
      return "#00bf5f";
      // var business = this.getBusinessFromIndex(index);
      // var percent = business / this.maxBusiness;
      // if (percent < 0.33) {
      //   return "green";
      // } else if (percent < 0.67) {
      //   return "yellow";
      // } else {
      //   return "red";
      // }
    },
  },
  data() {
    return {
      dateSelected: false,
      selectionInfo: {},
      // adjust this according to each new year's tutoring
      numDays: 5,             // how many days of the week tutoring offered? e.g. Mon-Fri
      hoursPerDay: 8,         // how long is tutoring offered (in hours)? e.g. 11 AM-7 PM
      startHour: 11,          // when does tutoring start the earliest? e.g. 11 AM
      mondayIndex: 0,         // Mon = 0, Fri = 4
      mondayCol: 1,           // Mon = column 1, Fri = column 5
      // ---------------------------------------------------
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
    this.colorAllDates();
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
* {
  transition: all var(--hover-speed) linear;
  font-family: sans-serif;
}

/* Meet link */
.meet-link-button {
  width: auto;
  margin: 0 auto;
}

.meet-link-button>div {
  display: flex;
  height: 100%;
}

.container {
  font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
  display: grid;
  grid-template-rows: 75px 1fr;
  grid-template-columns: 25% 1fr;
}

.tutoring-header {
  background: #b73232;
  display: flex;
  width: 100%;
  justify-content: space-around;
} 

.tutoring-header button {
  border: none;
  background: none;
  color: white;
}

.tutoring-sidebar {
  display: flex;
  flex-direction: column;
  align-content: start;
  gap: 2rem;
  background: #780c0c;
  width: 100%;
  grid-row: 1 / 3;
  grid-column: 1;
  color: white;
  text-align: center;
  padding: 2rem;
}

.no-tutors {
  margin-top: 10rem;
}

.tutoring-sidebar h1.name {
}

.tutoring-sidebar h1 {
}

.tutoring-sidebar h2 {
  width: 65%;
  margin: 0 auto;
}

.tutoring-sidebar h2.subtitle {
  width: 100%;
  font-weight: initial;
  margin-bottom: 1rem;
}

.tutoring-sidebar select {
  width: 80%;
  margin: 1rem;
  padding: 1rem;
  border-radius: var(--border-radius);
  cursor: pointer;
}

.tutoring-sidebar select:hover {
  background-color: var(--light-gray);
}

select.usingDefault {
  font-style: italic;
  font-weight: 100;
}

option {
  background-color: white;
  font-style: initial;
}

.tutoring-calendar {
  background: white;
  width: 100%;
  height: 75vh;
  grid-row: 2;
  grid-column: 2;
  display: grid;
  grid-template-columns: repeat(5, 20%);
  grid-template-rows: repeat(8, 1fr);
  padding: 1.5rem 0;
  margin-bottom: -2rem;
}

.tutoring-calendar button {
  box-sizing: border-box;
  width: 100%;
  margin: 0.25rem;
  height: 5rem;
  align-self: center;
  justify-self: center;
  border-radius: var(--border-radius);
  border: solid 2px white;
  cursor: pointer;
}

.tutoring-calendar button:hover {
  opacity: 0.75;
}

.calendar-time:nth-child(even),
.even-row {
  background-color: #f2f2f2;
}

.calendar-time {
  padding-top: 4px;
  padding-left: 8px;
  grid-column: 1;
}

.date {
  margin: 0.125rem;
  height: 100%;
  display: flex;
  justify-content: center;
  align-content: center;
  border: none;
}

.day-time {
  text-align: center;
  margin-top: 2rem;
}

.selectionInfo h3 {
  text-align: left;
  margin-left: 4rem;
  margin-top: 2rem;
  text-decoration: none;
  font-weight: initial;
  font-style: italic;
}

.selectionInfo h2 {
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
  margin-top: 1rem;
  width: 100%;
  text-align: center;
}

.tutors-container {
  text-align: left;
  margin-left: 4rem;
  margin-top: 0.5rem;
}

.tutors-container p {
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

.reset-button:hover {
  opacity: var(--hover-opacity);
}

.v-enter-active,
.v-leave-active {
  transition: all 0.25s ease-in-out;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
  transform: translateY(-60px);
}

@media (max-width: 1350px) {
  .tutoring-sidebar h1.title {
  }

  .tutoring-sidebar h2.subtitle {
  }

  .tutoring-sidebar select {
  }

  button {
  }

  .courses-container {
    gap: 0.5rem;
    margin-left: 1rem;
  }

  .courses-container p {
  }

  .tutors-container p {
  }

  .tutoring-sidebar h1 {
  }

  .tutoring-sidebar h2 {
    width: 100%;
  }
}

@media (max-width: 1200px) {
  .tutoring-sidebar h1.title {
  }

  .tutoring-sidebar h2.subtitle {
  }

  .tutoring-sidebar select {
  }

  button {
  }
}

@media (max-width: 1000px) {
  .selectionInfo h3 {
    margin: 0 10px;
  }

  .courses-container {
    grid-template-columns: 33% 33% 33%;
  }

  .tutoring-sidebar h2 {
    margin-left: 0;
  }
}
</style>
