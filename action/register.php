<?php 
include_once "config.php";
	if (isset($_POST['submit'])) {
		$error = $success = '';
        $email = $_POST['email']; if (empty($email)) $error .= "E-mail can't be blank.</br>";
        $name = $_POST['name']; if (empty($name)) $error .= "Name can't be blank.</br>";
		$ref = $_POST['referral']; 
		$pass = $_POST['password']; if (empty($pass)) $error .= "Password can't be blank.</br>";
		$address = $_POST['address']; if (empty($address)) $error .= "Address can't be blank.</br>";
		$contact = $_POST['mobile']; if (empty($contact)) $error .= "Mobile number can't be blank.</br>";
		$date = date("Y-m-d H:i:s");
		$query = $con->prepare("SELECT * FROM users WHERE email='$email'");
        $query->execute();
        $query = $query->get_result();
        if ($query->num_rows == 0 && !empty($email) && !empty($name) && !empty($pass) && !empty($address) && !empty($contact)) {
			$code = md5(rand(0, 10000000));
			$status = 'N';
			$ref = str_replace ('SEFF','',$ref);
			$query = $con->prepare("INSERT INTO users (name, email, cr_date, mobile, referral, address, password, code, status) VALUES (?,?,?,?,?,?,?,?,?)");
			$query->bind_param("sssssssss", $name, $email, $date, $contact, $ref, $address, $pass,$code, $status);
			$query->execute();
			if ($query->affected_rows == 1) {
				$subject = "Verification code | ";
				$link = $url.'login.php?vrf_code='.$code.'&email='.$email.'&q='.rand();
				$message = "<b>Please <a href='$link'> click here </a> or copy this url to evrify your account .</b>$link";
				$header = "From:vibhanshuchhangani@gmail.com\r\n";
				$header .= "Cc:info@sabsetezkon.com\r\n";
				$header .= "MIME-Version: 1.0\r\n";
				$header .= "Content-type: text/html\r\n";
				if(mail ($email,$subject,$message,$header)) {
				    header("refresh:5;url=$link");
				    $success .= 'Congratulations! You have successfully registered with Sefflyco. Please wait, you`ll be redirected to login.';
				}
				    
			}
        } else { $error .= 'Account already exist. Try with deffrent email ...'; }
    }
?>