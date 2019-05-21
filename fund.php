<?php
include_once 'action/fund.php';
if (!isset($_SESSION['user'])) {
	header("Location: login.php");
	exit;
}
?>
<?php include_once 'header.php'; ?>
<?php include_once 'header.php'; ?>
<style>
.success {
    color: white !important;
    background: green !important;
}
.cancelled {
    color: white !important;
    background: red !important;
}
.waiting {
    color: white !important;
    background: yellow !important;
}
</style>
			<div class="blank-page-content">	
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
				<div class="row col-md-12">
					<div class="card p-xl-3 p-1">
                        <blockquote class="blockquote mb-0 card-body">
                            <p>Available Ballance : <?php echo $det->ballance; ?></p>
							<?php if ($det->ballance >= 1000) { ?>
							<p>You can withdraw up to <?php echo $det->ballance; ?>.</p>
							<?php } else { ?>
							<p>You can withdraw any amount when it's less than 1000 INR.</p>
							<?php } ?>
                            <footer class="blockquote-footer mt-2">
                                <a href="#" class="btn more mt-3">Read More</a>
                            </footer>
                        </blockquote>
                    </div>
				</div>
				<?php if ($det->ballance >= 1000) { ?>
				<div class="row col-md-12">
					<div class="outer-w3-agile col-xl mt-3 mr-xl-3">
						<h4 class="tittle-w3-agileits mb-4">Drop a withdraw request</h4>
						<form id="fund-withdraw" method="post">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-6 col-form-label">Amount</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="amount" placeholder="Amount" required="">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" name="submit" class="btn btn-primary">Submit Request</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php } ?>
				<div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Withdraw Requests</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sr.</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Comment</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php $i = 1; while ($row = $requests->fetch_object()) { ?>
        					<tr>
        					    <?php 
        					        if ($row->status == 'Y') $class= 'waiting'; 
        					        else if ($row->status == 'P') $class= 'success'; 
        					        else if ($row->status == 'C') $class= 'cancelled';
        					        else $class= '';
        					    ?>
        					    <td class="<?php echo $class; ?>">
        					        <?php echo $i; ?>
        					    </td>
                                <th scope="row"><?php echo $row->amount; ?></th>
                                <td><?php echo date_format(date_create($row->cr_date), "d M, Y"); ?></td>
                                <td>
									<?php 
										if ($row->status == 'Y') echo "Not processed"; 
										else if ($row->status == 'P') echo 'Paid';
										else if ($row->status == 'C') echo 'Cancelled';
										else echo 'Unknown';
									?>
								</td>
                                <td>
									<?php 
										if (!empty($row->comment)) echo $row->comment; 
										else echo 'None';
									?>
								</td>
                            </tr>
							<?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
<?php include_once 'footer.php';