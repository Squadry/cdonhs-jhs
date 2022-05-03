<?php 
include('session.php');

include ('include/dbcon.php');

?>
<html>

<head>
		<title> do not lose this copy******</title>
		
		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
}	
tr,td,th{
	border:1px solid black;
}
.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}
		
@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		</style>
		
<script>
function printPage() {
    window.print();
}
</script>
</head>


<body>
	<div class = "container">
		<div id = "header">
		<br/>
				<img src = "images/logo.png" style = " margin-top:-3px; float:left; margin-left:115px; margin-bottom:-6px; width:100px; height:100px;">
				<img src = "images/lab.jpg" style = " margin-top:-3px; float:right; margin-right:115px; width:100px; height:100px;" >
				<strong><center><h5></h5>&nbsp; &nbsp;&nbsp; Cagayan de Oro National High School - Junior High &nbsp;	&nbsp; </center> </strong>
				<strong><center><h5 style =margin-top:-16px;></h5> &nbsp; &nbsp; Laboratory Information Management System</center> </strong>
				<strong><center><h4 style =margin-top:-16px;></h4> List of Borrowers</center> </strong>
				

		<!--	<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Borrowed Apparatus Report&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p> -->
        <br>
		<br>
		<br>
		<div align="right">
		<b style="color:Red;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>
		<br/>
<?php
							$result= mysqli_query($con,"select * from user 
							order by user.user_id DESC ") or die (mysqli_error());
?>
						<table class="table table-striped">
						  <thead>
								<tr>
								<tr>
									<th>School ID No.</th>
									<th>Borrower Name</th>
									<th>Contact</th>
									<th>Gender</th>
									<th>Address</th>
									<th>Date Added</th>
									<th>Status</th>
									
								</tr>
								</tr>
						  </thead>   
						  <tbody>
<?php
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['user_id'];
?>
							<?php if($row['status'] == 0): ?>
								<tr>
								<?php elseif($row['status'] == 1): ?>
									<tr style="color: #ff2929;">
								<?php endif; ?> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['school_number']; ?></a></td> 
								<td style="text-align:center;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td> 
								<td style="text-align:center;"><?php echo $row['contact']; ?></td> 
								<td style="text-align:center;"><?php echo $row['gender']; ?></td> 
								<td style="text-align:center;"><?php echo $row['h_address']; ?></td>
								<td style="text-align:center;"><?php echo $row['user_added'];?></td>
								<?php if($row['status'] == 0): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-green">Active</span></td>
										<?php elseif($row['status'] == 1): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-gray">Inactive</span></td>
										<?php endif; ?> 
							</tr>
							
							
							<?php 
							}					
							?>
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
								include('include/dbcon.php');
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysqli_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>