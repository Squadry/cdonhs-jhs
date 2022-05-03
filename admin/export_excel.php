<?php include('currentdate.php'); ?>
<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=Inventory-Report ". date("m-d-y") . ".xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once ('include/dbcon.php');
	
	$output = "";
	
	$output .="
		<table>
			<thead>
				<tr>
					<th>Apparatus Name</th>
					<th>Specification</th>
					<th>Category</th>
					<th>Quantity</th>
					<th>Source of Fund</th>
					<th>Status</th>
					<th>Remarks</th>
				</tr>
			<tbody>
	";
	
		$result= mysqli_query($con,"select * from item order by item_id DESC ") or die (mysqli_error());
		while ($row= mysqli_fetch_array ($result) ){
		$id=$row['item_id'];
		$category_id=$row['category_id'];
	
	
	//$query = $conn->query("SELECT * FROM `student`") or die(mysqli_errno());
	//while($fetch = $query->fetch_array()){
		
	$output .= "
				<tr>
				<td>".$row['item_name']."</td>
				<td>".$row['specification']."</td>
				<td>".$row['categ_name']."</td>
				<td>".$row['quantity']."</td>
				<td>".$row['source_fund']."</td>
				<td>".$row['status']."</td>
				<td>".$row['remarks']."</td>
					
				</tr>
	";
	}
	
	$output .="
			</tbody>
			
		</table>
	";
	
	echo $output;
	
	
?>