<?php 
$servername = "db";
$username = "root";
$password = "example";
$db = "todo";

$err_msg = '';

//Checking connection to the data base
try{
  $conn = new PDO("mysql:host=".$servername.";dbname=".$db, $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  //echo "Connected!";
}
catch(PDOException $e){
  echo "Connection failed: ". $e->getMessage();
}


//add task
if(isset($_POST['submit'])){
  if (empty($_POST['task'])) {
    $err_msg = "Please fill in the task you want to track!";
  }
  else{
    $task = $_POST['task'];
    $sql = "INSERT INTO task (todos) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$task]);
    header('location: index.php');
  }
}
?>