<?php
/**
 * @var mysqli $conn
 */
session_start();
include 'db.php';
if (isset($_POST['deleteAdId'])) {
    $adId = $_POST['deleteAdId'];
    $conn->query("delete from ad_table where ad_id='$adId'");
    exit();
}
if ($_SESSION['identity'] == "student") {
    header("Location: login.php");
}
$identity = $_SESSION['identity'];
$tutorId = $_SESSION['id'];
$advertisements = $conn->query("select * from ad_table where tutor_id='$tutorId'")->fetch_all(MYSQLI_ASSOC);


?>

<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Jun 27 2021 05:25:08 GMT+0000 (Coordinated Universal Time)  -->

<html data-wf-page="60bee797ccbd4677758504c0" data-wf-site="60bed237fca1d643909939de">
<head>
    <meta charset="utf-8">
    <title>Advertisement_management</title>
    <meta content="Advertisement_management" property="og:title">
    <meta content="Advertisement_management" property="twitter:title">
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
    <!--  This is for code syntax highlighting, and can be ignored.  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.22.0/themes/prism.min.css"
          integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ=="
          crossorigin="anonymous">
    <style>
        /*General Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 15px;
        }

        ::-webkit-scrollbar-track {
            background-color: rgba(0, 0, 0, .05);
            -webkit-border-radius: 20px;
            border-radius: 20px;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 20px;
            border-radius: 20px;
            background: rgb(54, 49, 49);
        }

        /*Red Scrollbar Styling */
        .red::-webkit-scrollbar-thumb {
            -webkit-border-radius: 20px;
            border-radius: 20px;
            background: red;
        }

        /*Green Scrollbar Styling */
        .green::-webkit-scrollbar-thumb {
            -webkit-border-radius: 20px;
            border-radius: 20px;
            background: green;
        }

        /*Blue Scrollbar Styling */
        .blue::-webkit-scrollbar-thumb {
            -webkit-border-radius: 20px;
            border-radius: 20px;
            background: blue;
        }

        /*Yellow Scrollbar Styling */
        .yellow::-webkit-scrollbar-thumb {
            -webkit-border-radius: 20px;
            border-radius: 20px;
            background: yellow;
        }

        /*Orange Scrollbar Styling */
        .orange::-webkit-scrollbar-thumb {
            -webkit-border-radius: 20px;
            border-radius: 20px;
            background: orange;
        }

        /*Purple Scrollbar Styling */
        .purple::-webkit-scrollbar-thumb {
            -webkit-border-radius: 20px;
            border-radius: 20px;
            background: purple;
        }

        .div-block-23 {
            text-align: center;
        }

        .button-40 {
            position: absolute;
            top: 512px;
            right: 1800px;
           
        }
    </style>
</head>
<body class="body-2">
<h1 class="heading-13">J&amp;H education<br>‍</h1>
<div class="w-form">
    <form id="email-form" name="email-form" data-name="Email Form" class="form"><label for="name" class="field-label">Manage
            advertisements<br>‍</label></form>
    <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
    </div>
    <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form.</div>
    </div>
</div>
<div class="div-block-22">
    <div class="scrollbar-item red">

        <?php
        foreach ($advertisements as $ad) {

            ?>
            <div class="div-block-23"><img
                        src="https://d3e54v103j8qbb.cloudfront.net/plugins/Basic/assets/placeholder.60f9b1840c.svg"
                        loading="lazy" alt="" class="image-11">
                <div class="text-block-5"><?= $ad['ad_title'] ?><br>‍</div>
                <a href="#" class="button-38 w-button"
                   onclick="clickDeleteAdButton(<?= $ad['ad_id'] ?>)">delete<br>‍</a>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<a href="main.php" class="button-40 w-button">Back</a>
<a href="post-ad.php" class="button-39 w-button">Post an ad</a>
<div class="div-block-24"><img src="images/user-male.png" loading="lazy" alt="User">
    <div class="text-block-6">name : <?= $_SESSION['name'] ?><br><br>identity: <?= $_SESSION['identity'] ?></div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=60bed237fca1d643909939de"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->

<script>
    function clickDeleteAdButton(advertisementId) {
        if (confirm("Delete this advertisement?")) {
            $.ajax({
                url: "advertisement-management.php",
                method: "POST",
                data: {
                    "deleteAdId": advertisementId
                },
                success: function (result) {
                    alert("You have deleted this advertisement successfully!")
                    location.reload()
                }
            })

        }
    }
</script>

</body>
</html>