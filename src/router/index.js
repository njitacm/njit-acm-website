import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import Sigs from "../views/Sigs";
import Events from "../views/Events";
import Tutoring from "../views/Tutoring";
import Constitution from "../views/Constitution";
import Eboard from "../views/Eboard"

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home
  },
  {
    path: "/sigs",
    name: "SIGS",
    component: Sigs
  },
  {
    path: "/events",
    name: "Events",
    component: Events
  },
  {
    path: "/tutoring",
    name: "Tutoring",
    component: Tutoring
  },
  {
    path: "/constitution",
    name: "Constitution",
    component: Constitution
  },
  {
    path: "/eboard",
    name: "Eboard",
    component: Eboard
  },
  { 
    path: "/discord",
    beforeEnter() {window.location.href = "https://njit.gg/acm"}
  },
  { 
    path: "/instagram",
    beforeEnter() {window.location.href = "https://instagram.com/NJITACM/"}
  },
  {
    path: "*",
    redirect: "/"
  }

];
function scrollBehavior(){
  return { x: 0, y: 0 };
}
const router = new VueRouter({
  // mode: "history", //Add back when we figure out server https://router.vuejs.org/guide/essentials/history-mode.html#HTML5-Mode
  routes,
  scrollBehavior
});

export default router;
