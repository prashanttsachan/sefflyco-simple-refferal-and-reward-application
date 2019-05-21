<?php
include_once 'action/register.php';
if (isset($_SESSION['user'])) {
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sefflyco</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>
    <div class="bg-page py-5">
        <div class="container">
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Register</h2>
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
				<?php if (isset($error) && !empty($error)) { ?>
				<div class="alert alert-danger alert-dismissible">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <p class="pull-left"><?php echo $error; ?></p>
				</div>
				<?php } ?>
				<?php if (isset($success) && !empty($success)) { ?>
				<div class="alert alert-success alert-dismissible">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <?php echo $success; ?>
				</div>
				<?php } ?>
                <form id="registration-form" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
                    </div>
                    <div class="form-group">
                        <label>MObile</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="">
                    </div>
					<div class="form-group">
                        <label>Referral</label>
                        <input type="text" class="form-control" name="referral" placeholder="Referral ID" >
                    </div>
					<div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" placeholder="Address" required=""></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Submit</button>
                </form>
                <p class="paragraph-agileits-w3layouts mt-4">Already have account?
                    <a href="login.php">Login</a>
                </p>
            </div>
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                <p>© <?php echo date("Y"); ?> Sefflyco . All Rights Reserved | Developed By
                    <a href="https://www.ciesta.in/"> Ciesta Technologies</a> Template by <a href="https://www.w3layouts.in/">w3layout</a>
                </p>
            </div>
        </div>
    </div>
    <script src='js/jquery-2.2.3.min.js'></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>