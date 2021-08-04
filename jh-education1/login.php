<?php
session_start();
?>
<!DOCTYPE html>
<html data-wf-page="60bf94f25f90037668836c36" data-wf-site="60bed237fca1d643909939de"></html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta content="Login" property="og:title">
  <meta content="Login" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/476.webflow.css" rel="stylesheet" type="text/css">

  <script type="text/javascript">WebFont.load({  google: {    families: ["Changa One:400,400italic","Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]  }});</script>

  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body-5">
  <div class="div-block-28">
    <h1>J&amp;H education</h1>
    <h2>Log in:</h2>
    <div class="w-form">
      <form id="login-Form" name="login-Form" data-name="Contact Form" method="POST" class="form-4" action="login-check/check.php">
        <div class="contact-form-grid w-clearfix">
          <div ><label for="username">Username*</label>
            <input type="text" class="w-input" autofocus="true" maxlength="256" name="username" data-name="username" id="username" required="required"></div>
          <div ><label for="password">Password*</label>
            <input type="password" class="w-input" maxlength="256" name="password" data-name="password" id="password" required="required"></div>

          <a typeid="back-btn" href="#" class="w-button">Back</a>
          <a id="reset-btn"  onclick="formReset()" class="button-34 w-button">Reset</a>
        </div>
        <div class="div-block-18">
            <button id="tutor-login-btn"  type="button"  onclick="signUp()"  class="button-32 w-button">Sign up</button>
            <button id="tutor-login-btn"  type="submit"  onclick="Tutor()"  class="button-32 w-button">Login As Tutor</button>
          <button id="student-login-btn" type="submit" onclick="Student()"  class="button-33 w-button">Login As Student</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=60bed237fca1d643909939de" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <script src="js/login.js" type="text/javascript"></script>
</body>
</html>
