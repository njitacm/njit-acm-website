package main

import (
	"fmt"
	"log"
	"net/http"

	tutoring "acm.njit.edu/TutoringAPI"
)

var port string = ":8080"

func main() {
	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		fmt.Println(r.URL.Path)
		http.FileServer(http.Dir("./dist")).ServeHTTP(w, r)
	})
	http.HandleFunc("/api/tutors", func(w http.ResponseWriter, r *http.Request) {
		w.Write(tutoring.GetTutors())
	})
	http.HandleFunc("/api/attendance", func(w http.ResponseWriter, r *http.Request) {
		w.Write(tutoring.GetAttendance())
	})
	http.HandleFunc("/api/visits", func(w http.ResponseWriter, r *http.Request) {
		w.Write(tutoring.GetVisits())
	})
	http.HandleFunc("/api/business", func(w http.ResponseWriter, r *http.Request) {
		w.Write(tutoring.GetBusiness())
	})

	log.Printf("Listening on %s...", port)
	err := http.ListenAndServe(port, nil)
	if err != nil {
		log.Fatal(err)
	}
}
