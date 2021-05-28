import {Router} from 'aurelia-router';
import bootstrap from 'bootstrap';

export class App {
  static inject() { return [Router]; }
  constructor(router) {
    this.router = router;
    this.router.configure(config => {
      config.title = 'NJIT ACM';
      config.map([
        { route: ['','welcome'], moduleId: 'welcome',      nav: true, title: 'Welcome' },
        { route: 'eboard',       moduleId: 'eboard',       nav: true, title: 'E-Board' },
        { route: 'sigs',         moduleId: 'sigs',         nav: true, title: 'SIGs'},
        { route: 'calendar',     moduleId: 'calendar',     nav: true, title: 'Calendar' },
        { route: 'tutors',       moduleId: 'tutors',       nav: true, title: 'Tutors'},
        { route: 'constitution', moduleId: 'constitution', nav: true, title: 'Constitution'},
        { route: 'login',        moduleId: 'login',        nav: true, title: 'Login'}
      ]);
    });
  }
}