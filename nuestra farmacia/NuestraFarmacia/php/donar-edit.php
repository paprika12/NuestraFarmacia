<?php

		
		
		
			include "conexion.php";

			$user_id =0;
    			if(isset($_SESSION["user_id"])){
        			$user_id = $_SESSION["user_id"];

			    }
			
			$sql = "SELECT * FROM `usuario_medicamento` as um,`medicamento` as m  WHERE  idDonacion = $_GET[idon] and um.IdMedicamento= m.IdMedicamento ";
			$resultado = $con->query($sql);
			
			if($resultado!=null){
				$fila = mysqli_fetch_array($resultado);
				$select_edit = $fila["IdMedicamento"];
				$unidad = $fila["Unidad"];
				$expiracion = date('y-m-d',strtotime($fila["FechaExpiracion"]));
		
			}



?>