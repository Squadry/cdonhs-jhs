<?php
include("../config.php");

if (isset($_POST["id"])) {
    $lms->deleteById('events',$_POST['id']);
}
