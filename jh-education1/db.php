<?php

//database ip and account and password
$servername = "35.193.221.6:3306";
$username = "jheducation";
$password = "cs476";
$databasename = "cs476";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);
$conn->select_db('cs476');