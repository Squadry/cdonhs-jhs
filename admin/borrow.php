<?php

			include ('include/dbcon.php');
?>

<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Apparatus /</small> Borrow Apparatus
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-plus"></i> Borrow Apparatus</h2>
                        <ul class="nav navbar-right panel_toolbox">
                      
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
							
							
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="">Name
                                    </label>
                                    <div class="col-md-4">
                                        <select name="school_number" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="0">Select Borrower</option>
                                            <?php
                                                $result= mysqli_query($con,"select * from user where status = 'Active' ") or die (mysqli_error());
                                                while ($row= mysqli_fetch_array ($result) ){
                                                $id=$row['user_id'];
                                            ?>
                                                <option value="<?php echo $row['school_number']; ?>"><?php echo $row['school_number']; ?> - <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                        <a href="inventory.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                    </div>
                                </div>
                            </form>
							
                <?php
                    include ('include/dbcon.php');

                    if (isset($_POST['submit'])) {

                    $school_number = $_POST['school_number'];

                    $sql = mysqli_query($con,"SELECT * FROM user WHERE school_number = '$school_number' ");
                    $count = mysqli_num_rows($sql);
                    $row = mysqli_fetch_array($sql);

                        if($count <= 0){
                            echo "<div class='alert alert-success'>".'No match found for the School ID Number'."</div>";
                        }else{
                            $school_number = $_POST['school_number'];
                            echo ('<script> location.href="borrow_item.php?school_number='.$school_number.'";</script');
                        }
                    }
                ?>

	        </div>
	    <div class="col-md-4"></div>
    </div>
</div>		
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>