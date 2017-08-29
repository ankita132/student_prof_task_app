<?php
class USER{
  private $db;

  function __construct($db_con){
    $this->db = $db_con;
  }

  public function login($name,$pass){
    try{
      $stmt = $this->db->prepare("SELECT * FROM student WHERE username=:name LIMIT 1");
      $stmt->execute(array(':name'=>$name));
      $userrow=$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount() > 0){
        if($pass == $userrow['password']){
          $_SESSION['user_id'] = $userrow['id'];
          $_SESSION['name'] = $userrow['username'];
          $_SESSION['user_desig'] = $userrow['designation'];
          return $userrow['designation'];
        }
        else{
          return false;
        }
      }
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  public function is_loggedin(){
    if(isset($_SESSION['user_id'])){
      return $_SESSION['user_desig'];
    }
  }

  public function redirect($url){
    header("Location: $url");
  }

  public function logout(){
    session_destroy();
    unset($_SESSION['user_id']);
    return true;
  }
}
 ?>
