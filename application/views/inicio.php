<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php $this->load->view('css'); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="modal fade" id="modal_contenido" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-large">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<div class="modal-body">
				<h2>Modal title</h2>
				<p>Curabitur blandit mollis lacus. Nulla sit amet est. Suspendisse nisl elit, rhoncus eget, elementum ac, condimentum eget, diam. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Cras sagittis.</p>
			</div>
			<!--<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>-->
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<button href="#" class="opciones btn btn-success" controlador="<?= base_url();?>index.php/Ctl_indicadores/index">Revisar gráfico</button>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<button href="#" class="opciones btn btn-success" controlador="<?= base_url();?>index.php/Ctl_historico_uf/index">Revisar historico UF</button>
	</div>
	<div class="content" id="contenido">
	</div>
</div>
<?php $this->load->view('js'); ?>
<script>
	$(document).ready(function(){
		$('.opciones').click(function() {			
			var URL=$(this).attr('controlador');
			$.ajax({                                      
				url:URL ,
				beforeSend: function () {
					console.log('cargando..');
				},
				success: function(res)
				{
					$("#contenido").html(res);
				} 
			});
		});
	});
</script>
</body>
</html>
