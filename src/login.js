import {HttpClient} from 'aurelia-http-client';
import {Router} from 'aurelia-router';

var baseUrl = 'http://localhost:3000/meeting/attend';

export class Login {
	static inject() { return [HttpClient, Router];}
	constructor (http, router) {
		this.ucid = "";
		this.meetingCode = "spiderman";
		this.meetingId = "27-feb-2015";
		this.http = http.request.withHeader('content-type', 'application/json');
		this._router = router;
		this.errorMessage = '';
		this.successMessage = '';
	}
	submit () {
		this.errorMessage = '';
		this.successMessage = '';
		return this.http.post(baseUrl, {
			ucid: this.ucid,
			code: this.meetingCode,
			meetingID: this.meetingId
		}).then(response => {
			var result = JSON.parse(response.response);
			console.log(result);
			if (result.error) {
				this.errorMessage = result.message;
				this.successMessage = '';
			} else {
				this.ucid = "";
				this.errorMessage = '';
				this.successMessage = 'You have successfully attended to meeting.';
			}
		});
	}
}