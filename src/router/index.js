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
    path: "*",
    redirect: "/"
  }

];

const router = new VueRouter({
  mode: "history",
  routes
});

export default router;
