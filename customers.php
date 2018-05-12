<?php include('connection.php'); ?>

<?php include('header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-12">
                <?php include('sidebar.php'); ?>
            </div>
            <div class="col-md-9 col-12">
                <h1 class="text-left">Clientes</h1>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Buscar cliente" aria-label="Recipient's username" aria-describedby="basic-addon2" onkeyup = "showHint(this.value)">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="button">Buscar <i class="fas fa-search"></i></button>
                            </div>
                        </div> 
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Nuevo Cliente <i class="fas fa-user-plus"></i></button>
                    </div>
                </div>
                <br>
                <!-- <?php
                
                // $result = mysqli_query("SELECT COUNT(*) FROM customers");
                // $row = mysqli_fetch_array($result);
                // $total = $row[0];
                
                // echo "<p><strong>Total de clientes: </strong>".$total."</p>";
                ?> -->
                
                <p><strong>Total de clientes: </strong></p>
                
                <?php
                
                if(isset($_POST['btnSubmit'])) {
                    $Nombre = $_POST['nombre'];
                    $Cedula = $_POST['cedula'];
                    $FechaNacimiento = $_POST['fecha_nacimiento'];
                    $Telefono = $_POST['telefono'];
                    $Direccion = $_POST['direccion'];
                    $Email = $_POST['email'];

                    $insertar = "INSERT INTO clientes(nombre, cedula, fecha_nacimiento, telefono, direccion, email) 
                                VALUE('$Nombre', '$Cedula', '$FechaNacimiento', '$Telefono', '$Direccion', '$Email')";

                    $ejecutar = mysqli_query($connection, $insertar);

                    if($ejecutar) {
                        echo '<div class="alert alert-success" role="alert">Insertado correctamente!</div>';
                    }
                }

                ?>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cedula</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                                $consulta = "SELECT * FROM clientes";
                                $ejecutar = mysqli_query($connection, $consulta);
                                $i = 0;

                                while($fila = mysqli_fetch_array($ejecutar)){
                                    $Nombre = $fila['nombre'];
                                    $Cedula = $fila['cedula'];
                                    $FechaNacimiento = $fila['fecha_nacimiento'];
                                    $Telefono = $fila['telefono'];
                                    $Direccion = $fila['direccion'];
                                    $Email = $fila['email'];

                                    $i++;
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $Nombre; ?></td>
                                    <td><?php echo $Cedula; ?></td>
                                    <td><?php echo $FechaNacimiento; ?></td>
                                    <td><?php echo $Direccion; ?></td>
                                    <td><?php echo $Telefono; ?></td>
                                    <td><?php echo $Email; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Opciones
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Cuenta actual</a>
                                                <a class="dropdown-item" href="#">Nueva factura</a>
                                                <a class="dropdown-item" href="#">Recibo de pago</a>
                                                <a class="dropdown-item" href="#">Abonar cuenta</a>
                                                <a class="dropdown-item" href="#">Cotización</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="customers.php?editar=<?php echo $id; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="customers.php?borrar=<?php echo $id; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="fas fa-times"></i></a>
                                        </div> 
                                    </td>
                                </tr>
                            </tbody>
                                <?php } ?>
                        </table>
                        <?php

                        if(isset($_GET['editar'])) {
                            include('editar.php');
                        }

                        if(isset($_GET['borrar'])) {
                            $borrar_id = $_GET['borrar'];
                            $borrar = "DELETE FROM clientes WHERE id = $borrar_id";
                            $ejecutar = mysql_query($connection, $borrar);

                            if($ejecutar) {
                                echo '<script>alert("Cliente Eliminado")</script>';
                                echo '<script>window.open("customers.php")</script>';
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente <i class="fas fa-user-plus"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="customers.php" method="post">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="Name">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Cedula</label>
                        <input type="text" class="form-control" name="cedula" id="cedula">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" id="Birthday">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="Phone">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label>Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="address">
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-trash-alt"></i> Cancelar</button>
        <button type="submit" name="btnSubmit" class="btn btn-success">Guardar Cliente <i class="fas fa-save"></i></button>
      </div>
        </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();

        //$( ".datepicker" ).datepicker();
    });
</script>









