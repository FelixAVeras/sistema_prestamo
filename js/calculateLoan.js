$(document).ready(function() {

	$('#btncalcular').click(function() {
		
		var cuota = $('#numeroPagos').val();
		var monto = $('#montoPrestar').val();
		var pagare = $('#montoPago').val();
		var fecha = new Date($('#fechaPago').val());
		var dia = fecha.getDate() + 1;
		var interes = $('#interesPercent').val();
		var nuevoInteres = $('.nuevoInteres').val();

		var pagoInteres = pagare * interes;
		var resultado = monto / cuota ;
		var pagareresult = monto * interes / 100;

		var checkBox = document.getElementById('exampleCheck1');
		if(monto > 25000) {
			$('#exampleModal').modal('show');
			$('h3#ModalMessage').text('Para cantidades mayores a $25,000 debe tener un garante. Selecione la casilla "Requiere Garante" y complete los datos');

			if($('#exampleModal').modal('hide')) {
				$('.garanteCheck').css('display', 'block');
			}
		}
		else {
			$('.garanteCheck').css('display', 'none');
		}

		$('#exampleCheck1').change(function() {
			$('#filaGarante').toggle();
		});
		

		// console.log(cuota);
		// console.log(monto);
		// console.log(pagare);
		// console.log(fecha);
		// console.log(dia);
		// console.log(interes);
		// console.log(nuevoInteres);
		
		// console.log("Monto a pagar: " + resultado);
		// console.log("???: " + pagareresult);
		
	});
});