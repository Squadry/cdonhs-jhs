<?php
include("../config.php");

if (isset($_POST['id'])) {

    //collect data
    $error      = null;
    $id         = $_POST['id'];
    $start      = $_POST['start'];
    $end        = $_POST['end'];

    //optional fields
    $user      = isset($_POST['user']) ? $_POST['user']: '';
    $title      = isset($_POST['title']) ? $_POST['title']: '';
    $remarks    = isset($_POST['sched_remarks']) ? $_POST['sched_remarks']: '';

    //validation
    if ($start == '') {
        $error['start'] = 'Start date and time is required';
    }

    if ($end == '') {
        $error['end'] = 'End date and time is required';
    }
    

    //if there are no errors, carry on
    if (! isset($error)) {

        //reformat date
        // $start = date('Y-m-d H:i:s', strtotime($start));
        // $end = date('Y-m-d H:i:s', strtotime($end));
        
        $data['success'] = true;
        $data['message'] = 'Success!';

        //set core update array
        $update = [
            'start_event' => $_POST['start'],
            'end_event' => $_POST['end']
        ];

        //check for additional fields, and add to $update array if they exist
        if ($user !='') {
            $update['user'] = $user;
        }
        
        if ($title !='') {
            $update['title'] = $title;
        }

        if ($remarks !='') {
            $update['sched_remarks'] = $sched_remarks;
        }

        //set the where condition ie where id = 2
        $where = ['id' => $_POST['id']];

        //update database
        $lms->update('events', $update, $where);
      
    } else {

        $data['success'] = false;
        $data['errors'] = $error;
    }

    echo json_encode($data);
}