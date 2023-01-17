<? require 'includes/header.php'; ?>
<? include('includes/dbconn.php'); ?>





<div class="container mx-auto mt-5 rounded-lg  bg-[#374151] max-w-fit p-10 flex flex-col items-center ">

  <h1 class="font-medium leading-tight text-3xl capitalize text-white mb-5">Welcome to Tasker!</h1>
  <p class="grid-cols-3  text-lg  text-white ">To use this application please</p>
  <p class="grid-cols-3  text-lg mb-5 text-white ">register a user of login with an existing account</p>
  <a href=" register.php"><button type="submit" value="Register" name="register" class="bg-sky-600  hover:bg-sky-700 p-2 rounded-md text-white  capitalize  mb-5">register</button></a>

  <a href="login.php"><button type="submit" value="Register" name="register" class="bg-sky-600  hover:bg-sky-700 p-2 rounded-md text-white   capitalize text-center	">login</button></a>

</div>