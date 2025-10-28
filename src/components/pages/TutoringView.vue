<template>
  <div>
    <div v-show="tutoringCurrAvailable" class="container">
      <div class="tutoring-sidebar">
        <div class="title-and-subtitle">
          <h1 class="title">YWCC Undergraduate Tutoring Schedule</h1>
          <p class="subtitle">
            Tutoring from 11:30 AM - 6:30 PM. Walk-in only, no reservations. Available in both in-person and virtual.
          </p>
        </div>
        <div class="buttons-and-dropdown">
          <PrimaryButton class="meet-link-button">
            <a href="https://meet.google.com/tng-yefx-fqd" target="_blank">Google Meet Link</a>
          </PrimaryButton>
          <PrimaryButton class="meet-link-button">
            <a href="https://computing.njit.edu/undergraduate-tutoring" target="_blank">YWCC Page</a>
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
          <thead>
            <tr>
              <th></th>
              <th>M</th>
              <th>T</th>
              <th>W</th>
              <th>T</th>
              <th>F</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(hour, index) in hoursPerDay" :key="index">
              <!-- times, e.g. 12-13 -->
              <th>
                {{ from24HrsTo12Hrs(startHour + index) }}
              </th>
              <td v-for="day in numDays" :key="day">
                <button :ref="getIndexFromRowColumn(hour, day, numDays)"
                  @click="selectDate(getIndexFromRowColumn(hour, day, numDays))">
                  <!-- {{ timeIntToString(this.getTime(getIndexFromRowColumn(hour, day, numDays))) }} -->
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="details-panel">
          <Transition mode="out-in">
            <div v-if="dateSelected && classSelected && selectionInfo.empty" class="selection-info">
              <h2 class="day-time">
                {{ selectionInfo.day }} {{ selectionInfo.time }}
              </h2>
              <p v-if="selectedCourse == -1" class="no-tutors">
                There is no tutoring available during this time slot
              </p>
              <p v-else class="no-tutors">
                There is no tutoring available during this time slot for the course selected
              </p>
            </div>
            <div v-else-if="dateSelected && classSelected" class="selection-info">
              <h2 class="day-time">
                {{ selectionInfo.day }} {{ selectionInfo.time }}
              </h2>
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
              <h2 class="day-time">
                {{ selectionInfo.day }} {{ selectionInfo.time }}
              </h2>
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
      this.tutors = tutors.Tutors;
      this.getCourses();
    },
    async getBusiness() {
      this.business = business;
    },
    displayDay(day) {
      // day = Mon, Tue, Wed, Thu, Fri
      if (window.screen.width <= 850) {
        return day[0];
      }

      return day;
    },
    from24HrsTo12Hrs(time) {
      const offsetStr = (this.offset !== 0) ? `:${this.offset}` : "";
      if (time >= 12) {
        if (time === 12) {
          return `12${offsetStr} PM`;
        } else {
          return `${time % 12}${offsetStr} PM`;
        }
      } else {
        return `${time}${offsetStr} AM`;
      }
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
      this.$refs[index][0].classList.add("selected");

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
        this.$refs[i][0].classList.remove("selected");
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
      var startAmPm = this.getTimeOfDay(timeStart);
      var endAmPm = this.getTimeOfDay(timeEnd);
      if (timeStart > 12) timeStart -= 12;
      if (timeEnd > 12) timeEnd -= 12;

      if (this.offset === 0) {
        return timeStart + startAmPm + "-" + timeEnd + endAmPm;
      } else {
        return `${timeStart}:${this.offset}` + startAmPm + "-" + `${timeEnd}:${this.offset}` + endAmPm;
      }
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
      this.$refs[date][0].style.background = "var(--gray)";
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
    getBusinessDescription() {
      // var business = this.getBusinessFromIndex(index);
      // var percent = business / this.maxBusiness;
      return "Not Busy";
      // if (percent < 0.33) {
      //   return "Not Busy";
      // } else if (percent < 0.67) {
      //   return "Moderately Busy";
      // } else {
      //   return "Busy";
      // }
    },
    getBusinessColor() {
      return "#00bf5f";
      // var business = this.getBusinessFromIndex(index);
      // var percent = business / this.maxBusiness;
      // if (percent < 0.33) {
      //   return "#00bf5f";
      // } else if (percent < 0.67) {
      //   return "#faf25f";
      // } else {
      //   return "#e69407";
      // }
    },
  },
  data() {
    return {
      tutoringCurrAvailable: true,   // true only during fall and spring semesters!
      dateSelected: false,
      selectionInfo: {},
      // adjust this according to each new year's tutoring
      numDays: 5,             // how many days of the week tutoring offered? e.g. Mon-Fri
      hoursPerDay: 7,         // how long is tutoring offered (in hours)? e.g. 11 AM-7 PM
      startHour: 11,          // when does tutoring start the earliest? e.g. 11 AM
      offset: tutors.Meta.Offset,  // minute offset from the hour: xx:30, e.g. 11:30, 12:30, 1:30...
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

.tutoring-sidebar h2 {
  width: 65%;
}

.tutoring-sidebar .subtitle {
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

/* meet link and dropdown */
.buttons-and-dropdown {
  display: flex;
  gap: 1rem;
  flex-grow: 2;
  flex-shrink: 0;
  align-items: center;
  justify-content: right;
}

div.dropdown {
  margin: 0;
  height: 100%;
  display: flex;
  align-items: center;
  gap: 0.5em;
  justify-content: center;
}

.dropdown select {
  height: 50px;
  padding: 1em;
  border-radius: var(--border-radius);
  cursor: pointer;
}

@media(hover: hover) and (pointer: fine) {
  .dropdown select:hover {
    opacity: 0.75;
  }
}

@media(pointer: coarse) {
  .dropdown select:active {
    opacity: 0.75;
  }
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
  height: 50px;
  cursor: pointer;
}

.reset-button:hover {
  opacity: var(--hover-opacity);
}

@media (max-width: 600px) {
  .PrimaryButton {
    width: 100%;
  }

  .dropdown {
    width: 100%;
  }

  .buttons-and-dropdown {
    flex-direction: column;
  }

  .dropdown {
    width: 100%;
  }

  .dropdown select {
    flex-grow: 2;
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
  text-align: center;
}

.selection-info {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.day-time {
  text-align: center;
}

.selection-info h3 {
  text-align: left;
  font-weight: initial;
  font-style: italic;
}

.selection-info h2 {
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
  text-align: left;
}

.tutors-container {
  text-align: left;
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
  table-layout: fixed;
  height: fit-content;
  width: 100%;
  padding: 0;
  margin: 0;
  border-spacing: 0;
}

.tutoring-calendar tr {
  margin: 0;
}

.tutoring-calendar th {
  color: var(--red);
  /* padding: 1rem; */
  margin-bottom: 1rem;
}

.tutoring-calendar thead th {
  font-weight: normal;
}

.tutoring-calendar tbody th {
  font-weight: normal;
  width: fit-content;
  text-align: right;
  padding-right: 1rem;
}

.tutoring-calendar td {
  border: 1px solid var(--bkg-color);
}

.tutoring-calendar button {
  box-sizing: border-box;
  width: 100%;
  height: 5rem;
  align-self: center;
  justify-self: center;
  cursor: pointer;
  border: none;
}

.tutoring-calendar button.selected {
  border: 3px solid var(--text-color);
}

@media(hover: hover) and (pointer: fine) {
  .tutoring-calendar button:hover {
    opacity: 0.75;
  }
}

@media(pointer: coarse) {
  .tutoring-calendar button:active {
    opacity: 0.75;
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