package main

import (
	"encoding/csv"
	"encoding/json"
	"fmt"
	"log"
	"os"
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

func convertTutors() {
	csvFile, err := os.Open("./tutors.csv")
	if err != nil {
		fmt.Println(err)
	}
	defer csvFile.Close()

	reader := csv.NewReader(csvFile)
	reader.FieldsPerRecord = -1

	csvData, err := reader.ReadAll()
	if err != nil {
		fmt.Println(err)
		os.Exit(1)
	}

	var tutors []Tutor

	for i, row := range csvData {
		if i == 0 {
			continue
		}
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

	// Convert to JSON
	jsonData, err := json.Marshal(map[string]any{
		"Meta": map[string]any{
			"Offset": 30, // # of min from the hour, e.g. xx:30
		},
		"Tutors": tutors,
	})
	if err != nil {
		fmt.Println(err)
		os.Exit(1)
	}

	jsonFile, err := os.Create("../src/assets/data/tutors.json")
	if err != nil {
		fmt.Println(err)
	}
	defer jsonFile.Close()

	jsonFile.Write(jsonData)
	jsonFile.Close()
}

func getTutorTimes(timeSlots []string) []TimeSlot {
	parsedTimeSlots := []TimeSlot{}
	for _, time := range timeSlots {
		if time == "TBD" {
			fmt.Println("Skipped a time because it was TBD")
			continue
		}
		day, parsedTimes := parseTimes(time)
		temp := []int{}
		parsedTimeSlot := TimeSlot{}
		for _, timeString := range parsedTimes {
			re := regexp.MustCompile("([Aa][Mm])")
			// get AM / PM
			timeOfDay := timeString[len(timeString)-2:]
			var hour int
			var err error

			if strings.Contains(timeString, ":") {
				parts := strings.Split(timeString[0:len(timeString)-2], ":")
				hour, err = strconv.Atoi(parts[0])
			} else {
				hour, err = strconv.Atoi(timeString[0 : len(timeString)-2])
			}

			if err != nil {
				log.Panic(err)
			}
			if !re.MatchString(timeOfDay) {
				hour = (hour % 12) + 12
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
	case "Tu":
		dayInt = 1
	case "We":
		dayInt = 2
	case "Th":
		dayInt = 3
	case "Fr":
		dayInt = 4
		// case "Sa":
		// 	dayInt = 5
	}
	re := regexp.MustCompile("(0?[0-9]|1[0-9]|2[0-3])(:[0-5][0-9])?([AaPp][Mm])")
	fmt.Println(re.FindAllString(s, -1))
	return dayInt, re.FindAllString(s, -1)
}
