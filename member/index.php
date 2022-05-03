<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CDONHS - Laboratory Information Management System</title>

    <!-- Bootstrap core CSS -->

    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
  

    <link href="../admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../admin/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../admin/css/custom.css" rel="stylesheet">
    <link href="../admin/css/icheck/flat/green.css" rel="stylesheet">


    <script src="../admin/js/jquery.min.js"></script>

<style>
.blink_text {
-webkit-animation-name: blinker;
-webkit-animation-duration: 1s;
-webkit-animation-timing-function: linear;
-webkit-animation-iteration-count: infinite;

-moz-animation-name: blinker;
-moz-animation-duration: 1s;
-moz-animation-timing-function: linear;
-moz-animation-iteration-count: infinite;

 animation-name: blinker;
 animation-duration: 1s;
 animation-timing-function: linear;
 animation-iteration-count: infinite;

 color:white;
 font-size:16px;
}

@-moz-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@-webkit-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }
</style>
</head>

<body style="background:#2A3F54;">

    <div class="">

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                    <form action="" method="post">
                        <h1 style="color:white;text-shadow: none;">Borrower Login</h1>
                        <div>
                            <input type="text" class="form-control" name="school_number" placeholder="School ID No." autofocus='autofocus' required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password" required />
                        </div>
                        <div>
								<button class="btn btn-primary submit" type="submit" name="login"><i class="fa fa-check"></i> Log in</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
						
                            <div class="clearfix"></div>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                            <div>
                                

                                <p style="color:#73879C; text-shadow: none;">© <?php echo date('Y'); ?> <i class=""></i> Laboratory Information Management System for Cagayan de Oro National High School- Junior High</p>
                            </div>
                        </div>
                    </form>
<?php
include('../admin/include/dbcon.php');

if (isset($_POST['login'])){

$school_number=$_POST['school_number'];
$password=$_POST['password'];
// $status=$_GET['status'];

$login_query=mysqli_query($con,"select * from user where school_number='$school_number' and password='$password'");
$count=mysqli_num_rows($login_query);
$row=mysqli_fetch_array($login_query);


if ($count > 0){
session_start();
$_SESSION['id']=$row['user_id'];
echo "<script>alert('Login Success!'); window.location='borrow_item.php?school_number=$school_number'; </script>";
// }
// elseif (isset($_GET['status']) == '0'){ 
//   
	

}else{ ?>
<div class="alert alert-danger"><h3 class="blink_text">Access Denied</h3></div>		
<?php
}
}
?>
               <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>
</html>