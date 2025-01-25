<template>
  <footer>
    <div class="logos">
      <img src="../assets/logos/NJIT.png" />
      <!-- <img src="../assets/logos/NJIT_ACM_LOGO.svg" /> -->
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
    // closeModal() {
    //   this.constitutionOpen = false;
    // },
    // openModal() {
    //   this.constitutionOpen = true;
    // },
    toTop() {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  },
};
</script>
  
<style scoped>
footer {
  margin: 2.4rem auto;
  margin-bottom: 0;
  padding: 24px 16px;
  display: flex;
  border-top: red 4px solid;
  align-items: center;
  justify-content: space-between;
  gap: 20.4rem;
  width: 100%;
}
.logos {
  flex: 1;
  display: flex;
}
img {
  width: 100%;
}
/* .logos img:first-child {
  flex: 2;
}
.logos img:last-child {
  flex: 1;
} */
.footer-buttons {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 10px;
}

/* .footer-buttons button {
  padding: 5px;
  border-radius: 8px;
  font-size: 2rem;
  background-color: lightpink;
  border: 2px lightgrey solid;
  border-radius: 8px;
} */
/* .router-link {
  text-decoration: none;
  color: black;
} */
.socials {
  flex: 2;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1.2rem;
  margin: 0.4rem 0.8rem;
}

.socials > a {
  transition: opacity var(--hover-speed) linear;
}

.socials > a:hover {
  opacity: 0.625;
}

/* a {
  width: 5.2rem;
  text-decoration: none;
  color: black;
} */
@media (max-width: 1400px) {
  .socials {
    flex-wrap: wrap;
  }
}

@media (max-width: 1200px) {
  footer {
    gap: 10rem;
  }
  .socials {
    flex-wrap: wrap;
    flex: 1.5;
  }
}

@media (max-width: 900px) {
  footer {
    gap: 7.5rem;
  }
}

@media (max-width: 900px) {
  footer {
    flex-direction: column;
    gap: 5rem;
  }
  .logos {
    width: 75%;
  }
  .footer-buttons button {
    padding: 5px 50px;
    font-size: 3rem;
  }
}

@media (max-width: 500px) {
  .logos {
    width: 70%;
  }
  .logos img {
    max-width: 100%;
  }
  .socials {
    flex-wrap: wrap;
    gap: 1.75rem;
  }
  .footer-buttons button {
    padding: 5px 35px;
    font-size: 2.4rem;
  }
}
</style>