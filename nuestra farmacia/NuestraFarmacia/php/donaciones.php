 <?php
session_start();
 include "conexion.php";
 include "utils.php";  
    $user_id =0;
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];

    }
    
    //Consulta que devuelve los registros de una sola pagina
    $consulta = "SELECT d.*, m.*,CONCAT('Nombre: ',m.Nombre,' Formula: ', m.Formula ) as Medicamento  FROM usuario_medicamento as d,medicamento as m where d.IdMedicamento=m.IdMedicamento and d.IdUsuario = " . $user_id . " ORDER BY d.fechaInsercion;";

    $result = $con->query($consulta);

    
    $i=0;
    $respuesta="";
    if($result!=null){
    while( $fila = $result->fetch_assoc() ) {
        $estatus = $fila["Estatus"];
        $estatus2 =  obtenerEstatus($estatus);
        $respuesta->rows[$i]['id']=$fila["IdDonacion"];
        $respuesta->rows[$i]['Unidad']=array($fila["Unidad"]);
        $respuesta->rows[$i]['Medicamento']=array($fila["Medicamento"]);
        $respuesta->rows[$i]['Estatus']=array($estatus2);
        if($estatus == 1){
            $respuesta->rows[$i]['Comentarios']=array("Entregar tu medicamento al centro de acopio.");
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