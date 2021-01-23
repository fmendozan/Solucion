<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h2>Agregar registro historico de uf</h2>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
	<input type="hidden" id="id" name="id" value="<?php echo $juf[0]->id;?>">
			<label>Fecha</label>                                
			<input type="date" name="fecha"  id="fecha" class="form-control input-md" value="<?=$juf[0]->fecha;?>" placeholder="">                                
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			<label>Valor</label>                                
			<input type="number" name="valor"  id="valor" class="form-control input-md" value="<?=$juf[0]->valor;?>" placeholder="">                                
		</div>
	</div>
</div>
<div class="row justify-content-center" >
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
			<button id="ActualizarRegistro" class="btn btn-success">Actualizar</button>
	</div>	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
			<button class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#ActualizarRegistro").on('click', function(){
		var controlador = 'Ctl_historico_uf/Actualizar';
		var parametros = {
			'id' :$('#id').val(),
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
