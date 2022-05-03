                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Allowed Items <small>per User</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
<?php	// 	include ('add_modal_example.php'); ?>
                                <div class="x_content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
							<?php
							$allowed_item_query= mysqli_query($con,"select * from allowed_item order by allowed_item_id DESC ") or die (mysqli_error());
							while ($row11= mysqli_fetch_array ($allowed_item_query) ){
							$id=$row11['allowed_item_id'];
							?>
                                            <tr class="text-center">
                                                <td><?php echo $row11['qntty_items']; ?></td>
                                                <td>
													<a class="btn btn-primary" for="ViewAdmin" href="#edit<?php echo $id; ?>" data-toggle="modal" data-target="#edit<?php echo $id;?>">
														<i class="fa fa-edit"></i> Edit
													</a>
												</td>
									<!-- edit modal -->
									<div class="modal fade" id="edit<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Edit</h4>
										</div>
										<div class="modal-body">
												<?php
												$query1=mysqli_query($con,"select * from allowed_item where allowed_item_id='$id'")or die(mysqli_error());
												$row22=mysqli_fetch_array($query1);
												?>
												<form method="post" enctype="multipart/form-data" class="form-horizontal">
													<div class="form-group" style="margin-left:170px;">
														<label class="control-label col-md-4" for="first-name">Quantity <span class="required">*</span>
														</label>
														<div class="col-md-4">
															<input type="number" min="0" max="100" step="1" name="qntty_items" value="<?php echo $row22['qntty_items']; ?>" id="first-name2" class="form-control">
														</div>
													</div>
													<div class="modal-footer" style="margin-top:50px;">
														<div class="col-md-8 col-sm-8 col-xs-10 col-md-offset-1">
															<button type="submit" style="margin-bottom:5px;" name="update1" class="btn btn-primary"><i class="fa fa-plus-square"></i> Save</button>
															<button class="btn btn-inverse" style="margin-bottom:5px;" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</button>
														</div>
													</div>
												</form>
												
												<?php
													if (isset($_POST['update1'])) {
													
													$qntty_items = $_POST['qntty_items'];
													
													{
														mysqli_query($con," UPDATE allowed_item SET qntty_items='$qntty_items' ") or die (mysqli_error());
													}
													{
														echo "<script>alert('Edit Successfully!'); window.location.href='settings.php'</script>";
													}
														
													}
												?>
												
										</div>
										</div>
									</div>
									</div>
												
                                            </tr>
							<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>