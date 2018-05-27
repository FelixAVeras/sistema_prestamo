<?php
    session_start();
    include('connection.php');
?>

<?php

if(isset($_GET['editar'])) {
    $editar_id = $_GET['editar'];

    $consulta = "SELECT * FROM clientes WHERE id = $editar_id";
    $ejecutar = mysqli_query($connection, $consulta);

    $fila = mysqli_fetch_array($ejecutar);

    $Nombre = $fila['nombre'];
    $Cedula = $fila['cedula'];
    $FechaNacimiento = $fila['fecha_nacimiento'];
    $Telefono = $fila['telefono'];
    $Direccion = $fila['direccion'];
    $Email = $fila['email'];
}

?>

<br>

<h1>Editar Cliente</h1>
<form action="customers.php" method="post">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" id="Name" value="<?php echo $Nombre; ?>">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label>Cedula</label>
                <input type="text" class="form-control" name="cedula" id="cedula" value="<?php echo $Cedula; ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="Birthday" value="<?php echo $FechaNacimiento; ?>">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" class="form-control" name="telefono" id="Phone" value="<?php echo $Telefono; ?>">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $Email; ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" class="form-control" name="direccion" id="address" value="<?php echo $Direccion; ?>">
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-trash-alt"></i> Cancelar</button>
    <button type="submit" name="btnUpdate" class="btn btn-success">Guardar Cambios <i class="fas fa-save"></i></button>
</form>

<?php

if(isset($_POST['btnUpdate'])) {
    $Nombre = $_POST['nombre'];
    $Cedula = $_POST['cedula'];
    $FechaNacimiento = $_POST['fecha_nacimiento'];
    $Telefono = $_POST['telefono'];
    $Direccion = $_POST['direccion'];
    $Email = $_POST['email'];
    
    $actualizar = "UPDATE clientes SET nombre = '$Nombre', cedula = '$Cedula', fecha_nacimiento = '$FechaNacimiento', telefono = '$Telefono', direccion = '$Direccion', email = '$Email'
                    WHERE id = '$editar_id'";
    
    $ejecutar = mysqli_query($consulta, $actualizar);
    
    if($ejecutar) {
        echo '<script>alert("Datos Actualizados correctamente!")</script>';
        echo '<script>window.open("customers.php")</script>';
    }
}


?>

<br><br>



<?php include('footer.php'); ?>









