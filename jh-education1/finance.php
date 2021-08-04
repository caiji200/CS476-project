<!DOCTYPE html><!-- This site was created in Webflow. http://www.webflow.com -->
<!-- Last Published: Sat Jun 26 2021 07:06:15 GMT+0000 (Coordinated Universal Time) -->

<?PHP
session_start();

//database variables
$servername = "35.193.221.6:3306";
$username = "jheducation";
$password = "cs476";
$databasename = "cs476";
$database = new mysqli($servername, $username, $password, $databasename);

//if (isset($_POST["logout"]) && $_POST["logout"] == "1") { //the user pressed the log out button
//    unset($_POST["logout"]);
//    session_destroy();
//    header("Location: index.php");
//} elseif (!isset($_SESSION["user"])) { //user is trying to access the page not logged in
//    header("Location: index.php");
//}

if (!isset($_SESSION['identity']) || $_SESSION['identity'] != "tutor") {
    header("Location: login.php");
}

$tutorId = $_SESSION['id'];
$tutorInfo = $database->query("select * from tutor_table where tutor_id='$tutorId'")->fetch_assoc();
$tutorname= $tutorInfo['tutor_name'];
$tutorOrders = $database->query("select * from order_table where tutor_name='$tutorname'")->fetch_all(MYSQLI_ASSOC);
//$studentname= $tutorOrders['student_name'];
//$studentInfo = $database->query("select * from student_table where student_name='$studentname'")->fetch_all(MYSQLI_ASSOC);//->fetch_assoc();

//if (!isset($_GET["tutor_id"])) {
//    header("Location: finance.php");
//} else {
//
//$tutor_id = $_GET["tutor_id"];
//$query = "SELECT * FROM tutor_table WHERE tutor_id = '$tutor_id';";
//$query = "INSERT INTO order_table (hours, price_per_hour) VALUES (1, 100);";
//$results = $database->query($query);
//
//$todaydate = date("m/d/Y");
//
//
//$query = $database->query("SELECT * FROM order_table WHERE id= '$ad_id'");
//while ($row = $query->fetch_assoc()) {
//    $order_id = $row['order_id'];
//    $order_time = $row['order_time'];
//    $hours = $row['hours'];
//    $price_per_hour = $row['price_per_hour'];
//    $total_tuition = $hours * $price_per_hour;
//    $tutor_name = $row['tutor_name'];
//
//
//    $query1 = $con->query("SELECT * FROM tutor_table WHERE id='$ad_id'");
//    $user_fname = $query1->fetch_assoc();
//    $uname_db = $user_fname['tutor_name'];
//    $uemail_db = $user_fname['tutor_email'];
//    $ubalance_db = $user_fname['tutor_balance'];
//    $pro_pic_db = $user_fname['tutor_img_url'];
//}
?>

<html data-wf-domain="476.webflow.io" data-wf-page="60ca4fc068c75371e3b1dd35" data-wf-site="60bed237fca1d643909939de">

<head>
    <meta charset="utf-8"/>
    <title>Finance_serice_tutor</title>
    <meta content="Finance_serice_tutor" property="og:title"/>
    <meta content="Finance_serice_tutor" property="twitter:title"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Webflow" name="generator"/>
    <!--<link href="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/css/476.webflow.f76eb1435.css" rel="stylesheet"
          type="text/css"/> -->
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/webflow.css" rel="stylesheet" type="text/css">
    <link href="css/476.webflow.css" rel="stylesheet" type="text/css">      
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script
            type="text/javascript">WebFont.load({google: {families: ["Changa One:400,400italic", "Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]}});</script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"
            type="text/javascript"></script><![endif]-->
    <script
            type="text/javascript">!function (o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
        }(window, document);</script>
    <link href="https://uploads-ssl.webflow.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link href="https://uploads-ssl.webflow.com/img/webclip.png" rel="apple-touch-icon"/>
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

    </style>
</head>

<body class="body-8">
<h1>J&amp;H education</h1>
<h1 class="heading-6">Finance Service</h1>

<div class="" style="text-align: center;">
<img src="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh.jpg"
     loading="lazy" width="150" sizes="150px"
     srcset="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-800.jpeg 800w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-1080.jpeg 1080w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-1600.jpeg 1600w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-2000.jpeg 2000w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-2600.jpeg 2600w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-3200.jpeg 3200w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh.jpg 3456w"
     alt="Josh" class=""/><br><br>
    <p class="paragraph-3">Name: <?= $tutorInfo['tutor_name'] ?></p>
    <p class="paragraph-3">Level: <?= $tutorInfo['tutor_level'] ?></p>
    <p class="paragraph-3">Identity: <?= $tutorInfo['tutor_identity'] ?></p>
    <p class="paragraph-3">Email: <?= $tutorInfo['tutor_email'] ?></p>
    <p class="paragraph-3">Balance: <?= $tutorInfo['tutor_balance'] ?></p>   
    
</div>
    <!--    <div><span>'.$uname_db'</span></div>-->
    <!--    <br/><br/>-->
    <!--    Educational level Focus: Grade 10<br/><br/>-->
    <!--    Indentity: Tutor<br/><br/>-->
    <!--    Email:-->
    <!--    <div><span>'.$uname_db'</span></div>-->
    <!--    <br/><br/>-->
    <!--    Balance:-->
    <!--    <div><span>'.$ubalance_db'</span>-->
    <!--        <br/>‍-->
    <!--        </p>-->
    <!--    </div>-->
 
<h4 class="" style="background-color: transparent; text-align: center;">Orders History:</h4>
    <?php
    foreach ($tutorOrders as $order) {
        ?>

        <div class="div-block-22" style="position: relative; left: 370px;">
            <div class="scrollbar-item red" style="background-color: #68E655">
                <!-- <p class="paragraph-11" style="background-color: #68E655"> -->
                <div style="border: solid;">    
                <b>Order ID: <?= $order['order_id'] ?></b><br>
                    Order date: <?= $order['order_time'] ?><br> 
                    Grade: <?= $tutorInfo['tutor_level'] ?><br>
                    Subject: <?= $tutorInfo['tutor_subject'] ?> course <br>
                    Student: <?= $order['student_name'] ?> <br>
                    <?php 
                    $studentname= $order['student_name'];
                    $studentInfo = $database->query("select * from student_table where student_name='$studentname'")->fetch_assoc();//;//->fetch_all(MYSQLI_ASSOC);                   
                    echo 'Student email:  '; echo $studentInfo['student_email']; 
                    ?>
                    <a href="#" class="w-button" style="float: right;">Complete</a>                    
                    <br>Tuition: $<?= $order['total_tuition'] ?>                   
                <!-- </p> -->
                </div>
                <br>
            </div>            
        </div>

        <?php
    }
    ?>
    <br>
    <a href="main.php" class="button-27 w-button" style="position: relative; left: 100px;">Back</a>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=60bed237fca1d643909939de"
            type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/js/webflow.967dbbe0d.js"
            type="text/javascript"></script>
    <!--[if lte IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>

</html>