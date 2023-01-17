<?php

include('./includes/dbconn.php');

if (isset($_GET['logout'])) {
  session_destroy();
}

header('Location: login.php');
exit;
