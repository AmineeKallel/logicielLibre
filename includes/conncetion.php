<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dataBase = "dashboard";
$connection = new mysqli($serverName, $userName, $password, $dataBase);
mysqli_set_charset($connection, "utf8");
if ($connection->connect_error) { die("<h1>DATABASE ERROR: CONNECTION FAILED!</h1> <h3>Unable to connect to the database!<br> Please contact the server-administrator.</h3>"); }
?> 