<?php include("connection.php"); ?>
<?php include('header.php'); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-12">
      <?php include('sidebar.php'); ?>
    </div>
    <div class="col-md-10 col-12">
      <h2>Clientes</h2>
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar cliente..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <button type="button" data-toggle="modal" data-target="#newCustomer" class="btn btn-success float-right">Nuevo Cliente <i class="fa fa-user-plus"></i></button>
        </div>
      </div>

      <?php
        if(isset($_POST['insertar'])) {
          $nombre = $_POST['nameCustomer'];
          $cedula = $_POST['idcard'];
          $telefono = $_POST['phone'];
          $direccion = $_POST['address'];
          $email = $_POST['email'];

          $insertar = "INSERT INTO customers(nameCustomer, idcard, phone, address, email, phone) VALUES('$nombre', '$cedula', '$telefono', '$direccion', '$email', '$phone')";

          $ejecutar = mysqli_query($connection, $insertar);

          if ($ejecutar) {
            echo "<div class='alert alert-success'>Insertado correctamente!</div>";
            header('location: customers.php');
          }
        }
      ?>
      
      <table class="table table-hover table-responsive table-customer">
        <thead class="thead-dark">
          <!-- <th></th> -->
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
          $i = 0;

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
          <!-- <td><?php //echo $photo; ?> <img src="img/avatar.png"></td> -->
          <td id="cName"><a href=""><?php echo $nombre; ?></a></td>
          <td id="cCedula"><?php echo $cedula; ?></td>
          <td id="cPhone"><?php echo $telefono; ?></td>
          <td id="cAddress"><?php echo $direccion; ?></td>
          <td id="cEmail"><?php echo $email; ?></td>
          <td id="cMoney">N/A</td>
          <td>
            <div class="dropdown">
              <a href="#" data-toggle="dropdown">Crear</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Nueva Prestamo</a>
                  <a class="dropdown-item" href="#">Recibo de pago</a>
                  <a class="dropdown-item" href="#">Abonar cuenta</a>
                  <a class="dropdown-item" href="#">Cotización</a>
                </div>
            </div>
          </td>
          <td><a href="editCustomer.php?editar=<?php echo $id;?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil-alt"></i></a></td>
          <td><a href="customers.php?eliminar=<?php echo $id;?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash-alt"></i></a></td>
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
                <form action="customers.php" method="post" enctype="multipart/form-data">
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
                    <div class="form-group">
                      <label class="sr-only">Foto:</label>
                      <input type="file" class="form-control" name="photo" placeholder="Cedula">
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
<?php
  if(isset($_GET['delete'])) {
    $borrar_id = $_GET['delete'];
    $borrar = "DELETE FROM customers WHERE id='$borrar_id'";
    $ejecutar = mysqli_query($connection, $borrar);

    if($ejecutar) {
      echo "<script>alert('Cliente Actualizado')</script>";
      echo "<script>window.open('customers.php', '_self')</script>";
    }
  }
?>

<?php include('footer.php'); ?>
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>