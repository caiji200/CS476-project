<?php
/**
 * @var mysqli $conn
 */
include 'db.php';
session_start();
if($_SESSION['identity'] != "tutor"){
    header("Location: login.php");
}
$tutorId = $_SESSION['id'];

$query = "SELECT * FROM tutor_table where tutor_id='$tutorId'";
$user = $conn->query($query);

$rows = $user->fetch_assoc();
@$name = $rows['tutor_name'];
@$subject = $rows['tutor_subject'];
@$level = $rows['tutor_level'];
@$balance = $rows['tutor_balance'];

?>
<!DOCTYPE html>

<html data-wf-page="60d6e36000adb97e41b95e31" data-wf-site="60bed237fca1d643909939de">
<head>
  <meta charset="utf-8">
  <title>Personal_file_admin</title>
  <meta content="Personal_file_admin" property="og:title">
  <meta content="Personal_file_admin" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/476.webflow.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">WebFont.load({  google: {    families: ["Changa One:400,400italic","Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="background">
  <h1>J&amp;H education</h1>
  <h1>Personal File</h1>
  <div class="div-block-26"><img src="images/user-male.png" loading="lazy" alt="User" class="image-9">
    <p class="paragraph-15">Name: Josh<br>Subject: math<br>Identity: tutor<br>Tutorial level: Grade 10<br>Balance: $1000</p>
  </div>
  <div>
    <a href="#" class="button-41 w-button">Back</a>
    <a href="#" class="button-40 w-button">Advertisements <br>Management</a>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=60bed237fca1d643909939de" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>