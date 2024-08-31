package tutoring

import (
	"encoding/json"
	"fmt"
	"log"
)

type Business struct {
	StartTime string
	EndTime   string
	Data      []string
}

func GetBusiness() []byte {
	sheetData, err := srv.Spreadsheets.Values.Get(spreadsheetId, "Business!A51:H60").Do()
	if err != nil || sheetData.HTTPStatusCode != 200 {
		fmt.Println("Error Getting Visits Sheet")
		log.Fatal(err)
	}

	business := []Business{}

	for _, row := range sheetData.Values {
		rowData := make([]string, len(row))
		for i, col := range row {
			fmt.Println(col)
			rowData[i] = fmt.Sprint(col)
		}
		fmt.Println(rowData)

		business = append(business, Business{
			StartTime: rowData[0],
			EndTime:   rowData[1],
			Data:      rowData[2:],
		})
	}

	businessData, _ := json.Marshal(business)
	return businessData
}
