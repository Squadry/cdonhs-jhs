<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Returned Apparatus
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
	
                        <h2><i class="fa fa-flask"></i> Returned Apparatus List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="print_returned_items.php" target="_blank" style="background:none;">
							<button class="btn btn-danger btn-outline pull-right"><i class="fa fa-print"></i> Print Returned Apparatus</button>
							</a>
							</li>
                        </ul>
                        <div class="clearfix"></div>
                    <div class="x_content">
                        <!-- content starts here -->
						<br>
						

						<div class="table-responsive">							
							<?php
							$return_query= mysqli_query($con,"SELECT * from return_item
							LEFT JOIN item ON return_item.item_id = item.item_id 
							LEFT JOIN user ON return_item.user_id = user.user_id 
							where return_item.return_item_id order by return_item.return_item_id DESC") or die (mysqli_error());
								$return_count = mysqli_num_rows($return_query);
						
							?>
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
                                
							<thead>
							<tr style= "background-color:#ededed">
								<th class="text-center">Borrower Name</th>
								<th class="text-center">Apparatus Name</th>
								<th class="text-center">Date Borrowed</th>
								<th class="text-center">Due Date</th>
								<th class="text-center">Date Returned</th>
								</tr>
							</thead>
							<tbody>
						<?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['return_item_id'];
						?>
							<tr>
							
								<td style="text-align:center; vertical-align:middle"><?php echo $return_row['firstname']." ".$return_row['lastname']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo $return_row['item_name']; ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($return_row['due_date'])); ?></td>
								<td style="text-align:center; vertical-align:middle"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_returned'])); ?></td>
								<tr>
							<!--	<?php
							if ($return_row['book_penalty'] != 'No Penalty'){
							 echo "<td class='' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
							 }else {
									 echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='alert alert-warning' style='width:100px;'>Php ".$return_row['book_penalty'].".00</td>";
								 }else {
									 echo "<td>".$return_row['book_penalty']."</td>";
								 }
								
								?> -->
							</tr>
							
							<?php 
							}
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No apparatus returned at this moment</td>
										</tr>
									</table>
								';
							} 							
							?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>