							<?php
								
								include ('include/dbcon.php');
								
								if (isset($_POST['return_now'])) {
									$user_id= $_POST['user_id'];
									$date_returned = $_POST['date_returned'];
									

									$update_copies = mysqli_query($con,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error());
									$copies_row= mysqli_fetch_assoc($update_copies);
									
									$book_copies = $copies_row['book_copies'];
									$new_book_copies = $book_copies + 1;
									
									mysqli_query($con,"UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id' ") or die (mysqli_error());
								
									$timezone = "Asia/Manila";
									if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
									$cur_date = date("F j, Y, g:i a");
									$date_returned_now = date("F j, Y g:i a");
									//$due_date = strtotime($cur_date);
									//$due_date = strtotime("+3 day", $due_date);
									//$due_date = date('F j, Y g:i a', $due_date);
									///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
								
									mysqli_query($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now' where user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error());
									
									mysqli_query($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned)
									values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned')") or die (mysqli_error());
							?>



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

