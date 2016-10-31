<nav class="navbar navbar-default" role="navigation">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./">
      <img src="../Images/logo.png" height="60px" style="margin-top:-20px" align="left">
      <strong>Nuestra Farmacia</strong>
    </a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <?php if(!isset($_SESSION["user_id"])):?>
      <li><a href="./registro.php">REGISTRO</a></li>
      <li><a href="./login.php">LOGIN</a></li>
    <?php elseif($_SESSION["user_id"]=="0"):?>
      <li><a href="./donacionessuper.php">Lista de Donaciones</a></li>
       <li><a href="./disponiblessuper.php">Lista de Disponibles</a></li>
       <li><a href="./peticionessuper.php">Lista de Peticiones</a></li>
       <li><a href="./php/logout.php">Salir</a></li>  
     <?php else:?>
      <li><a href="./donaciones.php">Mis Donaciones</a></li>
       <li><a href="./disponibles.php">Lista de Disponibles</a></li>
       <li><a href="./peticiones.php">Peticiones</a></li>
       <li><a href="./php/logout.php">Salir</a></li>
    <?php endif;?>
    </ul>

  </div><!-- /.navbar-collapse -->
</div>
</nav>
