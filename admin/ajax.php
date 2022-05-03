<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == "save_schedule"){
	$save = $crud->save_schedule();
	if($save)
		echo $save;
}
if($action == "delete_schedule"){
	$save = $crud->delete_schedule();
	if($save)
		echo $save;
}
if($action == "get_schedule"){
	$get = $crud->get_schedule();
	if($get)
		echo $get;
}
ob_end_flush();
?>