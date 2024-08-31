package tutoring

import (
	"encoding/json"
	"fmt"
	"log"
)

type Attendance struct {
	Email    string
	FullName string
	Data     []string
}

func GetAttendance() []byte {
	sheetData, err := srv.Spreadsheets.Values.Get(spreadsheetId, "Tutor Attendance!A4:R28").Do()
	if err != nil || sheetData.HTTPStatusCode != 200 {
		fmt.Println("Error Getting Attendence Sheet")
		log.Fatal(err)
	}

	attendance := []Attendance{}

	for _, row := range sheetData.Values {
		rowData := make([]string, len(row))
		for i, col := range row {
			rowData[i] = fmt.Sprint(col)
		}

		attendance = append(attendance, Attendance{
			Email:    rowData[0],
			FullName: rowData[1],
			Data:     rowData[2:],
		})
	}

	attendanceData, _ := json.Marshal(attendance)
	return attendanceData
}
