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
	<link rel="stylesheet" href="css/style4.css">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="index.php">Sefflyco</a>
                </h1>
                <span>S</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                <li>
                    <a href="index.php">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
				<li>
                    <a href="profile.php">
                        <i class="fas fa-user"></i>
                        My Profile
                    </a>
                </li>
				<li>
                    <a href="fund.php">
                        <i class="fas fa-map"></i>
                        Fund Withdrawals
                    </a>
                </li>
				<?php if (isset($_SESSION['usertype']) && $_SESSION['usertype'] =='A') { ?>
				<li>
                    <a href="requests.php">
                        <i class="fas fa-map"></i>
                        Withdrawal Requests
                    </a>
                </li>
				<?php } ?>
            </ul>
        </nav>
		<div id="content">
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="images/clone.jpg" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits"><?php echo $_SESSION['username']; ?></h3>
                                        <a href="mailto:info@example.com"><?php echo $_SESSION['user']; ?></a>
                                    </div>
                                </div>
								<a href="<?php echo $url; ?>register?ref=SEFF<?php echo sprintf("%04d", $_SESSION['userid']); ?>" class="dropdown-item mt-3">
                                    <h4><i class="fas fa-link mr-3"></i><?php echo $url; ?>register?ref=SEFF<?php echo sprintf("%04d", $_SESSION['userid']); ?></h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4><i class="far fa-thumbs-up mr-3"></i>Support</h4>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?logout=t2347vgdcjsg837vcfsh68">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>