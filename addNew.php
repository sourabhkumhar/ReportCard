<?php
include 'connect.php';

session_start();

if($_SESSION['username'] != 'admin') {
    header("location: logout.php");
    exit;
}

$showEmpty = false;
$showError = false;
$showSuccess = false;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $teacher_name = $_POST['teacher_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $teacherMob = $_POST['teacherMob_number'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $teacherOf = $_POST['teacherOf'];

    if (empty($teacher_name) || empty($username) || empty($email) || empty($teacherMob) || empty($password) || empty($cpassword) || empty($teacherOf)) {
        $showEmpty = "Do not leave required fields empty!!";
    }
    else {
        //check whether this username is Exists
        $existUsername = "SELECT * FROM `teachers` WHERE `username` = '$username'";
        $existEmail = "SELECT * FROM `teachers` WHERE `email` = '$email'";

        $resultUsername = mysqli_query($conn, $existUsername);
        $resultEmail = mysqli_query($conn, $existEmail);

        $numExistUsername = mysqli_num_rows($resultUsername);
        $numExistEmail = mysqli_num_rows($resultEmail);

        if($numExistUsername > 0) {
            $showError = "Username Already Exists";
        }
        elseif($numExistEmail > 0) {
            $showError = "E-mail Already Exists";
        }
        else {
            if($password == $cpassword) {
                $hash = password_hash("$password", PASSWORD_DEFAULT);

                $sql = "INSERT INTO `teachers` (`teacher_name`, `username`, `email`, `teacherOf`, `teacherMob_number`, `password`, `dt`) VALUES ('$teacher_name', '$username', '$email', '$teacherOf', '$teacherMob', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);

                if($result) {
                    $showSuccess = "'s data is successfully added. He/She now can Access Their Account";
                }
            }
            else {
                $showError = "Password don't Match";
            }
        }
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
    <link rel="stylesheet" href="Styling/login.css">
    <link rel="stylesheet" href="Styling/alertBox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Report Card Tool</title>
</head>

<body>

    <?php include("partials/_header.php") ?>

    <?php

    if($showError == true) {
        echo 
        "<div class='error'>
            <!-- <span class='closebtn'>&times;</span> -->
            <strong>Error! </strong>" . $showError . "
        </div>";
    }

    if($showEmpty == true) {
        echo 
        "<div class='empty'>
            <!-- <span class='closebtn'>&times;</span> -->
            <strong>Alert! </strong>" . $showEmpty . "
        </div>";
    }

    if($showSuccess == true) {
        echo 
        "<div class='success'>
            <!-- <span class='closebtn'>&times;</span> -->
            <strong>Success! </strong>" . $showSuccess . "
        </div>";
    }
    ?>

    <div class="login-box" align="center">
        <div class="login-container">
            <h1>Add New Teacher</h1>

            <form action="addNew.php" method="POST">
                <input type="text" name="teacher_name" id="inputForm" placeholder="Full Name" maxlength="50" required><br>

                <input type="text" name="username" id="inputForm" placeholder="Username" maxlength="50" required><br>

                <input type="email" name="email" id="inputForm" placeholder="E-mail Address" maxlength="50" required><br>
                
                <input type="tel" name="teacherMob_number" id="inputForm" placeholder="Mobile Number" maxlength="10" minlength="10" required><br>

                <input type="password" name="password" id="inputForm" placeholder="Password" maxlength="255" required><br>

                <input type="password" name="cpassword" id="inputForm" placeholder="Confirm Password" maxlength="255" required><br>

                <select name="teacherOf" id="SelectSubject">
                    <option value="">Select Subject</option>
                    <option value="BCA I yr">BCA I yr</option>
                    <option value="BCA II yr">BCA II yr</option>
                    <option value="BCA III yr">BCA III yr</option>
                </select>


                <button id="login-button"type="submit">Add</button>
            </form>

        </div>
    </div>


</body>

</html>