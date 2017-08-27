<?php
class TASK{
	private $db;

  function __construct($db_con){
    $this->db = $db_con;
  }

	public function showTasks($name){
	try{
      $stmt = $this->db->prepare("SELECT * FROM task WHERE student=:name");
      $stmt->execute(array(':name'=>$name));
   	  return $stmt;
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
	}
}

?>