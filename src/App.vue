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

</style>
