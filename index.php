<?php
require_once 'includes/login.php';
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
<link href="resources/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container" style="margin-top:6rem;">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="login-panel panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><?php echo $message;  ?></h3>
</div>
<div class="panel-body">
<form method="POST" action="index.php">
<fieldset>
<div class="form-group">
<input class="form-control" placeholder="Pseudo" name="login" type="text" autofocus required>
</div>
<div class="form-group">
<input class="form-control" placeholder="Mot de passe" name="password" type="password" value="" required>
</div>
<button type="submit" name="btn-login" class="btn btn btn-primary btn-block">Se connecter</a>

</fieldset>
</form>
</div>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<a href="inscription.php" name="btn-login" class="btn btn-danger">Inscription</a>
</div>
</div>
</div>

</div>
<script src="resources/javascript/jquery.js"></script>
<script src="resources/javascript/bootstrap.js"></script>
<script src="resources/javascript/style.js"></script>
</body>
</html>