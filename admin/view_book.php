<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Apparatus</small> / View Individual
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> Individual Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="inventory.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
							</a>
							</li>
                         
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								
							<thead>
								<tr>
									<th style="width:100px;">Apparatus Image</th>
									
									<th>Apparatus Name</th>
									<th>Specification</th>
									<th>Category</th>
									<th>Quantity</th>
									<th>Publisher</th>
									<th>Copyright</th>
									<th>Copies</th>
									<th>Category</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
<?php
			   
		if (isset($_GET['item_id']))
		$id=$_GET['item_id'];
		$result1 = mysqli_query($con,"SELECT * FROM item 
		LEFT JOIN category on item.category_id = category.category_id 
		WHERE item_id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
							<tr>
								<td>
								<?php if($row['item_image'] != ""): ?>
								<img src="upload/<?php echo $row['item_image']; ?>" width="150px" height="150px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php else: ?>
								<img src="images/item_image.png" width="150px" height="150px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php endif; ?>
								</td> 
								
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['book_title']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['author']."<br />".$row['author_2']."<br />".$row['author_3']."<br />".$row['author_4']."<br />".$row['author_5']; ?></td>
								<td><?php echo $row['isbn']; ?></td>
								<td><?php echo $row['book_pub']; ?></td>
								<td><?php echo $row['publisher_name']; ?></td>
								<td><?php echo $row['copyright_year']; ?></td> 
								<td><?php echo $row['book_copies']; ?></td> 
								<td><?php echo $row['classname']; ?></td> 
								<td><?php echo $row['status']; ?></td> 
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>