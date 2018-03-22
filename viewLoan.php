<?php include("connection.php"); ?>

<?php include('header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-12">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="col-md-10 col-12">
            <h2>Historial de Prestamos y Pagos</h2>
            <br>
            <table class="table table-hover table-striped table-respnsive table-prestamo">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre Cliente</th>
                        <th>Total Prestado</th>
                        <th>Total Pagado</th>
                        <th>Cuotas Restantes</th>
                        <th>Moras/Retrazos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>