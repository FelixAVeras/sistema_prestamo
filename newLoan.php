<?php include("connection.php"); ?>

<?php include('header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-12">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="col-md-10 col-12">
            <h2>Nuevo Prestamo</h2>
            <br>
            <form action="js/calculateLoan.js" method="post">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <div class="form-group">
                            <label>Nombre Cliente:</label>
                            <select name="customerName" id="customerName" class="form-control">
                                <option value="">-- Seleccione --</option>
                                
                                <option value="other">Otro..</option>
                            </select>
                            <input type="text" name="otherCustomer" id="otherCustomer" class="form-control" placeholder="Nuevo cliente" hidden>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Telefono:</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Fecha de pago:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" name="fechaPago" id="fechaPago">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Numero de cuotas:</label>
                            <input type="number" class="form-control" id="numeroCuotas" name="numeroCuotas">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Monto a Prestar:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" id="montoPrestar" name="montoPrestar" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="nombreGrarante" id="nombreGrarante" class="form-control datosGarante" placeholder="Nombre del garante">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="telefonoGrarante" id="telefonoGrarante" class="form-control datosGarante" placeholder="Teléfono del garante">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="telefonoGrarante" id="telefonoGrarante" class="form-control datosGarante" placeholder="Cedula del garante">
                        </div>
                    </div>
                </div>
                <button type="button" id="btn-calcular" class="btn btn-secondary">Calcular</button>
                <button type="submit" name="btn-confirm" id="btn-confirm" class="btn btn-success">Confirmar Prestamo</button>
                <a href="index.php" class="btn btn-danger">Cancelar todo</a>
            </form>
            <br>
            <hr>
            <table class="table table-hover table-striped table-respnsive table-prestamo" hidden>
                <thead class="thead-dark">
                    <tr>
                        <th>Numero de pago</th>
                        <th>Dia del pago</th>
                        <th>Monto a pagar</th>
                        <th>Moras/atrasos</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-success"><i class="fa fa-check"></i></button></td>
                        <td><button class="btn btn-warning"><i class="fa fa-pencil-alt"></i></button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Total: </th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>