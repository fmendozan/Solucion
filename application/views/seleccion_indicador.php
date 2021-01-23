<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			Seleccionar indicador: <br>
			<select name="seleccion_dato" id="seleccion_dato"></select>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div id="graficoBarras" class="graficoBarras">
			</div>	
		</div>
	</div>
</div>
<script type="text/javascript">
function aleatorio(minimo,maximo){
  return Math.floor(Math.random() * ((maximo+1)-minimo)+minimo);
}
$(document).ready(function(){
	$.ajax({
		url:   'https://mindicador.cl/api',
		type: 'get',
		dataType: 'json'
	}).done(function(response) {
		var seleccione = "<option value=''>Seleccionar...</option>";
		$("#seleccion_dato").append(seleccione);
		for(var key1 in response){
			if(key1 == "version" || key1 == "autor" || key1 == "fecha"){}
			else{
				var options=$("<option></option>");
				$("#seleccion_dato").append(
					options.attr("value", key1).text(key1)
				);
			}
		}
	}).fail(function(err) {
		console.log("error api " + err);
	});
});
$("#seleccion_dato").on('change', function(){
	if($(this).val() == ""){
		alert('Favor de seleccionar un elemento del listado');
		$('.graficoBarras').html("");
		return false;
	}else{
		$.ajax({
			url:   'https://mindicador.cl/api/'+$(this).val(),
			type: 'get',
			dataType: 'json'
		}).done(function(response) {
			var arrayFechas = [];
			var arrayValores = [];
			var arrayRGB = [];
			var rgb1 = 0;
			var rgb2 = 0;
			var rgb3 = 0;
			var textoRGB = "";
			var TituloGrafico = "";
			var UnidadMedida = "";
			$.each(JSON.parse(JSON.stringify(response)), function(key, value){
				if(key == "nombre"){
					TituloGrafico = value;
				}
				if(key == "unidad_medida"){
					UnidadMedida = value;
				}
				if(key == "serie"){
					$.each(value,function(key2, value2){
						rgb1 = aleatorio(0, 500);
						rgb2 = aleatorio(0, 500);
						rgb3 = aleatorio(0, 500);
						textoRGB = "rgb("+rgb1+","+rgb2+","+rgb3+")";
						arrayFechas.push(value[key2].fecha.split('T')[0]);
						arrayValores.push(value[key2].valor);
						arrayRGB.push(textoRGB);
					});
				}
			});
			$('.graficoBarras').html("<canvas id='myChart' width='300' height='200'></canvas>");
			var ctx = document.getElementById("myChart").getContext("2d");
			var grafico = new Chart(ctx, {
				type: "bar",
				data: {
					labels: arrayFechas,
					datasets: [{
						label: TituloGrafico+" ("+UnidadMedida+")",
						data: arrayValores,
						backgroundColor: arrayRGB
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		}).fail(function(err) {
			console.log("error api " + err);
		});
	}
});
</script>
