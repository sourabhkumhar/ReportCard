<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
}

include 'connect.php';
$showError = false;
$showEmpty = false;
$showSuccess = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $password = $_POST['password'];
    $npassword = $_POST['npassword'];
    $cnpassword = $_POST['cnpassword'];

    if (empty($password) || empty($npassword) || empty($cnpassword)) {
        $showEmpty = "Do not Leave Password Empty";
    } else {
        $sql = "SELECT `password` FROM `teachers` WHERE `username` = '" . $_SESSION['username'] . "'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                if ($npassword == $cnpassword) {
                    $hash = password_hash($npassword, PASSWORD_DEFAULT);

                    $passUpdate = "UPDATE `teachers` SET `password` = '$hash' WHERE `username` = '" . $_SESSION['username'] . "'";
                    $resUpdate = mysqli_query($conn, $passUpdate);

                    if ($resUpdate) {
                        $showSuccess = "Password Updated Successfully";
                    } else {
                        $showError = "Something Went Wrong";
                    }
                } else {
                    $showError = "Confirm Password do not Match";
                }
            } else {
                $showError = "Please Enter Old Password correctly";
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

    <title>Setting</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>

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

    if ($showSuccess) {
        echo
        "<div class='success'>
            <!-- <span class='closebtn'>&times;</span> -->
            <strong>Success! </strong>" . $showSuccess . "
        </div>";
    }
    ?>

    <h1 style="text-align: center; margin:10px 0 5px 0; font-size: 50px">Account Setting</h1>

    <div class="login-container" align="center">

        <div class="login-box">
            <form action="setting.php" method="POST">
                <input type="password" name="password" id="inputForm" minlength="5" placeholder="Old Password">
                <input type="password" name="npassword" id="inputForm" minlength="5" placeholder="New Password">
                <input type="password" name="cnpassword" id="inputForm" minlength="5" placeholder="Confirm New Password">
                <button id="login-button" type="submit">Change Password</button>
            </form>
        </div>


    </div>
</body>

</html>