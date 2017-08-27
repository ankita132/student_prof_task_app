<?php

    require_once 'db.php';
$stmt2=$task->showtasks($_SESSION['name']);
//echo '<ul class="collection with-header">
  //      <li class="collection-header"><h4>Tasks assigned by user</h4></li>';
        while($userrow2=$stmt2->fetch(PDO::FETCH_ASSOC)){

        
     echo   ' <ul><li class="collection-item"><div><b>'.$userrow2['task'].'
          </b></br><span class="title">Assigned to '.$userrow2['student'].' </span>
          <div onclick="delete2('.$userrow2['sno'].')" class="secondary-content">
            <i class="material-icons deep-purple-text">delete</i>
          </div>
          <div onclick="edit('.$userrow2['sno'].')" class="secondary-content">
            <i class="material-icons deep-purple-text">edit</i>
          </div>
          <div onclick="complete('.$userrow2['sno'].')" class="secondary-content">
            <i class="material-icons deep-purple-text">done_all</i>
          </div>
        </div>
      </li></ul>';
      } 

      ?>