<?php include("connection.php"); ?>
<?php include('header.php'); ?>

<?php

if(isset($_GET['editar'])) {
	$editar_id = $_GET['editar'];

	$consulta = "SELECT * FROM customers WHERE id = $editar_id";
	$ejecutar = mysqli_query($connection, $consulta);

	$row = mysqli_fetch_array($ejecutar);

	$nombre = $row['nameCustomer'];
    $cedula = $row['idcard'];
    $telefono = $row['phone'];
    $direccion = $row['address'];
    $email = $row['email'];
}

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-12">
      		<?php include('sidebar.php'); ?>
    	</div>
    	<div class="col-md-10 col-12">
      		<h2>Editar Cliente</h2>
      		<hr>
      		<form action="" method="POST">
      			<div class="row">
      				<div class="col-md-4 col-12">
	      				<div class="form-group">
				    		<label class="sr-only">Nombre:</label>
				    		<input type="text" class="form-control" name="nameCustomer" value="<?php $customers; ?>">
						</div>
	      			</div>
	      			<div class="col-md-4 col-12">
	      				<div class="form-group">
					    	<label class="sr-only">Cedula:</label>
					      	<input type="text" class="form-control" name="idcard" value="<?php $customers; ?>">
					    </div>
	      			</div>
	      			<div class="col-md-4 col-12">
	      				<div class="form-group">
				      		<label class="sr-only">Telefono</label>
				      		<input type="text" class="form-control" name="phone" value="<?php $customers; ?>">
						</div>
	      			</div>
      			</div>
      			<div class="row">
      				<div class="col-md-6 col-12">
      					<div class="form-group">
							<label class="sr-only">Direccion:</label>
							<input type="text" class="form-control" name="address" value="<?php $customers; ?>">
						</div>
      				</div>
      				<div class="col-md-6 col-12">
      					<div class="form-group">
							<label class="sr-only">Email:</label>
							<input type="text" class="form-control" name="email" value="<?php $customers; ?>">
						</div>
      				</div>
      			</div>
      			<div class="btn-group" role="group" aria-label="Basic example">
					<a href="customers.php" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar</a>
					<button type="button" name="update" class="btn btn-success">Guardar Cambios <i class="fa fa-save"></i></button>
				</div>
			</form>
    	</div>
    	<?php
			if(isset($_POST['update'])) {

				$nombre = $row['nameCustomer'];
			    $cedula = $row['idcard'];
			    $telefono = $row['phone'];
			    $direccion = $row['address'];
			    $email = $row['email'];

				$consulta = "UPDATE customers SET nameCustomer='$nombre', idcard='$cedula', phone='$telefono', address='$direccion', email='$email' WHERE id='editar_id';"
				
				$ejecutar = mysqli_query($connection, $consulta);

				if ($ejecutar) {
					echo "<script>alert('Cliente Actualizado')</script>";
					echo "<script>window.open('customers.php', '_self')</script>";
				}
			}

		?>
	</div>
</div>
<?php include('footer.php'); ?>
