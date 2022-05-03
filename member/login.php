<?php
include('../admin/include/dbcon.php');

if (isset($_POST['login'])){

$school_number=$_POST['school_number'];
$password=$_POST['password'];

$login_query=mysqli_query($con,"select * from user where school_number='$school_number' and password='$password'");
$count=mysqli_num_rows($login_query);
$row=mysqli_fetch_array($login_query);

if ($count > 0){
session_start();
$_SESSION['id']=$row['school_number'];

//echo "<script>alert('Successfully Login!'); window.location='home.php'</script>";
echo "<script>alert('Successfully Login!'); href='borrow_item.php?school_number=$school_number ?>'; </script>";

}else{
	echo "<script>alert('Invalid Username and Password! Try again.'); window.location='index.php'</script>";
?>
<?php } 
}
?>