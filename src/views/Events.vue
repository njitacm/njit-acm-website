<template>
  <div>
    <MajEvent :ev="HackNJIT"/>
    <MajEvent :ev="JerseyCTF"/>
    <hr />
     <ItemGrid :li="MinorEv"/>
  </div>
</template>

<script>
  import MajEvent from "../components/MajEvent";
  import ItemGrid from "../components/ItemGrid.vue";

  export default {
    components: {
      MajEvent,
      ItemGrid
    },
    data() {
      return {
        HackNJIT: {
          name:"HackNJIT",
          desc:"HackNJIT is a 24-hour hackathon at the New Jersey Institute of Technology, run by its ACM student chapter in conjunction with the Ying Wu College of Computing.",
          siteURL:"https://hacknjit.org/"
        },
        JerseyCTF:{
          name:"JerseyCTF",
          desc:"JerseyCTF is a beginner-friendly Capture the Flag competition that aims to inspire interest in cybersecurity. Hosted by the NJIT ACM organization and NJIT SCI program, it is geared towards students, beginners, and professionals alike.",
          siteURL:"https://jerseyctf.com/"
        },
         MinorEv:[
          {
            name:"Test title1",
            desc:"Some quick example text to build on the card title and make up the bulk of the card's content.",
          },
          {
            name:"Test title2",
            desc:"Some quick example text to build on the card title and make up the bulk of the card's content.",
          },
          {
            name:"Test title3",
            desc:"Some quick example text to build on the card title and make up the bulk of the card's content.",
          },
          {
            name:"Test title4",
            desc:"Some quick example text to build on the card title and make up the bulk of the card's content.",
          },
          {
            name:"Test title5",
            desc:"Some quick example text to build on the card title and make up the bulk of the card's content.",
          },
        ]
      }
   }
  }

</script>

<style>

</style>
