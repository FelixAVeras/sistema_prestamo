<?php include("connection.php"); ?>
<?php include('header.php'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-12">
      <?php include('sidebar.php'); ?>
    </div>
    <div class="col-md-10 col-12">
      <h2>Clientes</h2>
      <div class="btn-group  float-right">
        <button type="button" data-toggle="modal" data-target="#newCustomer" class="btn btn-success">Nuevo Cliente</button>
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
      </div>
      <br>
      <?php
        if(isset($_POST['insertar'])) {
            $nombre = $_POST['nameCustomer'];
            $cedula = $_POST['idcard'];
            $telefono = $_POST['phone'];
            $direccion = $_POST['address'];
            $email = $_POST['email'];

            $insertar = "INSERT INTO customers(nameCustomer, idcard, phone, address, email) VALUES('$nombre', '$cedula', '$telefono', '$direccion', '$email')";

            $ejecutar = mysqli_query($connection, $insertar);

            if ($ejecutar) {
                echo "<div class='alert alert-success'>Insertado correctamente!</div>";
                header('location: customers.php');
            }
        }
      ?>
      
      <table class="table table-hover table-striped table-responsive table-customer">
        <thead class="thead-dark">
          <th>Nombre</th>
          <th>Cedula</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>E-mail</th>
          <th>Saldo Pendiente</th>
          <th>Accion</th>
          <th></th>
          <th></th>
        </thead>
        <?php
          $consulta = "SELECT * FROM customers";
          $ejecutar = mysqli_query($connection, $consulta);

          while($row = mysqli_fetch_array($ejecutar)) {
            $id = $row['id'];
            $nombre = $row['nameCustomer'];
            $cedula = $row['idcard'];
            $telefono = $row['phone'];
            $direccion = $row['address'];
            $email = $row['email'];
            $i++;
          
        ?>
        <tbody>
          <!-- <td><?php //echo $id; ?></td> -->
          <td><a href=""><?php echo $nombre; ?></a></td>
          <td><?php echo $cedula; ?></td>
          <td><?php echo $telefono; ?></td>
          <td><?php echo $direccion; ?></td>
          <td><?php echo $email; ?></td>
          <td>
            <div class="dropdown">
              <a href="#" data-toggle="dropdown">Crear</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Nueva factura</a>
                  <a class="dropdown-item" href="#">Recibo de pago</a>
                  <a class="dropdown-item" href="#">Abonar cuenta</a>
                  <a class="dropdown-item" href="#">Cotización</a>
                </div>
            </div>
          </td>
          <td><a href="customers.php?editar=<?php echo $id;?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a></td>
          <td><a href="customers.php?eliminar=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a></td>
        </tbody>
        <?php } ?>
      </table>

    </div>
  </div>

  <!-- Modal -->
    <div class="modal fade" id="newCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo cliente <i class="fa fa-user-plus"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="customers.php" method="post">
                    <div class="form-group">
                      <label class="sr-only">Nombre:</label>
                      <input type="text" class="form-control" name="nameCustomer" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <label class="sr-only">Cedula:</label>
                      <input type="text" class="form-control" name="idcard" placeholder="Cedula">
                    </div>
                    <div class="form-group">
                      <label class="sr-only">Telefono</label>
                      <input type="text" class="form-control" name="phone" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                      <label class="sr-only">Direccion:</label>
                      <input type="text" class="form-control" name="address" placeholder="Direccion">
                    </div>
                    <div class="form-group">
                      <label class="sr-only">Email:</label>
                      <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="insertar" class="btn btn-success">Guardar <i class="fa fa-save"></i></button>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
