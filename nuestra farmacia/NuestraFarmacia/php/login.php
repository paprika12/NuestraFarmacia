<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			
			$user_id=null;
			$pass =sha1($_POST["password"]);
			$sql1= "select * from usuario where (usuario=\"$_POST[username]\" and contrasenia=\"". $pass ."\")";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["IdUsuario"];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				if($_POST["username"]=="admin"){
					print "<script>window.location='../donacionessuper.php';</script>";	
				}
				else{
					print "<script>window.location='../donaciones.php';</script>";	
					}
				
						
			}
		}
	}
}



?>