 <?php
session_start();
 include "conexion.php";
 include "utils.php";  
    
    //Consulta que devuelve los registros de una sola pagina
    $consulta = "SELECT disp.*, CONCAT('Nombre: ',m.Nombre,' Formula: ', m.Formula ) as Medicamento ,c.Nombre as Centro  FROM medicamentodisponible as disp, medicamento as m,centroacopio as c where disp.IdMedicamento=m.IdMedicamento and disp.unidad > 0 and c.IdCentroAcopio=disp.IdCentroAcopio ";

    $result = $con->query($consulta);

   
    $i=0;
    $respuesta="";
    if($result!=null){
    while( $fila = $result->fetch_assoc() ) {
        $respuesta->rows[$i]['id']=$fila["IdMedicamentoDisponible"];
        $respuesta->rows[$i]['Unidad']=array($fila["Unidad"]);
        $respuesta->rows[$i]['Medicamento']=array($fila["Medicamento"]);
        $respuesta->rows[$i]['Centro']=array($fila["Centro"]);
        
        $i++;
    }
    }
    // La respuesta se regresa como json
    echo json_encode($respuesta);

    ?>