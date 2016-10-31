<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}
?>
<html>
	<head>
		<title>Formulario de Registro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body style="background-color: #d3d3d3;">
	<?php include "php/navbaruser.php"; ?>
	<?php include "php/donar-edit.php"; ?>
	<?php include "php/utils.php"; ?>

<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Donaci&oacute;n</h2>

		<form role="form" name="registro" action="php/donar.php" method="post">
		  <div class="form-group">
		    <label for="selectMedicamento">Medicamento a donar:</label>
		    <?php  echo obtenerListaMedicamentosSelected($select_edit);?>
		  </div>
		  <div class="form-group">
		    <label for="unidad">Cantidad Unitaria</label>
		    <input type="text" class="form-control" id="unidad" name="unidad" value="<?php echo $unidad; ?>" >
		  </div>
		  <div class="form-group">
		    <label for="fechaExpiracion">Fecha de expiracion</label>
		    <input type="date" class="form-control" id="fechaExpiracion" name="fechaExpiracion" value="<?php echo $expiracion; ?>" >
		  </div>

		  <button type="submit" class="btn btn-default">Donar</button>
		</form>
		</div>
		</div>
		</div>
	<script src="js/jquery.js"></script>
	<script src="bootstrap\js\bootstrap.min.js"  ></script>
	</body>
</html>
