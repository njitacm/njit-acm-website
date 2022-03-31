<template>
  <div>
    <div class="card text-center w-75" style="margin: auto; margin-top: 50px">
      <div class="card-body">
        <h1 class="card-title" style="font-size: 100px">{{eventName}}</h1>
        <p class="card-text">
          {{desc}}
        </p>
        <a :href="siteURL" target="_blank" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props:{
        eventName: String,
        desc: String,
        siteURL: String
    }
  }
</script>

<style scoped>
</style>
