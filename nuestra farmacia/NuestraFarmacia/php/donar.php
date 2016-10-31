<?php
session_start();
if(!empty($_POST)){
	if(isset($_POST["selectMedicamento"]) &&isset($_POST["unidad"]) &&isset($_POST["fechaExpiracion"]) ){
		
		if($_POST["selectMedicamento"]!=""&& $_POST["unidad"]!="" &&$_POST["fechaExpiracion"]!="" ){
			include "conexion.php";

			$user_id =0;
    			if(isset($_SESSION["user_id"])){
        			$user_id = $_SESSION["user_id"];

			    }
			
			$sql = "INSERT INTO `usuario_medicamento`(`IdUsuario`, `IdMedicamento`, `Unidad`, `FechaExpiracion`,`Estatus`, `FechaInsercion`) VALUES ( " . $user_id . " ,$_POST[selectMedicamento],$_POST[unidad],\"$_POST[fechaExpiracion]\",1,now())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso, Estaremos esperando tu medicamento.\");window.location='../donaciones.php';</script>";
			
		}
		}
		else {

			print "<script>alert(\"Por favor llene todos los campos.\");window.location='../donar.php';</script>";
		}
	}
}



?>