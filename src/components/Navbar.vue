<template>
  <div>
    <b-navbar type="light">
        <b-navbar-brand href="#">Logo</b-navbar-brand>
        <b-navbar-nav class="navbar-nav">
            <b-nav-item href="#">SIGS*</b-nav-item>
            <b-nav-item href="#">Events*</b-nav-item>
            <b-nav-item href="#">Eboard*</b-nav-item>
            <b-nav-item href="#">Partner Orgs*</b-nav-item>
        </b-navbar-nav>
    </b-navbar>
  </div>
</template>

<script>
</script>

<style scoped>
    .navbar {
        padding: 0px;
        background: linear-gradient(90deg, rgb(220, 7, 7), rgb(247, 61, 61) 100%);
        box-shadow: 0px 0px 10px;
        z-index: 100;
    }

    .nav-item {
        padding: 5px;
        transition: background .25s;
    }

    .nav-link{
        color: white !important;
    }

    .navbar-brand {
        padding-left: 10px;
        padding-bottom: 10px;
    }

    .nav-item:hover {
        background: #ec6b6b
    }

    .navbar-nav {
        margin-left: auto;
    }

</style>
