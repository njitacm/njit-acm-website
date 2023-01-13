<template>
  <div style="display: flex">
    <div class="card text-center w-100" style="margin-top: 50px">
      <div class="card-body">
        <div
          :style="{
            background:'url(' + require('../assets/' + ev.name.toLowerCase() + '.png') + ')',
            'background-repeat': 'no-repeat',
            'background-size': 'contain',
            'background-position': 'center',
          }"
        >
          <div style="position: relative">
            <h1 class="card-title" style="font-size: 100px">{{ ev.name }}</h1>
            <p class="card-text" style="font-weight:500">
              {{ ev.desc }}
            </p>
            
            <a :href="ev.siteURL" target="_blank"
              ><b-button style="background-color:#e3b1b1; color:black">Learn More</b-button></a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    ev: Object,
  },
};
</script>

<style scoped>
</style>
