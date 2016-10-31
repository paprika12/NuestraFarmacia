 <?php
session_start();
 include "conexion.php";
 include "utils.php";  
   
    //Consulta que devuelve los registros de una sola pagina
    $consulta = "SELECT p.*, CONCAT('Nombre: ',m.Nombre,' Formula: ', m.Formula ) as Medicamento ,c.Nombre as Centro, u.Usuario  FROM peticion as p,medicamento as m,centroacopio as c, usuario as u, centroacopio_usuario as cu where p.IdMedicamento=m.IdMedicamento and c.IdCentroAcopio=cu.IdCentroAcopio and u.IdUsuario = p.IdUsuario and u.IdUsuario=cu.IdUsuario and p.Estatus <> 5 and p.Estatus<> 3";

    $result = $con->query($consulta);

   
    $i=0;
    $respuesta="";
    if($result!=null){
    while( $fila = $result->fetch_assoc() ) {
         $estatus = $fila["Estatus"];
        $estatusNombre =  obtenerEstatus($estatus);
        $respuesta->rows[$i]['id']=$fila["IdPeticion"];
        $respuesta->rows[$i]['Unidad']=array($fila["Unidad"]);
        $respuesta->rows[$i]['Medicamento']=array($fila["Medicamento"]);
        $respuesta->rows[$i]['Centro']=array($fila["Centro"]);
        $respuesta->rows[$i]['Usuario']=array($fila["Usuario"]);
        $respuesta->rows[$i]['Estatus']=array($estatusNombre);
        if($estatus == 1){
            $respuesta->rows[$i]['Comentarios']=array("Tu medicamento no esta disponible.");
        }
        else if ($estatus ==2){
            $respuesta->rows[$i]['Comentarios']=array("Tu medicamento se encuentra disponible en el centro de acopio.");
        }
         else if ($estatus ==3){
            $respuesta->rows[$i]['Comentarios']=array($fila["Comentarios"]);
        }
         else if ($estatus ==4){
            $respuesta->rows[$i]['Comentarios']=array("Tu medicamento ah sido donado, gracias por apoyar.");
        }
         else if ($estatus ==5){
            $respuesta->rows[$i]['Comentarios']=array($fila["Comentarios"]);
        }
        else {
            $respuesta->rows[$i]['Comentarios']=array($fila["Comentarios"]);
        }

        


        
        $i++;
    }
}
    // La respuesta se regresa como json
    echo json_encode($respuesta);

    ?>