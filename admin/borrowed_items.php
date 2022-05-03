<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Unreturned Borrowed Apparatus
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <h2><i class="fa fa-flask"></i> Currently Borrowed Apparatus</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="print_borrowed_books.php" target="_blank" style="background:none;">
							<button class="btn btn-danger btn-outline pull-right"><i class="fa fa-print"></i> Print Borrowed Apparatus</button>
							</a>
							</li>
                        </ul>
                        <div class="clearfix"></div>
                    <div class="x_content">
                        <!-- content starts here -->
						<br>
						
						<div class="table-responsive">							
							<?php
							error_reporting(0);
							$where ="";
							if(isset($_GET['search'])){
								$where = " and (date(borrow_item.date_borrowed) between '".date("Y-m-d",strtotime($_GET['datefrom']))."' and '".date("Y-m-d",strtotime($_GET['dateto']))."' ) ";
							}
							
							$return_query= mysqli_query($con,"SELECT * from borrow_item 
							LEFT JOIN item ON borrow_item.item_id = item.item_id 
							LEFT JOIN user ON borrow_item.user_id = user.user_id 
							where borrow_item.borrowed_status = 'borrowed' $where order by borrow_item.borrow_item_id DESC") or die (mysqli_error());
								$return_count = mysqli_num_rows($return_query);
								
							
							
							?>
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
                              
								
							<thead>
							<tr style= "background-color:#ededed">
								<!-- <th class="text-center">School ID No.</th> -->
								<th class="text-center">Borrower Name</th>
								<th class="text-center">Apparatus Name</th>
								<th class="text-center">Contact Number</th>
								<th class="text-center">Date Borrowed</th>
								<th class="text-center">Due Date</th>
									
								</tr>
							</thead>	
							<tbody>
						<?php
						

							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['borrow_item_id'];
							// $school_number=$return_row['school number']
						?>
							<tr>
							<!-- <td style="text-align:center; vertical-align:middle"><?php echo $return_row['school_number']; ?></td> -->
								<td style="text-align:center; vertical-align:middle"><?php echo $return_row['firstname']." ".$return_row['lastname']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $return_row['item_name']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $return_row['contact']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($return_row['due_date'])); ?></td>
								
								

								<tr>
								<?php 
							}
							if ($return_count <= 0){
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
									
									mysqli_query($con,"INSERT INTO return_item (user_id, item_id, date_borrowed, due_date, date_returned)
									values ('$user_id', '$item_id', '$date_borrowed', '$due_date', '$date_returned')") or die (mysqli_error());
									
									$report_history1=mysqli_query($con,"select * from admin where admin_id = $id_session ") or die (mysqli_error());
									$report_history_row1=mysqli_fetch_array($report_history1);
									$admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];	
									
									mysqli_query($con,"INSERT INTO report 
									(item_id, user_id, admin_name, detail_action, date_transaction)
									VALUES ('$item_id','$user_id','$admin_row1','Borrowed Item',NOW())") or die(mysqli_error());
									
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