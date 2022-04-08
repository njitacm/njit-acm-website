<template>
  <footer>
    <div class="footer">
      <b-container class="footer-boot">
        <b-row>
          <b-col name="Logos">
            <img
              src="https://www.gstatic.com/images/branding/product/2x/keep_48dp.png"
              name="NJIT"
            />
            <img
              src="https://www.gstatic.com/images/branding/product/2x/keep_48dp.png"
              name="ACM"
            />
            <img
              src="https://www.gstatic.com/images/branding/product/2x/keep_48dp.png"
              name="YWCC"
            />
          </b-col>
          <b-col class="links">
            <h5>Links</h5>
            <div class="link-redirects">
              <a href="#">Our Constitution</a> <br />
              <a href="#">Other</a> <br />
              <a href="#">ACM National</a> <br />
            </div>
          </b-col>
          <b-col class="contact-us" cols="5">
            <h5>Contact Us</h5>
            <b-row>
              <b-col>
                <ul class="contact-info">
                  <li style="font-size: 105%">Phone:</li>
                  <li style="font-size: 90%">222-222-2222</li>
                  <li style="font-size: 105%">Email:</li>
                  <li style="font-size: 90%">acm.njit.edu</li>
                </ul>
              </b-col>
              <b-col>
                <ul class="contact-info">
                  <li style="font-size: 105%">Located:</li>
                  <li style="font-size: 90%">GITC 3704</li>
                  <li style="font-size: 90%">
                    218 Central Ave, Newark, NJ 07102
                  </li>
                </ul>
              </b-col>
            </b-row>
          </b-col>
        </b-row>
        <b-row class="icons">
          <b-nav v-for="value in socials" v-bind:key="value.title">
            <b-col>
              <b-nav-item v-bind:href="value.url" class="icon">
                <img v-bind:src="value.img_source" />
              </b-nav-item>
            </b-col>
          </b-nav>
        </b-row>
      </b-container>
      <h6>NJIT ACM Chapter</h6>
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
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/youtube-48.png",
          url: "https://www.youtube.com/channel/UC3stSn7UK5-IX6mNnlWlRLw",
        },
        {
          title: "Twitter",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/twitter-48.png",
          url: "https://twitter.com/NJITACM",
        },
        {
          title: "LinkedIn",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/linkedin-48.png",
          url: "",
        },
        {
          title: "Discord",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands-vol-2/512/discord-48.png",
          url: "https://njit.acm.org/discord",
        },
        {
          title: "Instagram",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/instagram-48.png",
          url: "https://www.instagram.com/NJITACM/",
        },
        {
          title: "Facebook",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/facebook-48.png",
          url: "https://www.facebook.com/groups/njtacm",
        },
        {
          title: "Twitch",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands-vol-2/512/twitch-48.png",
          url: "https://www.twitch.tv/NJITACM",
        },
        {
          title: "TikTok",
          img_source:
            "https://cdn2.iconfinder.com/data/icons/social-media-2421/512/TikTok-48.png", //not same person
          url: "",
        },
        {
          title: "Reddit",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/reddit-48.png",
          url: "",
        },
        {
          title: "GitHub",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/github-48.png",
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
  background: linear-gradient(90deg, rgb(185, 59, 59), rgb(241, 87, 87) 95%);
  text-align: center;
  position: relative;
  bottom: 0%;
  padding-top: 15px;
  padding-bottom: 5px;
}

.icons {
  padding-top: 5px;
  padding-bottom: 5px;
  justify-content: center;
  text-align: center;
}

.icon {
  padding: 0%;
}

.icon:hover {
  border-radius: 20px;
  background-color: rgba(153, 153, 153, 0.205);
  animation: raiseIn 200ms ease-in-out;
  animation-fill-mode: forwards;
}

.contact-us {
  border: 1px #5f2121;
  border-style: solid;
  margin-left: 5px;
  margin-right: 5px;
}

.contact-info {
  float: initial;
  overflow: auto;
  list-style: none;
  text-align: left;
}

.links {
  border: 1px #5f2121;
  border-style: solid;
  margin-left: 5px;
  margin-right: 5px;
}

.link-redirects {
  text-align: left;
  font-style: italic;
  text-decoration-line: underline;
}

a:link,
a:visited {
  color: #ffc8c8;
  text-decoration: none;
}

a:hover {
  color: #fcfcfc;
}

@keyframes raiseIn {
  from {
    transform: scale(1);
  }
  to {
    transform: scale(0.85);
  }
}
</style>