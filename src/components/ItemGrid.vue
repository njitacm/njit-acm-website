<template>
  <div>
    <div v-for="(item, i) in li" :key="i">
      <div class="row w-100" style="margin: auto" v-if="i % 4 == 0">
        <div class="col" v-for="j in 4" :key="j">
          <div class="card" v-if="i+j<=li.length">
            <div class="card-body">
              <h5 class="card-title">{{ li[i+j-1].name }}</h5>
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
</style>
