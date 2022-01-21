<?php

include 'connect.php';

$showEmpty = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $showEmpty = "Do Not Leave Required fields Empty";
    }

    $sql = "SELECT * FROM `teachers` WHERE `username`='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['teacherOf'] = $row['teacherOf'];
                header("location: dashboard.php");
            } else {
                $showError = "Incorrect Password. Enter password again correctly or check your Username again";
            }
        }
    } else {
        $showError = "No Username Available. Please check again";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Styling/header.css">
    <link rel="stylesheet" href="Styling/style.css">
    <link rel="stylesheet" href="Styling/login.css">
    <link rel="stylesheet" href="Styling/alertBox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Report Card Tool</title>
</head>

<body>

    <?php session_start(); include("partials/_header.php"); ?>

    <?php

    if ($showError) {
        echo
        "<div class='error'>
            <!-- <span class='closebtn'>&times;</span> -->
            <strong>Error! </strong>" . $showError . "
        </div>";
    }

    if ($showEmpty) {
        echo
        "<div class='empty'>
            <!-- <span class='closebtn'>&times;</span> -->
            <strong>Alert! </strong>" . $showEmpty . "
        </div>";
    }

    ?>

    <div class="login-box" align="center">
        <div class="login-container">
            <h1>Login</h1>

            <form action="login.php" method="POST">
                <input type="text" name="username" id="inputForm" placeholder="Username"><br>
                <input type="password" name="password" id="inputForm" placeholder="Password"><br>
                <button id="login-button" type="submit">Login</button>
            </form>
            <sub><a class="link" href="index.php">Visit Home page if you are student</a></sub>
        </div>
    </div>
</body>

</html>