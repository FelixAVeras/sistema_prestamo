<?php
	session_start();
    include('connection.php');

    function login_validate($email, $password, &$result) {
    	$sql = "SELECT * FROM usuarios WHERE email = $email AND password = $password";
    	$rec = mysql_query($sql);
    	$count = 0;

    	while($row = mysql_fetch_object($rec)) {
    		$count++;
    		$result = $row;
    	}

    	if($count == 1) {
    		return 1;
    	}
    	else {
    		return 0;
    	}
    }

    if(!isset($_SESSION['userID'])) {
    	if(isset($_POST['login'])) {
    		if(login_validate($_POST['email'], $_POST['password'], $result) == 1) {
    			$_SESSION['userID'] = $result->userID;
    			header("location: index.php");
    		}
    		else {
    			echo "<div class='alert alert-danger'>Su usuario es incorrecto, intente nuevamente.</div>";
    		}
    	}
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
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
						<a href="register.php" class="float-right" id="registerLink">Registrate</a>
					</form>
				</fieldset>
			</div>
		</div>
	</section>

	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
