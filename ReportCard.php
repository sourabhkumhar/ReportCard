<?php
session_start();

include 'connect.php';

$stu_enrollNo = $_GET['stu_enrollNo'];
$stu_class = $_GET['stu_class'];

if(isset($stu_enrollNo) && isset($stu_class)) {

    if ($stu_class == "BCA I yr") {
        $sql = "SELECT * FROM `bca_1yr` WHERE `stu_enrollNo` = '$stu_enrollNo'";
        $result = mysqli_query($conn, $sql);
        $numRow = mysqli_num_rows($result);

        if ($numRow > 0) {
            $row = mysqli_fetch_array($result);
        }
        else {
            header("location: index.php?action=$stu_enrollNo");
        }
    } 
    
    elseif ($stu_class == "BCA II yr") {
        $sql = "SELECT * FROM `bca_2yr` WHERE `stu_enrollNo` = '$stu_enrollNo'";
        $result = mysqli_query($conn, $sql);
        $numRow = mysqli_num_rows($result);

        if ($numRow > 0) {
            $row = mysqli_fetch_array($result);
        }
        else {
            header("location: index.php?action=$stu_enrollNo");
        }
    } 
    
    elseif ($stu_class == "BCA III yr") {
        $sql = "SELECT * FROM `bca_3yr` WHERE `stu_enrollNo` = '$stu_enrollNo'";
        $result = mysqli_query($conn, $sql);
        $numRow = mysqli_num_rows($result);

        if ($numRow > 0) {
            $row = mysqli_fetch_array($result);
        }
        else {
            header("location: index.php?action=$stu_enrollNo");
        }
    } 
    else {
        $showError = "Something Went Wrong";
    }
} 
else {
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Styling/ReportCard.css">
    <meta name="ReportCardport" content="width=device-width, initial-scale=1.0">
    <title>ReportCard Report Card</title>
</head>
<body>

    <button type="submit" action="action" id="button" onclick="window.history.go(-1); return false;" >Back</button>
    <button type="submit" id="button" onclick="window.print()" >Print</button>

    <div class="show-container">

        <header>
            XYZ College
        </header>
        <p class="tagline"><strong>Address:</strong> ReportCard in htdocs in Localhost</p>

        <hr>

        <div class="stu_report" align="center">
            <table class="stu_table">
                <tr class="stu_tr">
                    <td class="stu_td"><p><strong>Name: </strong><?php echo $row['stu_name'] ?></p></td>
                    <td class="stu_td"><p><strong>Session: </strong><?php echo $row['stu_sess'] ?></p></td>
                </tr>
                <tr class="stu_td">
                    <td class="stu_td"><p><strong>Enrollment No.: </strong><?php echo $row['stu_enrollNo'] ?></p></td>
                    <td class="stu_td"><p><strong>Roll Number: </strong><?php echo $row['stu_rollNo'] ?></p></td>
                </tr>
                <tr class="stu_td">
                    <td class="stu_td"><p><strong>Father Name: </strong><?php echo $row['stu_faName'] ?></p></td>
                    <td class="stu_td"><p><strong>Mother Name: </strong><?php echo $row['stu_moName'] ?></p></td>
                </tr>
            </table>

            <h3 align="center"><?php echo $row['stu_class'] ?> - Result</h3>
            <table class="res_table">
                <tr class="res_tr">
                    <th class="res_th">Subjects</th>
                    <th class="res_th">Maximum Marks</th>
                    <th class="res_th">Mid-term Marks (30)</th>
                    <th class="res_th">Annual Marks (70)</th>
                </tr>

                <?php

                    if ($stu_class == "BCA I yr") {
                        $n = 1;
                        while ($n <= 6) {
                            $mid[$n] = $row["Mid_BCA11$n"];
                            $ann[$n] = $row["Ann_BCA11$n"];

                            echo "<tr class='res_tr'>
                            <td class='res_td'>BCA 11$n</td>
                            <td class='res_td'>100</td>
                            <td class='res_td'>$mid[$n]</td>
                            <td class='res_td'>$ann[$n]</td>
                            </tr>";
                            $n++;
                        }

                        echo "
                        <tr class='res_tr'>
                            <td class='res_td'>Total</td>
                            <td class='res_td'>600</td>
                            <td class='res_td'>" . $row['Mid_Total'] . "</td>
                            <td class='res_td'>" . $row['Ann_Total'] . "</td>
                        </tr>
                        <tr class='res_tr'>
                            <td class='res_td'>Percentage</td>
                            <td class='res_td'></td>
                            <td class='res_td'>" . $row['Mid_Perc'] . "%</td>
                            <td class='res_td'>" . $row['Ann_Perc'] . "%</td>
                        </tr>

                        <tr class='res_tr'>
                            <td class='res_td' colspan='4'>Overall Percentage: " . $row['Overall_Perc'] . "%</td>
                        </tr>

                        <tr class='res_tr'>
                            <td class='res_td' colspan='4'>Result: " . $row['Result'] . "</td>
                        </tr>";

                    } elseif ($stu_class == "BCA II yr") {
                        $n = 1;
                        while ($n <= 6) {
                            $mid[$n] = $row["Mid_BCA22$n"];
                            $ann[$n] = $row["Ann_BCA22$n"];

                            echo "<tr class='res_tr'>
                            <td class='res_td'>BCA 22$n</td>
                            <td class='res_td'>100</td>
                            <td class='res_td'>$mid[$n]</td>
                            <td class='res_td'>$ann[$n]</td>
                            </tr>";
                            $n++;
                        }

                        echo "
                        <tr class='res_tr'>
                            <td class='res_td'>Total</td>
                            <td class='res_td'>600</td>
                            <td class='res_td'>" . $row['Mid_Total'] . "</td>
                            <td class='res_td'>" . $row['Ann_Total'] . "</td>
                        </tr>
                        <tr class='res_tr'>
                            <td class='res_td'>Percentage</td>
                            <td class='res_td'></td>
                            <td class='res_td'>" . $row['Mid_Perc'] . "%</td>
                            <td class='res_td'>" . $row['Ann_Perc'] . "%</td>
                        </tr>

                        <tr class='res_tr'>
                            <td class='res_td' colspan='4'>Overall Percentage: " . $row['Overall_Perc'] . "%</td>
                        </tr>

                        <tr class='res_tr'>
                            <td class='res_td' colspan='4'>Result: " . $row['Result'] . "</td>
                        </tr>";

                    } elseif ($stu_class == "BCA III yr") {
                        $n = 1;
                        while ($n <= 5) {
                            $mid[$n] = $row["Mid_BCA33$n"];
                            $ann[$n] = $row["Ann_BCA33$n"];

                            echo "<tr class='res_tr'>
                            <td class='res_td'>BCA 33$n</td>
                            <td class='res_td'>100</td>
                            <td class='res_td'>$mid[$n]</td>
                            <td class='res_td'>$ann[$n]</td>
                            </tr>";
                            $n++;
                        }

                        echo "
                        <tr class='res_tr'>
                            <td class='res_td'>Total</td>
                            <td class='res_td'>500</td>
                            <td class='res_td'>" . $row['Mid_Total'] . "</td>
                            <td class='res_td'>" . $row['Ann_Total'] . "</td>
                        </tr>
                        <tr class='res_tr'>
                            <td class='res_td'>Percentage</td>
                            <td class='res_td'></td>
                            <td class='res_td'>" . $row['Mid_Perc'] . "%</td>
                            <td class='res_td'>" . $row['Ann_Perc'] . "%</td>
                        </tr>

                        <tr class='res_tr'>
                            <td class='res_td' colspan='4'>Overall Percentage: " . $row['Overall_Perc'] . "%</td>
                        </tr>

                        <tr class='res_tr'>
                            <td class='res_td' colspan='4'>Result: " . $row['Result'] . "</td>
                        </tr>";

                    } else {
                        $showError = "Their is something wrong. Logout and Login again";
                    }

                    ?>

            </table>
        </div>

    </div>

</body>
</html>