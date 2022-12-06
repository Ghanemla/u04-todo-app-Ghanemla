<?php
$servername = "db";
$username = "root";
$password = "example";

try {
  $conn = new PDO("mysql:host=$servername;dbname=todo", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully <br>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->query("SELECT * FROM task");
while ($row = $stmt->fetch()) {
    echo $row['name']."<br />\n";
}
?>
