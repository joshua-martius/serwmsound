<?php
$dbservername = "";
$dbname = "";
$dbusername = "";
$dbpassword = "";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
    exit();
}