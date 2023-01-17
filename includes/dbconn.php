<?php

$servername = "db";
$dbusername = "root";
$dbpassword = "example";
$db = "todoapp";

try {
  $conn = new PDO('mysql:host=' . $servername . ';dbname=' . $db, $dbusername, $dbpassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  // echo "cum cum";
} catch (PDOException $e) {
  echo "connection Failed!" . "<br>" . $e->getMessage();
}
