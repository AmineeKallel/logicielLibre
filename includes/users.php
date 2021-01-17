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
if(!$result->fetch_assoc()){header('Location: includes/logout.php');}
else if($_SESSION['type']!='Admin'){header('Location: home.php');} }
$message="Gestion d' utilisateurs : Ici vous pouvez ajouter, supprimer ou mettre à jour les utilisateurs";

if(isset($_POST['btn-add-user'])){
$firstname=filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
$lastname=filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
$type=filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
$login=filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
$password=filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$cpassword=filter_input(INPUT_POST, "cpassword", FILTER_SANITIZE_STRING);
$sql = "Select * from users where (login='$login')";
$result = $connection->query($sql);
if($row = $result->fetch_assoc()){$message="Gestion d' utilisateurs : Le pseudo choisi est deja exit";}
else if($password !=$cpassword){$message="Gestion d' utilisateurs : Le mot de passe ne correspond pas au mot de passe de confirmation";}
else{
$sql = "insert into users values('$login','$firstname','$lastname','$type','$password')";
$connection->query($sql); 
$message="Gestion d' utilisateurs : L'utilisateur a été ajoutée avec succès"; }
}

if(isset($_POST['btn-update-user'])){
$existlogin=false;
$oldlogin=$_GET['update'];
$firstname=filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
$lastname=filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
$type=filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
$login=filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
$password=filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$cpassword=filter_input(INPUT_POST, "cpassword", FILTER_SANITIZE_STRING);
if($oldlogin==$_SESSION['login']){$sameuser=true;}
if($login!=$oldlogin){
$sql = "Select * from users where (login='$login')";
$result = $connection->query($sql);
if($row = $result->fetch_assoc()){$message="Gestion d' utilisateurs : Le pseudo choisi est deja exit"; $existlogin=true;} }
if($password !='' && $password!=$cpassword ){$message="Gestion d' utilisateurs : Le mot de passe ne correspond pas au mot de passe de confirmation";}
else if($password !='' && $password==$cpassword ){
$sql = "Update users set firstname='$firstname',lastname='$lastname',type='$type',login='$login',password='$password' where (login='$oldlogin')";
$result = $connection->query($sql);
$message="Gestion d' utilisateurs : L'utilisateur a été modifier avec succès";}
else if($password=='' && !$existlogin){
$sql = "Update users set firstname='$firstname',lastname='$lastname',type='$type',login='$login' where (login='$oldlogin')";
$result = $connection->query($sql);
$message="Gestion d' utilisateurs : L'utilisateur a été modifier avec succès";}
$login=$_SESSION['login'];
$password=$_SESSION['password'];
$sql = "Select * from users where (login='$login' and password='$password')";
$result = $connection->query($sql);
if(!$result->fetch_assoc()){header('Location: includes/logout.php');}
}

if(isset($_GET['delete'])){
$login=filter_input(INPUT_GET, "delete", FILTER_SANITIZE_STRING);
$sql = "delete from users where login='$login'";
$connection->query($sql); 
$message="Gestion d' utilisateurs : L'utilisateur a été supprimée avec succès";
}

$name="";
$login=$_SESSION['login'];
$sql = "Select * from users where login='$login'";
$result =$connection->query($sql); 
if($row = $result->fetch_assoc()){ $name=$row['firstname']." ".$row['lastname']; }

$sql = "Select * from users";
$result =$connection->query($sql); 
$table="";
while($row = $result->fetch_assoc()){
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$type=$row['type'];
$login=$row['login'];
$table=$table."<tr><td>$firstname</td><td>$lastname</td><td>$login</td><td>$type</td>
<td style='white-space: nowrap; width: 1%;'><div class='tabledit-toolbar btn-toolbar' style='text-align: left;'>
<div class='btn-group btn-group-sm' style='float: none;'>
<button class='tabledit-edit-button btn btn-sm btn-default' onclick='putvalues(`$firstname`,`$lastname`,`$type`,`$login`);' style='float: none;' type='button'><span class='fa fa-pencil'></span></button>
<button class='tabledit-delete-button btn btn-sm btn-default' onclick='delete_record(`$login`);' style='float: none;' type='button'><span class='fa fa-trash'></span></button>
</div></div></td>
</tr>";
}
?>
