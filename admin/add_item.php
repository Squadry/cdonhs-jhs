<?php

			include ('include/dbcon.php');
						$query = mysqli_query($con,"SELECT * FROM `barcode` ORDER BY mid_barcode DESC ") or die (mysqli_error());
						$fetch = mysqli_fetch_array($query);
						$mid_barcode = $fetch['mid_barcode'];
						
						$new_barcode =  $mid_barcode + 1;
						$pre_barcode = "VNHS";
						$suf_barcode = "LMS";
						$generate_barcode = $pre_barcode.$new_barcode.$suf_barcode;
?>

<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Apparatus /</small> Add Apparatus
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-plus"></i> Add Apparatus</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a href="inventory.php" style="background:none;">
                                <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                                </a>
							</li>
                    
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
							<input type="hidden" name="new_barcode" value="<?php echo $new_barcode; ?>">
							
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Property No.<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="property_no" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Apparatus Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="item_name" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Specification
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="specification" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Quantity <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" name="quantity" step="1" min="0" max="1000" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name1">Source of Fund <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="source_fund" class="select2_single form-control" tabindex="-1" required="required">
											<option value="National">National</option>
											<option value="Donation">Donation</option>
											<option value="MOOE">MOOE</option>
											<option value="Personal">Personal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name2">Status <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="status" class="select2_single form-control" tabindex="-1" required="required">
											<option value="New">New</option>
											<option value="Old">Old</option>
											<option value="Lost">Lost</option>
											<option value="Damaged">Damaged</option>
											<option value="Replacement">Replacement</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Category <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="categ_name" class="select2_single form-control" tabindex="-1" required="required">
                                            <option value="0">Select Category </option>
                                            <option value="Glasswares">Glasswares </option>
                                            <option value="Electricity"> Electricity</option>
                                            <option value="Light: Mirrors and Lenses"> Light: Mirrors and Lenses </option>
                                            <option value="Mechanics"> Mechanics</option>
                                            <option value="Reagents"> Reagents </option>
                                            <option value="Models">Models </option>
                                            <option value="Biology (Life Sciences)"> Biology (Life Sciences) </option>
                                            <option value="Others"> Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
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
			if (!isset($_FILES['image']['tmp_name'])) {
			echo "";
			}else{
			$file=$_FILES['image']['tmp_name'];
			$image = $_FILES["image"] ["name"];
			$image_name= addslashes($_FILES['image']['name']);
			$size = $_FILES["image"] ["size"];
			$error = $_FILES["image"] ["error"];
			{
						if($size > 10000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
						
					else
						{

					move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
					$item_image=$_FILES["image"]["name"];
					
					$property_no=$_POST['property_no'];
                    $item_name=$_POST['item_name'];
                    $categ_name=$_POST['categ_name'];
					$specification=$_POST['specification'];
					$quantity=$_POST['quantity'];
                    $source_fund=$_POST['source_fund'];
					$status=$_POST['status'];
					
					
					$pre = "VNHS";
					$mid = $_POST['new_barcode'];
					$suf = "LMS";
					$gen = $pre.$mid.$suf;
					
					if ($status == 'Lost') {
						$remark = 'Not Available';
					} elseif ($status == 'Damaged') {
						$remark = 'Not Available';
                    } elseif ($status == 'Replacement') {
						$remark = 'Not Available';
					} else {
						$remark = 'Available';
					}
					
					{
					mysqli_query($con,"insert into item (property_no,item_name, categ_name, specification,quantity, source_fund, status,item_barcode,item_image,date_added,remarks)
					values('$property_no','$item_name', '$categ_name', '$specification','$quantity', '$source_fund','$status','$gen','$item_image',NOW(),'$remark')")or die(mysqli_error());
					echo "<script>alert('Apparatus successfully added!'); window.location='inventory.php'</script>";
					mysqli_query($con,"insert into barcode (pre_barcode,mid_barcode,suf_barcode) values ('$pre', '$mid', '$suf') ") or die (mysqli_error());
					}
					//header("location: view_barcode.php?code=".$gen);
					}
                }
            }
            ?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>