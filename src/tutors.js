export class Tutors {
	constructor() {
		this.query = '';
		this.tutors = [
			{
				name: 'John Cafiero',
				topics: ['Java', 'C', 'C++'],
				courses: ['IT 265', 'IT 266', 'IT 286', 'IT 386'],
				hours: {
					t: { start: '10:30', end: '11:30'},
					w: { start: '10:30', end: '11:30'}
				}
			}, {
				name: 'Sidney Carr',
				topics: ['Python', 'Java'],
				courses: ['CS 100', 'CS 113', 'CS 114'],
				hours: {
					w: { start: '3:30', end: '5'}
				}
			}, {
				name: 'Edward Conroy',
				topics: ['Java', 'C#', 'C++', 'C'],
				courses: ['IT 114', 'IT 265', 'IT 266', 'IT 276', 'CS 113'],
				hours: {
					t: { start: '2:30', end: '5'}
				}
			}, {
				name: 'Michael Derupo',
				topics: ['Java', 'PHP'],
				courses: ['CS 100', 'CS 113'],
				hours: {
					m: { start: '4:30', end: '6'},
					w: { start: '4:30', end: '6'}
				}
			}, {
				name: 'Matthew Downey',
				topics: ['C', 'C#', 'C++', 'Javascript', 'PHP', 'Java', 'Python', 'Matlab'],
				courses: ['CS 113', 'CS 114', 'CS 280', 'CS 288', 'CS 332', 'CS 490', 'IT 266', 'IT 276'],
				hours: {
					t: { start: '1', end: '2:30'},
					w: { start: '11:30', end: '1'}
				}
			}, {
				name: 'Nicholas Farley',
				topics: ['Java', 'C', 'C++', 'Python', 'Bash', 'Javascript', 'HTML', 'CSS'],
				courses: ['CS 114', 'CS 115', 'CS 241', 'CS 252', 'CS 280', 'CS 332', 'CS 431'],
				hours: {
					u: { start: '11:45', end: '2:15'}
				}
			}, {
				name: 'Atsuki Imamura',
				topics: ['Java', 'Python'],
				courses: ['CS 100', 'CS 113'],
				hours: {
					m: { start: '3:30', end: '5:30'}
				}
			}, {
				name: 'Al-Rashid Jamalul',
				topics: ['Python', 'Java', 'C', 'C++'],
				courses: ['CS 252', 'CS 332', 'CS 431'],
				hours: {
					t: { start: '11:30', end: '1'},
					f: { start: '1', end: '2'}
				}
			}, {
				name: 'Ashok Manoharan',
				topics: ['Java', 'C++'],
				hours: {
					f: { start: '10', end: '12'}
				}
			}, {
				name: 'Ashwin MuthuKumar',
				topics: ['C++'],
				hours: {
					t: { start: '1:30', end: '3'},
					u: { start: '12', end: '1'}
				}
			}, {
				name: 'Mohit Nakrani',
				topics: ['Java', 'Python', 'C++', 'Groovy', 'HTML', 'Javascript', 'JQuery', 'CSS', 'Grails'],
				courses: ['CS 100', 'CS 113', 'CS 114'],
				hours: {
					f: { start: '4', end: '5:30'}
				}
			}, {
				name: 'Jeff Ortiz',
				topics: ['Python', 'Java'],
				courses: ['CS 100'],
				hours: {
					m: { start: '2:30', end: '3:30'},
					f: { start: '2:30', end: '4'}
				}
			}, {
				name: 'Brandon Ruggles',
				topics: ['Java', 'C#', 'C++', 'Python', 'ARM'],
				courses: ['CS 100', 'CS 113', 'CS 114', 'CS 252', 'CS 332'],
				hours: {
					m: { start: '11:30', end: '2'}
				}
			}, {
				name: 'Dante Urso',
				topics: ['Python', 'C', 'C++', 'Java', 'Android'],
				courses: ['CS 113'],
				hours: {
					u: { start: '1', end: '3:30'}
				}
			}];
	}

	get searchFilter() {
		return 'hello';
	}
}