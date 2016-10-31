<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}
?>
<html>
	<head>
		<title>Validar Donacion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body style="background-color: #d3d3d3;">
	<?php include "php/navbar.php"; ?>
	<?php include "php/utils.php"; ?>

<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Validar Donaci&oacute;n</h2>

		<form role="form" name="registro" action="php/validardonacion.php?donacion=<?php echo $_GET["donacion"];  ?>" class="well bs-component" method="post">
		  <div class="form-group">
		    <label for="selectstatus">Estatus:</label>
		    <?php  echo obtenerListaStatus(); ?>
		  </div>
		  <div class="form-group">
		    <label for="comentarios">Comentarios:</label>
		    <input type="text" class="form-control" id="comentarios" name="comentarios" placeholder="comentarios">
		  </div>
		  
		  
		  <button type="submit" class="btn btn-default">Enviar</button>
		</form>
		</div>
		</div>
		</div>
	<script src="js/jquery.js"></script> 
	<script src="bootstrap\js\bootstrap.min.js"  ></script>
	</body>
</html>