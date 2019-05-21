<?php
include_once "config.php";
if (isset($_POST['submit'])) {
	$error = $success = '';
	$amount = $_POST['amount']; if (empty($amount)) $error .= "Amount can't be blank.</br>";
	if (!empty($amount) && $amount >= 1000) {
		$query = $con->prepare("SELECT * FROM users WHERE id=?");
		$query->bind_param("s", $_SESSION['userid']);
		$query->execute();
		$query = $query->get_result();
		if ($query->num_rows == 1) {
			$det = $query->fetch_object();
			if ($det->ballance < 1000 || $ballance > $det->ballance) {
				header("Location: fund.php");
				exit;
			}
		}
		$query = $con->prepare("UPDATE users SET ballance=(ballance - ?) WHERE id=?");
		$query->bind_param("ss", $amount,$_SESSION['userid']);
		$query->execute();
		if ($query->affected_rows == 1) {
			$status = 'Y';
			$date = date("Y-m-d H:i:s");
			$query = $con->prepare("INSERT INTO requests (user, amount, status, cr_date) VALUES (?,?,?,?)");
			$query->bind_param("ssss", $_SESSION['userid'], $amount, $status, $date);
			$query->execute();
			$success .= 'Request has been submitted successfully.';
		}
	} else $error .= "Invalid request. Try again ...</br>";
}
$query = $con->prepare("SELECT * FROM users WHERE id=?");
$query->bind_param("s", $_SESSION['userid']);
$query->execute();
$query = $query->get_result();
if ($query->num_rows == 1) {
	$det = $query->fetch_object();
}
$requests = $con->prepare("SELECT * FROM requests WHERE user=? ORDER BY id DESC");
$requests->bind_param("s", $_SESSION['userid']);
$requests->execute();
$requests = $requests->get_result();
?>