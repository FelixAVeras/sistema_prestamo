<?php
require 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistema de Prestamos | Login</title>
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
                <div class="card">
                    <div class="card-body">
                        <form action="login.php" method="post" id="login-form">
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
                <a href="reset.php" class="btn btn-link">¿Olvidó su Contraseña?</a>
                <a href="register.php" class="btn btn-link float-right">Nuevo Usuario</a>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>