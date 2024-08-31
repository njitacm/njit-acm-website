package tutoring

import (
	"encoding/json"
	"fmt"
	"log"
)

type Visit struct {
	Class string
	Data  []string
}

func GetVisits() []byte {
	sheetData, err := srv.Spreadsheets.Values.Get(spreadsheetId, "Visits!A4:R42").Do()
	if err != nil || sheetData.HTTPStatusCode != 200 {
		fmt.Println("Error Getting Visits Sheet")
		log.Fatal(err)
	}

	visits := []Visit{}

	for _, row := range sheetData.Values {
		rowData := make([]string, len(row))
		for i, col := range row {
			rowData[i] = fmt.Sprint(col)
		}

		visits = append(visits, Visit{
			Class: rowData[0],
			Data:  rowData[1:],
		})
	}

	visitsData, _ := json.Marshal(visits)
	return visitsData
}
