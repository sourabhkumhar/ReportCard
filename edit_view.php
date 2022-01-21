<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

include("connect.php");

$showEmpty = false;
$showError = false;
$showSuccess = false;

if(isset($_GET['del'])) {
    if($_SESSION['teacherOf'] == "BCA I yr") {

        $sql = "DELETE FROM `bca_1yr` WHERE `stu_enrollNo` = '" . $_GET['del'] . "'" ;
        $result = mysqli_query($conn, $sql);

        if($result) {
            $showSuccess = "Data Successfully Deleted";
        }
    }
    elseif($_SESSION['teacherOf'] == "BCA II yr") {

        $sql = "DELETE FROM `bca_2yr` WHERE `stu_enrollNo` = '" . $_GET['del'] . "'" ;
        $result = mysqli_query($conn, $sql);

        if($result) {
            $showSuccess = "Data Successfully Deleted";
        }
    }
    if($_SESSION['teacherOf'] == "BCA III yr") {

        $sql = "DELETE FROM `bca_3yr` WHERE `stu_enrollNo` = '" . $_GET['del'] . "'" ;
        $result = mysqli_query($conn, $sql);

        if($result) {
            $showSuccess = "Data Successfully Deleted";
        }
    }
    else {
        $showError = "Data can't be deleted.";
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
    <link rel="stylesheet" href="Styling/alertBox.css">
    <link rel="stylesheet" href="Styling/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Edit | Delete | View</title>
</head>

<body>
    <?php include("partials/_header.php"); ?>

    <?php
    if (isset($_GET['action'])) {

        echo
        "<div class='success'>
            <!-- <span class='closebtn'>&times;</span> -->
            <strong>Success! </strong> Data Updated Successfully for ".$_GET['action']."
        </div>";
    }

    if (isset($_GET['del'])) {

        echo
        "<div class='success'>
            <!-- <span class='closebtn'>&times;</span> -->
            <strong>Success! </strong> Data Deleted Successfully for ".$_GET['del']."
        </div>";
    }

    ?>


    <div class="insert-container">

        <?php
        
        echo "<table>
            <tr>
                <th colspan='100%' align='center'>".$_SESSION['teacherOf']."</th>
            </tr>
            
            <tr>
                <th>S.No.</th>
                <th>Enroll. Number</th>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Session</th>
                <th>Mobile Number</th>
                <th>Result</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>View</th>
            </tr>";
            
            if($_SESSION['teacherOf'] == "BCA I yr") {
                
                $sql = "SELECT * FROM `bca_1yr`";
                $result = mysqli_query($conn, $sql);
                
                $sno=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo "<tr><td>" . $sno . "</td>
                        <td>" . $row['stu_enrollNo'] . "</td>
                        <td>" . $row['stu_rollNo'] . "</td>
                        <td>" . $row['stu_name'] . "</td>
                        <td>" . $row['stu_faName'] . "</td>
                        <td>" . $row['stu_moName'] . "</td>
                        <td>" . $row['stu_sess'] . "</td>
                        <td>" . $row['stu_mobileNo'] . "</td>
                        <td>" . $row['Result'] . "</td>
                        
                        <td class='td_fa'><a href='edit.php?action=edit&eid=" . $row['stu_enrollNo'] ."'><i class='fa fa-pencil' style='font-size:24px;color:black;'></i></a></td>
                        
                        <td class='td_fa'><a href='edit_view.php?del=" . $row['stu_enrollNo'] ."'><i class='fa fa-times' style='font-size:30px;color:red'></li></a></td>
                            
                        <td class='td_fa'><a href='view.php?view=" . $row['stu_enrollNo'] ."'><i class='fa fa-eye' style='font-size:24px;color:darkblue'></i></a></td>
                        </tr>";
                    }
                }
            elseif($_SESSION['teacherOf'] == "BCA II yr") {
                
                $sql = "SELECT * FROM `bca_2yr`";
                $result = mysqli_query($conn, $sql);
                
                $sno=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo "<tr><td>" . $sno . "</td>
                        <td>" . $row['stu_enrollNo'] . "</td>
                        <td>" . $row['stu_rollNo'] . "</td>
                        <td>" . $row['stu_name'] . "</td>
                        <td>" . $row['stu_faName'] . "</td>
                        <td>" . $row['stu_moName'] . "</td>
                        <td>" . $row['stu_sess'] . "</td>
                        <td>" . $row['stu_mobileNo'] . "</td>
                        <td>" . $row['Result'] . "</td>
                        
                        <td class='td_fa'><a href='edit.php?action=edit&eid=" . $row['stu_enrollNo'] ."'><i class='fa fa-pencil' style='font-size:24px;color:black;'></i></a></td>
                        
                        <td class='td_fa'><a href='edit_view.php?del=" . $row['stu_enrollNo'] ."'><i class='fa fa-times' style='font-size:30px;color:red'></li></a></td>
                            
                        <td class='td_fa'><a href='view.php?view=" . $row['stu_enrollNo'] ."'><i class='fa fa-eye' style='font-size:24px;color:darkblue'></i></a></td>
                        </tr>";
                    }
                }
            elseif($_SESSION['teacherOf'] == "BCA III yr") {
                
                $sql = "SELECT * FROM `bca_3yr`";
                $result = mysqli_query($conn, $sql);
                
                $sno=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;
                    echo "<tr><td>" . $sno . "</td>
                        <td>" . $row['stu_enrollNo'] . "</td>
                        <td>" . $row['stu_rollNo'] . "</td>
                        <td>" . $row['stu_name'] . "</td>
                        <td>" . $row['stu_faName'] . "</td>
                        <td>" . $row['stu_moName'] . "</td>
                        <td>" . $row['stu_sess'] . "</td>
                        <td>" . $row['stu_mobileNo'] . "</td>
                        <td>" . $row['Result'] . "</td>
                        
                        <td class='td_fa'><a href='edit.php?action=&eid=" . $row['stu_enrollNo'] ."'><i class='fa fa-pencil' style='font-size:24px;color:black;'></i></a></td>
                        
                        <td class='td_fa'><a href='edit_view.php?del=" . $row['stu_enrollNo'] ."'><i class='fa fa-times' style='font-size:30px;color:red'></li></a></td>
                            
                        <td class='td_fa'><a href='view.php?view=" . $row['stu_enrollNo'] ."'><i class='fa fa-eye' style='font-size:24px;color:darkblue'></i></a></td>
                        </tr>";
                    }
                }
                else {
                    echo "0 results";
                }
                echo "</table>";
                ?>

    </div>


</body>

</html>