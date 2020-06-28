<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "loginsys";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
    die("failed to connect: ".mysqli_connect_error());
}