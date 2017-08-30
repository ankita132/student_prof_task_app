<?php
require_once 'db.php';
if(!$user->is_loggedin()){
  $user->redirect('login.php');
}
$pos = $user->is_loggedin();
if($pos!=""){
  if($pos == 'student'){
    $user->redirect('student.php');
  }
  elseif ($pos == 'professor') {
    $user->redirect('professor.php');
  }
}

?>