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
          name: "sig-ai",
          desc: "SIG AI covers anything under AI/ML- meetings are focused around learning more about AI/ML, by way of workshops, reviewing recent papers/news in the field, or just talking about it.",
          leader: "Kamil Arif",
          time: "Fridays 6:00-7:00 P.M. | GITC 3600",
        },
        {
          name: "sig-stream",
          desc: "SIG STREAM goes over basic stream technology and guidelines. We learn what cables do what in regards to video and audio, and where to use them. Workshops will be held to try out and set up mid range video equipment for a real production.",
          leader: "Will Simkins",
          time: "Tuesdays 2:30-3:30 P.M. & 9:00-11:00 P.M. | GITC 3600",
        },
        {
          name: "sig-melee",
          desc: "SIG Melee is an introduction to some basic modding tools for Super Smash Bros Melee. This will focus on the installation process and how to use the programs for modding.",
          leader: "Ivan Rivera",
          time: "Fridays 4:00-5:00 P.M. | TBD",
        },
        {
          name: "sig-soft-skills",
          desc: "SIG Soft Skills covers a variety of topics centered around enhancing professionalism and building a skillset to augment your technical skills in academic/personal projects, the interview/recruitment process, and in the workplace.  Topics will center around developing and practicing communication, collaboration, critical thinking, curiosity, and creativity.",
          leader: "Maciej Gajda",
          time: "TBD",
        },
        {
          name: "sig-vim",
          desc: "SIG Vim is an introduction to the text editor Vim, and its many features and mechanics. It will cover topics ranging from installation, to usage, to personalization, and much more in between.",
          leader: "Logan Kriebel",
          time: "Fridays 1:00-2:00 P.M. | TBD"
        }

      ],
      PastSigs: [
      {
          name: "sig-castles-n-crusaders",
          semester:"Spring 2023",
          desc: "A SIG focused on building secure servers in the cloud and then finding ways to bypass said security.",
        },        

      {
          name: "sig-lambda",
          semester:"Spring 2023",
          desc: "A SIG all about functional programming and the different ways it can be applied.",
        },        

      {
          name: "sig-stable",
          semester:"Spring 2023",
          desc: "Focused on new developments in open source AI image generation using Stable Diffusion",
        },        
        
        {
          name: "sig-linux",
          semester:"Spring 2023",
          desc: "Learned about the Linux operating system, familiarizing students with everything relating to the OS.",
        },        
        {
          name: "sig-xr",
          semester:"Spring 2023",
          desc: "A SIG focused on XR development topics, where they made VR applications.",
        },
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
