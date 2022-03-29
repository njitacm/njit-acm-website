<template>
  <div>
      <div class="container-fluid" style="padding: 0px;">
    </div>
    <nav class="navbar navbar-light navbar-expand-md">
      <div class="container-fluid" style="padding: 0px;">
        <a class="navbar-brand" href="index.html">Logo</a>
        <button data-bs-toggle="collapse" class="navbar-toggler shadow-none" data-bs-target="#navcol-1">
          <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" href="sig.html">SIGS*</a></li>
            <li class="nav-item"><a class="nav-link active" href="events.html">Events*</a></li>
            <li class="nav-item"><a class="nav-link active" href="#">EBoard*</a></li>
            <li class="nav-item"><a class="nav-link active" href="#">Partner Orgs*</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
</script>

<style scoped>
    .navbar {
        padding: 0px;
        /* height: 65px; */
        background: linear-gradient(90deg, rgb(220, 7, 7), rgb(247, 61, 61) 100%);
        box-shadow: 0px 0px 10px;
        z-index: 100;
    }

    .nav-item {
        padding-right: 10px;
        padding-bottom: 10px;
        transition: background .25s;

    }
    .nav-link{
        color: white !important;
    }
    .navbar-brand {
        padding-left: 10px;
        padding-bottom: 10px;
    }

    .navbar-toggler {
        margin-right: 5px;
    }

    .nav-item:hover {
        background: #ec6b6b
    }

    .navbar-nav {
        /* background: linear-gradient(90deg, rgb(220,7,7), rgb(247,61,61) 100%); */
        /* padding-right: 20px; */
        margin-left: auto;
        /*padding-top: 15px;*/

    }

    .dot {
        height: 25px;
        width: 25px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }
</style>
