<template>
<div>
  <b-carousel
    id="carousel-1"
    v-model="slide"
    controls
    indicators
    style="width: 70%;margin-top: 20px;margin-left: 15%;"
  >
    <!-- Slides with image only -->
    <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=58"></b-carousel-slide>

    <!-- Slides with img slot -->
    <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
    <b-carousel-slide>
      <template #img>
        <img
          class="d-block img-fluid w-100"
          width="1024"
          height="480"
          src="https://picsum.photos/1024/480/?image=55"
          alt="image slot"
        >
      </template>
    </b-carousel-slide>
  </b-carousel>

  <b-card style="width: 100%; margin: 30px 0px 30px 0px; border-radius: 0 !important;">
      <b-card-body style="margin-bottom: 300px;">Some quick example text to build on the card title and make up the bulk of the card's content.</b-card-body>
      
  </b-card>
  <div style="margin:300px"></div>

  <b-card style="width: 100%; margin: 30px 0px 30px 0px; border-radius: 0 !important;">
      <b-card-body style="margin-bottom: 300px;">Some quick example text to build on the card title and make up the bulk of the card's content.</b-card-body>
      
  </b-card>
  <div style="margin:300px"></div>
  </div>
</template>

<script>

export default {
  name: 'Home',
}
</script>

<style>
  .card{
      background-color: #d1d2d4 !important;
      box-shadow: 0px 0px 15px rgb(185, 184, 184);
  }
</style>
