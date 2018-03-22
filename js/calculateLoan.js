$(document).ready(funtion() {
	$('#btn-calcular').on('click', function() {

		var monto = $('input#montoPrestar').val();
		var cuota = $('input#numeroCuotas').val();
		var resultado = monto / cuota;

		var fecha = new Date();

		console.log(fecha);

	});
});