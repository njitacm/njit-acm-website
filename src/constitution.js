// import {HttpClient} from 'aurelia-http-client';

// var url = 'localhost:8080/api/articles';

export class Constitution {
	// static inject () {return [HttpClient]};
	constructor(http){
		// this.http = http;
	}
	activate(){
		// return this.http.get(url).then(response => {
		// 	this.articles = response.content.articles;
		// });
	}
}