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
            <div name="link-redirects">
              <a href="#">Constitution</a>
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
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/youtube-48.png",
          url: "",
        },
        {
          title: "Discord",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/youtube-48.png",
          url: "https://njit.acm.org/discord",
        },
        {
          title: "Instagram",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/youtube-48.png",
          url: "https://www.instagram.com/NJITACM/",
        },
        {
          title: "Facebook",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/youtube-48.png",
          url: "https://www.facebook.com/groups/njtacm",
        },
        {
          title: "Twitch",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/youtube-48.png",
          url: "https://www.twitch.tv/NJITACM",
        },
        {
          title: "TikTok",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/youtube-48.png",
          url: "",
        },
        {
          title: "Reddit",
          img_source:
            "https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/youtube-48.png",
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
  padding-top: 10px;
  padding-bottom: 10px;
}

.icons {
  padding-top: 5px;
}

.icon {
  background-color: rgba(255, 125, 125, 0.589);
  border-radius: 30%;
  padding: 1px;
  margin: 1px;
}

.icon:hover {
  border-radius: 20px;
  background-color: rgba(124, 69, 69, 0.644);
}

.contact-us {
  border: 1px #5f2121;
  border-style: dashed;
  margin-left: 5px;
  margin-right: 5px;
}

.links {
  border: 1px #5f2121;
  border-style: dashed;
  margin-left: 5px;
  margin-right: 5px;
}

.contact-info {
  float: initial;
  overflow: auto;
  margin-top: -10px;
  list-style: none;
  text-align: left;
}

.link-redirects {
}
</style>