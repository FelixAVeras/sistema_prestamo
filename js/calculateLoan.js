$(document).ready(function() {
	$('#btncalcular').click(function() {
		
		var cuota = $('#numeroPagos').val();
		var monto = $('#montoPrestar').val();
		var pagare = $('#montoPago').val();
		
		var fecha = new Date($('#fechaPago').val());
		var dia = fecha.getDate() + 1;
		
		console.log(dia);
		
	});
});