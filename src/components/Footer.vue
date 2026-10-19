<template>
  <footer class="Footer">
    <img class="njit-logo" src="../assets/logos/NJIT.png" />
    <div class="socials">
      <a href="https://njit.gg/acm" target="_blank" class="social-link">
        <img src="../assets/socials/discord.png" />
      </a>
      <a href="https://github.com/njitacm" target="_blank" class="social-link">
        <img src="../assets/socials/github.png" />
      </a>
      <a href="https://www.instagram.com/NJITACM/" target="_blank" class="social-link">
        <img src="../assets/socials/instagram.png" />
      </a>
      <a href="https://www.linkedin.com/company/njit-acm" target="_blank" class="social-link">
        <img src="../assets/socials/linkedin.png" />
      </a>
      <a href="https://www.youtube.com/channel/UC3stSn7UK5-IX6mNnlWlRLw" target="_blank" class="social-link">
        <img src="../assets/socials/youtube.png" />
      </a>
      <a href="https://x.com/NJITACM" target="_blank" class="social-link">
        <img src="../assets/socials/twitter.png" />
      </a>
    </div>
    <div class="footer-buttons">
      <PrimaryButton>
        <a href="https://acm.org" target="_blank" class="button-link">Visit ACM National</a>
      </PrimaryButton>
      <PrimaryButton>
        <RouterLink to="/constitution" class="router-link" @click="toTop">ACM Constitution</RouterLink>
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
  name: "Footer",
  components: { PrimaryButton },
  methods: {
    toTop() {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  },
};
</script>

<style scoped>
.Footer {
  padding: var(--indentation);
  display: flex;
  border-top: var(--red) var(--border-width) solid;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}

.njit-logo {
  width: 100%;
  max-width: 300px;
}

.footer-buttons {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 16px;
}

.socials {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  gap: 16px;
}

.social-link {
  transition: opacity var(--hover-speed) linear;
}

@media (hover: hover) and (pointer: fine) {
  .social-link:hover {
    opacity: 0.625;
  }
}

@media (pointer: coarse) {
  .social-link:active {
    opacity: 0.625;
  }
}

@media (max-width: 1100px) {
  .Footer {
    flex-direction: column;
    gap: 64px;
  }

  .footer-buttons {
    flex-direction: row;
    width: 100%;
    justify-content: center;
  }

  .footer-buttons .PrimaryButton {
    width: 100%;
  }
}

@media (max-width: 850px) {
  .footer-buttons {
    flex-direction: column;
    justify-content: center;
  }
}
</style>
