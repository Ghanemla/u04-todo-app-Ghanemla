<?php
include('taskhandler.php');

$todo = $conn->query('SELECT * FROM task');
$row = $todo->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>U04-To-Do-list</title>
</head>

<body>
  <div class="container">

    <h1>To-do List2</h1>
    <?php
    if (isset($_GET['update'])) { ?>
      <form action="" method="post">
        <input type="text" name="task" class="todos" placeholder="Add Task1">
        <input type="text" name="description" placeholder="Edit your task description">
        <button type="submit" class="update" name="update">Update</button>
      </form>

    <?php
    } else { ?>
      <form action="" method="post">
        <?php if (isset($err_msg)) { ?>
          <p><?php echo $err_msg; ?></p>
        <?php } ?>
        <input type="text" name="task" class="todos" placeholder="Add Task">
        <input type="text" name="description" class="todos" placeholder="Enter your task description">
        <button type="submit" name="add" value="1" id="add-btn" class="add-btn">Add</button>
      </form>
    <?php
    }
    ?>
    <?php
    $stmt = $conn->query("SELECT * FROM task");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>


      <?php { ?>
        <div class="todo-card">

          <div class="title">To-Do: <?php echo $row['todos'] . "\n"; ?></div>
          <div class="task">Description: <?php echo $row['description'] . "\n"; ?></div>

        <?php
      }
        ?>
        <br>
        <a href="index.php?update=<?php echo $row['id']; ?>"><button class="icons">&#9998;</button></a>
        <a href="index.php?delete=<?php echo $row['id']; ?>"><button class="icons">&#10008;</button></a>

        </div>
  </div>
<?php
    }
?>


</div>
</body>

</html>