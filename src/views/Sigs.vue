<template>
  <div>
    <h1 class="m-2 text-center">SIGs</h1>
    <SIG v-for="(sig, index) in Sigs" :sig="sig" :key="index"/>
    <hr />
    <h1 class="m-4">Past SIGs</h1>
    <ItemGrid :li="PastSigs"/>
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
        Sigs:[
          {
            name:"Sig Playas but Better Faster Harder Stronger",
            desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            leader:"Ethan",
            time:"All the time"
          },
          {
            name:"Sig Playas but Better Faster Harder Stronger",
            desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            leader:"Ethan",
            time:"All the time"
          },
          {
            name:"Sig Playas but Better Faster Harder Stronger",
            desc:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
            leader:"Ethan",
            time:"All the time"
          },
        ],
        PastSigs:[
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
