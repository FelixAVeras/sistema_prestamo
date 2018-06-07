<?php
    session_start();
    include('connection.php');
?>

<?php include('header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-12">
                <?php include('sidebar.php'); ?>
            </div>
            <div class="col-md-9 col-12">
                <h1 class="text-left">Nombre del cliente <small class="text-muted">Perfil del cliente</small></h1>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <ul class="profileDetailsList">
                                    <li><strong>Fecha de Nacimiento:</strong></li>
                                    <li><strong>Direccion:</strong></li>
                                    <li><strong>Cedula:</strong></li>
                                    <li><strong>Telefono:</strong></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6">
                                <ul class="profileDetailsList">
                                    <li><strong>Celular:</strong></li>
                                    <li><strong>Email:</strong></li>
                                    <li><strong>Garante:</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-left mt-4">Historial de Prestamos</h3>
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Monto Prestado</th>
                            <th>Total Pagado</th>
                            <th>Garante</th>
                            <th>Estatus</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>RD$17,000</td>
                            <td>RD$20,000</td>
                            <td>No</td>
                            <td>Pagado</td>
                            <td><a href="#" data-toggle="modal" data-target="#exampleModal">Ver detalles</a></td>
                        </tr>
                        <tr>
                            <td>RD$33,000</td>
                            <td>RD$13,200</td>
                            <td>Si</td>
                            <td>En Proceso</td>
                            <td><a href="#" data-toggle="modal" data-target="#exampleModal">Ver detalles</a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>









