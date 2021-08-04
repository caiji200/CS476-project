<!DOCTYPE html>
<?php
	//database variables
    $servername = "35.193.221.6:3306";
    $username = "jheducation";
    $password = "cs476";
    $databasename = "cs476";
    $database = new mysqli($servername, $username, $password, $databasename);
	$error = ""; 
	if (isset($_POST["submitted"]) && $_POST["submitted"] == 1) { //the form was submitted
		
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		$email = trim($_POST["email"]);
        $descritption = trim($_POST["description"]);
        $photo = trim($_POST["photo"]);
		$starting_money = 99999;
		
		//PHP verification that the data is good and will fit into the database
		if (strlen($username) > 0 && strlen($username) < 255 && strlen($password) > 0 && strlen($password) < 255 && strlen($email) > 0 && strlen($email) < 255){
			

			
			if ($database->connect_error) {
				die("Connection failed: " . $database->connect_error);
			}
			//Retrieve usernames that are like the inputted username
			$query = "SELECT tutor_name FROM tutor_table WHERE tutor_name = \"" . $username . "\";"; 
			$results = $database->query($query);
			if ($results->num_rows > 0) { //require a unique username
				$database->close();
				$error = "Username has already been taken.";
			} else { //upload information
				//insert user information into the table, make a new row with username, password, email, and starting money
				$query = "INSERT INTO tutor_table (tutor_name, tutor_password, tutor_email, tutor_balance) VALUES ('$username', '$password', '$email', '$starting_money');";
				if (!$database->query($query)) { //Check if it fails
					$database->close();
					die("Failed to upload user information.");
				}
				$database->close();
				header("Location: main.php"); //Success, redirect to main page
			}
		}
	}
?>
<!DOCTYPE html><!-- This site was created in Webflow. http://www.webflow.com -->
<!-- Last Published: Sat Jun 26 2021 07:06:15 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="476.webflow.io" data-wf-page="60ca4d1eb18f0033c99aa60e" data-wf-site="60bed237fca1d643909939de">

<head>
    <meta charset="utf-8" />
    <title>Signup</title>
    <meta content="Signup" property="og:title" />
    <meta content="Signup" property="twitter:title" />
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
</head>

<body class="body-7">
    <h1>J&amp;H education</h1>
    <div class="w-form">
        <form action= "signuphandler.php" id="email-form" name="email-form" data-name="Email Form" class="form-2 w-clearfix" method= "post">
            <h1 class="heading-5">Sign Up!</h1>
            <label for="name">Name:</label>
            <input type="text" class="w-input" maxlength="256" name="username" data-name="Name" placeholder="Use correct standard for username (no space)" id="username" />
            <label for="email">Email Address:</label>
            <input type="email" class="w-input" maxlength="256" name="email" data-name="Email" placeholder="Use correct standard for email (XXX@XXX.XXX)" id="email" required="" />
            <label>Password:</label>
            <input type="text" class="w-input" maxlength="256" name="password" data-name="Field" placeholder="Use correct standard for password (no space)" id="password" required="" />
            <label>Re-password:</label>
            <input type="text" class="w-input" maxlength="256" name="re_password" data-name="Field 2" placeholder="Use correct standard for re-password (no space)" id="re_password" required="" />
            <label>Indentity:</label>
            <input type="text" class="w-input" maxlength="256" name="identity" data-name="Field 3" placeholder="Type student or tutor." id="identity" required="" />
            <label>Subject:</label>
            <input type="text" class="w-input" maxlength="256" name="subject" data-name="Field 4" placeholder="enter your main subject" id="subject" required="" />
            <label>Foucus Level:</label>
            <input type="text" class="w-input" maxlength="256" name="level" data-name="Field 5" placeholder="enter your main subject" id="level" required="" />
            <label>Your Icon:</label>
            <input name = "photo" type="file" id="photo">
            <label>Your Description:</label>
            <textarea placeholder="Example Text" maxlength="5000" id="description" name="description" class="w-input"></textarea>
                <a href="login.php" class="w-button">Back</a>
                <input type="submit" value="Submit" data-wait="Please wait..." class="submit-button-2 w-button" />
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
    <script src="https://uploads-ssl.webflow.com/60bed237fca1d643909939de/js/webflow.967dbbe0d.js"
        type="text/javascript"></script>
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>

</html>