<template>
  <div style="display:flex">
    <div class="card text-center w-100" style="margin-top: 50px;">
      <div class="card-body">
        <div class="backIm" ><!--:style="{background:'url('+require('../assets/'+ev.name.toLowerCase() + '.png')+')'}"-->
          <div style="position: relative;">
        <h1 class="card-title" style="font-size: 100px">{{ev.name}}</h1>
        <p class="card-text">
          {{ev.desc}}
        </p>
        <a :href="ev.siteURL" target="_blank" class="btn btn-primary">Go somewhere</a>
      </div>
      </div>
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

.backIm:before{
  /*This part is required for having an opaque image*/
  content:" ";
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;

  /*background: url("../assets/hacknjit.png");*/
  background-repeat: no-repeat;
  background-size: 50%;
  background-position: center;
  opacity: .9;
}
</style>
