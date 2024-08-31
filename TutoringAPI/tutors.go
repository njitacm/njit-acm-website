package tutoring

import (
	"encoding/json"
	"fmt"
	"log"
	"regexp"
	"strconv"
	"strings"
)

type Tutor struct {
	Email           string
	LastName        string
	FirstName       string
	FullName        string
	TimeSlots       []string
	ParsedTimeSlots []TimeSlot
	Courses         []string
}

type TimeSlot struct {
	Day       int
	StartTime int
	EndTime   int
}

func GetTutors() []byte {
	sheetData, err := srv.Spreadsheets.Values.Get(spreadsheetId, "A2:F26").Do()
	if err != nil || sheetData.HTTPStatusCode != 200 {
		log.Fatal(err)
	}
	tutors := []Tutor{}
	for _, row := range sheetData.Values {
		var data []string
		for _, val := range row {
			data = append(data, fmt.Sprint(val))
		}
		rawTimeSlots := strings.Split(data[4], ",")
		rawCourses := strings.Split(data[5], ",")
		parsedCourses := []string{}
		for _, course := range rawCourses {
			parsedCourses = append(parsedCourses, strings.ReplaceAll(course, " ", ""))
		}

		newTutor := Tutor{
			Email:           data[0],
			LastName:        data[1],
			FirstName:       data[2],
			FullName:        data[3],
			TimeSlots:       rawTimeSlots,
			ParsedTimeSlots: getTutorTimes(rawTimeSlots),
			Courses:         parsedCourses,
		}

		tutors = append(tutors, newTutor)
	}

	tutorData, err := json.Marshal(tutors)
	if err != nil {
		fmt.Println(err)
	}
	return tutorData
}

func getTutorTimes(timeSlots []string) []TimeSlot {
	parsedTimeSlots := []TimeSlot{}
	for _, time := range timeSlots {
		day, parsedTimes := parseTimes(time)
		temp := []int{}
		parsedTimeSlot := TimeSlot{}
		for _, timeString := range parsedTimes {
			re := regexp.MustCompile("([Aa][Mm])")
			timeOfDay := timeString[len(timeString)-2:]
			hour, err := strconv.Atoi(timeString[0 : len(timeString)-2])
			if err != nil {
				log.Panic(err)
			}
			if !re.MatchString(timeOfDay) {
				hour += 12
			}
			temp = append(temp, hour)
		}
		parsedTimeSlot.Day = day
		parsedTimeSlot.StartTime = temp[0]
		parsedTimeSlot.EndTime = temp[1]
		parsedTimeSlots = append(parsedTimeSlots, parsedTimeSlot)
	}
	return parsedTimeSlots
}

func parseTimes(s string) (int, []string) {
	dayRegex := regexp.MustCompile("(Mo|Tu|We|Th|Fr|Sa)")
	day := dayRegex.FindString(s)
	dayInt := 0
	switch day {
	default:
	case "Mo":
		dayInt = 0
		break
	case "Tu":
		dayInt = 1
		break
	case "We":
		dayInt = 2
		break
	case "Th":
		dayInt = 3
		break
	case "Fr":
		dayInt = 4
		break
	case "Sa":
		dayInt = 5
		break
	}
	re := regexp.MustCompile("(0?[0-9]|1[0-9]|2[0-3])([AaPp][Mm])")
	return dayInt, re.FindAllString(s, -1)
}
