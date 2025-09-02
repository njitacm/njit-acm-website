<template>
  <div>
    <div v-show="tutoringCurrAvailable" class="container">
      <div class="tutoring-sidebar">
        <div class="title-and-subtitle">
          <h1 class="title">YWCC Undergraduate Tutoring Schedule</h1>
          <h2 class="subtitle">
            YWCC tutoring is walk-in only (no reservations). If you can't make it in-person, you can join virtually.
          </h2>
        </div>
        <div class="meet-link-button-and-dropdown">
          <PrimaryButton class="meet-link-button">
            <div>
              <!-- <img src="../../assets/img/GoogleMeet.png"> -->
              <a href="https://meet.google.com/tng-yefx-fqd" target="_blank">Google Meet Link</a>
            </div>
          </PrimaryButton>
          <div class="dropdown">
            <select @change="selectClass" v-model="selectedCourse" :class="{ usingDefault: selectedCourse == -1 }">
              <option selected disabled value="-1" style="display: none">
                Select a course...
              </option>
              <option v-for="course in courses" :key="course">
                {{ course }}
              </option>
            </select>
            <img class="reset-button" @click="reset" src="../../assets/reset.svg" alt="reset-button" />
          </div>
        </div>
      </div>
      <main>
        <table class="tutoring-calendar" cellspacing="2.5rem" cellpadding="0">
          <tr>
            <th>MON</th>
            <th>TUE</th>
            <th>WED</th>
            <th>THU</th>
            <th>FRI</th>
          </tr>
          <tr v-for="hour in hoursPerDay" :key="hour">
            <td v-for="day in numDays" :key="day">
              <button :ref="getIndexFromRowColumn(hour, day, numDays)"
                @click="selectDate(getIndexFromRowColumn(hour, day, numDays))">
                {{ timeIntToString(this.getTime(getIndexFromRowColumn(hour, day, numDays))) }}
              </button>
            </td>
          </tr>
        </table>
        <div class="details-panel">
          <Transition mode="out-in">
            <div v-if="dateSelected && classSelected && selectionInfo.empty" class="selection-info">
              <h1 class="day-time">
                {{ selectionInfo.day }} {{ selectionInfo.time }}
              </h1>
              <p v-if="selectedCourse == -1" class="no-tutors">
                There is no tutoring available during this time slot
              </p>
              <p v-else class="no-tutors">
                There is no tutoring available during this time slot for the course selected
              </p>
            </div>
            <div v-else-if="dateSelected && classSelected" class="selection-info">
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
            <div v-else-if="dateSelected" class="selection-info">
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
            <div v-else class="selection-info no-selection">
              <p>Select a time slot and/or course to view details.</p>
            </div>
          </Transition>
        </div>

      </main>
    </div>
    <div v-show="!tutoringCurrAvailable" class="no-tutoring">
      Tutoring is only offered during the Fall and Spring semeseters. Please check back later.
    </div>
  </div>
</template>

<script>
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
    getIndexFromRowColumn(row, col, ncol) {
      return (row - 1) * ncol + col;
    },
    // starts at 1
    getRow(index) {
      return Math.floor((index - 1) / this.numDays) + 1;
    },
    // starts at 1
    getCol(index) {
      return index - (this.getRow(index) - 1) * this.numDays;
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
      console.log(this.$refs);
      for (var i = 1; i <= this.numDays * this.hoursPerDay; i++) {
        this.$refs[i][0].style.border = "2px solid white";
      }
      console.log("bye");
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
      return this.business[row].Data[col - 2];
    },
    getColor(index) {
      return this.getBusinessColor(index);
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
      var business = this.getBusinessFromIndex(index);
      var percent = business / this.maxBusiness;
      if (percent < 0.33) {
        return "#00bf5f";
      } else if (percent < 0.67) {
        return "#faf25f";
      } else {
        return "#e69407";
      }
    },
  },
  data() {
    return {
      tutoringCurrAvailable: true,   // true only during fall and spring semesters!
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

.no-tutoring {
  font-size: 3rem;
  text-align: center;
  align-content: center;
  height: 100%;
  text-wrap: balance;
}

/* container */
.container {
  font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
}

/* tutoring sidebar */
.tutoring-sidebar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: #780c0c;
  width: 100%;
  color: white;
  padding: 1rem 2rem;
}

.tutoring-sidebar .title-and-subtitle {
  width: fit-content;
}

.tutoring-sidebar h1.name {
  font-size: 4rem;
}

.tutoring-sidebar h1 {
  font-size: 3.25rem;
}

.tutoring-sidebar h2 {
  font-size: 2rem;
  width: 65%;
}

.tutoring-sidebar h2.subtitle {
  width: 100%;
  font-weight: initial;
}

@media (max-width: 1450px) {
  .tutoring-sidebar {
    flex-direction: column;
    justify-items: center;
    text-align: center;
    gap: 2rem;
  }
}

@media (max-width: 800px) {
  h1.title {
    font-size: 19pt;
  }
}

/* meet link and dropdown */
.meet-link-button-and-dropdown {
  display: flex;
  gap: 1rem;
  align-items: center;
  justify-content: space-between;
}

.meet-link-button>div {
  display: flex;
  height: 100%;
}

div.dropdown {
  margin: 0;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.dropdown select {
  padding: 1rem;
  border-radius: var(--border-radius);
  cursor: pointer;
}

.dropdown select:hover {
  background-color: var(--light-gray);
}

.dropdown select.usingDefault {
  font-style: italic;
  font-weight: 100;
}

option {
  background-color: white;
  font-style: initial;
}

.reset-button {
  height: 4.25rem;
  cursor: pointer;
}

.reset-button:hover {
  opacity: var(--hover-opacity);
}

@media (max-width: 575px) {
  .meet-link-button {
    width: 100%;
  }
  .dropdown {
    width: 100%;
  }
  .meet-link-button-and-dropdown {
    flex-direction: column;
  }
}

/* details panel */
main {
  display: flex;
  gap: 2rem;
  width: calc(100% - 20px);
  margin: 1rem auto;
}

main .details-panel {
  flex-basis: 30%;
  overflow: hidden;
  border: var(--border-width) var(--light-gray) solid;
  border-radius: var(--border-radius);
  padding: 2rem;
  display: flex;
}

.no-selection {
  align-self: center;
  margin: 0 auto;
}

.no-selection p {
  font-size: 25pt;
  text-align: center;
}

.selection-info {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.day-time {
  font-size: 3.2rem;
  text-align: center;
}

.selection-info h3 {
  font-size: 1.8rem;
  text-align: left;
  font-weight: initial;
  font-style: italic;
}

.selection-info h2 {
  font-size: 2rem;
  text-align: left;
}

.courses-container {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: start;
}

.courses-container p {
  width: min-content;
  font-size: 2rem;
  text-align: left;
}

.tutors-container {
  font-size: 2rem;
  text-align: left;
}

.tutors-container p {
  font-size: 2rem;
}

.select-for-details {
  text-align: center;
  margin: auto;
}

@media (max-width: 1150px) {
  main {
    flex-direction: column;
  }
}

/* tutoring calendar */
.tutoring-calendar {
  width: 100%;
  padding: 0;
  margin: 0;
}

.tutoring-calendar tr {
  height: 2rem;
  font-size: 20pt;
  margin: 0;
}

.tutoring-calendar th {
  color: var(--red);
  border-bottom: var(--border-width) var(--red) solid;
  padding: 1rem 0rem;
  margin-bottom: 1rem;  
}

.tutoring-calendar button {
  box-sizing: border-box;
  width: 100%;
  font-size: 2.4rem;
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

@media (max-width: 850px) {
  .tutoring-calendar button {
    font-size: 12.5pt;
  }

  .no-selection p {
    font-size: 15pt;
  }
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

</style>