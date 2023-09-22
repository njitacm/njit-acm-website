<template>
  <div>
    <div v-if="this.$vnode.key%2==0">
      <div class="card-body row">
        <div class="col-1"/>
        <div class="col-3">
          <img
            class="w-75 d-block m-auto"
            :src="require('../assets/SIGS/' + sig.name + '.png')"
          />
        </div>
        <div class="col-6" style="text-align: center">
          <h3>{{sig.name}}</h3>
          <h5>{{sig.leader}} | {{sig.time}}</h5>
          <p>
            {{sig.desc}}
          </p>
        </div>
        <div class="col-1"/>
      </div>
    </div>
    <div v-if="this.$vnode.key%2==1"
      class="card"
      style="
        width: 100%;
        margin: 30px 0px 30px 0px;
        border-radius: 0 !important;
      "
    >
      <div class="card-body row">
        <div class="col-1"/>
        <div class="col-6" style="text-align: center">
          <h3>{{sig.name}}</h3>
          <h5>{{sig.leader}} | {{sig.time}}</h5>
          <p>
            {{sig.desc}}
          </p>
        </div>
        
        <div class="col-3">
          <img
            class="w-75 d-block m-auto"
            :src="require('../assets/SIGS/' + sig.name + '.png')"
          />
        </div>
        <div class="col-1"/>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    sig: Object,
  },
};
</script>

<style scoped>
</style>
