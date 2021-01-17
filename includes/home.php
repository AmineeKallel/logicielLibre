<?php
require_once 'includes/conncetion.php';

session_start();
if(!isset($_SESSION['login'])){header('Location: index.php');}
else{
$login=$_SESSION['login'];
$password=$_SESSION['password'];
$type=$_SESSION['type'];
$sql = "Select * from users where (login='$login' and password='$password')";
$result = $connection->query($sql);
if(!$result->fetch_assoc()){header('Location: includes/logout.php');} }

$name="";
$target="users.php";
$login=$_SESSION['login'];
$sql = "Select * from users where login='$login'";
$result =$connection->query($sql); 
if($row = $result->fetch_assoc()){ $name=$row['firstname']." ".$row['lastname']; }
if($_SESSION['type']!='Admin'){$target="#";}
?>
