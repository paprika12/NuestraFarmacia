<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["fullname"]) &&isset($_POST["apellidopaterno"]) &&isset($_POST["apellidomaterno"]) &&isset($_POST["email"]) &&isset($_POST["password"]) &&isset($_POST["confirm_password"]) &&isset($_POST["selectcentro"])){
		
		if($_POST["username"]!=""&& $_POST["fullname"]!="" &&$_POST["apellidopaterno"]!="" &&$_POST["apellidomaterno"]!="" &&$_POST["email"]!=""&&$_POST["password"]!=""&&$_POST["password"]==$_POST["confirm_password"] &&$_POST["selectcentro"]!=""){
			include "conexion.php";
			
			$found=false;
			$sql1= "select * from usuario where Usuario=\"$_POST[username]\" or correo=\"$_POST[email]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
			}
			$pass = sha1($_POST["password"]);
			$sql = "INSERT INTO `usuario`( `IdSupervisor`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Usuario`, `Contrasenia`, `Sexo`, `Estado`, `Municipio`, `Edad`, `Domicilio`, `CodigoPostal`, `Correo`, `Celular`, `Telefono1`, `Telefono2`, `FechaInsercion`) VALUES (0,\"$_POST[fullname]\",\"$_POST[apellidopaterno]\",\"$_POST[apellidomaterno]\",\"$_POST[username]\",\"" . $pass ."\",\"$_POST[sexo]\",\"$_POST[estado]\",\"$_POST[municipio]\",\"$_POST[edad]\",\"$_POST[domicilio]\",'',\"$_POST[email]\",\"$_POST[cel]\",\"$_POST[tel1]\",\"$_POST[tel2]\", now())";
			$query = $con->query($sql);
			$last_id = $con->insert_id;
			$sql = "INSERT INTO `centroacopio_usuario`(`IdCentroAcopio`, `IdUsuario`, `FechaInsercion`) VALUES ($_POST[selectcentro],".$last_id.", now())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso.\");window.location='../login.php';</script>";
			}
		}
	}
}



?>