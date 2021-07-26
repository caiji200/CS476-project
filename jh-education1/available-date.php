<?php
include 'db.php';
$tutorId = $_GET['tutor_id'];
$dateList = $conn->query("select date(order_time) from order_table where tutor_id='$tutorId'")->fetch_all();
$dateArr = [];
foreach ($dateList as $date) {
    array_push($dateArr, $date[0]);
}
echo "var availableDates = " . json_encode($dateArr);