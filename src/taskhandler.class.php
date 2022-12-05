
<?php 
class Taskhandler{
  private $servername = "db";
  private $username = "root";
  private $password = "example";
  private $db = "todo";
  private $conn;

  
  // connect to the database
  function __construct()
  {
    /* $this->conn = new PDO("mysql:host".$this->servername.";dbname=".$this->db,$this->username,$this->password); */
    $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db,$this->username,$this->password);
  }

  //get te task from database
  function getTask($id = "")
  {
    if (id == "")
    {
      $stmt = $this->conn->query("SELECT * FROM task");
      $row = $stmt ->fetchAll();
      return $row;
    }
    else
    {
      $stmt = $this->conn->prepare("SELECT * FROM task WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $row->$stmt->fetchAll();
      return $row;
    }
  }
  
  //update the task
  function updateTask($id, $title)
  {
    if($id == "")
    {
      echo "No ID was given please try again!<br>";
      return false;
    }
    
    $stmt = $this->conn->prepare("UPDATE task SET title = :title WHERE id = :id");
    $stmt = bindParam(':id', $id);
    $stmt = bindParam(':title', $title);
    if($stmt->execute())
    {
      echo "Task Uppdated!<br>";
    }
    else
    {
      echo "Something Went Wrong! please try again<br>";
    }
  }

  //create a task
  function createTask($title)
  {
    if($title == "")
    {
      echo "Please add a task!<br>";
      return false;
    }

    $stmt = $this->conn->prepare("INSERT INTO task (title) VALUES (:title)");
    $stmt = bindParam(':title', $title);

    if ($stmt->execute())
    {
      echo "The task".$title."has been added!";
    }
    else
    {
      echo "OBS! Something Went wrong Please contact authorized personnel!<br>";
    }
  }

  //Delete a task
  function deleteTask($id)
  {
    if ($id == "")
    {
      echo "No ID was given, please try again!<br>";
      return false;
    }
    else
    {
      $stmt = $this->conn->prepare("DELETE FROM task WHERE id =:id");
      $stmt->bindParam(':id', $id);
      if($stmt->execute())
      {
        echo "The task has been deleted!<br>";
      }
      else
      {
        echo "OBS! Something Went wrong Please contact authorized personnel!<br>";
      }
    }
  }

}
//CREATE TABLE task(id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, title TEXT);
?>