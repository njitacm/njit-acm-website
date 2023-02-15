<template>
  <div>
    <h1 class="m-2 title">Eboard</h1>
    <h6 class="subtitle">
      Below is a list of our current-acting EBoard members and their positions.
      EBoard elections are held every fall semester. In order to be qualified
      to vote, you must attend at least one-half of our meetings throughout the
      semester.
    </h6>
    <div v-for="(item, i) in EboardMembers" :key="i">
      <div class="row w-100 r"  v-if="i % 2 == 0">
        <div class="col c" v-for="j in 2" :key="j">
          <div v-if="i+j<=EboardMembers.length">
          <h1>{{ EboardMembers[i+j-1].role }}</h1>
          <img :src="require('../assets/eboard/' + EboardMembers[i+j-1].role.toLowerCase() + '.png')"/>
          <h4>{{ EboardMembers[i+j-1].name +", "+EboardMembers[i+j-1].year+" "+EboardMembers[i+j-1].major+" Major" }}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
export default {
  name: "Eboard",
  data(){
    return {
        EboardMembers:[
          {
            role:"President",
            name:"Ethan Ho",
            year:"Sophomore",
            major:"CS" 
          },
          {
            role:"President",
            name:"Ethan Ho",
            year:"Sophomore",
            major:"CS" 
          },          {
            role:"President",
            name:"Ethan Ho",
            year:"Sophomore",
            major:"CS" 
          },          {
            role:"President",
            name:"Ethan Ho",
            year:"Sophomore",
            major:"CS" 
          },          {
            role:"President",
            name:"Ethan Ho",
            year:"Sophomore",
            major:"CS" 
          },
    ]
    }
  }
};
</script>
  
<style>
.r{
  margin:5% 0 5% 0 !important;
  padding-left: 15% !important;
  padding-right: 10% !important;
}
 .c{
  justify-content: center;
  display: grid;
 }
</style>
  