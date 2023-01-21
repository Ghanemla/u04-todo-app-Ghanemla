<?php
include('.//includes/dbconn.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}


// Get the to-do item information
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $stmt = $conn->prepare("DELETE FROM todo_items WHERE id = :id AND user_id = :user_id");
  $stmt->bindValue(':id', $id);
  $stmt->bindValue(':user_id', $_SESSION['user_id']);
  $stmt->execute();

  header('Location: todo.php');
}
