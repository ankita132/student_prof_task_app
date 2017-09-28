<?php
    require_once 'db.php';
   if(!isset($_POST['called']))
  		$user->redirect('index.php');
  	$stmt=$task->liststudents();
  	echo '<h4>Assign Task</h4><input type="text" class="assigntask"/>';
  	while($userrow=$stmt->fetch(PDO::FETCH_ASSOC)){
  		echo '<div><input type="checkbox" class="chk" id="student'.$userrow['username'].'" value="'.$userrow['username'].'">
  		<label for="student'.$userrow['username'].'">'.$userrow['username'].'</label></div>';
  	}
  	$stmt=$task->liststudents2();
  	while($userrow=$stmt->fetch(PDO::FETCH_ASSOC)){
  		echo '<div><input type="checkbox" class="chk" id="student'.$userrow['student'].'" value="'.$userrow['student'].'">
  		<label for="student'.$userrow['student'].'">'.$userrow['student'].'</label></div>';
  	}
    echo '<br/><input type="submit" onclick="assign()">'
?>
  	