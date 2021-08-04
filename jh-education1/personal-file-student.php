<!DOCTYPE html>
<?php
include 'db.php'; //引入 db.php文件
session_start();
if ($_SESSION['identity'] != "student") {
    header("Location: login.php");
}

$studentId = $_SESSION['id'];
$query = "SELECT * FROM student_table where student_id='$studentId'";
$user = $conn->query($query);

//获取结果集
$rows = $user->fetch_assoc();

@$name = $rows['student_name'];
@$subject = $rows['student_subject'];
@$level = $rows['student_level'];
@$balance = $rows['student_balance'];
@$description = $rows['student_description'];

?>
<html data-wf-page="60bf8ff25f90033d9b83531f" data-wf-site="60bed237fca1d643909939de">
<head>
  <meta charset="utf-8">
  <title>Personal_file_student</title>
  <meta content="Personal_file_student" property="og:title">
  <meta content="Personal_file_student" property="twitter:title">
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
<body class="body-3">
  <h1 class="heading-9">J&amp;H education<br>‍</h1>
  <h2 class="heading-8">Personal File</h2>
  <div class="w-clearfix">
    <div class="div-block-27"><img src="images/user-male.png" loading="lazy" alt="" width="150" height="150" >
    <?php 
    echo "Name:  $name<br><br>";
    echo "Subject: $subject <br><br>";
    echo "Identity: ".$_SESSION['identity']. "<br><br>";
    echo "Tutorial level: $level <br><br>";
    echo "Balance: $$balance <br><br>";
    echo "Description: $description <br><br>";
    ?>
    </div>
    <a href="main.php" class="button-42 w-button">Back</a>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=60bed237fca1d643909939de" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>