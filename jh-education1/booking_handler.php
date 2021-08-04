<?php
/**
 * @var mysqli $conn
 */
include 'db.php';

session_start();


$tutorname = $_POST["tutor_name"];
//$tutor = $conn->query("select * from tutor_table where tutor_id='$tutorId'")->fetch_assoc();

/*@$orderId = intval($_GET['order_id']);
$order = $conn->query("select * from order_table where order_id='$orderId'")->fetch_assoc();
$tutororder = $conn->query("select * from order_table where tutor_id='$tutorId'")->fetch_assoc();
*/
$studentname = $_POST["student_name"];
$totaltuition = $_POST["total_tuition"];
$date= $_COOKIE['reformatdate'];
$identity = $_SESSION['identity'];
$studentId = $_SESSION['id'];

if ($identity == 'student'){ //upload information
    //insert user information into the table, make a new row with username, password, email, and starting money
    $query = "INSERT INTO order_table (tutor_name, student_id, order_time, student_name, total_tuition) VALUES ('$tutorname','$studentId','$date','$studentname','$totaltuition');";     
    if (!$conn->query($query)) { //Check if it fails
        $conn->close();
        die("Failed to book the appointment since you did not fill the information correctly");
    }else{
        echo 'successfully booking an appointment!';
        $conn->close();
        header("location: main.php");
    }
}

?>