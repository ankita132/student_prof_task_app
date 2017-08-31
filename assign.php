<?php
    require_once 'db.php';
   if(!isset($_POST['called']))
  		$user->redirect('index.php');
  	$res=$task->assign($_POST['task'],$_POST['students']);
  	//echo $_POST['students'];
 	echo "A";
 ?>