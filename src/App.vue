<template>
  <span>
    <Navbar/>
    <router-view />
  </span>
</template>

<script>
  import Navbar from "./components/Navbar";

  export default {
    components: {
      Navbar,
    }
  }
</script>

<style>
.card{
      background-color: #d1d2d4 !important;
      box-shadow: 0px 0px 15px rgb(185, 184, 184);
  }
</style>
