<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="The official website for NJIT's chapter of ACM.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>

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
    <link rel="apple-touch-icon" href="images/acm_logo.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/acm_logo.png">
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
        <?php
          $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
          $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
          $phone = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
          $org = filter_var($_POST["org"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
          $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
          $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
          $message = $message."\r\n\r\nOrganization: ".$org."\r\nPhone Number: ".$phone;
          $to = "njitacm@gmail.com";
          $headers = "From: ".$name."<".$email.">\r\n".
          "Reply-To: ".$name."<".$email. ">\r\n".
          "X-Mailer: PHP/" . phpversion();
          mail($to, $subject, $message, $headers);
        ?>
        <p style="text-align:center;padding:100px">
          Thank you for reaching out to contact us! We will reply to you as soon as possible. This page will automatically redirect in 5 seconds. Click <a href="/">here</a> if it does not.
        </p>
        <script type="text/javascript">setTimeout(function(){window.location="/";}, 5000)</script>
        <footer style="text-align:center;cursor:default" class="mdl-mega-footer">
          <p>Copyright © 2016 - 2017 NJIT ACM</p>
          <img style="width:60px;user-drag: none;-moz-user-select: none;-webkit-user-drag: none;" class="logo-img" src="images/white_acm_logo.png">
          <img style="width:120px;user-drag: none;-moz-user-select: none;-webkit-user-drag: none;" class="logo-img" src="images/ccs_logo.png">
        </footer>
      </main>
    </div>

    <!-- build:js(app/) ../../scripts/main.min.js -->
    <!-- endbuild -->

    <!-- Built with love using Web Starter Kit -->
  </body>
</html>
