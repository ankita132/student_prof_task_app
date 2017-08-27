<?php
require_once 'db.php';
$stmt2=$task->showtasks($_SESSION['name']);


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
        <li><a href=""><i class="material-icons left">note</i>Tasks Assigned</a></li>
        <li><a href=""><i class="material-icons left">description</i>All Tasks</a></li>
        <li><a href="logout.php?logout=true"><i class="material-icons left">lock_outline</i>Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="row" style="position:relative; left:50%; transform:translateX(-25%);">
      <div class="col s12 m6">
    <h2 class="header" style="text-align:center;">Welcome KKK</h2>
    <div class="card">
      <div class="card-stacked">
        <div class="card-content">
          <ul class="collection with-header">
        <li class="collection-header"><h4>Tasks assigned to user</h4></li>
  <?php
        while($userrow2=$stmt2->fetch(PDO::FETCH_ASSOC)){

          
     echo   '<li class="collection-item"><div><b>'.$userrow2['task'].'
          </b></br><span class="title">Assigned by '.$userrow2['prof'].' </span><a href="#!" class="secondary-content">
            <i class="material-icons deep-purple-text">done_all</i>
          </a>
        </div>
      </li>';
      } ?>
      </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
