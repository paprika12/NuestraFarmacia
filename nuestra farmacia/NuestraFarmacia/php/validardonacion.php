<?php
session_start();
include "conexion.php";
include "utils.php";

if(!empty($_POST)){
	if(isset($_POST["selectstatus"]) &&isset($_POST["comentarios"]) ){
		
		if($_POST["selectstatus"]!="" && $_POST["comentarios"]!=""  ){
			
			$user_id =0;
    		if(isset($_GET["donacion"])){
   			$user_id = $_GET["donacion"];
			}
		
					$sql = "UPDATE usuario_medicamento SET Estatus=$_POST[selectstatus], Comentarios ='$_POST[comentarios]'  WHERE IdDonacion=".$user_id;
					$query = $con->query($sql);
					$status = obtenerEstatus($_POST["selectstatus"]);

					if($_POST["selectstatus"]==3){
					$sql = "SELECT md.IdMedicamentoDisponible,md.Unidad, um.Unidad as UnidadNueva FROM `medicamentodisponible` as md,`medicamento` as m,usuario_medicamento as um,usuario as u,centroacopio_usuario as cu  WHERE  md.IdMedicamento=m.IdMedicamento and m.IdMedicamento=um.IdMedicamento and um.IdDonacion= ".$user_id." and um.IdUsuario = u.IdUsuario  and cu.IdUsuario=u.IdUsuario and cu.IdCentroAcopio=md.IdCentroAcopio limit 1";
					$resultado = $con->query($sql);
					$total=0;
					if($resultado!=null){
						$fila = mysqli_fetch_array($resultado);
						$total = $fila["UnidadNueva"] + $fila["Unidad"] ;
						
						if($total==0){
							$sql = "SELECT d.IdMedicamento,d.Unidad FROM `usuario_medicamento` as d WHERE  d.IdDonacion=".$user_id;
							$resultado = $con->query($sql);
							$idMed=0;
							$unidad=0;
							if($resultado!=null){
								$fila = mysqli_fetch_array($resultado);
								$idMed=$fila["IdMedicamento"];
								$unidad = $fila["Unidad"];
							}
							
								$sql = "INSERT INTO `medicamentodisponible`(`IdCentroAcopio`, `IdMedicamento`, `Unidad`, `FechaInsercion`) VALUES ( 1,".$idMed.",".$unidad.",now())";
								$query = $con->query($sql);
								if($query!=null){
								//print "<script>alert(\"Medicamento Disponible.\");window.location='../donaciones.php';</script>";
					
								}
						}
						else{
							$sql = "UPDATE medicamentodisponible SET Unidad=".$total."  WHERE IdMedicamentoDisponible=$fila[IdMedicamentoDisponible]";
							$query = $con->query($sql);
						}
					}
					
				}
				print "<script>alert('Medicamento ".$status."  ');window.location='../donacionessuper.php';</script>";	
					
			}
			else{
					
						print "<script>alert('Porfavor completa los campos');window.location='../donacionessuper.php';</script>";
					
			}
					
					
					
			
		
	}
}



?>