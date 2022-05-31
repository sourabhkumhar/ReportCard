<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Styling/header.css">
    <link rel="stylesheet" href="Styling/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Student Report Management System</title>
</head>
<body>

    <?php include("partials/_header.php") ?>
 
 
    <h1 style="text-align: center; margin:10px 0 5px 0; font-size: 50px">Dashboard</h1>
    <div class="block" align="center">
        <a class="box" href="insert.php"><div>Insert</div></a>
        <a class="box" href="edit_view.php"><div>Edit/View/Delete</div></a>
        <a class="box" href="search.php"><div>Search</div></a>
        <a class="box setting" href="setting.php"><div>Accont Setting</div></a>
    </div>
</body>
</html>