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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
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
		        <form>
	                <div class="form-group">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="usuario"  placeholder="Usuario">
	                </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Contraseña" >
                    </div>
	
	                <button type="submit" class="btn btn-ttc">Entrar</button>
	  
                    <br><br>
		            <a href="" class="float-left" id="forgetLink">Olvide mi contraseña</a>
		            <a href="" class="float-right" id="registerLink">Registrate</a>
	            </form>
            </fieldset>
        </div>
    </div>
</section>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>