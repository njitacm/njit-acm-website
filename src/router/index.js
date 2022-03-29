import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import Sigs from "../views/Sigs";

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
    path: "*",
    redirect: "/"
  }

];

const router = new VueRouter({
  mode: "history",
  routes
});

export default router;
