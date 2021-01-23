<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h2>Agregar registro historico de uf</h2>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			<label>Fecha</label>                                
			<input type="date" name="fecha"  id="fecha" class="form-control input-md" placeholder="">                                
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			<label>Valor</label>                                
			<input type="number" name="valor"  id="valor" class="form-control input-md" placeholder="">                                
		</div>
	</div>
</div>
<div class="row justify-content-center" >
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
			<button id="AgregarRegistro" class="btn btn-success">Guardar</button>
	</div>	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
			<button class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#AgregarRegistro").on('click', function(){
		var controlador = 'Ctl_historico_uf/insertar';
		var parametros = {
				'fecha' : $('#fecha').val(),
				'valor' : $("#valor").val()
		};
		$.ajax({
			data:  parametros,
			url:   '<?php echo base_url();?>index.php/'+controlador,
			type:  'post',
			beforeSend: function( xhr ) {
			},
			success:  function (response) {
				alert(response);
			}
		});
	});
});
</script>
