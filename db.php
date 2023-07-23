<?php

$servername = "epakkeno01.mysql.domeneshop.no";
$username = "epakkeno01";
$password = "velting-6Skribling-nysydd-pusl";
$db = "epakkeno01";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>