<?php
include 'db.php';
session_start();
if($_SESSION['identity'] != "tutor"){
    echo "<script> alert('Please log in before using');parent.location.href='login.php'; </script>";
}
if (isset($_POST['title']) && isset($_POST['subject']) && isset($_POST['level']) && isset($_POST['description'])) {
    $title = $_POST['title'];
    $tutorId = $_SESSION['id'];
    $tutorName = $_SESSION['name'];
    $level = $_POST['level'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $conn->query("insert into ad_table (ad_title, tutor_id, tutor_name, description, tutor_level, tutor_subject) values ('$title','$tutorId','$tutorName','$description','$level','$subject')");
    echo "<script> alert('Added successfully');parent.location.href='advertisement-management.php'; </script>";
}
$tutorLevel = $_SESSION['tutorLevel'];
$tutorSubject = $_SESSION['tutorSubject'];
?>
<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Fri Jul 02 2021 12:55:06 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="60df07c4fc67261c39a2812e" data-wf-site="60bed237fca1d643909939de">
<head>
    <meta charset="utf-8">
    <title>Post_ad</title>
    <meta content="Post_ad" property="og:title">
    <meta content="Post_ad" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/webflow.css" rel="stylesheet" type="text/css">
    <link href="css/476.webflow.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript">WebFont.load({google: {families: ["Changa One:400,400italic", "Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]}});</script>
    <!-- [if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
            type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body-11">
<h1>J&amp;H education</h1>
<div class="w-form">
    <form id="email-form" name="email-form" data-name="Email Form" class="form-6" method="POST" action="post-ad.php">
        <label for="name">Title</label>
        <input type="text" class="w-input" maxlength="256" name="title" data-name="Name" placeholder="Suggest be the exact topic of study in your subject" id="title">
        <label for="name">Subject</label>
        <input type="text" class="w-input" maxlength="256" name="subject" data-name="Name" placeholder="Your area of study." id="name">
        <label for="name-2">Tutorial Level</label>
        <input type="text" class="w-input" maxlength="256" name="level" data-name="Name 2" placeholder="Your focus level." id="name-2">
        <label for="email">Course Description</label>
        <textarea type="email" class="w-input" maxlength="256" name="description" data-name="Email" placeholder="Describe your course, and leave your contact information."
                  id="email" required=""></textarea>
        <input type="submit" value="Submit" class="w-button">
    </form>
    <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
    </div>
    <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form.</div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=60bed237fca1d643909939de"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>