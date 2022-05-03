            <!-- sidebar navigation -->
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="fa fa-university"></i> <span>CDONHS-JHS</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
					<a href="">
                    <div class="profile">
            <?php
                include('../admin/include/dbcon.php');
                //$user_query=mysqli_query($con,"select *  from user where user_id=''")or die(mysqli_error());
                $user_query=mysqli_query($con,"select * from user where user_id='$id_session'");
                $row=mysqli_fetch_array($user_query);

            {
            ?>
                        <div class="profile_pic">
								
									
									<img src="../admin/images/user.png" style="height:65px; width:65px;" class="img-circle profile_img">
									
                        </div>

                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><strong><?php echo $_SESSION['user_id']=$row['firstname']; ?></strong></h2>
                        </div>
            <?php } ?>
                    </div>
					</a>
                    <!-- /menu prile quick info -->

                    <br />



                    <!-- REDIRECT TO BORROWER PROFILE 
                        echo ('<script> location.href="borrow_item.php?school_number='.$school_number.'";</script'); -->

                    <!-- sidebar menu --> 
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
							<h3 style="margin-top:85px;"></h3>
							<div class="separator"></div>
                            <ul class="nav side-menu">
                
                                <li>
									<a href="inventory.php"><i class= "fa fa-flask"></i> Apparatus List</a>
                                </li>

                                <li>
                               <!-- <a href="borrow_item.php<?php echo '?school_number='.$school_number; ?>""><i class="fa fa-plus-square-o"></i> Borrow Apparatus </a>  -->
                               
									<a href="borrow_item.php?school_number=<?php echo $row['school_number']; ?>"><i class="fa fa-plus-square-o"></i> Borrow Apparatus </a>  
                                </li>
                               <!-- href="borrow_item.php?school_number='.$school_number.'"
                                    // "borrow_item.php?school_number=<?php echo $school_number ?>" -->
                                <li>
									<a href="fullcalendar/index.php"><i class= "fa fa-calendar-o"></i> Go to Calendar</a>
                                </li>
                               
                            
                            </ul>
                        </div>

                    </div>
                    
                </div>
            </div>
            <!-- end of sidebar navigation -->