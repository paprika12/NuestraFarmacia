<?php
session_start();
if(!empty($_POST)){
	if(isset($_POST["selectMedicamento"]) &&isset($_POST["unidad"]) ){
		
		if($_POST["selectMedicamento"]!=""&& $_POST["unidad"]!=""  ){
			include "conexion.php";
			$user_id =0;
		    if(isset($_SESSION["user_id"])){
		    	$user_id = $_SESSION["user_id"];
		    }
			$sql = "SELECT md.*,c.Nombre as Centro  FROM `medicamentodisponible` as md, usuario as u, centroacopio_usuario as cu, centroacopio as c WHERE  md.idMedicamento = $_POST[selectMedicamento] and md.Unidad>0  and u.IdUsuario=cu.IdUsuario and cu.IdCentroAcopio=md.IdCentroAcopio and c.IdCentroAcopio=md.IdCentroAcopio limit 1 ";
			$resultado = $con->query($sql);
			$unidad=0;
			if($resultado!=null){
				$fila = mysqli_fetch_array($resultado);
				$unidad = $fila["Unidad"];
				$idCentro = $fila["IdCentroAcopio"];
				$centro= $fila["Centro"];
				$idDisponible= $fila["IdMedicamentoDisponible"];

		
			}

			$preaprobado=0;
			$espera=0;
			$disponibles=0;
			if($unidad>0){
					
					$dif = $unidad - $_POST["unidad"];
					if($dif<0){
						$preaprobado= $_POST["unidad"] + $dif;
						$espera = $dif * (-1);
						$disponibles = 0;
					}
					else if($dif >0){
						$preaprobado =$_POST["unidad"];
						$espera = 0;
						$disponibles = $dif;
					}
					else{
						$preaprobado = $_POST["unidad"];
						$espera = 0;
						$disponibles = 0;
					}
					
					$sql = "INSERT INTO `peticion`(`IdUsuario`, `IdMedicamentoDisponible`, `IdMedicamento`, `Unidad`, `Estatus`,  `FechaInsercion`) VALUES ( " . $user_id . " , " . $idDisponible . ",$_POST[selectMedicamento]," . $preaprobado . ",2,now())";
					$query = $con->query($sql);
					
					if ($espera >0){
					$sql = "INSERT INTO `peticion`(`IdUsuario`, `IdMedicamento`, `Unidad`, `Estatus`,  `FechaInsercion`) VALUES ( " . $user_id .  ",$_POST[selectMedicamento]," . $espera . ",1,now())";
					$query = $con->query($sql);
					

					}
					$sql = "UPDATE medicamentodisponible SET Unidad=".$disponibles."  WHERE IdMedicamento=$_POST[selectMedicamento] and IdCentroAcopio=".$idCentro;
					$query = $con->query($sql);
					
					print "<script>alert('Medicamentos en espera: ".$espera.", Medicamentos pre-aprobados: ".$preaprobado." ');window.location='../peticiones.php';</script>";
			}
			else{
					$sql = "INSERT INTO `peticion`(`IdUsuario`,  `IdMedicamento`, `Unidad`, `Estatus`,  `FechaInsercion`) VALUES ( " . $user_id .  ",$_POST[selectMedicamento],  $_POST[unidad] ,1,now())";
					$query = $con->query($sql);
					if($query!=null){
						print "<script>alert(\"Medicamentos en espera\");window.location='../peticiones.php';</script>";
					}
			}
					
					
					
			
		}
		else {

			print "<script>alert(\"Por favor llene todos los campos.\");window.location='../donar.php';</script>";
		}
	}
}



?>