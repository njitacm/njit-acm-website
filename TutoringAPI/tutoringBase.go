package tutoring

import (
	"context"
	"fmt"
	"log"
	"os"

	"golang.org/x/oauth2/google"
	"google.golang.org/api/option"
	"google.golang.org/api/sheets/v4"
)

// How to find spreadsheetId: https://docs.google.com/spreadsheets/d/<SPREADSHEETID>/edit#gid=<SHEETID>
var spreadsheetId string = "1G47jfoffzsUKMcDjjL2dwbtVnG9097zlxTOblpMtBjc"
var srv *sheets.Service

func init() {
	// create api context
	ctx := context.Background()

	// get bytes from base64 encoded google service accounts key
	credBytes, err := os.ReadFile("./credentials.json")
	if err != nil {
		fmt.Println("0")
		log.Fatal(err)
	}

	// authenticate and get configuration
	config, err := google.JWTConfigFromJSON(credBytes, "https://www.googleapis.com/auth/spreadsheets")
	if err != nil {
		fmt.Println("1")
		log.Fatal(err)
	}

	// create client with config and context
	client := config.Client(ctx)

	// create new service using client
	srv, err = sheets.NewService(ctx, option.WithHTTPClient(client))
	if err != nil {
		fmt.Println("Error retrieving service")
		log.Fatal(err)
	}
}
