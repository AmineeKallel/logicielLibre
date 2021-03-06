<?php
require_once 'includes/users.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Amine.kallel.com</title>
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
<li class="dropdown"> <a href="home.php"> <i class="fa fa-home fa-fw"></i> Accueil</a></li>
<li class="dropdown"> <a href="includes/logout.php"> <i class="fa fa-sign-out fa-fw"></i> Se déconnecter</a></li>
</ul>
</nav>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h4 class="page-header"><?php echo $message;  ?></h4>
</div>
</div>
<form id="form" method="POST" action="users.php">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading" id="panel-header">Ajouter un nouveau utilisateur </div>
<div class="panel-body">
<div class="row">
<div class="col-md-6 col-sm-6">
<fieldset class="form-group">
<label class="form-label" for="firstname">Nom</label>
<input class="form-control" id="firstname" name="firstname" type="text"placeholder="Nom" required /> 
</fieldset>
</div>
<div class="col-md-6 col-sm-6">
<fieldset class="form-group">
<label class="form-label" for="lastname">Prénom</label>
<input class="form-control" id="lastname" name="lastname" type="text"placeholder="Prénom" required /> 
</fieldset>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6">
<fieldset class="form-group">
<label class="form-label" for="type">Role</label>
<select class="form-control" id="type" name="type" type="text"placeholder="Poste" required>
<option value="User">Utilisateur</option>
<option value="Admin">Administrateur</option>
</select>
</fieldset>
</div>
<div class="col-md-6 col-sm-6">
<fieldset class="form-group">
<label class="form-label" for="login">Pseudo</label>
<input class="form-control" id="login" name="login" type="text"placeholder="Pseudo" required /> 
</fieldset>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6">
<fieldset class="form-group">
<label class="form-label" for="password">Mot de passe</label>
<input class="form-control" id="password" name="password" type="text"placeholder="Mot de passe" required /> 
</fieldset>
</div>
<div class="col-md-6 col-sm-6">
<fieldset class="form-group">
<label class="form-label" for="cpassword">Confirmation de mot de passe</label>
<input class="form-control" id="cpassword" name="cpassword" type="text"placeholder="Confirmation de mot de passe" required /> 
</fieldset>
</div>
</div>
</div>
<div class="panel-footer">
<div class="pull-right">
<a href="users.php"><button  href="users.php" class="btn btn-primary"  >Annuler</button></a>
<button id="btn-users" name="btn-add-user" class="btn btn-primary" type="submit">Ajouter un utilisateur</button>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</form>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Liste d'utilisateurs </div>
<div class="panel-body">
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>Nom</th>
<th>Prenom</th>
<th>Pseudo</th>
<th>Classe</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php echo $table;  ?>
</tbody>
</table>
</div>
</div>
</div>
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