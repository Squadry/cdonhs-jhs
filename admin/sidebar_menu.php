            <!-- sidebar navigation -->
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="home.php" class="site_title"><i class="fa fa-university"></i> <span>CDONHS-LIMS</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
					<a href="admin_profile.php">
                    <div class="profile">
<?php
	include('include/dbcon.php');
    error_reporting(0);
	$user_query=mysqli_query($con,"select *  from admin where admin_id='$id_session'")or die(mysqli_error());
	$row=mysqli_fetch_array($user_query); {
?>
                        <div class="profile_pic">
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>" style="height:65px; width:65px;" class="img-circle profile_img">
									<?php else: ?>
									<img src="images/user.png" style="height:65px; width:75px;" class="img-circle profile_img">
									<?php endif; ?>	
                        </div>

                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><strong><?php echo $row['firstname']; ?> </strong></h2>
                        </div>
<?php } ?>
                    </div>
					</a>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
							<h3 style="margin-top:85px;"></h3>
							<div class="separator"></div>
                            <ul class="nav side-menu">
                                <li>
									<a href="home.php"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li>
									<a href="fullcalendar/index.php"><i class= "fa fa-calendar-o"></i> Go to Calendar</a>
                                </li>
                                <li>
									<a href="borrow.php"><i class="fa fa-plus-square "></i> Borrow</a>
                                </li>
                              
                                <li>
									<a href="borrowed_items.php"><i class="fa fa-share-square-o"></i> Borrowed Apparatus</a>
                                </li>
                                <li>
									<a href="returned_items.php"><i class="fa fa-check-square-o"></i> Returned Apparatus</a>
                                </li>
                                <li>
									<a href="inventory.php"><i class="fa fa-flask"></i> Apparatus Inventory</a>
                                </li>
                                <li>
									<a href="borrower.php"><i class="fa fa-users"></i> Borrower List</a>
                                </li>
<?php
// $user_query  = mysqli_query($con,"select * from admin where admin_id = '$id_session'")or die(mysqli_error());
// $user_row =mysqli_fetch_array($user_query);
// $admin_type  = $user_row['admin_type'];
?>
						<?php
							// if ($admin_type != 'Encoder') {
						?>
                                <li>
									<a href="admin.php"><i class="fa fa-user"></i> Admin Profile</a>
                                </li>
							<?php // } ?>
                                <li>
									<a href="report.php"><i class= "fa fa-file"></i> Reports</a>
                                </li>
                                <li>
									<a href="settings.php"><i class= "fa fa-cog"></i> Settings</a>
                                </li>
                                
                                
                               <!--- <li>
									<a href="activity_log.php"><i class="fa fa-history"></i> Activity Log</a>
                                </li>-->
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div> -->
                </div>
            </div>
            <!-- end of sidebar navigation -->

            <script>
       var menu_toggle = document.querySelector(".menu_toggle");
	    menu_toggle.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
	})
  </script>