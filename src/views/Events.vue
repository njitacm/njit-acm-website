<template>
  <div>
    <MajEvent :ev="HackNJIT"/>
    <MajEvent :ev="JerseyCTF"/>
    <hr />
    <div class="row w-100">
      <div class="col">
        <div class="card" style="width: 18rem; margin: 20px">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 18rem">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import MajEvent from "../components/MajEvent";

  export default {
    components: {
      MajEvent,
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
        }
      }
   }
  }

</script>

<style>

</style>
