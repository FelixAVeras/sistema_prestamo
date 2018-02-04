<?php 
    require 'connection.php';
    require 'functions/functions.php';

    $errors = array();

    if(!empty($_POST)) {
        $name = $connection->real_escape_string($_POST['name']);
        $email = $connection->real_escape_string($_POST['email']);
        $pass1 = $connection->real_escape_string($_POST['password']);
        $pass2 = $connection->real_escape_string($_POST['confirmpassword']);

        $activo = 0;
        $tipo_user = 2;

        if(isNull($name, $email, $pass1, $pass2)) {
            $errors[] = "No puede haber campos vacios";
        }

        if(!passwordValidate($pass1, $pass2)) {
            $errors[] = "Las contraseñas no coninciden";
        }

        if(!isEmail($email)) {
            $errors[] = "Correo electronico invalido";
        }

        if(emailExists($email)) {
            $errors[] = "El correo electronico $email ya exite";
        }

        if (count($errors) == 0) {
            $pass_hash = hashPassword($pass1);
            $token = generateToken();

            $register = emailRegister($name, $email, $pass1);

            if ($register > 0) {
                # code...
            }
        }

    }
 
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Prestamos | Registro de Usuario</title>
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
                        <?php echo messageBlock($errors); ?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="register.php" method="post">
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" name="password" id="pass1" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Confirmar Password:</label>
                                <input type="password" name="confirmpassword" id="pass2" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </form>
                    </div>
                </div>
                <a href="login.php" class="btn btn-link float-right">Iniciar Sesión</a>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper/dist/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>



