<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="The official website for NJIT's chapter of ACM.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $GET['name']; ?></title>

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Web Application Manifest -->
    <link rel="manifest" href="manifest.json">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Web Starter Kit">
    <link rel="icon" sizes="192x192" href="images/acm_logo.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
    <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <meta name="theme-color" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <!-- Page styles:
    You can choose other color schemes from the CDN, more info here http://www.getmdl.io/customize/index.html
    Format: material.color1-color2.min.css, some examples:
    material.red-teal.min.css
    material.blue-orange.min.css
    material.purple-indigo.min.css
    -->
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.red-indigo.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css">
  </head>
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
        <footer style="text-align:center;cursor:default" class="mdl-mega-footer">
          <span class="mdl-layout--small-screen-only">
            <a href="http://twitter.com/njitacm" title="Follow us on Twitter" target="_blank" style="background: #00acee; color: rgb(255, 255, 255)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fa fa-twitter fa-fw"></i></a>
            <a href="https://www.facebook.com/profile.php?id=2249388966" title="Like us on Facebook" style="background: #3b5998; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fa fa-facebook fa-fw"></i></a>
            <a href="https://www.instagram.com/njitacm" title="Follow us on Instagram" style="background: #9b6954; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fa fa-instagram fa-fw"></i></a>
            <a href="https://www.linkedin.com/groups/4314318" title="Join us on Linkedin" style="background: #0e76a8; color: rgb(255, 255, 255)" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fa fa-linkedin fa-fw"></i></a>
          </span>
          <p>Copyright © 2016 - 2017 NJIT ACM</p>
          <img style="width:60px;user-drag: none;-moz-user-select: none;-webkit-user-drag: none;" class="logo-img" src="images/white_acm_logo.png">
          <img style="width:120px;user-drag: none;-moz-user-select: none;-webkit-user-drag: none;" class="logo-img" src="images/ccs_logo.png">
        </footer>
      </main>
    </div>

    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js"></script>
    <!-- build:js(app/) ../../scripts/main.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/gcal.js"></script>
    <script src="scripts/main.js"></script>
    <!-- endbuild -->

    <!-- Built with love using Web Starter Kit -->
  </body>
</html>
