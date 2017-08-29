<?php
    require_once 'db.php';
$stmt2=$task->showtasks($_SESSION['name']);
?>
<ul class="collection with-header">
       <li class="collection-header"><h4>Tasks assigned by user</h4></li>
       <?php
        while($userrow2=$stmt2->fetch(PDO::FETCH_ASSOC)){
          if($userrow2['status']=='Completed'){
            echo  '<li class="collection-item" style="background-color:#B3ADD9;"><div class="text"><b>'.$userrow2['task'].'
                 </b></br><span class="title">Assigned to '.$userrow2['student'].' </span>
                 <div onclick="delete2('.$userrow2['sno'].')" class="secondary-content">
                   <i class="material-icons deep-purple-text">delete</i>
                 </div>
               </div>
             </li>';
          }
          else{
     echo  '<li class="collection-item"><div class="text"><b>'.$userrow2['task'].'
          </b></br><span class="title">Assigned to '.$userrow2['student'].' </span>
          <div onclick="delete2('.$userrow2['sno'].')" class="secondary-content">
            <i class="material-icons deep-purple-text">delete</i>
          </div>
          <div id="list'.$userrow2['sno'].'" onclick="edit('.$userrow2['sno'].')" class="secondary-content">
          <i class="material-icons deep-purple-text">edit</i>
          </div>
          <div onclick="complete('.$userrow2['sno'].')" class="secondary-content completed">
            <i class="material-icons deep-purple-text">done_all</i>
          </div>
        </div>
      </li>';
      }
    }
      ?>
</ul>
<script src="./js/scriptprof.js"></script>
