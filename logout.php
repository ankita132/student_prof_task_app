<?php
include_once 'db.php';
if($user->logout()){
  $user->redirect('login.php');
}
 ?>
