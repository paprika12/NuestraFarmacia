<?php session_start(); ?>
<html>
	<head>
		<title>Formulario de Registro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body style="background-color: #d3d3d3;">
	<?php include "php/navbar.php"; ?>
	<?php include "php/utils.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Registro</h2>

		<form role="form" name="registro" action="php/registro.php" class="well bs-component"  method="post">
		  <div class="form-group">
		    <label for="apellidopaterno">Apellido Paterno</label>
		    <input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" placeholder="Apellido Paterno">
		  </div>
		  <div class="form-group">
		    <label for="apellidomaterno">Apellido Materno</label>
		    <input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno" placeholder="Apellido Materno">
		  </div>
		  <div class="form-group">
		    <label for="fullname">Nombre</label>
		    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre">
		  </div>

		  <div class="form-group">
		  <label >Sexo</label>
		  <br>
		    <label class="radio-inline">
		    <input type="radio"  name="sexo" value="F">F</label>
		    <label class="radio-inline">
		    <input type="radio"  name="sexo" value="M">M</label>
		  </div>
		   <div class="form-group">
		    <label for="edad">Edad</label>
		    <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad">
		  </div>
		  <div class="form-group">
		    <label for="estado">Estado</label>
		    <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
		  </div>
		   <div class="form-group">
		    <label for="municipio">Municipio</label>
		    <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio">
		  </div>
		  <div class="form-group">
		    <label for="selectCentro">Centro de acopio mas cercano:</label>
		    <?php  echo obtenerListaCentros(); ?>
		  </div>
		   <div class="form-group">
		    <label for="domicilio">Domicilio</label>
		    <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio">
		  </div>
		  <div class="form-group">
		    <label for="email">Correo Electronico</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		  </div>
		   <div class="form-group">
		    <label for="cel">Celular</label>
		    <input type="cel" class="form-control" id="cel" name="cel" placeholder="Celular">
		  </div>
		   <div class="form-group">
		    <label for="tel1">Telefono</label>
		    <input type="tel1" class="form-control" id="tel1" name="tel1" placeholder="Telefono">
		  </div>
		   <div class="form-group">
		    <label for="tel2">Telefono alternativo</label>
		    <input type="tel2" class="form-control" id="tel2" name="tel2" placeholder="Telefono">
		  </div>
		  <div class="form-group">
		  <div class="form-group">
		    <label for="username">Usuario</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		  </div>
		  <div class="form-group">
		    <label for="confirm_password">Confirmar Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contrase&ntilde;a">
		  </div>
			</div>
		  <button type="submit" class="btn btn-default">Registrar</button>
		</form>
		</div>
		</div>
		</div>
	<script src="js/jquery.js"></script>
	<script src="bootstrap\js\bootstrap.min.js"  ></script>
	<script src="js/valida_registro.js"></script>
	</body>
</html>
