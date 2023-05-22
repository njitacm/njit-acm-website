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
    <ItemGrid :li="PastSigs" :size="3"/>
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
        {
          name: "sig-ai",
          desc: "A SIG where you will go over a variety of AI topics, from reinforcement learning and neural networks to markov models and decision trees, while making small projects with them.",
          leader: "Jose Mojica Perez",
          time: "Mon 6:00 P.M. & Wedn 4:30 P.M. | Variable",
        },
        {
          name: "sig-linux",
          desc: "A SIG where you will be able to familiarize yourself with the Linux operating system. They will be going over everything from how to download the OS, to getting practice using bash commands. An excellent primer to CS288.",
          leader: "Mikel Alcazar",
          time: "Fridays 1:30 P.M. | GITC 3600",
        },
        {
          name: "sig-xr",
          desc: "A SIG focused on XR development topics. If you want an introduction to working with XR technologies in Unity or ever wanted to create a VR application with AGILE development, this is the SIG for you.",
          leader: "David Garcia",
          time: "Fridays 3:00 P.M. | GITC 3700",
        },
      ],
      PastSigs: [
        {
          name: "sig-lang",
          semester:"Fall 2022",
          desc: "Learned about various programming languages and their features.",
        },
        {
          name: "sig-playas-but-better-faster-stronger-harder",
          semester:"Fall 2022",
          desc: "Discussed design paradigms and interesting ways of coding things",
        },
        {
          name: "sig-breaking-and-entering",
          semester:"Fall 2022",
          desc: "A hardware-focused cybersecurity SIG investigating physical security bypasses, hardware exploits, and other aspects of cybersecurity.",
        },
        {
          name: "sig-skills",
          semester:"Fall 2022",
          desc: "Introduced various small important skills such as GitHub, virtual boxes and discord management.",
        },
        {
          name: "sig-data",
          semester:"Fall 2022",
          desc: "Used the pandas library for data analysis, manipulation and modeling.",
        },
        {
          name: "sig-swe",
          semester:"Spring 2022",
          desc: "Taught about full stack development and basic industry standards.",
        },
        {
          name: "sig-print",
          semester:"Spring 2022",
          desc: "A SIG focused on teaching members about 3D printers and 3D printer operation.",
        },
        {
          name: "sig-minecraft",
          semester:"Spring 2022",
          desc: "Developed custom Minecraft plugins and used them in a custom server.",
        },
        {
          name: "sig-node",
          semester:"Spring 2022",
          desc: "Focused on various projects using Node.js such as discord bots and web scraping.",
        },
        {
          name: "sig-cgi",
          semester:"Fall 2021",
          desc: "Focused on creating of 3D models with Blender and using Python to create automation scripts.",
        },
        {
          name: "sig-mal",
          semester:"Fall 2021",
          desc: "A security SIG where they built their own malware!",
        },
        {
          name: "sig-web-dev",
          semester:"Fall 2021",
          desc: "Taught the basics of web development as they built a small website over the semester!",
        },
        {
          name: "sig-machine-learning",
          semester:"Fall 2021",
          desc: "A beginner's look into machine learning, ending with building various models",
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
