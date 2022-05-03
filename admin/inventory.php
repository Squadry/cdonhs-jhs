<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Apparatus Inventory
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
							<a href="inventory_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger btn-outline pull-right"><i class="fa fa-print"></i> Print Apparatus List</button>
							</a>
							<a href="export_excel.php" target="_blank" style="background:none;">
							<button class="btn btn-success btn-outline pull-right"><i class="fa fa-download"></i> Download CSV</button>
							</a>
							<a href="add_item.php" style="background:none;">
							<button class="btn btn-primary btn-outline pull-right"><i class="fa fa-plus"></i> Add Apparatus</button>
							</a>
                    <div class="x_title">
                        <h2><i class="fa fa-flask"></i> List of all apparatus</h2>

                        <div class="clearfix"></div>
							<ul class="nav nav-pills">
								<li role="presentation" class="active"><a href="inventory.php">All</a></li>
								<li role="presentation" ><a href="inventory_new.php">New Apparatus</a></li>
								<li role="presentation"><a href="inventory_old.php">Old Apparatus</a></li>
								<li role="presentation"><a href="inventory_lost.php">Lost Apparatus</a></li>
								<li role="presentation"><a href="inventory_damaged.php">Damaged Apparatus</a></li>
								<li role="presentation"><a href="inventory_replacement.php">Subject for Replacement Apparatus</a></li>
							</ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr style= "background-color:#ededed">
									<th style="width:120px;" class="text-center">Image</th>
						
									<th class="text-center">Property No.</th> 
									<th class="text-center">Apparatus Name</th>
									<th class="text-center">Specification</th>
									<th class="text-center">Category</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Source of Fund</th>
									<th class="text-center">Status</th>
									<th class="text-center">Remarks</th>
									<th style="width:130px;" class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from item order by item_id DESC ") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['item_id'];
							$category_id=$row['category_id'];
							
							$cat_query = mysqli_query($con,"select * from category") or die (mysqli_error());
							$cat_row = mysqli_fetch_array($cat_query);
							
							?>
							<tr style="height:120px" >
								<td>
								<?php if($row['item_image'] != ""): ?>
								<img src="upload/<?php echo $row['item_image']; ?>" class="img-thumbnail" width="120px" height="120px">
								<?php else: ?>
								<img src="images/item_image.png" class="img-thumbnail" width="120px" height="120px">
								<?php endif; ?>
								
								<td style="text-align:center; vertical-align:middle"><?php echo $row['property_no']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $row['item_name']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $row['specification']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $row['categ_name'];?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $row['quantity']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $row['source_fund']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $row['status']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['remarks']; ?></td> 
								<td style="text-align:center; vertical-align:middle"> 
									<a class="btn btn-warning"  for="Viewitem" href="edit_item.php<?php echo '?item_id='.$id; ?>">
									<i class="fa fa-edit"></i>
									</a>
									<a class="btn btn-danger" for="Deleteitem" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
										<i class="glyphicon glyphicon-trash icon-white"></i>
									</a>
			
									<!-- delete modal user -->
									<div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title pull-left" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> User</h4>
											<br/>
										</div>
										<div class="modal-body">
												<div class="alert alert-danger">
													Are you sure you want to delete this apparatus?
												</div>
												<div class="modal-footer">
													<div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-0">
														<a href="delete_apparatus.php<?php echo '?item_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
														<button class="btn btn-inverse" style="margin-bottom:5px;" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
													</div>
												</div>
										</div>
										</div>
									</div>
									</div>
								</td> 
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