<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

include('connect.php');

$showEmpty = false;
$showError = false;
$showSuccess = false;

?>


<?php
if (isset($_REQUEST['submit']) && !empty($_REQUEST['stu_enrollNo'])) {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Student Data
        $stu_name = $_POST['stu_name'];
        $stu_enrollNo = $_POST['stu_enrollNo'];
        $stu_rollNo = $_POST['stu_rollNo'];
        $stu_class = $_SESSION['teacherOf'];
        $stu_faName = $_POST['stu_fa'];
        $stu_moName = $_POST['stu_mo'];
        $stu_sess = $_POST['stu_sess'];
        $stu_mobileNo = $_POST['stu_mobileNo'];

        if (empty($stu_name) || empty($stu_enrollNo) || empty($stu_enrollNo) || empty($stu_sess) || empty($stu_mobileNo) || empty($stu_faName) || empty($stu_moName)) {
            $showEmpty = "Do not leave required fields empty";
        } else {
            // Result Data
            if ($_SESSION['teacherOf'] == "BCA I yr") {

                $ExistEnroll = "SELECT `stu_enrollNo` FROM `bca_1yr` WHERE `stu_enrollNo` = '$stu_enrollNo'";
                $ExistRoll = "SELECT `stu_rollNo` FROM `bca_1yr` WHERE `stu_rollNo` = '$stu_rollNo'";

                $resultEnroll = mysqli_query($conn, $ExistEnroll);
                $resultRoll = mysqli_query($conn, $ExistRoll);

                $numEnroll = mysqli_num_rows($resultEnroll);
                $numRoll = mysqli_num_rows($resultRoll);

                if ($numEnroll == 0) {
                    $showError = "Student Data is not available for $stu_enrollNo";
                } elseif ($numRoll == 0) {
                    $showError = "Student Data is not available for $stu_rollNo";
                } else {
                    //Mid-term Marks
                    $Mid_BCA111 = $_POST['Mid_BCA111'];
                    $Mid_BCA112 = $_POST['Mid_BCA112'];
                    $Mid_BCA113 = $_POST['Mid_BCA113'];
                    $Mid_BCA114 = $_POST['Mid_BCA114'];
                    $Mid_BCA115 = $_POST['Mid_BCA115'];
                    $Mid_BCA116 = $_POST['Mid_BCA116'];

                    //Annual Marks
                    $Ann_BCA111 = $_POST['Ann_BCA111'];
                    $Ann_BCA112 = $_POST['Ann_BCA112'];
                    $Ann_BCA113 = $_POST['Ann_BCA113'];
                    $Ann_BCA114 = $_POST['Ann_BCA114'];
                    $Ann_BCA115 = $_POST['Ann_BCA115'];
                    $Ann_BCA116 = $_POST['Ann_BCA116'];

                    $Mid_Total = $Mid_BCA111 + $Mid_BCA112 + $Mid_BCA113 + $Mid_BCA114 + $Mid_BCA115 + $Mid_BCA116;
                    $Ann_Total = $Ann_BCA111 + $Ann_BCA112 + $Ann_BCA113 + $Ann_BCA114 + $Ann_BCA115 + $Ann_BCA116;

                    $Mid_Perc = ($Mid_Total / 180) * 100;
                    $Ann_Perc = ($Ann_Total / 420) * 100;
                    $Overall_Perc = (($Mid_Perc + $Ann_Perc) / 200) * 100;

                    if ($Overall_Perc < 35) {
                        $FinalResult = "FAIL";
                    } elseif ($Overall_Perc >= 35 && $Overall_Perc <= 40) {
                        $FinalResult = "PROMOTE";
                    } elseif ($Overall_Perc > 40) {
                        $FinalResult = "PASS";
                    } else {
                        $FinalResult = "ABSENT";
                    }

                    $sql = "UPDATE `bca_1yr`
                    SET `stu_name` = '$stu_name',
                        `stu_class` = '$stu_class',
                        `stu_faName` = '$stu_faName',
                        `stu_moName` = '$stu_moName',
                        `stu_sess` = '$stu_sess',
                        `stu_mobileNo` = '$stu_mobileNo',

                        `Mid_BCA111` = '$Mid_BCA111',
                        `Mid_BCA112` = '$Mid_BCA112',
                        `Mid_BCA113` = '$Mid_BCA113',
                        `Mid_BCA114` = '$Mid_BCA114',
                        `Mid_BCA115` = '$Mid_BCA115',
                        `Mid_BCA116` = '$Mid_BCA116',

                        `Ann_BCA111` = '$Ann_BCA111',
                        `Ann_BCA112` = '$Ann_BCA112',
                        `Ann_BCA113` = '$Ann_BCA113',
                        `Ann_BCA114` = '$Ann_BCA114',
                        `Ann_BCA115` = '$Ann_BCA115',
                        `Ann_BCA116` = '$Ann_BCA116',

                        `Mid_Total` = '$Mid_Total',
                        `Ann_Total` = '$Ann_Total',

                        `Mid_Perc` = '$Mid_Perc',
                        `Ann_Perc` = '$Ann_Perc',
                        `Overall_Perc` = '$Overall_Perc',
                        `Result` = '$FinalResult',
                        `dt` = 'current_timestamp()'
                    
                    WHERE `stu_enrollNo` = '$stu_enrollNo'";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $showSuccess = "Data is Successfully Updated";
                        header("location: edit_view.php?action= $stu_enrollNo");
                    } else {
                        $showError = "Something went wrong";
                    }
                }
            } elseif ($_SESSION['teacherOf'] == "BCA II yr") {

                $ExistEnroll = "SELECT `stu_enrollNo` FROM `bca_2yr` WHERE `stu_enrollNo` = '$stu_enrollNo'";
                $ExistRoll = "SELECT `stu_rollNo` FROM `bca_2yr` WHERE `stu_rollNo` = '$stu_rollNo'";

                $resultEnroll = mysqli_query($conn, $ExistEnroll);
                $resultRoll = mysqli_query($conn, $ExistRoll);

                $numEnroll = mysqli_num_rows($resultEnroll);
                $numRoll = mysqli_num_rows($resultRoll);

                if ($numEnroll == 0) {
                    $showError = "Student Data is not available for $stu_enrollNo";
                } elseif ($numRoll == 0) {
                    $showError = "Student Data is not available for $stu_rollNo";
                } else {
                    //Mid-term Marks
                    $Mid_BCA221 = $_POST['Mid_BCA221'];
                    $Mid_BCA222 = $_POST['Mid_BCA222'];
                    $Mid_BCA223 = $_POST['Mid_BCA223'];
                    $Mid_BCA224 = $_POST['Mid_BCA224'];
                    $Mid_BCA225 = $_POST['Mid_BCA225'];
                    $Mid_BCA226 = $_POST['Mid_BCA226'];

                    //Annual Marks
                    $Ann_BCA221 = $_POST['Ann_BCA221'];
                    $Ann_BCA222 = $_POST['Ann_BCA222'];
                    $Ann_BCA223 = $_POST['Ann_BCA223'];
                    $Ann_BCA224 = $_POST['Ann_BCA224'];
                    $Ann_BCA225 = $_POST['Ann_BCA225'];
                    $Ann_BCA226 = $_POST['Ann_BCA226'];

                    $Mid_Total = $Mid_BCA221 + $Mid_BCA222 + $Mid_BCA223 + $Mid_BCA224 + $Mid_BCA225 + $Mid_BCA226;
                    $Ann_Total = $Ann_BCA221 + $Ann_BCA222 + $Ann_BCA223 + $Ann_BCA224 + $Ann_BCA225 + $Ann_BCA226;

                    $Mid_Perc = ($Mid_Total / 180) * 100;
                    $Ann_Perc = ($Ann_Total / 420) * 100;
                    $Overall_Perc = (($Mid_Perc + $Ann_Perc) / 200) * 100;

                    if ($Overall_Perc < 35) {
                        $FinalResult = "FAIL";
                    } elseif ($Overall_Perc >= 35 && $Overall_Perc <= 40) {
                        $FinalResult = "PROMOTE";
                    } elseif ($Overall_Perc > 40) {
                        $FinalResult = "PASS";
                    } else {
                        $FinalResult = "ABSENT";
                    }

                    $sql = "UPDATE `bca_2yr`
                    SET `stu_name` = '$stu_name',
                        `stu_class` = '$stu_class',
                        `stu_faName` = '$stu_faName',
                        `stu_moName` = '$stu_moName',
                        `stu_sess` = '$stu_sess',
                        `stu_mobileNo` = '$stu_mobileNo',

                        `Mid_BCA221` = '$Mid_BCA221',
                        `Mid_BCA222` = '$Mid_BCA222',
                        `Mid_BCA223` = '$Mid_BCA223',
                        `Mid_BCA224` = '$Mid_BCA224',
                        `Mid_BCA225` = '$Mid_BCA225',
                        `Mid_BCA226` = '$Mid_BCA226',

                        `Ann_BCA221` = '$Ann_BCA221',
                        `Ann_BCA222` = '$Ann_BCA222',
                        `Ann_BCA223` = '$Ann_BCA223',
                        `Ann_BCA224` = '$Ann_BCA224',
                        `Ann_BCA225` = '$Ann_BCA225',
                        `Ann_BCA226` = '$Ann_BCA226',

                        `Mid_Total` = '$Mid_Total',
                        `Ann_Total` = '$Ann_Total',

                        `Mid_Perc` = '$Mid_Perc',
                        `Ann_Perc` = '$Ann_Perc',
                        `Overall_Perc` = '$Overall_Perc',
                        `Result` = '$FinalResult',
                        `dt` = 'current_timestamp()'
                    
                    WHERE `stu_enrollNo` = '$stu_enrollNo'";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $showSuccess = "Data is Successfully Updated";
                        header("location: edit_view.php?action= $stu_enrollNo");
                    } else {
                        $showError = "Not Update";
                    }
                }
            } elseif ($_SESSION['teacherOf'] == "BCA III yr") {

                $ExistEnroll = "SELECT `stu_enrollNo` FROM `bca_3yr` WHERE `stu_enrollNo` = '$stu_enrollNo'";
                $ExistRoll = "SELECT `stu_rollNo` FROM `bca_3yr` WHERE `stu_rollNo` = '$stu_rollNo'";

                $resultEnroll = mysqli_query($conn, $ExistEnroll);
                $resultRoll = mysqli_query($conn, $ExistRoll);

                $numEnroll = mysqli_num_rows($resultEnroll);
                $numRoll = mysqli_num_rows($resultRoll);

                if ($numEnroll == 0) {
                    $showError = "Student Data is not available for $stu_enrollNo";
                } elseif ($numRoll == 0) {
                    $showError = "Student Data is not available for $stu_rollNo";
                } else {
                    //Mid-term Marks
                    $Mid_BCA331 = $_POST['Mid_BCA331'];
                    $Mid_BCA332 = $_POST['Mid_BCA332'];
                    $Mid_BCA333 = $_POST['Mid_BCA333'];
                    $Mid_BCA334 = $_POST['Mid_BCA334'];
                    $Mid_BCA335 = $_POST['Mid_BCA335'];

                    //Annual Marks
                    $Ann_BCA331 = $_POST['Ann_BCA331'];
                    $Ann_BCA332 = $_POST['Ann_BCA332'];
                    $Ann_BCA333 = $_POST['Ann_BCA333'];
                    $Ann_BCA334 = $_POST['Ann_BCA334'];
                    $Ann_BCA335 = $_POST['Ann_BCA335'];

                    $Mid_Total = $Mid_BCA331 + $Mid_BCA332 + $Mid_BCA333 + $Mid_BCA334 + $Mid_BCA335;
                    $Ann_Total = $Ann_BCA331 + $Ann_BCA332 + $Ann_BCA333 + $Ann_BCA334 + $Ann_BCA335;

                    $Mid_Perc = ($Mid_Total / 150) * 100;
                    $Ann_Perc = ($Ann_Total / 350) * 100;
                    $Overall_Perc = (($Mid_Perc + $Ann_Perc) / 200) * 100;

                    if ($Overall_Perc < 35) {
                        $FinalResult = "FAIL";
                    } elseif ($Overall_Perc >= 35 && $Overall_Perc <= 40) {
                        $FinalResult = "PROMOTE";
                    } elseif ($Overall_Perc > 40) {
                        $FinalResult = "PASS";
                    } else {
                        $FinalResult = "ABSENT";
                    }

                    $sql = "UPDATE `bca_3yr`
                    SET `stu_name` = '$stu_name',
                        `stu_class` = '$stu_class',
                        `stu_faName` = '$stu_faName',
                        `stu_moName` = '$stu_moName',
                        `stu_sess` = '$stu_sess',
                        `stu_mobileNo` = '$stu_mobileNo',

                        `Mid_BCA331` = '$Mid_BCA331',
                        `Mid_BCA332` = '$Mid_BCA332',
                        `Mid_BCA333` = '$Mid_BCA333',
                        `Mid_BCA334` = '$Mid_BCA334',
                        `Mid_BCA335` = '$Mid_BCA335',

                        `Ann_BCA331` = '$Ann_BCA331',
                        `Ann_BCA332` = '$Ann_BCA332',
                        `Ann_BCA333` = '$Ann_BCA333',
                        `Ann_BCA334` = '$Ann_BCA334',
                        `Ann_BCA335` = '$Ann_BCA335',

                        `Mid_Total` = '$Mid_Total',
                        `Ann_Total` = '$Ann_Total',

                        `Mid_Perc` = '$Mid_Perc',
                        `Ann_Perc` = '$Ann_Perc',
                        `Overall_Perc` = '$Overall_Perc',
                        `Result` = '$FinalResult',
                        `dt` = 'current_timestamp()'
                    
                    WHERE `stu_enrollNo` = '$stu_enrollNo'";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $showSuccess = "Data is Successfully Updated";
                        header("location: edit_view.php?action= $stu_enrollNo");
                    } else {
                        $showError = "Something went wrong";
                    }
                }
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
    <link rel="stylesheet" href="Styling/header.css">
    <link rel="stylesheet" href="Styling/form.css">
    <link rel="stylesheet" href="Styling/alertBox.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Edit</title>
</head>

<body>
    <?php include("partials/_header.php"); ?>

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


<?php

if (!isset($_REQUEST['submit']) && isset($_GET['eid'])) {

    if ($_SESSION['teacherOf'] == "BCA I yr") {
        $sql = "SELECT * FROM `bca_1yr` WHERE `stu_enrollNo` = '" . $_GET['eid'] . "'";
        $result = mysqli_query($conn, $sql);
        $numRow = mysqli_num_rows($result);

        if ($numRow > 0) {
            $row = mysqli_fetch_array($result);
        }
    } elseif ($_SESSION['teacherOf'] == "BCA II yr") {
        $sql = "SELECT * FROM `bca_2yr` WHERE `stu_enrollNo` = '" . $_GET['eid'] . "'";
        $result = mysqli_query($conn, $sql);
        $numRow = mysqli_num_rows($result);

        if ($numRow > 0) {
            $row = mysqli_fetch_array($result);
        }
    } elseif ($_SESSION['teacherOf'] == "BCA III yr") {
        $sql = "SELECT * FROM `bca_3yr` WHERE `stu_enrollNo` = '" . $_GET['eid'] . "'";
        $result = mysqli_query($conn, $sql);
        $numRow = mysqli_num_rows($result);

        if ($numRow > 0) {
            $row = mysqli_fetch_array($result);
        }
    } else {
        $showError = "Something Went Wrong";
    }
} else {
    $showError = "Something went wrong";
}
?>

    <div class="insert-container">
        <form action="?submit" method="POST">

            <div class="stu-data" align="center">
                <h2 align="center">Edit Student Data</h2>
                <input type="text" name="stu_name" id="stu_form" placeholder="Student Name" maxlength="50" minlength="5" value="<?php echo $row['stu_name'] ?>" required>

                <input type="text" name="stu_enrollNo" id="stu_form" value="<?php echo $row['stu_enrollNo'] ?>" placeholder="Enrollment Number" required readonly>

                <input type="text" name="stu_rollNo" id="stu_form" value="<?php echo $row['stu_rollNo'] ?>" placeholder="Roll Number" required readonly>

                <input type="text" name="stu_class" id="stu_form" value="<?php echo $_SESSION['teacherOf'] . ' (Automatic fill up by your Data)'; ?>" required readonly>

                <input type="text" name="stu_fa" id="stu_form" value="<?php echo $row['stu_faName'] ?>" placeholder="Father Name" maxlength="50" minlength="5" required>

                <input type="text" name="stu_mo" id="stu_form" value="<?php echo $row['stu_moName'] ?>" placeholder="Mother Name" maxlength="50" minlength="5" required>

                <select name="stu_sess" id="stu_form" required>
                    <option value="<?php echo $row['stu_sess'] ?>">
                        <?php echo $row['stu_sess'] ?>
                    </option>
                    <?php for ($i = 2000; $i < 2050; $i++) { ?> ?>
                        <?php $y = $i + 1; ?>
                        <option value="<?php echo $i . '-' . $y; ?>">
                            <?php echo $i . '-' . $y; ?>
                        </option>
                    <?php  } ?>
                </select>

                <input type="tel" name="stu_mobileNo" id="stu_form" value="<?php echo $row['stu_mobileNo'] ?>" placeholder="Student Mobile Number" minlength="10" maxlength="10" required>
            </div>

            <br>

            <hr>

            <!-- Result Data -->
            <div class="result-data">

                <table>
                    <tr>
                        <th colspan="4" scope="col">Edit Student Marks</th>
                    </tr>
                    <tr>
                        <th>
                            <?php echo $_SESSION['teacherOf'] ?>
                        </th>
                        <th>Maximum Marks</th>
                        <th>Mid-term Marks (30)</th>
                        <th>Annual Marks (70)</th>
                    </tr>

                    <?php

                    if ($_SESSION['teacherOf'] == "BCA I yr") {
                        $n = 1;
                        while ($n <= 6) {
                            $mid[$n] = $row["Mid_BCA11$n"];
                            $ann[$n] = $row["Ann_BCA11$n"];

                            echo "<tr>
                            <td>BCA 11$n</td>
                            <td>100</td>
                            <td><input type='number' name='Mid_BCA11$n' id='marksInput' min='0' max='30' placeholder='Insert Marks' value='$mid[$n]' required></td>
                            <td><input type='number' name='Ann_BCA11$n' id='marksInput' min='0' max='70' placeholder='Insert Marks' value='$ann[$n]' required></td>
                            </tr>";
                            $n++;
                        }

                        echo "
                        <tr>
                            <td>Total</td>
                            <td>600</td>
                            <td>" . $row['Mid_Total'] . "</td>
                            <td>" . $row['Ann_Total'] . "</td>
                        </tr>
                        <tr>
                            <td>Percentage</td>
                            <td></td>
                            <td>" . $row['Mid_Perc'] . "%</td>
                            <td>" . $row['Ann_Perc'] . "%</td>
                        </tr>

                        <tr>
                            <td colspan='4'>Overall Percentage: " . $row['Overall_Perc'] . "%</td>
                        </tr>

                        <tr>
                            <td colspan='4'>Result: " . $row['Result'] . "</td>
                        </tr>";

                    } elseif ($_SESSION['teacherOf'] == "BCA II yr") {
                        $n = 1;
                        while ($n <= 6) {
                            $mid[$n] = $row["Mid_BCA22$n"];
                            $ann[$n] = $row["Ann_BCA22$n"];

                            echo "<tr>
                            <td>BCA 22$n</td>
                            <td>100</td>
                            <td><input type='number' name='Mid_BCA22$n' id='marksInput' min='0' max='30' placeholder='Insert Marks' value='$mid[$n]' required></td>
                            <td><input type='number' name='Ann_BCA22$n' id='marksInput' min='0' max='70' placeholder='Insert Marks' value='$ann[$n]' required></td>
                            </tr>";
                            $n++;
                        }

                        echo "
                        <tr>
                            <td>Total</td>
                            <td>600</td>
                            <td>" . $row['Mid_Total'] . "</td>
                            <td>" . $row['Ann_Total'] . "</td>
                        </tr>
                        <tr>
                            <td>Percentage</td>
                            <td></td>
                            <td>" . $row['Mid_Perc'] . "%</td>
                            <td>" . $row['Ann_Perc'] . "%</td>
                        </tr>

                        <tr>
                            <td colspan='4'>Overall Percentage: " . $row['Overall_Perc'] . "%</td>
                        </tr>

                        <tr>
                            <td colspan='4'>Result: " . $row['Result'] . "</td>
                        </tr>";

                    } elseif ($_SESSION['teacherOf'] == "BCA III yr") {
                        $n = 1;
                        while ($n <= 5) {
                            $mid[$n] = $row["Mid_BCA33$n"];
                            $ann[$n] = $row["Ann_BCA33$n"];

                            echo "<tr>
                            <td>BCA 33$n</td>
                            <td>100</td>
                            <td><input type='number' name='Mid_BCA33$n' id='marksInput' min='0' max='30' placeholder='Insert Marks' value='$mid[$n]' required></td>
                            <td><input type='number' name='Ann_BCA33$n' id='marksInput' min='0' max='70' placeholder='Insert Marks' value='$ann[$n]' required></td>
                            </tr>";
                            $n++;
                        }

                        echo "
                        <tr>
                            <td>Total</td>
                            <td>500</td>
                            <td>" . $row['Mid_Total'] . "</td>
                            <td>" . $row['Ann_Total'] . "</td>
                        </tr>
                        <tr>
                            <td>Percentage</td>
                            <td></td>
                            <td>" . $row['Mid_Perc'] . "%</td>
                            <td>" . $row['Ann_Perc'] . "%</td>
                        </tr>

                        <tr>
                            <td colspan='4'>Overall Percentage: " . $row['Overall_Perc'] . "%</td>
                        </tr>

                        <tr>
                            <td colspan='4'>Result: " . $row['Result'] . "</td>
                        </tr>";

                    } else {
                        $showError = "Their is something wrong. Logout and Login again";
                    }

                    ?>

                </table>

            </div>
            <div align="center">
                <button type="reset" class="btn reset_btn">Reset</button>
                <button type="submit" class="btn submit_btn">Update Data</button>
            </div>
        </form>
    </div>
</body>

</html>