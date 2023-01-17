<? ob_start();
require 'includes/header.php';
include('includes/dbconn.php');




if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  if (empty($username) || empty($password)) {
    echo '<div class="class="flex h-[calc(100vh-80px)] items-center justify-center p-5  w-full">
    <div class="text-center">
    <div class="inline-flex rounded-full bg-yellow-100 p-4 mt-5">
      <div class="rounded-full stroke-yellow-600 bg-yellow-200 p-4">
        <svg class="w-16 h-16" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.0002 9.33337V14M14.0002 18.6667H14.0118M25.6668 14C25.6668 20.4434 20.4435 25.6667 14.0002 25.6667C7.55684 25.6667 2.3335 20.4434 2.3335 14C2.3335 7.55672 7.55684 2.33337 14.0002 2.33337C20.4435 2.33337 25.6668 7.55672 25.6668 14Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
      </div>
    </div>
    <h1 class="mt-5 text-[30px] font-bold text-white lg:text-[50px]"> 403 - Forbidden</h1>
    <h1 class="mt-5 text-[30px] font-bold text-white lg:text-[30px]"> Please enter a valid username and password</h1>
    <p class="text-white mt-5 lg:text-lg mb-5 font-semibold">Please Login or Register a user to continue.</p>
    <a href="register.php"><button type="submit" value="Register" name="register" class="bg-sky-600  hover:bg-sky-700 p-2 rounded-md text-white  capitalize  mb-5">register</button></a>
    <a href="login.php"><button type="submit" value="Register" name="register" class="bg-sky-600  hover:bg-sky-700 p-2 rounded-md text-white  capitalize  mb-5">login</button></a>
  </div>
  </div>';
    exit;
  }
  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
  $stmt->bindValue(':username', $username);
  $stmt->bindValue(':password', $password_hash);
  $stmt->execute();
  header('location: ./index.php');
}


?>

<div class="container mx-auto p-4 ">
  <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
    <h1 class="text-lg font-bold text-white">Register</h1>
    <form action="" method="post" class="flex flex-col mt-4">
      <label for="username" class="text-white">Username:</label>
      <input type="text" id="username" name="username" class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
      <label for="password" class="text-white">Password:</label>
      <input type="password" id="password" name="password" class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
      <input type="submit" value="Register" name="register" class="bg-sky-600  hover:bg-sky-700 p-2 rounded-md text-white  capitalize  mt-5">
    </form>
    <a href="login.php"><button type="submit" name="add" value="1" id="add-btn" class="bg-sky-600  hover:bg-sky-700 p-2 rounded-md text-white  capitalize  mt-5"> login</button></a>
    <a href="index.php"><button type="submit" name="add" value="1" id="add-btn" class="bg-sky-600  hover:bg-sky-700 p-2 rounded-md text-white  capitalize  ml-5"> Start</button></a>
  </div>
</div>


<?php ob_end_flush();
