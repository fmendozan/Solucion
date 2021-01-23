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
