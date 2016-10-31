<?php
session_start();
include "conexion.php";
include "utils.php";

if(!empty($_POST)){
	if(isset($_POST["selectstatus"]) &&isset($_POST["comentarios"]) ){
		
		if($_POST["selectstatus"]!="" && $_POST["comentarios"]!=""  ){
			
			$user_id =0;
    		if(isset($_GET["peticion"])){
   			$user_id = $_GET["peticion"];
			}
		
					$sql = "UPDATE peticion SET Estatus=$_POST[selectstatus], Comentarios ='$_POST[comentarios]'  WHERE IdPeticion=".$user_id;
					$query = $con->query($sql);
					$status = obtenerEstatus($_POST["selectstatus"]);

					if($_POST["selectstatus"]==5){
					$sql = "SELECT md.IdMedicamentoDisponible,md.Unidad, p.Unidad as UnidadNueva FROM `medicamentodisponible` as md,`peticion` as p  WHERE  md.IdMedicamentoDisponible=p.IdMedicamentoDisponible and p.IdPeticion= ".$user_id." limit 1";
					$resultado = $con->query($sql);
					$total=0;
					if($resultado!=null){
						$fila = mysqli_fetch_array($resultado);
						$total = $fila["UnidadNueva"] + $fila["Unidad"] ;
						$sql = "UPDATE medicamentodisponible SET Unidad=".$total."  WHERE IdMedicamentoDisponible=$fila[IdMedicamentoDisponible]";
						$query = $con->query($sql);
		
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