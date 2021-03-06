<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>
<div class="container">
	<header class="header clearfix">
		<nav>
		  <ul class="nav nav-pills float-right">
		    <li class="nav-item">
		      <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="#">About</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="#">Contact</a>
		    </li>
		  </ul>
		</nav>
		<h3 class="text-muted">Project name</h3>
	</header>
	<main role="main">
		<div class="row">
			<div class="col-md-12">
				<form id="form-search">
				  <div class="form-row">
				    <div class="col">
				      <div class="form-group">
						  <label class="col-form-label" for="userid">N° de Empleado</label>
						  <input type="text" class="form-control" id="userid" name="userid" placeholder="">
						  <div class="form-control-feedback" id="userid-feedback"></div>			
						</div>
				    </div>
				    <div class="col">
				      <div class="form-group">
						<label class="col-form-label" for="fecha1">Fecha inicial</label>
						<input type="text" class="form-control" id="fecha1" name="fecha1" placeholder="--Selecciona--">
						<div class="form-control-feedback" id="fecha1-feedback"></div>			
						</div>
				    </div>
				    <div class="col">
				      <div class="form-group">
						  <label class="col-form-label" for="fecha2">Fecha final</label>
						  <input type="text" class="form-control" id="fecha2" name="fecha2" placeholder="--Selecciona--">
						  <div class="form-control-feedback" id="fecha2-feedback"></div>			
						</div>
				    </div>
				      <div class="col">
				    		<div class="form-group">
				    			<label class="col-form-label" for="fecha2">&nbsp;</label>
				    		  <button type="submit" class="form-control btn btn-primary">Buscar</button>		
				    		</div>				      
				        </div>				    
				  </div>
				</form>				
			</div>			
		</div>
		<div class="row" id="response" style="display: none;">
		</div>		
	</main>
	<footer class="footer">
		<p>©Company 2017</p>
	</footer>	
</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		var x;
		x = $(document);
		x.ready(inicializarEventos);

		function inicializarEventos() {
			obtenerDatos();
		}

		function obtenerDatos() {  
			$('#form-search').submit(function(event){
				event.preventDefault();
				var userid = $("#userid").val();
			
				if (userid == null || userid.length == 0 || isNaN(userid) == true ) {
				  $("#userid").addClass('is-invalid');
				  $("#userid-feedback").html('Por favor ingresa un N° de empleado (valor numerico)');
				  return false;
				}
				else {
				  $("#userid").removeClass('is-invalid');
				  $("#userid-feedback").html('');
				}		

				$('#response').css({'display': 'none'});
				var data = "action=obtener-datos&" + $("#form-search").serialize();

				$.post("../controlador/checkinoutController.php", data, function(response) {							
					$('#response').html(response);	
					$('#response').fadeIn();				
				});  
			});   
		}

		$(function() {
			$("#fecha1").datepicker({
				dateFormat: "yy-mm-dd"
			});
			$("#fecha2").datepicker({
				dateFormat: "yy-mm-dd"
			});
		});
	</script>
</body>
</html>