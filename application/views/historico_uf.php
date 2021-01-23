<div class="content">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<br>
			<h2 style="text-align: center;">
				Historico UF
			</h2>
			<br>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<button id="nuevo_historico" class="btn btn-success btn-md">Nuevo historico</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<table class="table">
				<thead>
					<tr>
						<th style="display: none;">
							Id
						</th>
						<th>
							Fecha
						</th>
						<th>
							Valor
						</th>
						<th>
							Editar
						</th>
						<th>
							Eliminar
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach(json_decode($juf) as $tmp){
							echo "<tr><td style='display: none;'>".$tmp->id."</td><td>".$tmp->fecha."</td><td>".$tmp->valor."</td><td><input type='button' class='btn btn-success botoneditar' data-id='".$tmp->id."' data-fecha='".$tmp->fecha."' data-valor='".$tmp->valor."' value='Editar'></td><td><input type='button' class='btn btn-success botoneliminar' data-id='".$tmp->id."' value='Eliminar'></td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('#nuevo_historico').click(function() {
		var controlador='Ctl_historico_uf/nuevo_registro';
		if (typeof controlador !== typeof undefined && controlador !== false)
		{
			$.ajax({
			  method: 'POST',
			  url: '<?php echo base_url();?>index.php/'+controlador,
			  beforeSend: function( xhr ) {
			  }
			})
			.done(function( msg ) {
				$('#modal_contenido .modal-body').html(msg);
				$('#modal_contenido').modal('show');
			});
		}
    });	
	$('.botoneditar').click(function() {
		var controlador='Ctl_historico_uf/editar_registro';
		var id = $(this).data('id');
		var parametros = {
			'id' : id
		};
		if (typeof controlador !== typeof undefined && controlador !== false)
		{
			$.ajax({
				data: parametros,
			  method: 'POST',
			  url: '<?php echo base_url();?>index.php/'+controlador,
			  beforeSend: function( xhr ) {
			  }
			})
			.done(function( msg ) {
				$('#modal_contenido .modal-body').html(msg);
				$('#modal_contenido').modal('show');
			});
		}
    });
	$('.botoneliminar').click(function() {
		var controlador='Ctl_historico_uf/Eliminar';
		var id = $(this).data('id');
		var parametros = {
			'id' : id
		};
		if (typeof controlador !== typeof undefined && controlador !== false)
		{
			$.ajax({
				data: parametros,
			  method: 'POST',
			  url: '<?php echo base_url();?>index.php/'+controlador,
			  beforeSend: function( xhr ) {
			  }
			})
			.done(function( msg ) {
				alert(msg);
			});
		}
    });	
});
</script>
