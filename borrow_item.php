<?php include ('header.php'); ?>
<?php include ('include/dbcon.php'); ?>
<?php 
	$school_number = $_GET['school_number'];
	
	$user_query = mysqli_query($con,"SELECT * FROM user WHERE school_number = '$school_number' ");
	$user_row = mysqli_fetch_array($user_query);
?>
        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Borrowed Transaction
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
				
                <div class="x_panel">
					<div class="x_title">
							<h2><i class="fa fa-plus"></i> Borrow Apparatus</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li>
								<a href="borrow.php" style="background:none;">
								<button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
								</a>
								</li>
							
							</ul>
							<div class="clearfix"></div>
						</div>

					<!--borrow and search item using barcode  -->
					<div class="row" style="margin-top:30px;">
						<form method="post" enctype="multipart/form-data">

							<div class="form-group">
								<!-- <input type="text" style="margin-bottom:10px; margin-left:-9px;" class="form-control" name="item_name" placeholder="Select apparatus" autofocus required /> -->
								
								<div class="col-md-4">
									<select name="item_name" class="select2_single form-control" required="required" tabindex="-1" >
										<option selected="selected">Select Apparatus</option>
											<?php
												$item_query = mysqli_query($con,"select * from item where item_name = '$item_name' ") or die (mysqli_error());
												while ($item_row= mysqli_fetch_array ($item_query) ){
												$id=$row['item_id'];
											?>
										<option value="<?php echo $item_row['item_name']; ?>"><?php echo $item_row['item_name']; ?> - <?php echo $row['property_no']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<button type="submit" name="search" class="btn btn-primary"> Search</button>

						</form>

						<table class="table table-bordered">
							<form method="post" action="">
							<th style="width:120px;">Image</th>
						<!--	<th>Barcode</th> -->
						<th class="text-center">Property No.</th>
						<th class="text-center">Apparatus Name</th>
						<th class="text-center">Specification</th>
						<th class="text-center">Category</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Condition</th>
						<th class="text-center">Action</th>
							<?php 
								if (isset($_POST['item_name'])){
									$item_name = $_POST['item_name'];
									
									$item_query = mysqli_query($con,"SELECT * FROM item WHERE item_name = '$item_name' ");
									$item_count = mysqli_num_rows($item_query);
									$item_row = mysqli_fetch_array($item_query);
									
									
									if ($item_row['item_name'] != $item_name){
										echo '
											<table>
												<tr>
													<td class="alert alert-danger">Please enter correct details. Search bar is case-senstive.</td>
												</tr>
											</table>
										';
									} elseif ($item_name == '') {
										echo '
											<table>
												<tr>
													<td class="alert alert-info">Enter the correct details!</td>
												</tr>
											</table>
										';
									}else{
							?>
							<tr>
							<input type="hidden" name="user_id" value="<?php echo $user_row['user_id'] ?>">
							<input type="hidden" name="item_id" value="<?php echo $item_row['item_id'] ?>">
							

							<td>
							<?php if($item_row['item_image'] != ""): ?>
							<img src="upload/<?php echo $item_row['item_image']; ?>" width="120px" height="120px" style="border:4px groove #CCCCCC; border-radius:5px;">
							<?php else: ?>
							<img src="images/item_image.jpg" width="120px" height="120px" style="border:4px groove #CCCCCC; border-radius:5px;">
							<?php endif; ?>
							</td> 
					
							<td style="text-align:center; vertical-align:middle"><?php echo $item_row['property_no'] ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $item_row['item_name'] ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $item_row['specification'] ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $item_row['categ_name'] ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $item_row['quantity'] ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $item_row['status'] ?></td>
							<td style="text-align:center; vertical-align:middle"><button name="borrow" class="btn btn-info"><i class="fa fa-check"></i> Borrow</button></td>
							
							</tr>
							<?php } }?>

							<?php
							
							$allowable_days_query= mysqli_query($con,"select * from allowed_days order by allowed_days_id DESC ") or die (mysqli_error());
							$allowable_days_row = mysqli_fetch_assoc($allowable_days_query);
							
							$timezone = "Asia/Manila";
							if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
							$cur_date = date("Y-m-d H:i:s");
							$date_borrowed = date("Y-m-d H:i:s");
							$due_date = strtotime($cur_date);
							$due_date = strtotime("+".$allowable_days_row['no_of_days']." day", $due_date);
							$due_date = date('Y-m-d H:i:s', $due_date);
							///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
							?>
							<input type="hidden" name="due_date" class="new_text" id="sd" value="<?php echo $due_date ?>" size="16" maxlength="10"  />
							<input type="hidden" name="date_borrowed" class="new_text" id="sd" value="<?php echo $date_borrowed ?>" size="16" maxlength="10"  />
							
							<?php 
								if (isset($_POST['borrow'])){
									$user_id =$_POST['user_id'];
									$item_id =$_POST['item_id'];
									$date_borrowed =$_POST['date_borrowed'];
									$status =$_POST['status'];
									$due_date =$_POST['due_date'];
									
									$trapBookCount= mysqli_query($con,"SELECT count(*) as items_allowed from borrow_item where user_id = '$user_id' and borrowed_status = 'borrowed'") or die (mysqli_error());
									
									$countBorrowed = mysqli_fetch_assoc($trapBookCount);
									
									$itemCountQuery= mysqli_query($con,"SELECT count(*) as item_count from borrow_item where user_id = '$user_id' and borrowed_status = 'borrowed' and item_id = $item_id") or die (mysqli_error());
									
									$itemCount = mysqli_fetch_assoc($itemCountQuery);

									// check database and rename 
									$allowed_item_query= mysqli_query($con,"select * from allowed_item order by allowed_item_id DESC ") or die (mysqli_error());
									$allowed = mysqli_fetch_assoc($allowed_item_query);
									
									if ($countBorrowed['items_allowed'] == $allowed['qntty_items']){
										echo "<script>alert(' ".$allowed['qntty_items']." ".'apparatus allowed per borrower!'." '); window.location='borrow_item.php?school_number=".$school_number."'</script>";
									}elseif ($itemCount['item_count'] == 10){
										echo "<script>alert('Apparatus already borrowed!'); window.location='borrow_item.php?school_number=".$school_number."'</script>";
									}else{
										
									$update_quantity = mysqli_query($con,"SELECT * from item where item_id = '$item_id' ") or die (mysqli_error());
									$quantity_row= mysqli_fetch_assoc($update_quantity);
									
									$quantity = $quantity_row['quantity'];
									$new_quantity = $quantity - 1;
									
									if ($new_quantity < 0){
										echo "<script>alert('Apparatus out of stock!'); window.location='borrow_item.php?school_number=".$school_number."'</script>";
									}elseif ($quantity_row['status'] == 'Damaged'){
										echo "<script>alert('Apparatus is damaged!'); window.location='borrow_item.php?school_number=".$school_number."'</script>";
									}elseif ($quantity_row['status'] == 'Lost'){
										echo "<script>alert('Apparatus is lost!'); window.location='borrow_item.php?school_number=".$school_number."'</script>";
									}elseif ($quantity_row['status'] == 'Replacement'){
										echo "<script>alert('Apparatus is subject for replacement!'); window.location='borrow_item.php?school_number=".$school_number."'</script>";
									}else{
										
									if ($new_quantity == '0') {
										$remark = 'Not Available';
									} else {
										$remark = 'Available';
									}
									
									mysqli_query($con,"UPDATE item SET quantity = '$new_quantity' where item_id = '$item_id' ") or die (mysqli_error());
									mysqli_query($con,"UPDATE item SET remarks = '$remark' where item_id = '$item_id' ") or die (mysqli_error());
									
									mysqli_query($con,"INSERT INTO borrow_item(user_id,item_id,date_borrowed,due_date,r_status,borrowed_status)
									VALUES('$user_id','$item_id','$date_borrowed','$due_date', 'For Approval', 'borrowed')") or die (mysqli_error());
									
									$report_history=mysqli_query($con,"select * from admin where admin_id = $id_session ") or die (mysqli_error());
									$report_history_row=mysqli_fetch_array($report_history);
									$admin_row=$report_history_row['firstname']." ".$report_history_row['middlename']." ".$report_history_row['lastname'];	
									
									mysqli_query($con,"INSERT INTO report 
									(item_id, user_id, admin_name, detail_action, date_transaction)
									VALUES ('$item_id','$user_id','$admin_row','Borrowed Book',NOW())") or die(mysqli_error());
									
									}
									}
							?>
									<script>
										window.location="borrow_item.php?school_number=<?php echo $school_number ?>";
									</script>
							<?php	
								}
							?>
							</form>
						</table>
						
					</div>

<hr/>
<hr/>

					

					<div class="x_title">
					
					<?php
						$sql = mysqli_query($con,"SELECT * FROM user WHERE school_number = '$school_number' ");
						$row = mysqli_fetch_array($sql);
					?>
					<h2>
					<h2><i class="fa fa-user"></i> Borrower Name: <span style="color:maroon;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></span></h2>
					</h2>
                        <ul class="nav navbar-right panel_toolbox">
                      
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
						
						<!-- list the borrowed items and the return button of a certain borrower -->
						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th style="width:100px;" class="text-center">Image</th>
							<!--		<th class="text-center">Barcode</th> -->
									<!-- <th class="text-center">Property No.</th> -->
									<th class="text-center">Apparatus Name</th>
									<th class="text-center">Specification</th>
									<th class="text-center">Category</th>
									<th class="text-center">Date Borrowed</th>
									<th class="text-center">Status</th>
									<th class="text-center">Action</th>
							<?php 
								$borrow_query = mysqli_query($con,"SELECT * FROM borrow_item
									LEFT JOIN item ON borrow_item.item_id = item.item_id
									WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_item_id DESC") or die(mysqli_error());
								$borrow_count = mysqli_num_rows($borrow_query);
								while($borrow_row = mysqli_fetch_array($borrow_query)){
									$due_date= $borrow_row['due_date'];
								
								$timezone = "Asia/Manila";
								if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
								$cur_date = date("Y-m-d H:i:s");
								$date_returned = date("Y-m-d H:i:s");
								
								
									$penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysqli_error());
									$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
									
									if ($date_returned > $due_date) {
										$penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
									} elseif ($date_returned < $due_date) {
										$penalty = 'No Penalty';
									} else {
										$penalty = 'No Penalty';
									}
							?>
								</tr>
							</thead>
							<tbody>

							
							
							<tr style="height:120px">
								<td>
								<?php if($borrow_row['item_image'] != ""): ?>
								<img src="upload/<?php echo $borrow_row['item_image']; ?>" width="120px" height="120px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php else: ?>
								<img src="images/item_image.jpg" width="120px" height="120px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php endif; ?>
								</td> 
								
								<!-- <td style="text-align:center; vertical-align:middle"><?php echo $borrow_row['property_no']; ?></td> -->
								<td style="text-align:center; vertical-align:middle"><?php echo $borrow_row['item_name']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $borrow_row['specification']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $borrow_row['categ_name']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>	

								<td>
								
										<?php if($borrow_row['r_status'] == 0): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-orange">For Approval</span></td>
										<?php elseif($borrow_row['r_status'] == 1): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-green">Accept</span></td>
										<?php elseif($borrow_row['r_status'] == 2): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-blue">Claimed</span></td>
										<?php elseif($borrow_row['r_status'] == 3): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-red">Reject</span></td>
											
										<?php endif; ?> 

									<!-- START edit r_status modal -->
									<div class="modal fade" id="r_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus"></i> Edit Reservation Status</h4>
												</div>
												<div class="modal-body">
													<form method="post" enctype="multipart/form-data" class="form-horizontal">
														
														<div class="form-group">
															<label class="control-label col-md-4" for="last-name2">Edit Status
															</label>
															<div class="col-md-6">
																<select name="r_status" class="select2_single form-control" tabindex="-1" required="required">
																	<option value="<?php echo $borrow_row['r_status']; ?>"><?php echo $borrow_row['r_status']; ?></option>
																	<option value="0">For Approval</option>
																	<option value="1">Accept</option>
																	<option value="2">Claimed</option>
																	<option value="3">Reject</option>
																</select>
															</div>
														</div>

														<div class="modal-footer">
															<button type="update" style="margin-bottom:5px;" name="update" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i>Save</button>
															<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</button>
														</div>

													</form>
															
													<?php
													
														if (isset($_POST['update'])) {
																	
														$r_status = $_POST['r_status'];
																	
														{
															mysqli_query($con," UPDATE borrow_item SET r_status='$r_status' ") or die (mysqli_error());
														}
														{
															echo "<script>alert('Edit Successfully!'); window.location.href='#'</script>";
														}
																		
														}
													?>

												</div>
											</div>
										</div>  
									</div>
									<!-- END edit r_status modal -->

								</td>
								
								<td style="text-align:center; vertical-align:middle">
		
									<form method="post" action="">
								<!--	<input type="hidden" name="date_returned" class="new_text" id="sd" value="<?php echo $date_returned ?>" size="16" maxlength="10" /> -->
												
									<button name="edit" for="EditStatus" href="#r_status" data-toggle="modal" data-target="#r_status" class="btn btn-danger"><i class="glyphicon glyphicon-edit"></i>Change Status</button>

									<form method="post" action="">
									<input type="hidden" name="date_returned" class="new_text" id="sd" value="<?php echo $date_returned ?>" size="16" maxlength="10"  />
									<input type="hidden" name="user_id" value="<?php echo $borrow_row['user_id']; ?>">
									<input type="hidden" name="borrow_item_id" value="<?php echo $borrow_row['borrow_item_id']; ?>">
									<input type="hidden" name="item_id" value="<?php echo $borrow_row['item_id']; ?>">
									<input type="hidden" name="date_borrowed" value="<?php echo $borrow_row['date_borrowed']; ?>">
									<input type="hidden" name="due_date" value="<?php echo $borrow_row['due_date']; ?>">
									<button name="return" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Return</button>
								
								</form>
								</td>
								
							</tr>
							
							<?php 
							}
							if ($borrow_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No apparatus borrowed</td>
										</tr>
									</table>
								';
							} 							
							?>
							<?php
								if (isset($_POST['return'])) {
									$user_id= $_POST['user_id'];
									$borrow_item_id= $_POST['borrow_item_id'];
									$item_id= $_POST['item_id'];
									$date_borrowed= $_POST['date_borrowed'];
									$due_date= $_POST['due_date'];
									$date_returned = $_POST['date_returned'];
									$categ_name = $_POST['date_returned'];

									$update_quantity = mysqli_query($con,"SELECT * from item where item_id = '$item_id' ") or die (mysqli_error());
									$quantity_row= mysqli_fetch_assoc($update_quantity);
									
									$quantity = $quantity_row['quantity'];
									$new_quantity = $quantity + 1;
									
									if ($new_quantity == '0') {
										$remark = 'Not Available';
									} else {
										$remark = 'Available';
									}
									
									mysqli_query($con,"UPDATE item SET quantity = '$new_quantity' where item_id = '$item_id'") or die (mysqli_error());
									mysqli_query($con,"UPDATE item SET remarks = '$remark' where item_id = '$item_id' ") or die (mysqli_error());
								
									$timezone = "Asia/Manila";
									if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
									$cur_date = date("Y-m-d H:i:s");
									$date_returned_now = date("Y-m-d H:i:s");
									//$due_date = strtotime($cur_date);
									//$due_date = strtotime("+3 day", $due_date);
									//$due_date = date('F j, Y g:i a', $due_date);
									///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));			
									
									$penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysqli_error());
									$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
									
									if ($date_returned > $due_date) {
										$penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
									} elseif ($date_returned < $due_date) {
										$penalty = 'No Penalty';
									} else {
										$penalty = 'No Penalty';
									}
								
									mysqli_query($con,"UPDATE borrow_item SET borrowed_status = 'returned', date_returned = '$date_returned_now' WHERE borrow_item_id= '$borrow_item_id' and user_id = '$user_id' and item_id = '$item_id' ") or die (mysqli_error());

									mysqli_query($con,"UPDATE borrow_item SET r_status = 'pending', date_returned = '$date_returned_now' WHERE borrow_item_id= '$borrow_item_id' and user_id = '$user_id' and item_id = '$item_id' ") or die (mysqli_error());
									
									mysqli_query($con,"INSERT INTO return_item (user_id, item_id, date_borrowed, due_date, date_returned)
									values ('$user_id', '$item_id', '$date_borrowed', '$due_date', '$date_returned')") or die (mysqli_error());
									
									$report_history1=mysqli_query($con,"select * from admin where admin_id = $id_session ") or die (mysqli_error());
									$report_history_row1=mysqli_fetch_array($report_history1);
									$admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];	
									
									mysqli_query($con,"INSERT INTO report 
									(item_id, user_id, admin_name, detail_action, date_transaction)
									VALUES ('$item_id','$user_id','$admin_row1','Returned Book',NOW())") or die(mysqli_error());
									
							?>
									<script>
										window.location="borrow_item.php?school_number=<?php echo $school_number ?>";
									</script>
							<?php 
																}
							?>
							
							</tbody>
							</table>
						</div>

				</div>
						
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>

<?php include ('footer.php'); ?>