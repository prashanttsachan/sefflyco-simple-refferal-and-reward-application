<?php
include_once 'action/requests.php';
if (!isset($_SESSION['user']) && $_SESSION['usertype'] != 'A') {
	header("Location: login.php");
	exit;
}
?>
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
		<div class="outer-w3-agile mt-3">
			<h4 class="tittle-w3-agileits mb-4">Withdraw Requests</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">Sr.</th>
						<th scope="col">Amount</th>
						<th scope="col">User Details</th>
						<th scope="col">Bank Details</th>
						<th scope="col">Date</th>
						<th scope="col">Status</th>
						<th scope="col">Comment</th>
						<th scope="col">Action</th>
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
						<th scope="row"><?php echo $row->amount; ?> INR</th>
						<td>
							<?php 
								echo '<b>Name:</b>&nbsp;'.$row->name.'</br><b>E-mail:</b>&nbsp;'.$row->email.'</br><b>Address:</b>&nbsp;'.$row->address; 
							?>
						</td>
						<td>
							<?php 
								echo '<b>Bank:</b>&nbsp;'.$row->bank.'</br><b>Branch:</b>&nbsp;'.$row->branch.'</br><b>Account No:</b>&nbsp;'.$row->accountno.'</br><b>IFS Code:</b>&nbsp;'.$row->ifsc.'</br>'; 
							?>
						</td>
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
								else {
									echo '<form method="POST" >
										<input type="hidden" name="payment" value="'.$row->id.'">
										<input type="text" class="form-control" name="comment" placeholder="Enter Comment" required="">';
								}
							?>
						</td>
						<td>
							<?php 
								if ($row->status == 'Y') {
									echo '<button type="submit" name="submit" class="btn btn-primary">Pay</button>
											<button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
									</form>';
								}
							?>
						</td>
					</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
		</div>
	</div>
<?php include_once 'footer.php';