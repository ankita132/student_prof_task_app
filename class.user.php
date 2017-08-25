<?php
class USER{
  private $db;

  function __construct($db_con){
    $this->db = $db_con;
  }

  public function register($name,$pass,$desig){
    try{
      $new_pass = password_hash($pass, PASSWORD_DEFAULT);

      $stmt = $this->db->prepare("INSERT INTO student(username,password,designation) VALUES(:name, :pass, :desig)");

      $stmt->bindparam(":name", $name);
      $stmt->bindparam(":pass", $pass);
      $stmt->bindparam(":desig", $desig);
      $stmt->execute();

      return $stmt;
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  public function login($name,$pass,$desig){
    try{
      $stmt = $this->db->prepare("SELECT * FROM student WHERE username=:name AND designation=:desig LIMIT 1");
      $stmt->execute(array(':name'=>$name, ':desig'=>$desig));
      $userrow=$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount() > 0){
        if(password_verify($pass, $userrow['password'])){
          $_SESSION['user_id'] = $userrow['id'];
          return true;
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
      return true;
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
