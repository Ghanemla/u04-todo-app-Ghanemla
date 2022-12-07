<?php 
$servername = "db";
$username = "root";
$password = "example";
$db = "todo";

//Checking connection to the data base
try{
  $conn = new PDO("mysql:host=".$servername.";dbname=".$db, $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  echo "Connected!";
}
catch(PDOException $e){
  echo "Connection failed: ". $e->getMessage();
}
?>