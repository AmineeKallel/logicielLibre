<?php
require_once 'includes/conncetion.php';

session_start();
if(isset($_SESSION['login'])){header('Location: users.php');}
$message="Connectez-vous pour commencer votre session";

if(isset($_POST['btn-login'])){	
$login=filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
$password=filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$sql = "Select * from users where (login='$login' and password = '$password')";
$result = $connection->query($sql);
if($row=$result->fetch_assoc()){
$_SESSION['login'] = $login;
$_SESSION['password'] = $row['password']; 
$_SESSION['type'] = $row['type'];
header('Location: home.php');}
else{$message="Connexion refusée : Pseudo de compte ou mot de passe incorrect";}
}
?>

