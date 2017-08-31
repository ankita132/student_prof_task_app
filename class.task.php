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
	public function showalltasks(){
		try{
	      $stmt = $this->db->prepare("SELECT * FROM task");
	      $stmt->execute();
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
public function edit($sno,$task){
	try{
		  $stmt = $this->db->prepare("UPDATE task SET task=:task WHERE sno=:sno");
      $stmt->bindParam(':task',$task);
      $stmt->bindParam(':sno',$sno);
      $stmt->execute();
	}
  catch(PDOException $e){
      echo $e->getMessage();
    }
}

public function liststudents(){
  try{
    $stmt=$this->db->prepare("SELECT * FROM student 
      WHERE designation='student' AND 
      username NOT IN (SELECT student FROM task)");
    $stmt->execute();
    return $stmt;
  }
   catch(PDOException $e){
      echo $e->getMessage();
    }
}

public function liststudents2(){
  try{
    $stmt=$this->db->prepare("SELECT * FROM task
      WHERE status='Completed' AND 
      sno IN (SELECT max(sno) FROM task GROUP BY student)");
    $stmt->execute();
    return $stmt;
  }
   catch(PDOException $e){
      echo $e->getMessage();
    }
}

public function assign($students,$task){
  try{
    //for($i=0;$i<sizeof($students);$i++){
    foreach($students as $student){
       $stmt=$this->db->prepare("INSERT INTO task(prof,student,task) VALUES(:prof,:name,:task)");
      
      $stmt->bindParam(":prof",$_SESSION['name']);
      $stmt->bindParam(":name",$student);
      $stmt->bindParam(":task",$task);
       $stmt->execute();
    }
    return $students;
  }
  catch(PDOException $e){
      echo $e->getMessage();
    }
}

}

?>
