<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

include 'connect.php';

// if(isset($_GET['stu_enrollNo'])) {
//     if($_SESSION['teacherOf'] == "BCA I yr") {
//         $sql = "SELECT * FROM `bca_1yr` WHERE `stu_enrollNo` = '" . $_GET['stu_enrollNo'] . "'";
//         $result = mysqli_query($conn, $sql);
//         $row = mysqli_fetch_row($result);
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Styling/header.css">
    <link rel="stylesheet" href="Styling/search.css">
    <link rel="stylesheet" href="Styling/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Search</title>
</head>
<body>
    <?php include 'partials/_header.php'; ?>
    <h1 style="text-align: center; margin:15px 0 0 0; font-size: 45px">Search in <?php echo $_SESSION['teacherOf']; ?></h1>

        <div class="search_block" align="center">
            
            <div class="search_box">
                <form action="search.php" method="GET">
                    <input type="text" id="srch_input" name="stu_enrollNo" placeholder="by Enrollment Number"> <br>
                    <button id="btn_search" type="submit">Search</button>
                </form>
            </div>
            
            <div class="search_box">
                <form action="search.php" method="GET">
                    <input type="text" id="srch_input" name="stu_name" placeholder="by Student Name"> <br>
                    <button id="btn_search" type="submit">Search</button>
                </form>
            </div>
            
            <div class="search_box">
                <a href="edit_view.php"><button id="show_all" type="submit">Show All in <?php echo $_SESSION['teacherOf']; ?></button></a>
            </div>
            
        </div>


        <!-- fetch table -->
        <div class="insert-container" id="bottom">

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
    
    if(isset($_GET['stu_enrollNo'])) {
        if($_SESSION['teacherOf'] == "BCA I yr") {
            $sql = "SELECT * FROM `bca_1yr` WHERE `stu_enrollNo` = '" . $_GET['stu_enrollNo'] . "'";
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result) == 0) {
                echo "<td colspan='100%' align='center'><p>No data found!</p></td>";
            }
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
        if($_SESSION['teacherOf'] == "BCA II yr") {
            $sql = "SELECT * FROM `bca_2yr` WHERE `stu_enrollNo` = '" . $_GET['stu_enrollNo'] . "'";
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result) == 0) {
                echo "<td colspan='100%' align='center'><p>No data found!</p></td>";
            }
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
        if($_SESSION['teacherOf'] == "BCA III yr") {
            $sql = "SELECT * FROM `bca_3yr` WHERE `stu_enrollNo` = '" . $_GET['stu_enrollNo'] . "'";
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result) == 0) {
                echo "<td colspan='100%' align='center'><p>No data found!</p></td>";
            }
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
    }
    
    if(isset($_GET['stu_name'])) {
        if($_SESSION['teacherOf'] == "BCA I yr") {
            $sql = "SELECT * FROM `bca_1yr` WHERE `stu_enrollNo` = '" . $_GET['stu_enrollNo'] . "'";
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result) == 0) {
                echo "<td colspan='100%' align='center'><p>No data found!</p></td>";
            }
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
        if($_SESSION['teacherOf'] == "BCA II yr") {
            $sql = "SELECT * FROM `bca_2yr` WHERE `stu_name` = '" . $_GET['stu_name'] . "'";
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result) == 0) {
                echo "<td colspan='100%' align='center'><p>No data found!</p></td>";
            }
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
        if($_SESSION['teacherOf'] == "BCA III yr") {
            $sql = "SELECT * FROM `bca_3yr` WHERE `stu_name` = '" . $_GET['stu_name'] . "'";
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result) == 0) {
                echo "<td colspan='100%' align='center'><p>No data found!</p></td>";
            }
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
    }
        echo "</table>";
        ?>

</div>

</body>
</html>