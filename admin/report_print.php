<?php 


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
				<strong><center><h4 style =margin-top:-16px;></h4> Transaction History Report Sheet</center> </strong>
				

		<!--	<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Borrowed Apparatus Report&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p> -->
        <br>
		<br>
		<br>
		<div align="right">
		<b style="color:Red;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>

						<table class="table">
						  <thead>
								<tr>
								<th class="text-center">Borrower's Name </th>
								<th class="text-center">School ID</th>
								<th class="text-center">Task</th>
								<th class="text-center">Person in charge</th>
								<th class="text-center">Date of Transaction</th>
								</tr>
						  </thead>   
						  <tbody>

							<?php
							$result= mysqli_query($con,"select * from report 
							LEFT JOIN item ON report.item_id = item.item_id 
							LEFT JOIN user ON report.user_id = user.user_id 
							order by report.report_id DESC ") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['report_id'];
							$book_id=$row['item_id'];
							$user_name=$row['firstname']." ".$row['middlename']." ".$row['lastname'];
							
							?>
							<tr>
							<td style="text-align:center; vertical-align:middle"><?php echo $user_name; ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $row['item_name']; ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $row['detail_action']; ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $row['admin_name']; ?></td> 
							<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($row['date_transaction'])); ?></td>
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							
							<?php 
											
							?>
						  </tbody> 
					  </table> 

<br />
<br />
							      <h2><span style="color:blue; font-size:15px;">Prepared by: </h2>
								


			</div>
	
	
	
	

	</div>
</body>


</html>