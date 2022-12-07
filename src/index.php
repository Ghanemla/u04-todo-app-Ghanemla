<?php 
include ('taskhandler.php');

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>U04-To-Do-list</title>
</head>
<body>
  <div class="container">
     <h1>To-Do-List</h1>
  <form action="index.php" method="POST" class="input-form">
    <?php if (isset($err_msg)) { ?>
	    <p><?php echo $err_msg; ?></p>
    <?php } ?>
    <input type="text" name="task" class="todos" placeholder="Add Task">
    <button type="submit" name="submit" value="1" id="add-btn" class="add-btn"> Add &#x2b;</button>
  </form>
  </div>
</body>
</html>