<?php include ('include/dbcon.php');
$ID=$_GET['user_id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Borrower /</small> Edit Borrower
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Borrower</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <!-- <a href="deactivate_borrower.php<?php echo $ID;?>" style="background:none; margin-right:20px;" for="DeactivateUser">
                                <button class="btn btn-gray background-color: #dedede;"><i class="fa fa-power-off"></i> Deactivate Borrower</button>
                                </a> -->

                                <a class="btn btn-lg" for="DeactivateUser" href="deactivate_borrower.php<?php echo $ID;?>" data-toggle="modal" data-target="#deactivate<?php echo $ID;?>" style="margin-top:8px;  background:#e3e3e3;"> <i class="fa fa-power-off"></i> Deactivate Borrower
										
									</a>
							</li>
                            <!-- <li>
                                <a href="borrower.php" style="background:none;">
                                <button class="btn btn-primary "><i class="fa fa-arrow-left"></i> Back</button>
                                </a>
							</li> -->
                            

                            <!-- deactivate modal user -->
									<div class="modal fade" id="deactivate<?php  echo $ID;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Admin</h4>
										</div>
										<div class="modal-body">
												<div class="alert alert-danger">
													<center>  <h4> Are you sure you want to deactivate this borrower? <br> You won't be able to activate it again anymore.  </h4> <center>
												</div>
												<div class="modal-footer">
													<a href="deactivate_borrower.php<?php echo '?user_id='.$ID; ?>"> <button class="btn btn-inverse"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
													<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
												</div>



                            
                        <!--    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
						
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                    <?php
                    $query=mysqli_query($con,"select * from user where user_id='$ID'")or die(mysqli_error());
                    $row=mysqli_fetch_array($query);
                    ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                       
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="school_no">School ID No.
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" value="<?php echo $row['school_number']; ?>" name="school_number" id="school_no" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name
									</label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="middle-name">Middle Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="MI / Middle Name....." id="middle-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="password">Password 
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" value="<?php echo $row['password']; ?>" name="password" id="password" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="c-password">Confirm Password 
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" value="<?php echo $row['confirm_password']; ?>" name="confirm_password" id="confirm_password" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="contact">Contact No.
                                    </label>
                                    <div class="col-md-4">
                                        <input type='tel' value="<?php echo $row['contact']; ?>" autocomplete="off"  maxlength="11" name="contact" id="contact" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="gender">Gender
                                    </label>
									<div class="col-md-4">
                                        <select name="gender" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>	
                                <div class="form-group">
									<label class="control-label col-md-4" for="department">Department
									</label>
									<div class="col-md-4">
                                        <select name="department" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
                                            <option value="Science">Science</option>
                                        </select>
                                    </div>
                                </div>							
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="h_address">Address
                                    </label>
                                    <div class="col-md-4">
                                        <textarea class="form-control col-md-7 col-xs-12" name="h_address" id="h_address"><?php echo $row['h_address']; ?>
                                    </textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                        <a href="borrower.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                    </div>
                                </div>
                            </form>
							
                            <?php
                            $id =$_GET['user_id'];
                            if (isset($_POST['update'])) {
                                            //				$image = $_FILES["image"] ["name"];
                                            //			$image_name= addslashes($_FILES['image']['name']);
                                            //			$size = $_FILES["image"] ["size"];
                                            //			$error = $_FILES["image"] ["error"];
                                                        


                                            //			if ($error > 0){
                                                                    
                            // $school_number = $_POST['school_number'];
                            // $firstname = $_POST['firstname'];
                            // $middlename = $_POST['middlename'];
                            // $lastname = $_POST['lastname'];
                            // $contact = $_POST['contact'];
                            // $gender = $_POST['gender'];
                            // $address = $_POST['address'];
                            // $type = $_POST['type'];
                            // $level = $_POST['level'];
                            // $still_profile = $row['user_image'];


                            // mysqli_query($con," UPDATE user SET school_number='$school_number', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', 
                            // gender='$gender', address='$address', type='$type', level='$level', user_image='$still_profile' WHERE user_id = '$id' ")or die(mysqli_error());
                            // echo "<script>alert('Successfully Update User Info!'); window.location='borrower.php'</script>";	
                                                        //		}else{
                                                        //			if($size > 10000000) //conditions for the file
                                                        //			{
                                                        //			die("Format is not allowed or file size is too big!");
                                                        //			}
                                                                    

                            // move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
                            // $profile=$_FILES["image"]["name"];

                            $school_number = $_POST['school_number'];
                            $firstname = $_POST['firstname'];
                            $middlename = $_POST['middlename'];
                            $lastname = $_POST['lastname'];
                            $contact = $_POST['contact'];
                            $gender = $_POST['gender'];
                            $department = $_POST['department'];
                            $h_address = $_POST['h_address'];

                            {		
                            mysqli_query($con," UPDATE user SET school_number='$school_number', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', 
                            gender='$gender', h_address='$h_address', department='$department' WHERE user_id = '$id' ")or die(mysqli_error());
                            echo "<script>alert('Successfully Updated Borrower Information!'); window.location='borrower.php'</script>";
                            }

                            // }
                            // }
                            }
                            ?>
                                                    
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>