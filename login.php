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
  <div class="banner">
		</div>
    <div class="row">
    <div class="col s12 m5">
      <div class="card-panel">
        <span class="card-title">Student Professor Task App</span>
      </br>
        <div class="row">
   <form class="col s12" method="post">
     <div class="row">
       <div class="input-field col s12">
         <input id="name" type="text" class="validate">
         <label for="name">Username</label>
       </div>
     </div>
     <div class="row">
       <div class="input-field col s12">
         <input id="password" type="password" class="validate">
         <label for="password">Password</label>
       </div>
     </div>
     <p>
         <input name="group1" type="radio" id="student" value="student"/>
         <label for="student">Student</label>
       </p>
       <p>
         <input name="group1" type="radio" id="professor" value="professor"/>
         <label for="professor">Professor</label>
       </p>
     </br>
       <button class="btn waves-effect waves-light deep-purple" type="submit" name="action">Submit
   <i class="material-icons right">send</i>
      </button>
   </form>
 </div>
      </div>
    </div>
  </div>
</body>
</html>
