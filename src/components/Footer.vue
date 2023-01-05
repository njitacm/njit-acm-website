<template>
  <footer>
    <div class="footer">
      <b-container class="footer-boot">
        <!-- Initiates the logos for njit and acm -->
        <b-row cols-lg="12">
          <b-col class="logos">
            <img src="../assets/logos/njit_full.png" name="NJIT" width="200px" height="100px" />
            <img src="../assets/logos/acmLogo.png" name="ACM" width="150px" height="125px" />
          </b-col>

          <!-- Adds links for the main pages -->
          <b-col class="links">
            <h5>Links</h5>
            <div class="link-redirects">
              <a href="#" target="_blank">Our Constitution</a> <br />
             <!-- <a href="#" target="_blank">Other</a> <br />-->
              <a href="https://www.acm.org/" target="_blank">ACM National</a> <br />
            </div>
          </b-col>

          <!-- Adds the contact information segment -->
          <b-col class="contact-us">
            <h5>Contact Us</h5>
            <b-row>
              <b-col>
                <ul class="contact-info">
                  <li style="font-size: 105%; font-style: bold">Phone:</li>
                  <li style="font-size: 90%">973-596-2861</li>
                  <li style="font-size: 105%; font-style: bold">Email:</li>
                  <li style="font-size: 90%"><a href="mailto:acm@njit.edu">acm@njit.edu</a></li>
                </ul>
              </b-col>
              <b-col>
                <ul class="contact-info">
                  <li style="font-size: 105%; font-style: bold">Located:</li>
                  <li style="font-size: 90%">GITC 3704</li>
                  <li style="font-size: 90%">
                    218 Central Ave, Newark, NJ 07102
                  </li>
                </ul>
              </b-col>
            </b-row>
          </b-col>
        </b-row>

        <!-- Adds the social icons to the site -->
        <b-row class="icons">
          <b-nav v-for="item in socials" v-bind:key="item.title">
            <b-col>
              <b-nav-item v-bind:href="item.url" target="_blank" class="icon">
                <img :src="item.img_source" class="icon-img" :key="item.title" />
              </b-nav-item>
            </b-col>
          </b-nav>
        </b-row>
      </b-container>

      <!-- General copyright/ownership to ACM -->
      <h6>@ NJIT ACM 2022</h6>
    </div>
  </footer>
</template>

<script>
//Imports for the source images
import insta from "../assets/socials/instagram.png";
import facebook from "../assets/socials/facebook.png";
import github from "../assets/socials/github.png";
import linkedin from "../assets/socials/linkedin.png";
import twitter from "../assets/socials/twitter.png";
import youtube from "../assets/socials/youtube.png";
import reddit from "../assets/socials/reddit.png";
import discord from "../assets/socials/discord.png";
import twitch from "../assets/socials/twitch.png";
import tiktok from "../assets/socials/tiktok.png";

export default {
  data() {
    return {
      //Social media links to be displayed in the footer
      socials: [
        {
          title: "YouTube",
          img_source: youtube,
          url: "https://www.youtube.com/channel/UC3stSn7UK5-IX6mNnlWlRLw",
        },
        {
          title: "Twitter",
          img_source: twitter,
          url: "https://twitter.com/NJITACM",
        },
        {
          title: "LinkedIn",
          img_source: linkedin,
          url: "https://njit.acm.org/linkedin",
        },
        {
          title: "Discord",
          img_source: discord,
          url: "https://njit.acm.org/discord",
        },
        {
          title: "Instagram",
          img_source: insta,
          url: "https://www.instagram.com/NJITACM/",
        },
        {
          title: "Facebook",
          img_source: facebook,
          url: "https://www.facebook.com/groups/njtacm",
        },
        {
          title: "Twitch",
          img_source: twitch,
          url: "https://www.twitch.tv/NJITACM",
        },
        {
          title: "TikTok",
          img_source: tiktok, //not same person
          url: "https://www.tiktok.com/@njitacm",
        },
        {
          title: "Reddit",
          img_source: reddit,
          url: "https://www.reddit.com/user/NJITACM/",
        },
        {
          title: "GitHub",
          img_source: github,
          url: "https://github.com/njitacm",
        },
      ],
    };
  },
};
</script>

<style>
.footer {
  color: #494949;
  background:#c3a2a2;
  text-align: center;
  justify-content: center;
  bottom: 0%;
  padding-top: 15px;
  padding-bottom: 5px;
}

.logos {
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Icons css */

.icons {
  padding-top: 5px;
  padding-bottom: 5px;
  justify-content: center;
  text-align: center;
}

.icon {
  padding: 0%;
}

.icon:focus,
.icon:hover {
  border-radius: 20px;
  background-color: rgba(153, 153, 153, 0.205);
  animation: raiseIn 200ms ease-in-out;
  animation-fill-mode: forwards;
}

.icon:not(:hover) {
  animation: raiseOut 200ms ease-in-out;
  animation-fill-mode: forwards;
}


/* Contact Us css */

.contact-us,
.links {
  border: 1px #3d1717;
  border-style: solid;
  margin-left: 5px;
  margin-right: 5px;
  justify-content: center;
  text-align: center;
}

.contact-info {
  float: initial;
  overflow: auto;
  list-style: none;
  text-align: left;
  justify-content: center;
  padding: 0;
  width: 3fr;
}

.link-redirects {
  text-align: left;
  font-style: italic;
  text-decoration-line: underline;
  width: 2fr;
}

/* General anchor css to make links feel more in style with footer */

.footer a:link,
a:visited {
  color: rgb(73, 73, 73);
  text-decoration: none;
}

.footer a:hover {
  color: #fcfcfc;
}

/* Animations */

@keyframes raiseIn {
  from {
    transform: scale(1);
  }

  to {
    transform: scale(0.85);
  }
}

@keyframes raiseOut {
  from {
    transform: scale(0.85);
  }

  to {
    transform: scale(1);
  }
}
</style>