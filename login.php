<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: /sistema_prestamo/login.php');
    }

    require 'connection.php';
    
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $connection->prepare('SELECT id, email, password FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $result['id'];
            header('Location: /sistema_prestamo/index.php');
        }
        else {
            $message = 'Estos datos no se encuentran en nuestra base de datos.';
        }
    }
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
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="text" name="email" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" name="password" id="" class="form-control">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>