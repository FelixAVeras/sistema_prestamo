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
                                <label>Nombre del cliente</label>
                                <?php
                                    $sql = "SELECT * FROM clientes";
                                    $result = mysqli_query($connection, $sql);

                                    echo "<select name='customerName' id='customerName' class='form-control'>";
                                    echo "<option value='0'>-- Seleccione --</option>";
                                    while($row = mysqli_fetch_array($result)) {
                                        echo "<option value='".$row['clienteID']."'>".$row['nombre']."</option>";
                                    }
                                    echo "</select>";
                                    
                                ?>
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
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Monto a Prestar</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="montoPrestar" id="montoPrestar">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Numero de cuotas(Pagos)</label>
                                <input type="number" class="form-control" name="numeroPagos" id="numeroPagos">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Monto a Pagar</label>
                                <input type="text" class="form-control" name="montoPago" id="montoPago">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Fecha de Pago</label>
                                <input type="date" class="form-control" name="fechaPago" id="fechaPago">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Interes % <a href="javascript:;" class="ml-5" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Si el interes que busca no esta en la lista? Eliga la opcion 'Seleccione' y haga click en el boton de 'Nuevo Prestamo'">Ayuda ?</a></label>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <select class="form-control" name="interesPercent" id="interesPercent">
                                            <option value="">-- Selecione --</option>
                                            <option value="5">5%</option>
                                            <option value="10">10%</option>
                                            <option value="15">15%</option>
                                            <option value="20">20%</option>
                                        </select>
                                        <input type="number" class="form-control mt-2 nuevoInteres" placeholder="Nuevo Interes">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <button type="button" class="btn btn-block btn-secondary" id="btnNuevoInteres" onclick="otroInteres()">Nuevo Interes</button:button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-check garanteCheck">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Requiere Garante</label>
                    </div>
                    <div class="row" id="filaGarante">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Nombre Garante</label>
                                <input type="text" class="form-control" name="nombreGarante" id="nombreGarante">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Cedula Garante</label>
                                <input type="text" class="form-control" name="cedulaGarante" id="cedulaGarante">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Telefono Garante</label>
                                <input type="text" class="form-control" name="telefonoGarante" id="telefonoGarante">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Telefono Garante #2</label>
                                <input type="text" class="form-control" name="telefonoGarante2" id="telefonoGarante2">
                            </div>
                        </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-info" id="btncalcular">Calcular Prestamo <i class="fas fa-calculator"></i></button>
                        <button type="submit" class="btn btn-success">Confirmar Prestamo <i class="fas fa-check"></i></button>
                        <button type="button" class="btn btn-danger">Cancelar Prestamo <i class="fas fa-times"></i></button>
                    </div>
                </form>
                <hr>
                <table class="table table-responsive table-hover table-striped"  id="tabla_factura">
                    <thead>
                        <tr>
                            <th># Pago</th>
                            <th>Fecha de pago</th>
                            <th>Cantidad a pagar</th>
                            <th>Interes</th>
                            <th>Cantidad a pagar + Interes</th>
                            <th>Total restante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>27-05-2018</td>
                            <td>2000</td>
                            <td>5%</td>
                            <td>2500</td>
                            <td>27500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-justify" id="ModalMessage"></h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
<script src="js/calculateLoan.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    function otroInteres() {
        var otro = document.getElementById('interesPercent').selectedIndex;
        var opciones = document.getElementById('interesPercent').options;
        
        $('input.nuevoInteres').css('display', 'block');
        $('select#interesPercent').prop('disabled', true);
        
    }
</script>









