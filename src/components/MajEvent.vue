<template>
  <div>
    <div class="card text-center w-75" style="margin: auto; margin-top: 50px">
      <div class="card-body">
        <h1 class="card-title" style="font-size: 100px">{{ev.name}}</h1>
        <p class="card-text">
          {{ev.desc}}
        </p>
        <a :href="ev.siteURL" target="_blank" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props:{
      ev:Object,
    }
  }
</script>

<style scoped>
</style>
