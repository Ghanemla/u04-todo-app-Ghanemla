<?php
ob_start();
require 'includes/header.php';
include('includes/dbconn.php');





if (isset($_POST['add'])) {
  $stmt = $conn->prepare("INSERT INTO todo_items (user_id, task, is_done, description) VALUES (:user_id, :task, :is_done, :description)");
  $stmt->bindValue(':user_id', $_SESSION['user_id']);
  $stmt->bindValue(':task', $_POST['task']);
  $stmt->bindValue(':description', $_POST['description']);
  $stmt->bindValue(':is_done', 0);
  $stmt->execute();
  header('location: todo.php');
}
?>

<div class="container mx-auto mt-20 rounded-lg  bg-[#374151]	max-w-fit p-10	">
  <h1 class="font-medium leading-tight text-2xl capitalize text-white  mb-5">Please add your task and/or Your description below</h1>
  <div class="m-auto">

    <div class="relative p-4 w-full bg-white rounded-lg overflow-hidden hover:shadow">
      <form action="addtask.php" method="post" class="p-5">
        <input type="text" name="task" class=" mb-5 px-4 py-3 w-full rounded-md bg-gray-300 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm" placeholder="Add Task">
        <input type="text" name="description" class="mb-5 px-4 py-3 w-full rounded-md bg-gray-300 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm" placeholder="Enter your task description">
        <button type="submit" name="add" value="1" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md"> Add Task &plus; </button>
      </form>
    </div>
  </div>
</div>
</div>



<!-- <form action=" addtask.php" method="post">
  <input type="text" name="task" class="todos" placeholder="Add Task">
  <input type="text" name="description" class="todos" placeholder="Enter your task description">
  <button type="submit" name="add" value="1"> Add Task &plus; </button>
</form> -->

<?php ob_end_flush();
