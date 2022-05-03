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
				<strong><center><h4 style =margin-top:-16px;></h4> Returned Apparatus Report Sheet</center> </strong>
				

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
							$return_query= mysqli_query($con,"SELECT * from borrow_item 
							LEFT JOIN item ON borrow_item.item_id = item.item_id 
							LEFT JOIN user ON borrow_item.user_id = user.user_id 
							where borrow_item.borrowed_status = 'returned'  order by borrow_item.borrow_item_id DESC") or die (mysqli_error());
								$return_count = mysqli_num_rows($return_query);
							// $count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysqli_error());
							// $count_penalty_row = mysqli_fetch_array($count_penalty);
?>
						<table class="table table-striped">
                                <!--<div class="pull-left">
                                    <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div>
								<br /> -->
						  <thead>
								<tr>
								<tr>
									<th>Borrower Name</th>
									<th>Apparatus Name</th>
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Date Returned</th>
								</tr>
								</tr>
						  </thead>   
						  <tbody>
<?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['borrow_item_id'];
?>
							<tr>
								
							<td style="text-align:center; vertical-align:middle"> <?php echo $return_row['firstname']." ".$return_row['middlename']." ".$return_row['lastname']; ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $return_row['item_name']; ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($return_row['due_date'])); ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_returned'])); ?></td>
								
							<!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->
								
								
								<?php
								
								
								?>
								<?php
								 
								
								?>
							</tr>
							<?php 
							}
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No Apparatus returned at this moment</td>
										</tr>
									</table>
								';
							} 							
							?>
							</tr>  
						  </tbody> 
					  </table> 
					 
					  <br />
					  <button type="submit" id="print" onclick="printPage()">Print</button>	

<br />
<br />
							<?php
								include('include/dbcon.php');
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysqli_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:Red; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>