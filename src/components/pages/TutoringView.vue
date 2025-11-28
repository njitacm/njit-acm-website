<template>
  <main class="TutoringView">
    <div v-if="tutoringCurrAvailable" class="container">
      <header class="top-container">
        <h1 class="title">YWCC Undergraduate Tutoring</h1>
        <p class="info">
          Tutoring from 11:30 AM - 6:30 PM. Walk-in only, no reservations. Available in both in-person and virtual.
        </p>
        <div class="buttons-and-dropdown">
          <PrimaryButton class="meet-link-button">
            <a href="https://meet.google.com/tng-yefx-fqd" target="_blank">Google Meet Link</a>
          </PrimaryButton>
          <PrimaryButton class="meet-link-button">
            <a href="https://computing.njit.edu/undergraduate-tutoring" target="_blank">YWCC Page</a>
          </PrimaryButton>
          <div class="dropdown">
            <!-- TODO: eventually cool to have a custom dropdown -->
            <select @change="selectClass" v-model="selectedCourse" :class="{ 'using-default': selectedCourse == -1 }">
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
      </header>
      <main>
        <table class="tutoring-calendar" cellspacing="2.5rem" cellpadding="0">
          <thead>
            <tr>
              <th></th>
              <th class="weekday">M</th>
              <th class="weekday">T</th>
              <th class="weekday">W</th>
              <th class="weekday">T</th>
              <th class="weekday">F</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(hour, index) in hoursPerDay" :key="index">
              <th class="time">
                {{ from24HrsTo12Hrs(startHour + index) }}
              </th>
              <td v-for="day in numDays" :key="day">
                <button :ref="getIndexFromRowColumn(hour, day, numDays)"
                  @click="selectDate(getIndexFromRowColumn(hour, day, numDays))" class="slot">
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <aside class="details">
          <p class="day-time">
            {{ selectionInfo.day }} {{ selectionInfo.time }}
          </p>
          <div v-if="selectionInfo.empty" class="selection-info">
            <p v-if="selectedCourse == -1" class="no-tutors">
              There is no tutoring available during this time slot.
            </p>
            <p v-else>
              There is no tutoring available during this time slot for the course selected.
            </p>
          </div>
          <div v-else class="selection-info">
            <div v-if="dateSelected || classSelected">
              <h3>In-Person AND Virtual</h3>
              <br />
              <div v-if="!classSelected">
                <h2 class="courses-title">Tutoring Offered</h2>
                <div class="courses-container">
                  <p v-for="course in selectionInfo.courses" :key="course">
                    {{ course }}
                  </p>
                </div>
                <br />
              </div>
              <div v-if="dateSelected">
                <h2>Tutors</h2>
                <div class="tutors-container">
                  <p v-for="tutor in selectionInfo.tutors" :key="tutor">
                    {{ tutor }}
                  </p>
                </div>
              </div>
            </div>
            <div v-else class="no-selection">
              <p>Select a time slot and/or course to view details.</p>
            </div>
          </div>
        </aside>
      </main>
    </div>
    <p v-else class="no-tutoring">
      Tutoring is only offered during the Fall and Spring semesters. Please check back later.
    </p>
  </main>
</template>

<script>
import tutors from "../../assets/data/tutors.json";
import PrimaryButton from "../PrimaryButton.vue";

export default {
  name: "TutoringView",
  components: { PrimaryButton },
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
      selectedCourse: "-1",
    };
  },
  computed: {
    classSelected() {
      return this.selectedCourse != "-1";
    },
  },
  methods: {
    async getTutors() {
      this.tutors = tutors.Tutors;
      this.getCourses();
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
        this.$refs[i][0].classList.remove("selected");
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
      this.$refs[date][0].classList.add("class-match");
    },
    uncolorDate(date) {
      this.$refs[date][0].classList.remove("class-match");
    },
  },
  mounted() {
    if (this.tutoringCurrAvailable) {
      this.getTutors();
      this.colorAllDates();
    }
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.no-tutoring {
  text-align: center;
  align-content: center;
  margin-inline: auto;
}

/* container */
.container {
  font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
}

/* tutoring sidebar */
.top-container {
  width: 100%;
  display: grid;
  justify-content: stretch;
  padding: 1rem 2rem;
}

.title,
.info {
  text-align: center;
}

.info {
  margin-bottom: 32px;
}

.buttons-and-dropdown {
  display: flex;
  gap: 16px;
  align-items: center;
  justify-content: center;
}

.dropdown {
  display: flex;
  align-items: center;
  gap: 16px;
  justify-content: center;
}

.dropdown select {
  font-size: 1.25em;
  min-height: 50px;
  padding-inline: 16px;
  border-radius: var(--border-radius);
  cursor: pointer;
  background-color: var(--bkg-color);
  color: var(--text-color);
}

.dropdown select.using-default {
  font-style: italic;
}

option {
  font-style: initial;
}

.reset-button {
  height: 50px;
  cursor: pointer;
}

[data-theme="light"] .reset-button {
  filter: invert(1);
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

main .details {
  flex-basis: 30%;
  overflow: hidden;
  border: var(--border-width) var(--gray) solid;
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
}

.weekday,
.time {
  color: var(--red);
  font-size: 1.25em;
}

.weekday {
  padding-bottom: 16px;
}

.time {
  text-align: right;
  padding-right: 16px;
}

.slot {
  box-sizing: border-box;
  width: 100%;
  height: 5rem;
  align-self: center;
  justify-self: center;
  cursor: pointer;
  border: none;
  background-color: var(--bkg-color);
}

.slot.class-match {
  background-color: var(--gray);
}

.slot.selected {
  background-color: var(--red);
}

@media(hover: hover) and (pointer: fine) {
  .dropdown select:hover {
    opacity: 0.75;
  }

  .reset-button:hover {
    opacity: var(--hover-opacity);
  }

  .slot:hover {
    opacity: 0.75;
  }
}

@media(pointer: coarse) {
  .dropdown select:active {
    opacity: 0.75;
  }

  .reset-button:active {
    opacity: var(--hover-opacity);
  }

  /* TODO: USE COLOR-MIX */
  .slot:active {
    opacity: 0.75;
  }
}
</style>