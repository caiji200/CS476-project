<?php
	//database variables
    $servername = "35.193.221.6:3306";
    $username = "jheducation";
    $password = "cs476";
    $databasename = "cs476";
	
	$error = ""; 	
	 //the form was submitted
		
		$tutorname = trim($_POST["username"]);
		$tutorpassword = trim($_POST["password"]);
		$email = trim($_POST["email"]);
        $descritption = trim($_POST["description"]);
        $photo = trim($_POST["photo"]);
		$identity = trim($_POST["identity"]); 
		$subject = trim($_POST["subject"]);
		$level = trim($_POST["level"]); 
		$starting_money = 99999;
		
		//PHP verification that the data is good and will fit into the database
		if (strlen($tutorname) > 0 && strlen($tutorname) < 255 && strlen($tutorpassword) > 0 && strlen($tutorpassword) < 255 && strlen($email) > 0 && strlen($email) < 255){
			
			$database = new mysqli($servername, $username, $password, $databasename);
			
			if ($database->connect_error) {
				die("Connection failed: " . $database->connect_error);
			}
			//Retrieve usernames that are like the inputted username
			$query = "SELECT tutor_name FROM tutor_table WHERE tutor_name = \"" . $tutorname . "\";"; 
			$results = $database->query($query); 
			if ($results->num_rows > 0) { //require a unique username
				$database->close();
				$error = "Username has already been taken.";
				echo $error;
			} 
			elseif ($identity == 'tutor'){ //upload information
				//insert user information into the table, make a new row with username, password, email, and starting money
				$query = "INSERT INTO tutor_table (tutor_name, tutor_password, tutor_email, tutor_balance, tutor_img_url, tutor_description, tutor_identity, tutor_subject, tutor_level) VALUES ('$tutorname', '$tutorpassword', '$email', '$starting_money', '$photo', '$descritption','$identity','$subject','$level');"; 
				if (!$database->query($query)) { //Check if it fails
					$database->close();
					die("Failed to upload user information.");
				}else{
				echo 'successfully signed up!';
				$database->close();
				header("location: login.php");
				} //Success, redirect to main page
			}
			elseif ($identity == 'student'){ //upload information
				//insert user information into the table, make a new row with username, password, email, and starting money
				$query = "INSERT INTO student_table (student_name, student_password, student_email, student_balance, student_img_url, student_description, student_identity, student_subject, student_level) VALUES ('$tutorname', '$tutorpassword', '$email', '$starting_money', '$photo', '$descritption','$identity','$subject','$level');"; 
				if (!$database->query($query)) { //Check if it fails
					$database->close();
					die("Failed to upload user information.");
				}else{
					echo 'successfully signed up!';
					$database->close();
					header("location: login.php");
					} //Success, redirect to main page
			}
		}
	
?>