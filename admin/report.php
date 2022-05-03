	<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Reports
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-file"></i> Report Lists</h2>
                        <ul class="nav navbar-right panel_toolbox">
                    <!--        <li>
							<a href="view_graph.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-bar-chart"></i> View Graph Report</button>
							</a>
							</li>
						-->
                            <li>
								<a href="report_print.php" target="_blank" style="background:none;">
									<button class="btn btn-danger btn-outline pull-right"><i class="fa fa-print"></i> Print Report List</button>
								</a> 
							</li>
                          <!--   <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
						
						<!-- <form method="POST" action="report_search.php" class="form-inline">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-2">
											<select class="form-control" name="status" style="color:black;">
												<option>---All---</option>
												<option>Borrowed Item</option>
												<option>Borrowed Item</option>
											</select>
                                        </div>
                                    </div>
                                </div>
								
								<button type="submit" name="search" class="btn btn-primary btn-outline"><i class="fa fa-calendar-o"></i> Search By Date Transaction</button>
								
						</form> -->
						
						<span style="float:left;">
					<?php 
				//	$count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report`")) or die(mysqli_error());
				//	$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Borrowed Item'")) or die(mysqli_error());
				//	$count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Borrowed Item'")) or die(mysqli_error());
					?>
				<!---			<a href="report.php"><button class="btn btn-primary"><i class="fa fa-info"></i> All Reports <?php // echo $count['total']; ?></button></a>
							<a href="borrowed_report.php"><button class="btn btn-success btn-outline"><i class="fa fa-info"></i> Borrowed Reports (<?php //echo $count1['total']; ?>)</button></a>
							<a href="returned_report.php"><button class="btn btn-danger btn-outline"><i class="fa fa-info"></i> Returned Reports (<?php //echo $count2['total']; ?>)</button></a>
				-->
				</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
							<tr style= "background-color:#ededed">
								<th class="text-center">Borrowers Name</th>
								<th class="text-center">Apparatus Name</th>
								<th class="text-center">Task</th>
								<th class="text-center">Person In Charge</th>
								<th class="text-center">Date Transaction</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from report 
							LEFT JOIN item ON report.item_id = item.item_id 
							LEFT JOIN user ON report.user_id = user.user_id 
							order by report.report_id DESC ") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['report_id'];
							$book_id=$row['item_id'];
							$user_name=$row['firstname']." ".$row['middlename']." ".$row['lastname'];
							
							?>
							<tr>
							<td style="text-align:center; vertical-align:middle"><?php echo $user_name; ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $row['item_name']; ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $row['detail_action']; ?></td>
							<td style="text-align:center; vertical-align:middle"><?php echo $row['admin_name']; ?></td> 
							<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($row['date_transaction'])); ?></td>
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