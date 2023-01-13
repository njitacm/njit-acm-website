<template>
  <div>
    <!-- <b-navbar v-if="windowWidth > 720" type="light"> -->
       <b-navbar type="light">
        <b-navbar-brand ><router-link class="nav-link p-0" to="/"><img src="../assets/logos/ACMSpinningLogo.gif"/></router-link></b-navbar-brand>
        <b-navbar-nav class="navbar-nav">
            <li class="nav-item"><router-link class="nav-link" to="/sigs">SIGS</router-link></li>
            <li class="nav-item"><router-link class="nav-link" to="/events">Events*</router-link></li>
            <li class="nav-item"><router-link class="nav-link" to="/eboard">Eboard*</router-link></li>
            <li class="nav-item"><router-link class="nav-link" to="/partnorg">Partner Orgs*</router-link></li>
            <li class="nav-item"><a class="nav-link" target="_blank" href="https://computing.njit.edu/tutoring">Tutoring</a></li>
<!--

            <b-nav-item><router-link class="nav-link" to="/sigs">Events*</router-link></b-nav-item>
            <b-nav-item><router-link class="nav-link" to="/sigs">Eboard*</router-link></b-nav-item>
            <b-nav-item><router-link class="nav-link" to="/sigs">Partner Orgs*</router-link></b-nav-item>-->
      </b-navbar-nav>
    </b-navbar>
  </div>
</template>

<script>
export default {
  data() {
    return {
      windowWidth: window.innerWidth,
    };
  },
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  },
};
</script>

<style scoped>
img{
  max-width: 10%;
}
.navbar {
  padding: 0px;
  background: #d22020;
  box-shadow: 0px 0px 10px;
  z-index: 100;
}

.nav-item {
  padding: 10px;
  transition: background 0.25s;
}

.nav-link {
  color: white !important;
}

.navbar-brand {
  padding-left: 10px;
  padding-bottom: 10px;
}

.nav-item:hover {
  background: #ff7373;
}

.navbar-nav {
  margin-left: auto;
}
</style>
