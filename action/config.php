<?php 
OB_START();
SESSION_START();
date_default_timezone_set("Asia/Kolkata");
$conn = $con=mysqli_connect('localhost', 'SAMPLE_USERNAME', 'SMAPLE_PASSWORD','SAMPLE_DATABASE');
if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}
if (isset($_GET['logout'])) {
    session_destroy();
	header('Location: index.php');
}
$url = "https://localhost/sefflyco/";
?>