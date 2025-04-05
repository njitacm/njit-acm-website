<template>
  <footer>
    <div class="logos">
      <img class="njit-logo" src="../assets/logos/NJIT.png" />
    </div>

    <div class="socials">
      <a href="https://njit.gg/acm"
        ><img src="../assets/socials/discord.png"
      /></a>
      <a href="https://github.com/njitacm"
        ><img src="../assets/socials/github.png"
      /></a>
      <a href="https://www.instagram.com/NJITACM/"
        ><img src="../assets/socials/instagram.png"
      /></a>
      <a href="https://www.linkedin.com/company/njit-acm"
        ><img src="../assets/socials/linkedin.png"
      /></a>
      <a href="https://www.youtube.com/channel/UC3stSn7UK5-IX6mNnlWlRLw"
        ><img src="../assets/socials/youtube.png"
      /></a>
      <a href="https://x.com/NJITACM"
        ><img src="../assets/socials/twitter.png"
      /></a>
    </div>
    <div class="footer-buttons">
      <PrimaryButton>
        <a href="https://acm.org" target="_blank" class="button-link">Visit ACM National</a>
      </PrimaryButton>
      <PrimaryButton>
        <RouterLink to="/constitution" class="router-link" @click="toTop"
          >ACM Constitution</RouterLink
        >
      </PrimaryButton>
      <PrimaryButton>
        <a href="mailto:acm@njit.edu" target="_blank" class="button-link">Contact Us!</a>
      </PrimaryButton>
    </div>
  </footer>
</template>
  
<script>
import PrimaryButton from "./PrimaryButton.vue";

export default {
  components: { PrimaryButton },
  data() {
    return {
      constitutionOpen: false,
    };
  },
  methods: {
    toTop() {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  },
};
</script>
  
<style scoped>
footer {
  padding: 2rem;
  display: flex;
  border-top: var(--red) var(--border-width) solid;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  margin: auto;
}

.logos {
  max-width: 300px;
}

img {
  width: 100%;
}

.footer-buttons {
  flex-basis: 20%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 1rem;
}

.socials {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  gap: 1rem;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
}

.socials > a {
  transition: opacity var(--hover-speed) linear;
}

@media (hover: hover) {
  .socials > a:hover {
    opacity: 0.625;
  }
}

@media (hover: none) {
  .socials > a:active {
    opacity: 0.625;
  }
}

/* a {
  width: 5.2rem;
  text-decoration: none;
  color: black;
} */


@media (max-width: 1100px) {
  footer {
    flex-direction: column;
    gap: 5rem;
  }

  .footer-buttons {
    width: 50%
  }
}
</style>