$(document).ready(function() {
	$('#btncalcular').click(function() {
		
		var cuota = $('#numeroCuotas').val();
		var monto = $('#montoPrestar').val();
		
		var fecha = new Date($('#fechaPago').val());
		var dia = fecha.getDate() + 1;
		
		var resultado = monto / cuota;
		
		for(resultado = 0; resultado = monto; resultado++){
			var pago = monto - resultado;
		}
		console.log(pago);
	});
});