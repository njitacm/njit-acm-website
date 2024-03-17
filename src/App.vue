<template>
  <span>
    <Navbar />
    <router-view />
    <Footer />
  </span>
</template>

<script>
import Navbar from "./components/Navbar";
import Footer from "./components/Footer";

export default {
  components: {
    Navbar,
    Footer,
  },
  metaInfo: {
    title: "NJIT ACM",
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css?family=Ubuntu");
body * {
  font-family: "Ubuntu";
}
.card {
  background-color: #ff7373 !important;
  box-shadow: 0px 0px 15px rgb(185, 184, 184);
}
.title {
  text-align: center;
  display: block;
  margin: 35px auto 20px auto !important;
  font-size: 3.5em !important;
}
.subtitle{
  text-align: center;
  padding: 0 25% 0 25%;
}
</style>
