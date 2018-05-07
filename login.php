<?php
    require 'connection.php';

    $errors = array();

    if(!empty($_POST)) {
        $email = $connection->real_escape_string($_POST['email']);
        $password = $connection->real_escape_string($_POST['password']);

        if (isNullLogin($email, $password)) {
            $errors[] = "No puede haber campos vacios";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/login2.css">
	<link rel="stylesheet" href="css/animate.css">
</head>
<body>
	<header>
		<div class="container">
			<h1 class="animated flip">IF Credit</h1>
		</div>
	</header>

	<section>
		<div class="form">
			<div class="container formulario" >
				<fieldset>
					<legend>
						<h2>Login</h2>
					</legend>
					<form action="" method="post">
						<div class="form-group">
							<label for="">Usuario</label>
							<input type="text" name="email" class="form-control" id="usuario"  placeholder="Usuario">
						</div>
						<div class="form-group">
							<label for="">Contraseña</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" >
						</div>
		
						<!-- <button type="submit" class="btn btn-ttc">Entrar</button> -->
						<a href="index.php" class="btn btn-ttc">Entrar</a>
		
						<br><br>
						<a href="" class="float-left" id="forgetLink">Olvide mi contraseña</a>
						<a href="" class="float-right" id="registerLink" data-toggle="modal" data-target="#exampleModal">Registrate</a>
					</form>
				</fieldset>
			</div>
		</div>
	</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Registro de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>