<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Admin Profile</small> / View Information
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> Admin Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="admin.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
							</a>
							</li>
                            <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li> -->
                        <!-- If needed 
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
						-->
                            <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								
							<thead>
								<tr >
									<th class="text-center">Image</th>
									<th class="text-center">First Name</th>
									<th class="text-center">Middle Name</th>
									<th class="text-center">Last Name</th>
									<th class="text-center">Username</th>
									<th class="text-center">Password</th>
									<th class="text-center">Date Added</th>
								</tr>
							</thead>
							<tbody>
<?php
			   
		if (isset($_GET['admin_id']))
		$id=$_GET['admin_id'];
		$result1 = mysqli_query($con,"SELECT * FROM admin WHERE admin_id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
							<tr style="text-align:center; vertical-align:middle">
								<td style="text-align:center; vertical-align:middle">
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php else: ?>
									<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php endif; ?>	
								</td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['firstname']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['middlename']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['lastname']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['username']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo $row['password']; ?></td> 
								<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a", strtotime($row['admin_added'])); ?></td> 
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