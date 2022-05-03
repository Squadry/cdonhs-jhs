<?php
include ('../admin/include/dbcon.php');
?>

<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Laboratory Reservation
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-plus"></i> Laboratory Reservation</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:history.back()" style="background:none;"> 
							    <button class="btn btn-primary btn-outline pull-right" id="new_schedule"><i class="fa fa-plus"></i> Add Reservation</button>
							</a>
							
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                        <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" id="new_schedule">
                            <div class="form-group">
                                <h4><label class="control-label col-md-4" for="">View Reservation of: 
                                </label></h4>
                                <div class="col-md-4">
                                    <select name="school_number" class="select2_single form-control" required="required" tabindex="-1" >
                                        <option value="0">Select Name</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from user where status = 'Active' ") or die (mysqli_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['user_id'];
                                        ?>
                                            <option value="<?php echo $row['school_number']; ?>"><?php echo $row['school_number']; ?> - <?php echo $row['firstname']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                      
                        <hr>	
						<div id="calendar"></div>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
	.avatar {
	    display: flex;
	    border-radius: 100%;
	    width: 100px;
	    height: 100px;
	    align-items: center;
	    justify-content: center;
	    border: 3px solid;
	    padding: 5px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: calc(100%);
	    border-radius: 100%;
	}
		input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
a.fc-daygrid-event.fc-daygrid-dot-event.fc-event.fc-event-start.fc-event-end.fc-event-past {
    cursor: pointer;
}
a.fc-timegrid-event.fc-v-event.fc-event.fc-event-start.fc-event-end.fc-event-past {
    cursor: pointer;
}
</style>
<script>
	
	$('#new_schedule').click(function(){
		uni_modal('New Schedule','manage_schedule.php','mid-large')
	})
	$('.view_schedule').click(function(){
		uni_modal("Bio","view_schedule.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_schedule').click(function(){
		_conf("Are you sure to delete this reservation?","delete_schedule",[$(this).attr('data-id')])
	})
	
	function delete_schedule($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_schedule',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	 var calendarEl = document.getElementById('calendar');
    var calendar;
	document.addEventListener('DOMContentLoaded', function() {
   

        calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
          initialDate: '<?php echo date('Y-m-d') ?>',
          weekNumbers: true,
          navLinks: true, // can click day/week names to navigate views
          editable: false,
          selectable: true,
          nowIndicator: true,
          dayMaxEvents: true, // allow "more" link when too many events
          // showNonCurrentDates: false,
          events: []
        });
        calendar.render();
     

  });
	$('#user_id').change(function(){
		 calendar.destroy()
		 start_load()
		 $.ajax({
		 	url:'ajax.php?action=get_schedule',
		 	method:'POST',
		 	data:{faculty_id: $(this).val()},
		 	success:function(resp){
		 		if(resp){
		 			resp = JSON.parse(resp)
		 					var evt = [] ;
		 			if(resp.length > 0){
		 					Object.keys(resp).map(k=>{
		 						var obj = {};
		 							obj['title']=resp[k].title
		 							obj['data_id']=resp[k].id
		 							obj['data_location']=resp[k].location
		 							obj['data_description']=resp[k].description
		 							if(resp[k].is_repeating == 1){
		 							obj['daysOfWeek']=resp[k].dow
		 							obj['startRecur']=resp[k].start
		 							obj['endRecur']=resp[k].end
									obj['startTime']=resp[k].time_from
		 							obj['endTime']=resp[k].time_to
		 							}else{

		 							obj['start']=resp[k].schedule_date+'T'+resp[k].time_from;
		 							obj['end']=resp[k].schedule_date+'T'+resp[k].time_to;
		 							}
		 							
		 							evt.push(obj)
		 					})
							 console.log(evt)

		 		}
		 				  calendar = new FullCalendar.Calendar(calendarEl, {
				          headerToolbar: {
				            left: 'prev,next today',
				            center: 'title',
				            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
				          },
				          initialDate: '<?php echo date('Y-m-d') ?>',
				          weekNumbers: true,
				          navLinks: true,
				          editable: false,
				          selectable: true,
				          nowIndicator: true,
				          dayMaxEvents: true, 
				          events: evt,
				          eventClick: function(e,el) {
							   var data =  e.event.extendedProps;
								uni_modal('View Schedule Details','view_schedule.php?id='+data.data_id,'mid-large')

							  }
				        });
		 	}
		 	},complete:function(){
		 		calendar.render()
		 		end_load()
		 	}
		 })
	})
</script>