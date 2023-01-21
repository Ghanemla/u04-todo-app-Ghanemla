<? require 'includes/header.php'; ?>

<?php
include('./includes/dbconn.php');


if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}


$stmt = $conn->prepare("SELECT * FROM todo_items WHERE user_id = :user_id AND is_done = 0 ");
$stmt->bindValue(':user_id', $_SESSION['user_id']);
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php ?>


<div class="container mx-auto mt-20 rounded-lg  bg-[#374151]	max-w-fit p-10	">
  <h1 class="font-medium leading-tight text-3xl uppercase text-white">Welcome procrastinator!</h1>
  <p class="grid-cols-3  text-lg mb-5 text-white">Here you can register personal tasks </p>
  <a type=" button" href="logout.php"><button type="button" class="bg-sky-700  hover:bg-red-700 p-2 rounded-md text-white mb-5 mr-5 capitalize ">Logout</button></a>

  <a href="donetasks.php"><button class="bg-sky-700 hover:bg-white hover:text-black	 p-2 rounded-md text-white mb-5 capitalize ">done tasks</button></a>

  <a href="addtask.php"><button type="submit" name="add" value="1" id="add-btn" class="bg-sky-700 hover:bg-green-700 p-2 rounded-md text-white mb-5 ml-5 capitalize "> Add Task &plus; </button></a>

  <div class="m-auto">

    <div class="relative p-4 w-full bg-white rounded-lg overflow-hidden hover:shadow">
      <table>
        <tr>
          <th>Task</th>
          <th>Actions</th>
        </tr>
        <?php foreach ($tasks as $task) : ?>
          <tr>
            <td class="font-semibold">Task: <?php echo $task['task']; ?></td>
            <td class="p-10 font-semibold">Description: <?php echo $task['description']; ?></td>
            <td>

              <a href=" updatetask.php?id=<?php echo $task['id']; ?>"><button class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-md ml-5">
                  <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="#000" height="24" width="24" viewBox="0 0 24 24">
                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                  </svg>
                </button></a>
              <a href="deletetask.php?id=<?php echo $task['id']; ?>"><button class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md ml-5 mr-5">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" height="24" width="24">
                    <path fill="#000" d="M8.78842 5.03866C8.86656 4.96052 8.97254 4.91663 9.08305 4.91663H11.4164C11.5269 4.91663 11.6329 4.96052 11.711 5.03866C11.7892 5.11681 11.833 5.22279 11.833 5.33329V5.74939H8.66638V5.33329C8.66638 5.22279 8.71028 5.11681 8.78842 5.03866ZM7.16638 5.74939V5.33329C7.16638 4.82496 7.36832 4.33745 7.72776 3.978C8.08721 3.61856 8.57472 3.41663 9.08305 3.41663H11.4164C11.9247 3.41663 12.4122 3.61856 12.7717 3.978C13.1311 4.33745 13.333 4.82496 13.333 5.33329V5.74939H15.5C15.9142 5.74939 16.25 6.08518 16.25 6.49939C16.25 6.9136 15.9142 7.24939 15.5 7.24939H15.0105L14.2492 14.7095C14.2382 15.2023 14.0377 15.6726 13.6883 16.0219C13.3289 16.3814 12.8414 16.5833 12.333 16.5833H8.16638C7.65805 16.5833 7.17054 16.3814 6.81109 16.0219C6.46176 15.6726 6.2612 15.2023 6.25019 14.7095L5.48896 7.24939H5C4.58579 7.24939 4.25 6.9136 4.25 6.49939C4.25 6.08518 4.58579 5.74939 5 5.74939H6.16667H7.16638ZM7.91638 7.24996H12.583H13.5026L12.7536 14.5905C12.751 14.6158 12.7497 14.6412 12.7497 14.6666C12.7497 14.7771 12.7058 14.8831 12.6277 14.9613C12.5495 15.0394 12.4436 15.0833 12.333 15.0833H8.16638C8.05588 15.0833 7.94989 15.0394 7.87175 14.9613C7.79361 14.8831 7.74972 14.7771 7.74972 14.6666C7.74972 14.6412 7.74842 14.6158 7.74584 14.5905L6.99681 7.24996H7.91638Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                  </svg></button></a>
              <a href="isdone.php?id=<?php echo $task['id']; ?>"><button class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" />
                  </svg></button></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
</div>