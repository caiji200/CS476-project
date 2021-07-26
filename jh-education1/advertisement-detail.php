<?php
/**
 * @var mysqli $conn
 */
include 'db.php';
@$adId = intval($_GET['ad_id']);
$ad = $conn->query("select * from ad_table where ad_id='$adId'")->fetch_assoc();
$tutorId = $ad['tutor_id'];
$tutor = $conn->query("select * from tutor_table where tutor_id='$tutorId'")->fetch_assoc();

?>

<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Jun 27 2021 05:25:08 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="60d486be18bb278907e83621" data-wf-site="60bed237fca1d643909939de">
<head>
    <meta charset="utf-8">
    <title>Advertisement_detail</title>
    <meta content="Advertisement_detail" property="og:title">
    <meta content="Advertisement_detail" property="twitter:title">
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
<body class="background">
<h1 class="heading-10">J&amp;H education </h1>
<div class="div-block-19"><img
            src="<?= empty($tutor['tutor_img_url']) ? 'images/user-male.png' : $tutor['tutor_img_url'] ?>"
            loading="lazy" alt="User" class="image-10">
    <div class="text-block-2"><br><br>Name: <?= $tutor['tutor_name'] ?>
        <br><br><br>Subject: <?= $tutor['tutor_subject'] ?><br><br><br>Tutorial Level:grade <?= $tutor['tutor_level'] ?>
    </div>
    <p class="paragraph-18">Time Available:</p>
    <div id="datepicker"></div>
    <!--    <div class="div-block-21">-->
    <!--      <div data-animation="slide" data-duration="500" data-infinite="1" class="w-slider">-->
    <!--        <div class="w-slider-mask">-->
    <!--          <div class="slide-3 w-slide">-->
    <!--            <div class="text-block-3">May 26,2021</div>-->
    <!--          </div>-->
    <!--          <div class="w-slide"></div>-->
    <!--        </div>-->
    <!--        <div class="w-slider-arrow-left">-->
    <!--          <div class="icon-2 w-icon-slider-left"></div>-->
    <!--        </div>-->
    <!--        <div class="w-slider-arrow-right">-->
    <!--          <div class="icon-3 w-icon-slider-right"></div>-->
    <!--        </div>-->
    <!--        <div class="w-slider-nav w-round"></div>-->
    <!--      </div>-->
    <!--    </div>-->
</div>
<footer id="footer" class="footer"></footer>
<p class="paragraph-17">　Course description:　<?= $ad['description'] ?>　<br></p>
<div class="form-block w-form">
    <a href="#" class="button-36 w-button" onclick="Booking()">booking an<br>appointment</a>
    <a href="chat.php" class="button-35 w-button">chat with me</a>
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

<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
<script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<script src="available-date.php?tutor_id=<?= $tutorId ?>"></script>
<script>
    console.log(availableDates);
    $('#datepicker').datepicker(
        {
            onSelect: function (selectedDate)  //Select date 
            {
                document.cookie = "date" + "=" + selectedDate;  //put the select date save in the cookie
            },
            beforeShowDay(date) {
                for (let i = 0; i < availableDates.length; i++) {
                    let d = new Date(availableDates[i])
                    if (d.getDate() == date.getDate() && d.getMonth() == date.getMonth() && d.getFullYear() == date.getFullYear()) {
                        return [false,]
                    }
                }
                return [true,]
            }
        }
    );
    function Booking()
{
    var Datetime=getCookie('date');
    alert("Make an appointment success   time:"+Datetime);
    function getCookie(cname)
    {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) 
        {
            var c = ca[i].trim();
         if (c.indexOf(name)==0) return c.substring(name.length,c.length);
         }
         return "";
    }
}

</script>

</body>
</html>