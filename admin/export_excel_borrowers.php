<?php include('currentdate.php'); ?>
<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=LIMS_Borrower_List " . date("(m-d-y)") . ".xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once ('include/dbcon.php');
	
	$output = "";
	
	$output .="
		<table>
			<thead>
				<tr>
					<th>School ID No.</th>
					<th>Borrower Name</th>
					<th>Contact</th>
					<th>Address</th>
					<th>Status</th>
					<th>Date borrower added</th>
				</tr>
			<tbody>
	";
	
			$result= mysqli_query($con,"select * from user where status = '' ") or die (mysqli_error());
			while ($row= mysqli_fetch_array ($result) ){
			$id=$row['user_id'];
			
	
	
		
	$output .= "
				<tr>
					<td>".$row['school_number']."</td>
					<td>".$row['firstname']."".$row['middlename']."".$row['lastname']."</td>
					<td>".$row['contact']."</td>
					<td>".$row['h_address']."</td>
					<td>".$row['status']. "</td>
					<td>".$row['user_added']."</td>
					
				</tr>
	";
	}
	
	$output .="
			</tbody>
			
		</table>
	";
	
	echo $output;
	
	
?>