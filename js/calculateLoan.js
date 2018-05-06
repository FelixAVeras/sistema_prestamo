$(document).ready(function() {
	$('#btncalcular').click(function() {
		
		var cuota = $('#numeroPagos').val();
		var monto = $('#montoPrestar').val();
		var pagare = $('#montoPago').val();
		
		var fecha = new Date($('#fechaPago').val());
		var dia = fecha.getDate() + 1;

		var interes = $('#interesPercent').val();

		var pagoInteres = pagare * interes;

		var resultado = monto / cuota ;
		var pagareresult = monto * interes / 100;
		
		console.log("Monto a pagar: " + resultado);
		console.log("???: " + pagareresult);
		
	});
});