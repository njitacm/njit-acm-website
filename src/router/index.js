import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import Sigs from "../views/Sigs";
import Events from "../views/Events";
import Tutoring from "../views/Tutoring";

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
    path: "*",
    redirect: "/"
  }

];

const router = new VueRouter({
  mode: "history",
  routes
});

export default router;
