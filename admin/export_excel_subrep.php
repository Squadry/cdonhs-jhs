<?php include('currentdate.php'); ?>
<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=Inventory-Report (FOR REPLACEMENT) ". date("m-d-y") . ".xls");  
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
					<th>Status</th>
					<th>Remarks</th>
				</tr>
			<tbody>
	";
	
			$result= mysqli_query($con,"select * from item where status = 'Replacement' ") or die (mysqli_error());
			while ($row= mysqli_fetch_array ($result) ){
			$id=$row['item_id'];
			$category_id=$row['category_id'];
			
			$cat_query = mysqli_query($con,"select * from category where category_id = '$category_id'")or die(mysqli_error());
			$cat_row = mysqli_fetch_array($cat_query);
	
	
		
	$output .= "
				<tr>
				<td>".$row['item_name']."</td>
				<td>".$row['specification']."</td>
				<td>".$row['categ_name']."</td>
				<td>".$row['quantity']."</td>
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