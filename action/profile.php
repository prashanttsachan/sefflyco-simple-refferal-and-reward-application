<?php
include_once "config.php";
if (isset($_POST['bank-submit'])) {
	$error = $success = '';
	$bank = $_POST['bank']; if (empty($bank)) $error .= "Bank name can't be blank.</br>";
	$branch = $_POST['branch']; if (empty($branch)) $error .= "Branch name can't be blank.</br>";
	$accno = $_POST['accno']; if (empty($accno)) $error .= "Account Number can't be blank.</br>";
	$ifsc = $_POST['ifsc']; if (empty($ifsc)) $error .= "IFS Code name can't be blank.</br>";
	if (!empty($bank) || !empty($branch) || !empty($accno) || !empty($ifsc)) {
		$query = $con->prepare("UPDATE users SET bank=?, branch=?, accountno=?, ifsc=? WHERE id=?");
		$query->bind_param("sssss", $bank, $branch, $accno, $ifsc, $_SESSION['userid']);
		$query->execute();
		if ($query->affected_rows == 1) {
			$success .= 'Details has been updates successfully.';
		}
	}
}
$query = $con->prepare("SELECT * FROM users WHERE id=?");
$query->bind_param("s", $_SESSION['userid']);
$query->execute();
$query = $query->get_result();
if ($query->num_rows == 1) {
	$det = $query->fetch_object();
}
?>