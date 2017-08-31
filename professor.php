<?php
require_once 'db.php';
$pos = $user->is_loggedin();
if($pos==""|| $pos == 'student'){
    $user->redirect('login.php');
  }
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];

?>
<!doctype html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="./css/login.css">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Compiled and minified JavaScript -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
  <nav>
    <div class="nav-wrapper deep-purple">
      <a href="#" class="brand-logo">Professor Dashboard</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="assigned"><i class="material-icons left">note</i>Tasks Assigned&nbsp;&nbsp;</li>
        <li class="all"><i class="material-icons left">description</i>All Tasks&nbsp;&nbsp;</li>
        <li class="give"><i class="material-icons left">note_add</i>Assign Tasks&nbsp;&nbsp;</li>
        <li><a href="logout.php"><i class="material-icons left">lock_outline</i>Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="row" style="position:relative; left:50%; transform:translateX(-25%);">
      <div class="col s12 m6">
    <h2 class="header" style="text-align:center;">Welcome <?php echo $user_name; ?></h2>
    <div class="card">
      <div class="card-stacked">
        <div class="card-content">

        </div>
      </div>
    </div>
  </div>
</div>
<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p id="tasksno" style="display: none;"></p>
      <input type="text" id="edittask">
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Update</a>
    </div>
  </div>
<script>
function show(){
 // console.log("A");
  $.ajax({
type:"POST",
url:"show.php",
data:{"called":"true"},
dataType:'html',
success:function(response){
   $(".card-content").html(response);
}
  });
}
show();

function complete(sno){
$.ajax({
type:"POST",
url:"complete.php",
data:{"sno":sno},
success:function(){
alert("completed");
show();
}
});
}
function delete2(sno){
 $.ajax({
type:"POST",
url:"delete.php",
data:{"sno":sno},
success:function(){
alert("Deleted");
show();
}
});
}

$(".modal").modal({
  complete:function(){
   
    $.ajax({
type:"POST",
url:"edit.php",
data:{"sno":$("#tasksno").text(),"task":$("#edittask").val()},
success:function(){
   //console.log("Hi");
show();
}
});
}
});

function edit(sno){
  $("#modal1").modal('open');
  task=$("#task"+sno).text();
  $("#tasksno").text(sno);
  $("#edittask").val(task.trim());

}
$('.give').click(function(){
  $.ajax({
    type:"POST",
    url:"list.php",
    data:{"called":"true"},
    dataType:"html",
    success:function(response){
      $(".card-content").html(response);
      
    }
  });

});


function assign(){
  var chk=[];
  $(".chk:checked").each(function(){
    chk.push($(this).val());
  });
  console.log(chk);
  $.ajax({
    type:"POST",
    url:"show.php",
    data:{"task":$("#assigntask").val(),"students":chk},
    dataType:"html",
    success:function(response){
      //alert("Assigned");
     // $("#assigntask").val(response);
    }
  })
}

</script>
<script src="./js/scriptprof.js"></script>
</body>
</html>
