<?php 

include('include/dbcon.php');

$ID=$_GET['borrow_item_id'];

mysqli_query($con,"UPDATE borrow_item SET status = '2' where borrow_item_id = '$ID' ") or die (mysqli_error());

header('location:borrow_item.php?school_number=<?php echo $school_number ?>');
?>