<?php
include("../config.php");

if (isset($_POST['id'])) {
    $row = $lms->row("SELECT * FROM events where id=?", [$_POST['id']]);
    $data = [
        'id'        => $row->id,
        'user'      => $row->user,
        'title'     => $row->title,
        'start'     => $row->start_event,
        'end'       => $row->end_event,
        'remarks'   => $row->sched_remarks,
    ];

    echo json_encode($data);
}
