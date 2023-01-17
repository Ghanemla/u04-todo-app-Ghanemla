<?php
ob_start();
require 'includes/header.php';
include('includes/dbconn.php');


if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

// Retrieve the completed to-do items
$stmt = $conn->prepare("SELECT * FROM todo_items WHERE user_id = :user_id AND is_done = 1");
$stmt->bindValue(':user_id', $_SESSION['user_id']);
$stmt->execute();
$completed_items = $stmt->fetchAll();

// Display the completed to-do items
foreach ($completed_items as $item) {
  echo '<p class="  mt-5 mb-5 block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">Task: ' . $item['task'] . '</p>';
  echo '<p class=" mb-5 block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >Description: ' . $item['description'] . '</p>';
  // echo '<hr>';
}

?>
<a href="todo.php" class="bg-sky-600  hover:bg-sky-700 p-2 rounded-lg text-white  capitalize  mt-5 ml-5 px-10"><button>
    back</button></a>

<?php ob_end_flush();
