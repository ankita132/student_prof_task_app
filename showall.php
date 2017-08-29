<?php
    require_once 'db.php';
$stmt2=$task->showalltasks();
?>
<ul class="collection with-header">
       <li class="collection-header"><h4>All Tasks assigned</h4></li>
       <?php
        while($userrow3=$stmt2->fetch(PDO::FETCH_ASSOC)){
          if($userrow3['status']=='Completed'){
            echo  '<li class="collection-item" style="background-color:#B3ADD9;"><div class="text"><b>'.$userrow3['task'].'
                 </b></br><span class="title">Assigned by <b>'.$userrow3['prof'].'</b> to <b>'.$userrow3['student'].'</b> </span>
               </div>
             </li>';
          }
          else{
     echo  '<li class="collection-item"><div class="text"><b>'.$userrow3['task'].'
          </b></br><span class="title">Assigned by <b>'.$userrow3['prof'].'</b> to <b>'.$userrow3['student'].'</b> </span>
        </div>
      </li>';
    }
      }
      ?>
</ul>
