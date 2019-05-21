<?php
include_once "config.php";
	if (isset($_POST['submit'])) {
		$error = $success = '';
		$email = $_POST['email']; if (empty($email)) $error .= "E-mail can't be blank.</br>";
        $pass = $_POST['password']; if (empty($pass)) $error .= "Password can't be blank.</br>";
		$query = $con->prepare("SELECT * FROM users WHERE email=? AND password=?");
		$query->bind_param("ss", $email, $pass);
        $query->execute();
        $query = $query->get_result();
        if ($query->num_rows == 1) {
			$row = $query->fetch_object();
			if ($row->status == 'Y') {
    			$_SESSION["user"] = $email;
    			$_SESSION["username"] = $row->name;
    			$_SESSION["userid"] = $row->id;
    			$_SESSION["usertype"] = $row->type;
    			header("Location: index.php");
			} else {
			    $subject = "Verification code | ";
				$link = $url.'login.php?vrf_code='.$row->code.'&email='.$row->email.'&q='.rand();
				$message = "<b>Please <a href='$link'> click here </a> or copy this url to evrify your account .</b>$link";
				$header = "From:prashant.sachan190@gmail.com\r\n";
				$header .= "Cc:vibhanshuchhangani@gmail.com\r\n";
				$header .= "MIME-Version: 1.0\r\n";
				$header .= "Content-type: text/html\r\n";
				$retval = mail ($email,$subject,$message,$header);
				$error .= 'Your account is not verified. Please check your email and verify your account.';
			}
        } else { $error .= 'Invalid credentials. Please try again ...'; }
    }
	if (isset($_GET['vrf_code']) &&  isset($_GET['email'])) {
		$email = $_GET['email'];
		$code = $_GET['vrf_code'];
		$query = $con->prepare("SELECT * FROM users WHERE email=? AND code=?");
		$query->bind_param("ss", $email, $code);
        $query->execute();
        $query = $query->get_result();
        if ($query->num_rows == 1) {
			$row = $query->fetch_object();
			$amount = 300;
			$query = $con->prepare("UPDATE users SET status='Y', code='', ballance=(ballance+?) WHERE code=? AND email=?");
			$query->bind_param("sss",$amount,$code,$email);
			$query->execute();
			if ($query->affected_rows == 1) {
				if ($row->referral != 0) {
					$query = $con->prepare("UPDATE users SET ballance=(ballance+?), refered=(refered+1) WHERE id=?");
					$query->bind_param("ss", $amount, $row->referral);
					$query->execute();
					$type = "Referral from ".$row->name;
					$date = date("Y-m-d H:i:s");
					$query = $con->prepare("INSERT INTO bal_det (user, amount, cr_date, type) values (?,?,?,?)");
					$query->bind_param("ssss", $row->id, $amount, $date, $type);
					$query->execute();
				}
				$success .= 'Account has been verified successfully. Please login now ...';
			}
			$_SESSION["user"] = $email;
			$_SESSION["username"] = $row->name;
			$_SESSION["userid"] = $row->id;
			$_SESSION["usertype"] = $row->type;
			header("Location: index.php");
		} else { $error .= 'Invalid credentials. Please try again ...'; }
	}
?>