<?php
session_start();
?>
<html>
	<head>
		<title>Nuestra Farmacia MX</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
	</head>
	<body style="background-color: #d3d3d3;">
	<?php include "php/navbar.php"; ?>
	<div class="container">
		<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="Images/fondos/fondo1.jpg" alt="Bienvenidos">
          <div class="container">
            <div class="carousel-caption" style="top:120px;">
              <h1 style="background-color: rgba(0, 0, 0, 0.5); border-radius: 25px; padding: 20px;"><strong>Bienvenidos a Nuestra Farmacia MX</strong></h1>
              <br/>
              <p style="background-color: rgba(0, 0, 0, 0.5); border-radius: 25px; padding: 10px;">
                Un lugar donde puedes donar tus medicamentos para los mas necesitados.
              </p>
              <p>
                <a class="btn btn-lg btn-primary" href="mailto:contacto@nuestrafarmacia.mx" role="button">Cont&aacute;ctanos</a>
              </p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="Images/fondos/fondo4.jpg" alt="Imagen 2">
          <div class="container">
            <div class="carousel-caption" style="top:120px;">
              <h1 style="background-color: rgba(0, 0, 0, 0.5); border-radius: 25px; padding: 20px;">Dona tus medicinas, dona salud.</h1>
							<p style="background-color: rgba(0, 0, 0, 0.5); border-radius: 25px; padding: 10px;">
								Traenos todas tus medicinas que tengas guardadas en casa y que est&eacute;n en buen estado. Millones de personas te lo agradecer&aacute;n
							</p>
              <p>
                <a class="btn btn-lg btn-primary" href="./registro.php" role="button">Reg&iacute;strate</a>
              </p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="Images/fondos/fondo5.jpg" alt="Imagen 2">
          <div class="container">
            <div class="carousel-caption" style="top:120px;">
              <h1 style="background-color: rgba(0, 0, 0, 0.5); border-radius: 25px; padding: 20px;">Accede a medicinas sin costo.</h1>
              <p style="background-color: rgba(0, 0, 0, 0.5); border-radius: 25px; padding: 10px;">&Uacute;nete a nuestra comunidad y solicita el medicamento que necesites. Alguien te lo puede donar.</p>
              <p><a class="btn btn-lg btn-primary" href="./registro.php" role="button">Reg&iacute;strate</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
			<!--<h2>Nuestra Farmacia</h2>
			<p class="lead">Sistema de donacion de medicamento</p>
			<p>Instrucciones:</p>
			<ol>
				<li>Registrate en la opcion de registro.</li>
				<li>Inicie sesion en la opcion de login.</li>
				<li>Para finalizar la sesion, click en la opcion salir .</li>
			</ol>-->
	</div>
	<div class="container">
		<p class="pull-right"><a href="mailto:contacto@nuestrafarmacia.mx">contacto@nuestrafarmacia.mx</a></p>
		<p>&copy; 2016 CPMX7. Version 0.5 (Alfa)</p>
	</div>
	<script src="js/jquery.js"></script>
	<script src="bootstrap\js\bootstrap.min.js"  ></script>
	</body>
</html>
