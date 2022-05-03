            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <!-- <div class="nav toggle">
                            
                            <a href="#"  id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div> -->

                        <ul class="nav navbar-nav navbar-right">
                        
                        <?php
                            include('include/dbcon.php');
                            $user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysqli_error());
                            $row=mysqli_fetch_array($user_query); {
                        ?>

                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    
							
									<img src="images/admin_.png">
									
                                    <span class=" fa fa-angle-down"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    
                                    <li>
										<a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                    </ul>
                            </li>
                            
                            <?php
							$result = mysqli_query($con,"SELECT * FROM borrow_item");
							$num_rows = mysqli_num_rows($result);
							?>
                                <li class="dropdown pull-right notification">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-clock-o fa-lg"></i> 
                                <span class="badge bg-red"> <?php echo $num_rows; ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right" role="menu">
                                <li>
                                    
                                    <a href="borrowed_items.php">
                                        <span class="badge bg-red"><?php echo $num_rows; ?> </span> - Apparatus Unreturned </a> 
                                </li>
                        </ul>
                    </li>

<?php } ?>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->