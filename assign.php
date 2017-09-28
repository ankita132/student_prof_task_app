<?php
    require_once 'db.php';
   if(!isset($_POST['called']))
  		$user->redirect('index.php');
  	$res=$task->assign($_POST['students'],$_POST['task']);
  	//echo $_POST['students'][0];
 	//echo "A";
 ?>