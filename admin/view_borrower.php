<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Borrower Profile</small> / View Borrower
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> Borrower Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="borrower.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
							</a>
							</li>
                          <!--   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                       	 If needed 
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
					
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li> 	-->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								
							<thead>
							<tr style="background-color:#ededed">
							<!---		<th>User Image</th>	-->
									<th class="text-center">School ID No.</th>
									<th class="text-center">Name</th>
									<th class="text-center">Password</th>
									<th class="text-center">Contact No.</th>
									<th class="text-center">Gender</th>
									<th class="text-center">Department</th>
									<th class="text-center">Address</th>
									<th class="text-center">Status</th>
									<th class="text-center">User Added</th>
								</tr>
							</thead>
							<tbody>
		<?php
			   
		if (isset($_GET['user_id']))
		$id=$_GET['user_id'];
		$result1 = mysqli_query($con,"SELECT * FROM user WHERE user_id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
							<tr>
						<!---		<td>
								<?php // if($row['user_image'] != ""): ?>
								<img src="upload/<?php // echo $row['user_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php // else: ?>
								<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php // endif; ?>
								</td> -->
								<td style="text-align:center; vertical-align:middle"><?php echo $row['school_number']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['password']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $row['contact']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['gender']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['department']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['h_address']; ?></td> 
								<!-- <td style="text-align:center; vertical-align:middle"><?php echo $row['status']; ?></td>  -->
								<?php if($row['status'] == 0): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-green">Active</span></td>
										<?php elseif($row['status'] == 1): ?>
											<td style="text-align:center; vertical-align:middle"><span class="badge bg-gray">Inactive</span></td>
										<?php endif; ?> 
								<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a", strtotime($row['user_added'])); ?></td>
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