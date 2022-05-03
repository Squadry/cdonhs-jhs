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
				<strong><center><h4 style =margin-top:-16px;></h4> (NEW) Apparatus Inventory Report Sheet</center> </strong>
				

		<!--	<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Borrowed Apparatus Report&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p> -->
        <br>
		<br>
		<br>
		<div align="right">
		<b style="color:Red;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>
<?php
							
							$result= mysqli_query($con,"select * from item 
							LEFT JOIN category ON item.category_id = category.category_id
							where status = 'New'
							order by item.item_id DESC ") or die (mysqli_error());
?>
						<table class="table table-striped">
						  <thead>
								<tr>
								<tr>
									<th>Apparatus Name</th>
									<th>Specification</th>
									<th>Category</th>
									<th>Quantity</th>
									<th>Status</th>
									<th>Remarks</th>
									
								</tr>
								</tr>
						  </thead>   
						  <tbody>
<?php
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['item_id'];
							$category_id=$row['category_id'];
?>
							<tr>
								<td style="text-align: center; word-wrap: break-word; width: 10em;"><?php echo $row['item_name']; ?></td>
								<td style="text-align: center; word-wrap: break-word; width: 10em;"><?php echo $row['specification']; ?></td>
								<td style="text-align: center; word-wrap: break-word; width: 10em;"><?php echo $row['categ_name'];?></td>
								<td style="text-align: center; word-wrap: break-word; width: 10em;"><?php echo $row['quantity']; ?></td>
								<td style="text-align: center; word-wrap: break-word; width: 10em;"><?php echo $row['status']; ?></td> 
								<td style="text-align: center; word-wrap: break-word; width: 10em;"><?php echo $row['remarks']; ?></td> 
								
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
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:red; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>