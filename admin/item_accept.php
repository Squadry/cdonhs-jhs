<?php 

include('include/dbcon.php');

$ID=$_GET['borrow_item_id'];

$borrow_query = mysqli_query($con,"SELECT * FROM borrow_item
		LEFT JOIN item ON borrow_item.item_id = item.item_id
		WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_item_id DESC") or die(mysqli_error());

mysqli_query($con,"UPDATE borrow_item SET r_status = '1' where borrow_item_id = '$ID' ") or die (mysqli_error());

header('location:borrow.php?school_number=".$school_number.'); 
?>