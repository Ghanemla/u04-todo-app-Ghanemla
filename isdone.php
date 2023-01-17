<?php
include('includes/dbconn.php');

session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}


// Mark the to-do item as done
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $conn->prepare("UPDATE todo_items SET is_done = 1 WHERE id = :id AND user_id = :user_id");
  $stmt->bindValue(':id', $id);
  $stmt->bindValue(':user_id', $_SESSION['user_id']);
  $stmt->execute();
  header('Location: todo.php');
  exit;
}
