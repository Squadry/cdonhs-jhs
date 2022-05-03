<?php 

include('include/dbcon.php');

$ID=$_GET['user_id'];

mysqli_query($con,"UPDATE user SET status = '1' where user_id = '$ID' ") or die (mysqli_error());
mysqli_query($con,"UPDATE user SET password = 'admin123' where user_id = '$ID' ") or die (mysqli_error());

header('location:borrower.php');
?>