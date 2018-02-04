<?php 
    require 'connection.php';
  
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Prestamos | Rerecuperación de contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 offset-3">
                <h2 class="text-center">Sistema de Prestamos</h2>
                <h4 class="text-center">Inicio de Sesión</h4>
                <div class="row">
                    <div class="col-md-12">
                        <?php if(!empty($message)): ?>
                            <h3 class="text-center"><?= $message ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
                <p class="text-justify"><strong>Nota: </strong>Introduzca el ultimo correo electronico que recuerde. Se le enviara un mail para completar el proceso de recuperación de contraseña.</p>
                <div class="card">
                    <div class="card-body">
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="text" name="email" id="" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
                <a href="login.php" class="btn btn-link float-right">Regresar al Login</a>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>