<?php

$conn = mysqli_connect("localhost", "root", "", "reportcard");

if(!$conn) {
    die("Connection Error: " . mysqli_connect_error());
}

?>