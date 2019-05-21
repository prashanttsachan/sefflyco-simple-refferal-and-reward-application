<?php
include_once 'action/config.php';
if (!isset($_SESSION['user'])) {
	header("Location: login.php");
	exit;
}
else {
    $query = $con->prepare("SELECT * FROM users WHERE id=?");
    $query->bind_param("s", $_SESSION['userid']);
    $query->execute();
    $query = $query->get_result();
    if ($query->num_rows == 1) {
    	$det = $query->fetch_object();
    }
}
?>
<?php include_once 'header.php'; ?>
			<div class="blank-page-content">	
				<div class="outer-w3-agile col-xl">
					<div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-primary">
						<div class="s-l">
							<h5>Earned Money</h5>
						</div>
						<div class="s-r">
							<h6><?php echo $det->ballance; ?>INR
								<a href="#"><i class="far fa-edit"></i></a>
							</h6>
						</div>
					</div>
					<div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-success">
						<div class="s-l">
							<h5>Referral ID</h5>
						</div>
						<div class="s-r">
							<h6>SEFF<?php echo sprintf("%04d", $_SESSION['userid']); ?>
								<i class="far fa-right-chevron"></i>
							</h6>
						</div>
					</div>
					<div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-danger">
						<div class="s-l">
							<h5>Referral Joins</h5>
						</div>
						<div class="s-r">
							<h6><?php echo $det->refered; ?>
								<a href=""><i class="fas fa-tasks"></i></a>
							</h6>
						</div>
					</div>
                </div>
            </div>
<?php include_once 'footer.php';