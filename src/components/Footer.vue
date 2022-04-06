<template>
  <footer>
    <div class="footer">
      <b-container class="footer-boot">
        <b-row>
          <b-col class="links">
            <p>hi1</p>
          </b-col>
          <b-col cols="8" name="foot-middle">
            <b-row>
              <ul id="social-cards" name="social-icons">
                <li v-for="value in socials" v-bind:key="value.title">
                  <a v-bind:href="value.url">{{ value.title }}</a>
                </li>
              </ul>
            </b-row>
          </b-col>
          <b-col class="contact-us">
            <p>hi4</p>
          </b-col>
        </b-row>
      </b-container>
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      socials: [
        {
          title: "YouTube",
          img_source: "",
          url: "https://www.youtube.com/channel/UC3stSn7UK5-IX6mNnlWlRLw",
        },
        {
          title: "Twitter",
          img_source: "",
          url: "https://twitter.com/NJITACM",
        },
        {
          title: "LinkedIn",
          img_source: "",
          url: "",
        },
        {
          title: "Discord",
          img_source: "",
          url: "https://njit.acm.org/discord",
        },
        {
          title: "Instagram",
          img_source: "",
          url: "https://www.instagram.com/NJITACM/",
        },
        {
          title: "Facebook",
          img_source: "",
          url: "https://www.facebook.com/groups/njtacm",
        },
        {
          title: "Twitch",
          img_source: "",
          url: "https://www.twitch.tv/NJITACM",
        },
        {
          title: "TikTok",
          img_source: "",
          url: "",
        },
        {
          title: "Reddit",
          img_source: "",
          url: "",
        },
      ],
    };
  },
};
</script>

<style scoped>
footer {
  color: antiquewhite;
  background: linear-gradient(90deg, rgb(220, 7, 7), rgb(247, 61, 61) 95%);
  text-align: center;
  position: relative;
  bottom: 0%;
  margin-bottom: -16px;
}

ul {
  margin: 0;
  padding: 0;
  overflow: hidden;
  list-style-type: none;
  background-color: darkred;
  justify-content: center;
  text-align: center;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
  justify-content: center;
}

li a:hover {
  background-color: #111111;
}

.foot-middle {
  justify-content: center;
  text-align: center;
}
</style>