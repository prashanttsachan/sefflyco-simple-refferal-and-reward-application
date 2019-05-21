<?php
include_once 'action/profile.php';
if (!isset($_SESSION['user'])) {
	header("Location: login.php");
	exit;
}
?>
<?php include_once 'header.php'; ?>
			<div class="blank-page-content">	
				<div class="row col-md-12">
					<div class="outer-w3-agile col-xl mt-3 mr-xl-3">
						<h4 class="tittle-w3-agileits mb-4">Personal Details</h4>
						<form action="#" method="post">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" value="<?php echo $det->name; ?>" placeholder="Name" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" value="<?php echo $det->email; ?>" placeholder="Email" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-sm-2 col-form-label">Mobile</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" value="<?php echo $det->mobile; ?>" readonly>
								</div>
							</div>
						</form>
					</div>
				<div class="outer-w3-agile col-xl mt-3 mr-xl-3">
						<h4 class="tittle-w3-agileits mb-4">Banking Details</h4>
						<form id="bank-details" method="post">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-6 col-form-label">Bank Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="bank" value="<?php echo $det->bank; ?>" placeholder="Bank Name" required="">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-6 col-form-label">Branch Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="branch" value="<?php echo $det->branch; ?>" placeholder="Branch Name" required="">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-6 col-form-label">Account Number</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="accno" value="<?php echo $det->accountno; ?>" placeholder="Account Number" required="">
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-6 col-form-label">IFS Code</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="ifsc" value="<?php echo $det->ifsc; ?>" placeholder="IFS Code" required="">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-10">
									<?php if (empty($det->bank) || empty($det->branch) || empty($det->accountno) || empty($det->ifsc)) { ?>
									<button type="submit" name="bank-submit" class="btn btn-primary">Update</button>
									<?php } ?>
								</div>
							</div>
						</form>
					</div>
				</div>
            </div>
<?php include_once 'footer.php';