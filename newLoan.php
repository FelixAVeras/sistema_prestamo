<?php include('connection.php'); ?>

<?php include('header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-12">
                <?php include('sidebar.php'); ?>
            </div>
            <div class="col-md-9 col-12">
                <h1 class="text-left">Nuevo Prestamo</h1>
                <form action="newLoan.php" method="post">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label>Nombre del cliente</label>&nbsp;<a href="" class="float-right">Cliente no aparece en la lista?</a>
                                <select name="customerName" id="customerName" class="form-control">
                                    <option value="">-- Seleccione Cliente --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Monto a Prestar</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" name="montoPrestar">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Numero de cuotas(Pagos)</label>
                                <input type="text" class="form-control" name="numeroPagos" id="numeroPagos">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Fecha de Pago</label>
                                <input type="date" class="form-control" name="fechaPago" id="fechaPago">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Requiere Garante</label>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Nombre Garante</label>
                                <input type="text" class="form-control" name="nombreGarante" id="nombreGarante">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Cedula Garante</label>
                                <input type="text" class="form-control" name="cedulaGarante" id="cedulaGarante">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Telefono Garante</label>
                                <input type="text" class="form-control" name="telefonoGarante" id="telefonoGarante">
                            </div>
                        </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-info" id="btncalcular">Calcular Prestamo <i class="fas fa-calculator"></i></button>
                        <button type="submit" class="btn btn-success">Confirmar Prestamo <i class="fas fa-check"></i></button>
                        <button type="button" class="btn btn-danger">Cancelar Prestamo <i class="fas fa-times"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include('footer.php'); ?>
<script src="js/calculateLoan.js"></script>









