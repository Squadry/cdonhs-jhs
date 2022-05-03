<?php
include("../config.php");
$data = [];

$result = $lms->rows("SELECT * FROM events ORDER BY id");
foreach($result as $row) {
    $data[] = [
        'id'              => $row->id,
        'user'            => $row->user,
        'title'           => $row->title,
        'start'           => $row->start_event,
        'end'             => $row->end_event,
        'remarks'         => $row->sched_remarks
    ];
}

echo json_encode($data);
