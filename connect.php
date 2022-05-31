<?php

$servername = 'remotemysql.com:3306';
$username = '4lkcOMDRFj';
$password = 'PcLAMlQhz4';
$database = '4lkcOMDRFj';

$conn = mysqli_connect($servername, $username, $password, $database);

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

if(!$conn) {
    die('Connection Error: '.mysqli_connect_error());
}

?>