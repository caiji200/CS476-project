<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com -->
<!-- Last Published: Sat Jun 26 2021 07:06:15 GMT+0000 (Coordinated Universal Time) -->
<?PHP
	session_start();
	
	//database variables
    $servername = "35.193.221.6:3306";
    $username = "jheducation";
    $password = "cs476";
    $databasename = "cs476";
	
	$error = "";
	//check if the log in forms were submitted
	if (isset($_POST["logout"]) && $_POST["logout"] == "1") {
		unset($_POST["logout"]);
		session_destroy();
		header("Location: index.php");
	} elseif (isset($_POST["login"]) && $_POST["login"] == "1") {
		//get the user information
		$database = new mysqli($servername, $username, $password, $databasename);
		if ($database->connect_error) {
			die("Connection failed: " . $database->connect_error);
		}
		
		$username = $_POST['username'];
        $password = $_POST['password'];

        $username_v = clean_input($username);
        $password_v = clean_input($password);
		
		//get the user's information
		$query = "SELECT tutor_id, tutor_name FROM tutor_table WHERE tutor_name='$username_v' and tutor_password='$password_v'";
		
		$user_info = $database->query($query);
		if ($user_info = $user_info->fetch_assoc()) {
			$_SESSION["user"] = $user_info["user_id"];
			$_SESSION["user_name"] = $user_info["user_name"];		
		} else {
			//invalid input
			$error = "Invalid username or password.";
		}


	}
?>

<html data-wf-domain="476.webflow.io" data-wf-page="60ca442fe5e3ef30da4e6637" data-wf-site="60bed237fca1d643909939de">

<head>
    <meta charset="utf-8" />
    <title>main</title>
    <meta content="main" property="og:title" />
    <meta content="main" property="twitter:title" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link href="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/css/476.webflow.f76eb1435.css" rel="stylesheet"
        type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script
        type="text/javascript">WebFont.load({ google: { families: ["Changa One:400,400italic", "Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"] } });</script>
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
    <script
        type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>
    <link href="https://uploads-ssl.webflow.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="https://uploads-ssl.webflow.com/img/webclip.png" rel="apple-touch-icon" />
    <style>  
    .searchbox {  
    float: left;  
    }  
    input[type=text] {  
    padding: 6px;  
    margin-top: 8px;  
    font-size: 17px;  
    border: none;  
    }  
    .searchbox button {    
    padding: 8px;  
    margin-top: 10px;  
    margin-left: 10px;  
    background: orange;  
    font-size: 20px;  
    border: none;  
    cursor: pointer;  
    }  
   .searchbox button:hover {  
    background: blue;  
    }  
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

<body class="body-6"><a href="../signup.php" class="button-21 w-button">Sign Up</a><a href="login.php"
        class="button-22 w-button">Log In</a>
    <h1>J&amp;H education</h1>
    <div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="navbar w-nav">
        <h4>Search bar :</h4>
        <form>   
        <input type="text" placeholder=" Search...." name="search">   
        <button type="submit">Submit</button>   
        </form> 
    </div>
    <h3 class="heading-4">High-rate tutors:</h3>
    <div class="section-3">
        
        <?php
        $servername = "35.193.221.6:3306";
        $username = "jheducation";
        $password = "cs476";
        $databasename = "cs476";

        $database = new mysqli($servername, $username, $password, $databasename);
		if ($database->connect_error) {
			die("Connection failed: " . $database->connect_error);
		}

        /*  $sql = "SELECT * FROM ad_table";
          $result = $database->query($sql);
          
          if ($result->num_rows > 0) {
            // output data of each row
            
            while($row = $result->fetch_assoc()) {
              echo "id: " . $row['ad_title']. " - Name: " . $row['tutor_name']. " " . $row['description']. "<br>";
            }
        } 
        else {
                echo "0 results";
        }
        */
        $identity = $_SESSION['identity'];
        $tutorId = $_SESSION['id'];
        $advertisements = $database->query("select * from ad_table where tutor_id='$tutorId'")->fetch_all(MYSQLI_ASSOC);
        $all_advertisements = $database->query("select * from ad_table")->fetch_all(MYSQLI_ASSOC); 
        ?>
        <div class="div-block-12">
        <div class="scrollbar-item red">        
                <?php
                if($identity == 'tutor'){
                foreach ($advertisements as $ad) {
        
                    ?>
                    <div class="div-block-12" ><img
                                src="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh.jpg"
                                loading="lazy" width="150" height="150" alt="" class="image-11">
                        <p class="paragraph-6">
                        <b>Title: </b><?= $ad['ad_title'] ?><br>
                        <b>My name: </b><?= $ad['tutor_name'] ?><br>
                        <b>Focus Level: </b><?= $ad['tutor_level']?><br>
                        <b>Focus Subject: </b><?= $ad['tutor_subject']?><br>
                        <b>About the Course: </b><?= $ad['description'] ?></p>
                        <a href="/chat.php" class="button-11 w-button">Chat</a>
                        <?php                       
                        echo "<a href='advertisement-detail.php?ad_id=".$ad['ad_id']." 'class='button-12 w-button'>Book an appointment</a>";
                        ?>
                        
                    </div>
                    <br>
                    <?php
                }
              }
              ?>
              <?php
              if($identity == 'student') {

                foreach ($all_advertisements as $ades) {
        
                    ?>
                    <div class="div-block-12" ><img
                                src="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh.jpg"
                                loading="lazy" width="150" height="150" alt="" class="image-11">
                        <p class="paragraph-6">
                        <b>Title: </b><?= $ades['ad_title'] ?><br>
                        <b>My name: </b><?= $ades['tutor_name'] ?><br>
                        <b>Focus Level: </b><?= $ades['tutor_level']?><br>
                        <b>Focus Subject: </b><?= $ades['tutor_subject']?><br>
                        <b>About the Course: </b><?= $ades['description'] ?></p>
                        <a href="/chat.php" class="button-11 w-button">Chat</a>
                        <?php                       
                        echo "<a href='advertisement-detail.php?ad_id=".$ades['ad_id']." 'class='button-12 w-button'>Book an appointment</a>";
                        ?>
                        
                    </div>
                    <br>
                    <?php
                }
              }
                ?>
            </div>
        </div>

            
        
    <div class="div-block-12">
            <img src="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh.jpg"
                loading="lazy" width="150" height="150"
                srcset="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-800.jpeg 800w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-1080.jpeg 1080w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-1600.jpeg 1600w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-2000.jpeg 2000w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-2600.jpeg 2600w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh-p-3200.jpeg 3200w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c56434450800025c30b_Josh.jpg 3456w"
                sizes="150px" alt="Josh" />
            <p class="paragraph-6">Hello, My name is Josh. I&#x27;m a Grade 10 Math teacher, If you need help on high
                school level math, please contact me. My email is: Josh123@what.com, Phone: 888-888-JOSH. I charge $25/hours, price can be negotiated!<br>(Example advertisment for reference.)
            </p>
        </div>
    </div>
    <div class="section-2"><img
            src="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c5814b59220231c7a9b_Mark.jpg"
            loading="lazy" width="150" height="150"
            srcset="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c5814b59220231c7a9b_Mark-p-500.jpeg 500w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c5814b59220231c7a9b_Mark-p-800.jpeg 800w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c5814b59220231c7a9b_Mark-p-1080.jpeg 1080w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c5814b59220231c7a9b_Mark-p-1600.jpeg 1600w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c5814b59220231c7a9b_Mark-p-2000.jpeg 2000w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c5814b59220231c7a9b_Mark-p-2600.jpeg 2600w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c5814b59220231c7a9b_Mark-p-3200.jpeg 3200w, https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60ca4c5814b59220231c7a9b_Mark.jpg 4000w"
            sizes="150px" alt="Annie" />
        <p class="paragraph-7">Hello, My name is Annie. I&#x27;m a Grade 10 English teacher, If you need help on high
            school level English, please contact me. My email is: Annie123@what.com, Phone: 888-888-1234.I charge $30/hours, price can be negotiated!<br>(Example advertisment for reference.)
        </p> 
    </div> 
    <?php if($_SESSION['identity'] == "tutor")
    echo '<a href="personal-file-tutor.php" class="button-17 w-button" >Personal File</a>'
    ?>
    <?php if($_SESSION['identity'] == "student")
    echo '<a href="personal-file-student.php" class="button-17 w-button">Personal File</a>'
    ?>
    <a href="finance.php" class="button-19 w-button" >Finance Service</a>
    <a href="chat.php" class="button-20 w-button" >Message Box</a>
    <img src="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/60bed3a93161d23204f8ce02_user-male.png"
        loading="lazy" width="150" height="150" alt="User" class="image-5" />

    <!-- Some auto-generated js files -->
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=60bed237fca1d643909939de"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/js/webflow.967dbbe0d.js"
        type="text/javascript"></script>
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>

</html>