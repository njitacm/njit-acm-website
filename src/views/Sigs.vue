<template>
  <div>
    <h1 class="m-2 text-center title">SIGs</h1>
    <h6 class="subtitle">
      Student Interest Groups, or SIGs for short, are student run initiatives
      where a student teaches about a subject they are passionate in. Join any
      of the SIGs below, or start your own through our Discord!
    </h6>
    <hr/>
    <SIG v-for="(sig, index) in Sigs" :sig="sig" :key="index" />
    <hr />
    <h1 class="m-4">Past SIGs</h1>
    <ItemGrid :li="PastSigs" />
  </div>
</template>

<script>
import SIG from "../components/Sig";
import ItemGrid from "../components/ItemGrid.vue";

export default {
  name: "SIGS",
  components: {
    SIG,
    ItemGrid,
  },
  data() {
    return {
      Sigs: [
        {
          name: "sig-castles-n-crusaders",
          desc: "This SIG focuses on building \"castles\" in  the cloud using tools such as Terraform, and strengthening its security with tools like Ansible and Puppet. Afterwards they will be breaching the security they set up using various open source tools.",
          leader: "A",
          time: "TBD",
        },
        {
          name: "sig-lambda",
          desc: "A SIG about functional programming (FP), a programming paradigm that emphasizes the use of functions and compositions instead of iteration and state mutation (imperative programming).",
          leader: "Patrick Wu",
          time: "Wednesdays 10:00 A.M. | GITC 2400",
        },
        {
          name: "sig-stable",
          desc: "A new SIG focused on new developments in open source AI image generation using Stable Diffusion, covering topics such as how the technology works, how to use Stable Diffusion, training AI models, and tracking the latest developments.",
          leader: "Cade Riegler",
          time: "Tuesdays 4:00 P.M. | GITC 3700",
        },
      ],
      PastSigs: [
        {
          name: "Test title1",
          desc: "Some quick example text to build on the card title and make up the bulk of the card's content.",
        },
        {
          name: "Test title2",
          desc: "Some quick example text to build on the card title and make up the bulk of the card's content.",
        },
        {
          name: "Test title3",
          desc: "Some quick example text to build on the card title and make up the bulk of the card's content.",
        },
        {
          name: "Test title4",
          desc: "Some quick example text to build on the card title and make up the bulk of the card's content.",
        },
        {
          name: "Test title5",
          desc: "Some quick example text to build on the card title and make up the bulk of the card's content.",
        },
      ],
    };
  },
};
</script>

<style>
.row {
  margin-right: 0 !important;
}
.card {
  width: 18rem;
  margin: 0 0 20px 20px;
}
</style>
