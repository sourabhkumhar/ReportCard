<?php 
session_start();
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
<<<<<<< Updated upstream
    <title>Report Card - Bhupal Nobles University</title>
=======
    <title>Report Card - BN College</title>
>>>>>>> Stashed changes
</head>
<body>
    <?php include 'partials/_header.php'; ?>

    <?php
    if (isset($_GET['action'])) {

        echo
        "<div class='error'>
            <!-- <span class='closebtn'>&times;</span> -->
            <strong>Error! </strong> Invalid Enrollment Number or Class - ".$_GET['action']."
        </div>";
    }
    ?>

    <div class="login-container" align="center">

        <div class="login-box">
            <form action="ReportCard.php" method="GET">
                <input type="text" name="stu_enrollNo" id="inputForm" placeholder="Enter Enrollment Number" required>

                <select name="stu_class" id="SelectSubject" required>
                    <option value="">Select Your Class</option>
                    <option value="BCA I yr">BCA I</option>
                    <option value="BCA II yr">BCA II</option>
                    <option value="BCA III yr">BCA III</option>
                </select>
                <button id="login-button" type="submit">Get Result</button><br>
            </form>
            <sub><a class="link" href="login.php">Login if you are teacher</a></sub>
        </div>


    </div>
</body>
</html>