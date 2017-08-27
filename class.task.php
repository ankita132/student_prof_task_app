<?php
class TASK{
	private $db;

  function __construct($db_con){
    $this->db = $db_con;
  }

	public function showTasks($name){
	try{
      $stmt = $this->db->prepare("SELECT * FROM task WHERE student=:name OR prof=:name");
      $stmt->execute(array(':name'=>$name));
   	  return $stmt;
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
	}
  public function complete($sno){
    try{
      $stmt = $this->db->prepare("UPDATE task SET status= 'Completed' WHERE sno=:sno");
      $stmt->bindParam(':sno',$sno);
      $stmt->execute();
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
  }
  public function delete($sno){
    try{
      $stmt = $this->db->prepare("DELETE FROM task WHERE sno=:sno");
      $stmt->bindParam(':sno',$sno);
      $stmt->execute();
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
  }
//public function edit($sno){
	//try{
		  //$stmt = $this->db->prepare("UPDATE task SET task WHERE sno=:sno");
	//}
//}
}

?>
