<?php
require_once 'db.php';
if(!isset($_POST['sno']))
	$user->redirect('index.php');

$task->edit($_POST['sno'],$_POST['task']);

?>
