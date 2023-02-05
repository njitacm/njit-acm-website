<template>
  <div>
    <div v-for="(item, i) in li" :key="i">
      <div class="row w-100 m-auto"  v-if="i % 3 == 0">
        <div class="col" v-for="j in 3" :key="j">
          <div class="card" v-if="i+j<=li.length">
            <div class="card-body">
              <h4 class="card-title" style="text-align:center">{{ li[i+j-1].name }}</h4>
              <div class="row" style="text-align: center;">
                <div class="col">
                  <h6>{{li[i+j-1].timedate}}</h6>
                </div>
                <div class="col">
                  <h6>{{li[i+j-1].location}}</h6>
                </div>
              </div>
              <hr style="margin:0; background-color:black"/>
              <!--<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->
              <p class="card-text">
                {{ li[i+j-1].desc }}
              </p>
            <!--  <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    li: Array,
  },
};
</script>

<style scoped>
.card{
  min-width:90%;
}
</style>
