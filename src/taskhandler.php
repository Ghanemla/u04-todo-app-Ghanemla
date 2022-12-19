<?php
$servername = "db";
$username = "root";
$password = "example";
$db = "todo";

$err_msg = '';

//Checking connection to the data base
try {
  $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $db, $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  //echo "Connected!";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


//add task
if (isset($_POST['add'])) {
  if (empty($_POST['task'])) {
    $err_msg = "Please fill in the task you want to track!";
  } else {
    $task = $_POST['task'];
    $desc = $_POST['description'];
    $sql = "INSERT INTO task ( todos , description ) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$task, $desc]);
    header('location: ./index.php');
  }
}




// Delete task
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $stmt = $conn->prepare("DELETE FROM task WHERE id = :id");
  $stmt->bindValue('id', $id);
  $stmt->execute();

  header("Location: ./index.php");
}


//Edit task
if (isset($_POST['update'])) {
  $id = $_GET['update'];
  $updateTodo = $_POST['task'];
  $updateDesc = $_POST['description'];
  $stmt = $conn->prepare('UPDATE task SET todos = :todos , description = :description WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':todos', $updateTodo);
  $stmt->bindParam(':description', $updateDesc);
  $stmt->execute();
  if (headers_sent()) {
    die("Redirection Failed!");
  } else {
    exit(header("Location: ./index.php"));
  }
}
