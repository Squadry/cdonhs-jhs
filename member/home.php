<?php include ('header.php'); ?>
        <div class="clearfix"></div>
		
                <!-- top tiles -->
                <div class="row tile_count" style="margin-right:-245px;">
					 <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT * FROM admin");
							$num_rows = mysqli_num_rows($result);
							?>
				<a href="admin.php">
                            <span class="count_top"><i class="fa fa-users"></i> Admin</span>
				</a>
                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom"> Total Admin</span>

                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT * FROM user");
							$num_rows = mysqli_num_rows($result);
							?>
				<a href="borrower.php">
                            <span class="count_top"><i class="fa fa-male"></i> <i class="fa fa-female"></i> Borrowers</span>
				</a>
                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom">Total Borrowers</span>							
                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT * FROM item");
							$num_rows = mysqli_num_rows($result);
							?>
				<a href="inventory.php">
                            <span class="count_top"><i class="fa fa-book"></i> Apparatus</span>
				</a>
                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom ">Total Apparatus</span>                     
					  </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT * FROM borrow_item");
							$num_rows = mysqli_num_rows($result);
							?>
				<a href="borrowed_items.php">
                            <span class="count_top"><i class="fa fa-book"></i> Borrowed Apparatus</span>
				</a>
                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom ">Total Borrowed Apparatus</span>
                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                      <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT * FROM return_item");
							$num_rows = mysqli_num_rows($result);
							?>
				<a href="returned_items.php">
                            <span class="count_top"><i class="fa fa-book"></i> Returned Apparatus</span>
				</a>
                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom ">Total Returned Apparatus</span>							
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->
				
				


				

<?php include ('footer.php'); ?>