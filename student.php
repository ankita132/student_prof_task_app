<?php
require_once 'db.php';
$stmt2=$task->showtasks($_SESSION['name']);
if(!$user->is_loggedin()){
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
      <a href="#" class="brand-logo">Student Dashboard</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="assigned"><i class="material-icons left">note</i>Tasks Assigned&nbsp;&nbsp;</li>
        <li class="all"><i class="material-icons left">description</i>All Tasks&nbsp;&nbsp;</li>
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
<script>

function show(){
  console.log("A");
  $.ajax({
type:"POST",
url:"showstudent.php",
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

function edit(sno){
$.ajax({
  type:"POST",
  url:"edit.php",
  data:{"sno":sno},
  success:function(){
    alert("edited");
    show();
  }
})
}
</script>
<script src="./js/script.js"></script>
</body>
</html>
