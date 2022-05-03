<?php
include("../config.php");

if (isset($_POST['title'])) {

    //collect data
    $error      = null;
    $user       = $_POST['user'];
    $title      = $_POST['title'];
    $start      = $_POST['startDate'];
    $end        = $_POST['endDate'];
    $remarks    = $_POST['sched_remarks'];

    //validation
    if ($user == '') {
        $error['user'] = 'Name is required';
    }
    
    if ($title == '') {
        $error['title'] = 'Title is required';
    }

    if ($start == '') {
        $error['start'] = 'Start date is required';
    }

    if ($end == '') {
        $error['end'] = 'End date is required';
    }

    
    //if there are no errors, carry on
    if (! isset($error)) {

        //format date
        // $start = date('Y-m-d H:i:s', strtotime($start));
        // $end = date('Y-m-d H:i:s', strtotime($end));
        
        $data['success'] = true;
        $data['message'] = 'Success!';

        //store
        $insert = [
            'user'       => $user,
            'title'       => $title,
            'start_event' => $start,
            'end_event'   => $end,
            'sched_remarks'=> $remarks,
        ];
        $lms->insert('events', $insert);
      
    } else {

        $data['success'] = false;
        $data['errors'] = $error;
    }

    echo json_encode($data);
}
