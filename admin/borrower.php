<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Borrower
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
						<!--	<a href="member_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger btn-outline pull-right"><i class="fa fa-print"></i> Print Borrower List</button>
							</a> -->
							<!-- <a href="import_members.php" style="background:none;">
							<button class="btn btn-success btn-outline pull-right"><i class="fa fa-upload"></i> Download CSV</button>
							</a> -->
							<a href="member_print.php" style="background:none;">
							<button class="btn btn-danger btn-outline pull-right"><i class="fa fa-print"></i> Print Borrower List</button>
							</a>
							<a href="export_excel_borrowers.php" style="background:none;">
							<button class="btn btn-success btn-outline pull-right"><i class="fa fa-download"></i> Download CSV</button>
							</a>
							<a href="add_borrower.php" style="background:none;">
							<button class="btn btn-primary btn-outline pull-right"><i class="fa fa-plus"></i> Add Borrower</button>
							</a>
							
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Borrowers Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
							<tr style="background-color:#ededed">
							<!---		<th>Image</th>	-->
									<th style="width:100px;" class="text-center">School ID No.</th>
									<th style="width:180px;" class="text-center">Name</th>
									<th style="width:150px;" class="text-center">Contact No.</th>
									<th style="width:200px;" class="text-center">Address</th>
									<th style="width:100px;" class="text-center">Status</th>
									<th style="width:130px;" class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from user order by user_id DESC") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['user_id'];
							?>

							<?php if($row['status'] == 0): ?>
								<tr>
								<?php elseif($row['status'] == 1): ?>
									<tr style="color: #ababab; background-color:#e3e3e3">
								<?php endif; ?> 
							
						
							<td style="text-align:center; vertical-align:middle"><a target="_blank" href="borrow_item.php?school_number=<?php echo $row['school_number']; ?>"><?php echo $row['school_number']; ?></a></td> 
							<td style="text-align:center; vertical-align:middle"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td> 
							<td style="text-align:center; vertical-align:middle"><?php echo $row['contact']; ?></td> 
							<td style="text-align:center; vertical-align:middle"><?php echo $row['h_address']; ?></td>
						<!--	<td style="text-align:center; vertical-align:middle"><?php echo $row['status']; ?></td> -->

							<?php if($row['status'] == 0): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-green">Active</span></td>
										<?php elseif($row['status'] == 1): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-gray">Inactive</span></td>
										<?php endif; ?> 
							<td style="text-align:center; vertical-align:middle">
							
									<a class="btn btn-primary" for="ViewAdmin" href="view_borrower.php<?php echo '?user_id='.$id; ?>">
										<i class="fa fa-search"></i></a>

									<a class="btn btn-warning" for="ViewAdmin" href="edit_borrower.php<?php echo '?user_id='.$id; ?>">
									<i class="fa fa-edit"></i></a>

									<a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
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
													Are you sure you want to delete this borrower?
												</div>
												<div class="modal-footer">
													<div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-0">
														<a href="delete_borrower.php<?php echo '?user_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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