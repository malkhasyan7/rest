<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password) or die("Connection failed: " . mysqli_connect_error());
$db_selected = mysqli_select_db($conn, 'restful') or die(mysqli_error());