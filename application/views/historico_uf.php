<div class="content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<br>
			<h2 style="text-align: center;">
				Historico UF
			</h2>
			<br>
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
							echo "<tr><td style='display: none;'>".$tmp->id."</td><td>".$tmp->fecha."</td><td>".$tmp->valor."</td><td><input type='button' class='btn btn-success botoneditar' data-id='".$tmp->id."' data-fecha='".$tmp->fecha."' data-valor='".$tmp->valor."' value='Editar'></td><td><input type='button' class='btn btn-success botoneditar' data-id='".$tmp->id."' value='Eliminar'></td></tr>";
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
});
</script>
