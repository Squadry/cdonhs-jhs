<?php include ('include/dbcon.php');
$ID=$_GET['item_id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Apparatus /</small> Edit Apparatus Information
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Apparatus</h2>
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
                            <?php
                            $query1=mysqli_query($con,"select * from item 
                            LEFT JOIN category ON item.category_id = category.category_id
                            where item_id='$ID'")or die(mysqli_error());
                            $row=mysqli_fetch_assoc($query1);
                            ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Image
                                    </label>
                                    <div class="col-md-4">
										<a href=""><?php if($row['item_image'] != ""): ?>
										<img src="upload/<?php echo $row['item_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php else: ?>
										<img src="images/item_image.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										</a>
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Property No.
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="property_no" value="<?php echo $row['property_no']; ?>" id="property_no" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="item-name"> Apparatus Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="item_name" id="item-name" value="<?php echo $row['item_name']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Specification
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="specification" value="<?php echo $row['specification']; ?>" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Quantity
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" name="quantity" step="1" min="0" max="1000"  class="form-control col-md-7 col-xs-12" value="<?php echo $row['quantity']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="source_fund">Source of Fund</label>
									<div class="col-md-4">
                                        <select name="source_fund" class="select2_single form-control" tabindex="-1" required="required" >
                                        <option value="<?php echo $row['source_fund']; ?>"><?php echo $row['source_fund']; ?></option>
                                            <option value="National">National</option>
											<option value="Donation">Donation</option>
											<option value="MOOE">MOOE</option>
											<option value="Personal">Personal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Status</label>
									<div class="col-md-4">
                                        <select name="status" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
											<option value="New">New</option>
											<option value="Old">Old</option>
											<option value="Lost">Lost</option>
											<option value="Damaged">Damaged</option>
											<option value="Replacement">Replacement</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="category">Category
                                    </label>
									<div class="col-md-4">
                                        <select name="categ_name" class="select2_single form-control" tabindex="-1" required="required">
                                        <option value="<?php echo $row['categ_name']; ?>"><?php echo $row['categ_name']; ?></option>
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
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                                        <button type="submit" name="update11" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                        <a href="inventory.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                    </div>
                                </div>
                            </form>
							
                            <?php
                            $id =$_GET['item_id'];
                            if (isset($_POST['update11'])) {
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
                            
							

							if ($error > 0){
					
                            $property_no=$_POST['property_no'];
                            $item_name=$_POST['item_name'];
                            $categ_name=$_POST['categ_name'];
                            $specification=$_POST['specification'];
                            $quantity=$_POST['quantity'];
                            $source_fund=$_POST['source_fund'];
                            $status=$_POST['status'];
                            // $still_profile1 = $row['item_image'];


					if ($status == 'Lost') {
						$remark = 'Not Available';
					} elseif ($status == 'Damaged') {
						$remark = 'Not Available';
                    } elseif ($status == 'Replacement') {
						$remark = 'Not Available';
					} else {
						$remark = 'Available';
					}


                                    mysqli_query($con," UPDATE item SET property_no='$property_no', item_name='$item_name', categ_name='$categ_name', specification='$specification', quantity='$quantity', source_fund='$source_fund', status='$status', remarks='$remark' WHERE item_id = '$id' ")or die(mysqli_error());
                                    echo "<script>alert('Updated apparatus information successfully!'); window.location='inventory.php'</script>";	

									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
                                        if(!empty($_FILES["image"]["tmp_name"])){
                                        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);          
                                        $profile=$_FILES["image"]["name"];
                                        $bi = " ,item_image = '$profile' ";
                                        }else{
                                            $bi = '';
                                        }

                    $property_no=$_POST['property_no'];
                    $item_name=$_POST['item_name'];
					$categ_name=$_POST['categ_name'];
					$specification=$_POST['specification'];
                    $source_fund=$_POST['source_fund'];
					$quantity=$_POST['quantity'];
					$status=$_POST['status'];


					if ($status == 'Lost') {
						$remark = 'Not Available';
					} elseif ($status == 'Damaged') {
						$remark = 'Not Available';
                    } elseif ($status == 'Replacement') {
						$remark = 'Not Available';
					} else {
						$remark = 'Available';
					}
					
mysqli_query($con," UPDATE item SET property_no='$property_no',item_name='$item_name', categ_name='$categ_name', specification='$specification', quantity='$quantity', source_fund='$source_fund', status='$status', remarks='$remark' $bi WHERE item_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Updated apparatus information successfully!'); window.location='inventory.php'</script>";	

}
}

?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>