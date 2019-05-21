<?php
include_once "config.php";
if (isset($_POST['submit']) || isset($_POST['cancel'])) {
	$error = $success = '';
	$comment = $_POST['comment']; if (empty($comment)) $error .= "Comment can't be blank.</br>";
	$payment = $_POST['payment']; if (empty($payment)) $error .= "Payment can't be blank.</br>";
	if (isset($_POST['submit'])) $status = 'P';
	if (isset($_POST['cancel'])) $status = 'C';
	$requests = $con->prepare("SELECT * FROM requests WHERE id=?");
	$requests->bind_param("s", $payment);
	$requests->execute();
	$requests = $requests->get_result();
	if ($requests->num_rows == 1 ) {
		$det = $requests->fetch_object();
		if ($det->status == 'Y') {
			$date = date("Y-m-d H:i:s");
			$query = $con->prepare("UPDATE requests SET status=?, comment=?, pr_date=? WHERE id=?");
			$query->bind_param("ssss", $status, $comment, $date, $payment);
			$query->execute();
			if ($query->affected_rows == 1) {
				if (isset($_POST['cancel'])) {			
					$query = $con->prepare("UPDATE users SET ballance=(ballance + ?) WHERE id=?");
					$query->bind_param("ss", $det->amount,$det->user);
					$query->execute();
					if ($query->affected_rows == 1) {
						$success .= 'Details has been updated successfully.';
					}
				} else $success .= 'Details has been updated successfully.';
			} else {
				$error .= 'Something went wrong. Try again later ...'; 
			}
		} else header ("Location: requests.php"); 
	} else header ("Location: requests.php"); 
}
$requests = $con->prepare("SELECT * FROM users as b, requests as a  WHERE a.user=b.id ORDER BY a.id DESC");
$requests->execute();
$requests = $requests->get_result();
?>