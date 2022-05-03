<?php 

include('include/dbcon.php');

$get_id=$_GET['return_temporary_id'];

mysqli_query($con,"delete from return_temporary where return_temporary_id = '$get_id' ")or die(mysqli_error()); {

?>


							<?php
								if (isset($_POST['return_now'])) {
									$user_id= $_POST['user_id'];
									$borrow_item_id= $_POST['borrow_item_id'];
									$item_id= $_POST['item_id'];
									$date_borrowed= $_POST['date_borrowed'];
									$due_date= $_POST['due_date'];
									$date_returned = $_POST['date_returned'];

									$update_quantity = mysqli_query($con,"SELECT * from item where item_id = '$item_id' ") or die (mysqli_error());
									$quantity_row= mysqli_fetch_assoc($update_quantity);
									
									$quantity = $copies_row['quantity'];
									$new_item = $quantity + 1;
								
									mysqli_query($con,"UPDATE item SET quantity = '$new_item' where item_id = '$item_id'") or die (mysqli_error());
								
									$timezone = "Asia/Manila";
									if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
									$cur_date = date("Y-m-d H:i:s");
									$date_returned_now = date("Y-m-d H:i:s");
									//$due_date = strtotime($cur_date);
									//$due_date = strtotime("+3 day", $due_date);
									//$due_date = date('F j, Y g:i a', $due_date);
									///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));			
									
									
								
									
									$id=$_GET['return_temporary_id'];
									
									mysqli_query($con,"delete from return_temporary where return_temporary_id = '$id' ")or die(mysqli_error());
								
									mysqli_query($con,"UPDATE borrow_item SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_item_id= '$borrow_item_id' and user_id = '$user_id' and item_id = '$item_id' ") or die (mysqli_error());
									
									mysqli_query($con,"INSERT INTO return_book (user_id, item_id, date_borrowed, due_date, date_returned, book_penalty)
									values ('$user_id', '$item_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error());
							?>
									<script>
										window.location="borrow_item.php?school_number=<?php echo $school_number ?>";
									</script>
							<?php 
} }
							?>