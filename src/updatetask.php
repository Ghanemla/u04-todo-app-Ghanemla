<?php
ob_start();
require 'includes/header.php';
include('includes/dbconn.php');




// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

// Get the to-do item information
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $stmt = $conn->prepare("SELECT * FROM todo_items WHERE id = :id AND user_id = :user_id");
  $stmt->bindValue(':id', $id);
  $stmt->bindValue(':user_id', $_SESSION['user_id']);
  $stmt->execute();
  $item = $stmt->fetch();
}

// Update the to-do item
if (isset($_POST['update'])) {
  $task = $_POST['task'];
  $description = $_POST['description'];
  $is_done = isset($_POST['is_done']) ? 1 : 0;
  $user_id = $_SESSION['user_id'];

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  $stmt = $conn->prepare("UPDATE todo_items SET task = :task, description = :description, is_done = :is_done WHERE id = :id AND user_id = :user_id");
  $stmt->bindValue(':task', $task);
  $stmt->bindValue(':description', $description);
  $stmt->bindValue(':is_done', $is_done);
  $stmt->bindValue(':id', $id);
  $stmt->bindValue(':user_id', $user_id);
  $stmt->execute();
  header('Location: todo.php');
  exit;
}
?>



<div class="container mx-auto p-4 ">
  <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12 ">
    <form action="" method="post" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2 ">
      <h1 class="font-medium leading-tight text-3xl capitalize  mb-5">Edit To-Do</h1>
      <label for="task" class="font-semibold">Task:</label>
      <input class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" type="text" id="task" name="task" value="<?php echo $item['task']; ?>">
      <br>
      <label for="description" class="font-semibold">Description:</label>
      <textarea id="description" name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"><?php echo $item['description']; ?></textarea>

      <label for="is_done" class="font-semibold">Is done:</label>
      <input class="appearance-none w-9 focus:outline-none checked:bg-sky-600 h-5 bg-gray-400 rounded-full before:inline-block before:rounded-full before:bg-sky-700 before:h-4 before:w-4 checked:before:translate-x-full shadow-inner transition-all duration-300 before:ml-0.5" type="checkbox" id="is_done" name="is_done" <?php echo $item['is_done'] ? "checked" : ""; ?>>

      <input type="submit" name="update" value="Update" class=" mt-5 ml-5 bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">
    </form>
  </div>
</div>

<?php ob_end_flush();
