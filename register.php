<!DOCTYPE html>
<?php include("connection.php"); ?>
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
                            <button type="submit" name="insert" class="btn btn-primary">Registrarse</button>
                        </form>
                    </div>
                </div>
                <a href="login.php" class="btn btn-link float-right">Iniciar Sesión</a>
            </div>
        </div>
    </div>
    <?php

        if(isset($_POST['insert'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $insertar = "INSERT INTO usuarios(name, email, password) VALUES('$name', '$email', '$password')";

            $ejecutar = mysqli_query($connection, $insertar);

            if ($ejecutar) {
                echo "Insertado correctamnte";
                header('location: index.php');
            }
        }

    ?>
    <!-- Scripts -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>



