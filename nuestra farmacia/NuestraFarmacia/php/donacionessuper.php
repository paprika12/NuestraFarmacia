 <?php
session_start();
 include "conexion.php";
 include "utils.php";  
    $user_id =0;
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];

    }
    
    //Consulta que devuelve los registros de una sola pagina
    $consulta = "SELECT u.Usuario,d.*, m.*,CONCAT('Nombre: ',m.Nombre,' Formula: ', m.Formula ) as Medicamento  FROM usuario_medicamento as d,medicamento as m,usuario as u  where d.IdMedicamento=m.IdMedicamento and u.IdUsuario=d.IdUsuario ";

    $result = $con->query($consulta);

    
    $i=0;
    $respuesta="";
    if($result!=null){
    while( $fila = $result->fetch_assoc() ) {
        $estatus = $fila["Estatus"];
        $estatus =  obtenerEstatus($estatus);
        $respuesta->rows[$i]['id']=$fila["IdDonacion"];
        $respuesta->rows[$i]['Unidad']=array($fila["Unidad"]);
        $respuesta->rows[$i]['Medicamento']=array($fila["Medicamento"]);
        $respuesta->rows[$i]['Estatus']=array($estatus);
        $respuesta->rows[$i]['Comentarios']=array($fila["Comentarios"]);
        $respuesta->rows[$i]['Usuario']=array($fila["Usuario"]);
        
        $i++;
    }
    }
    // La respuesta se regresa como json
    echo json_encode($respuesta);
    ?>