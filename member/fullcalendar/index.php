<?php require('config.php');?>


<!DOCTYPE html>
<html>
<head>
    
<div class="p-5">
  <h2 class="mb-4">Laboratory Reservation</h2>
  <div class="card">
    <div class="card-body p-0">
      <div id="calendar"></div>
    </div>
  </div>
</div>

    
    <link href='<?=$dir;?>packages/core/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/daygrid/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/timegrid/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/list/main.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/bootstrap/css/bootstrap.css' rel='stylesheet' />
    <link href="<?=$dir;?>packages/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href='<?=$dir;?>packages/datepicker/datepicker.css' rel='stylesheet' />
    <link href='<?=$dir;?>packages/colorpicker/bootstrap-colorpicker.min.css' rel='stylesheet' />
    <link href='<?=$dir;?>style.css' rel='stylesheet' />

    <script src='<?=$dir;?>packages/core/main.js'></script>
    <script src='<?=$dir;?>packages/daygrid/main.js'></script>
    <script src='<?=$dir;?>packages/timegrid/main.js'></script>
    <script src='<?=$dir;?>packages/list/main.js'></script>
    <script src='<?=$dir;?>packages/interaction/main.js'></script>
    <script src='<?=$dir;?>packages/jquery/jquery.js'></script>
    <script src='<?=$dir;?>packages/jqueryui/jqueryui.min.js'></script>
    <script src='<?=$dir;?>packages/bootstrap/js/bootstrap.js'></script>
    <script src='<?=$dir;?>packages/datepicker/datepicker.js'></script>
    <script src='<?=$dir;?>packages/colorpicker/bootstrap-colorpicker.min.js'></script>
    <script src='<?=$dir;?>calendar.js'></script>
</head>
<body>

<!-- add reservation modal -->
<div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title">Add Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form id="createEvent" class="form-horizontal">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="user-group" class="form-group">
                                <label class="control-label" for="user">Name</label>
                                <input type="text" class="form-control" name="user">
                                <!-- errors will go here -->
                            </div>

                            <div id="title-group" class="form-group">
                                <label class="control-label" for="title">Title</label>
                                <input type="text" class="form-control" name="title">
                                <!-- errors will go here -->
                            </div>

                            <div id="startdate-group" class="form-group">
                                <label class="control-label" for="startDate">Start Date</label>
                                <input type="datetime-local" class="form-control" id="startDate" name="startDate">
                                <!-- errors will go here -->
                            </div>

                            <div id="enddate-group" class="form-group">
                                <label class="control-label" for="endDate">End Date</label>
                                <input type="datetime-local" class="form-control" id="endDate" name="endDate">
                                <!-- errors will go here -->
                            </div>

                            <div id="schedremarks-group" class="form-group">
                                <label class="control-label" for="schedremarks">Remarks</label>
                                <textarea row="3" class="form-control" name="sched_remarks"></textarea>
                                <!-- errors will go here -->
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- edit reservation modal -->
<div class="modal fade" id="editeventmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">View Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container-fluid">

                    <form id="editEvent" class="form-horizontal">
                    <input type="hidden" id="editEventId" name="editEventId" value="">

                    <div class="row">

                        <div class="col-md-12">

                            <div id="edit-user-group" class="form-group">
                                <label class="control-label" for="editEventUser">Name</label>
                                <input type="text" class="form-control" id="editEventUser" name="editEventUser">
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-title-group" class="form-group">
                                <label class="control-label" for="editEventTitle">Title</label>
                                <input type="text" class="form-control" id="editEventTitle" name="editEventTitle">
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-startdate-group" class="form-group">
                                <label class="control-label" for="editStartDate">Start Date</label>
                                <input type="datetime-local" class="form-control" id="editStartDate" name="editStartDate">
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-enddate-group" class="form-group">
                                <label class="control-label" for="editEndDate">End Date</label>
                                <input type="datetime-local" class="form-control" id="editEndDate" name="editEndDate">
                                <!-- errors will go here -->
                            </div>

                            <div id="edit-schedremarks-group" class="form-group">
                                <label class="control-label" for="editEventSchedremarks">Remarks</label>
                                <textarea row="3" class="form-control" id="editEventSchedremarks" name="editEventSchedremarks"></textarea>
                                <!-- errors will go here -->
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" id="deleteEvent" data-id>Delete</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<br/>
    <div class="container">
        <!-- <a href="javascript:history.back()" class="btn btn-secondary pull-right" role="button" aria-pressed="true">Primary link</a> -->
        <a href="javascript:history.back()" style="background:none;">
            <button class="btn btn-secondary pull-right"><i class="fa fa-arrow-left"></i> Back</button> </a>     
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addeventmodal">
            Add Reservation
        </button>
    </div>

</body>
</html>
