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
      title: 'NJIT ACM',
  }
};
</script>

<style>
  @import url('https://fonts.googleapis.com/css?family=Ubuntu');
body *{
font-family: "Ubuntu";

}
.card{
      background-color: #f87777bc !important;
      box-shadow: 0px 0px 15px rgb(185, 184, 184);
  }
</style>
