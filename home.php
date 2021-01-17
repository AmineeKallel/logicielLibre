<?php
require_once 'includes/home.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>AmineKallel.com</title>
<link href="resources/css/bootstrap.css" rel="stylesheet">
<link href="resources/css/style.css" rel="stylesheet">
<link href="resources/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="resources/css/dataTables.responsive.css" rel="stylesheet">
<link href="resources/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index.html">AmineKallel.com - Bienvenu <?php echo $name;  ?></a>
</div>
<ul class="nav navbar-top-links navbar-right">
<li class="dropdown"> <a href="<?php echo $target;  ?>"> <i class="fa fa-user fa-fw"></i> Gestion d'utilisateurs</a></li>
<li class="dropdown"> <a href="includes/logout.php"> <i class="fa fa-sign-out fa-fw"></i> Se déconnecter</a></li>
</ul>
</nav>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h3 class="page-header">Page d'accuil</h3>
</div>
</div>
<div class="well">
<h4>Aminekallel.com</h4>
<p>Ce Projet est réalisé par <a href="#">AmineKallel</a> - Etudiant en 3 licence fondamentale en sciences de l'informatique</p>
<p>Si vous êtes un administrateur vous pouvez gérer les utilissateur par <a href="users.php">cliquer ici</a> </p>
</div>
</div>
</div>
<script src="resources/javascript/jquery.js"></script>
<script src="resources/javascript/bootstrap.js"></script>
<script src="resources/javascript/sb-admin-2.js"></script>
<script src="resources/javascript/jquery.dataTables.min.js"></script>
<script src="resources/javascript/dataTables.bootstrap.min.js"></script>
<script src="resources/javascript/dataTables.responsive.js"></script>
<script src="resources/javascript/style.js"></script>
<script>
function putvalues(firstname,lastname,type,login) {
document.getElementById("form").action = "users.php?update="+login;
document.getElementById("btn-users").innerHTML = "<i class='font-icon fa fa-pencil'></i> Appliquer les changements";
document.getElementById("btn-users").name = "btn-update-user";
document.getElementById("panel-header").innerHTML = "Modifier un utilisateur";
document.getElementById("firstname").value = firstname;
document.getElementById("lastname").value = lastname;
document.getElementById("type").value = type;
document.getElementById("login").value = login;
document.getElementById("password").value = "";
document.getElementById("cpassword").value = "";
document.getElementById("password").removeAttribute("required"); 
document.getElementById("cpassword").removeAttribute("required"); 
}
function delete_record(login) {
if(confirm("Êtes-vous sûr de vouloir supprimer l'utilisateur ?")){window.location.href = "users.php?delete="+login;}
}
$(document).ready(function() {
$('#dataTables-example').DataTable({
responsive: true
});
});
</script>
</body>
</html>