package main

import (
	"encoding/csv"
	"encoding/json"
	"fmt"
	"os"
)

type Business struct {
	StartTime string
	EndTime   string
	Data      []string
}

func convertBusiness() {
	csvFile, err := os.Open("./business.csv")
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

	var business []Business

	for _, row := range csvData {
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

	// Convert to JSON
	jsonData, err := json.Marshal(business)
	if err != nil {
		fmt.Println(err)
		os.Exit(1)
	}

	fmt.Println(string(jsonData))

	jsonFile, err := os.Create("../src/assets/data/business.json")
	if err != nil {
		fmt.Println(err)
	}
	defer jsonFile.Close()

	jsonFile.Write(jsonData)
	jsonFile.Close()
}
