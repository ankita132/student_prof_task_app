<?php
require_once 'db.php';
if(!isset($_POST['sno']))
	$user->redirect('index.php');

$task->delete($_POST['sno']);

?>