<?php 

include('include/dbcon.php');

$get_id=$_GET['item_id'];

mysqli_query($con,"delete from item where item_id = '$get_id' ")or die(mysqli_error());

header('location:inventory.php');
?>