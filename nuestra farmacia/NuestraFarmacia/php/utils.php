 <?php


function obtenerEstatus($field){
switch($field){
            case "1": $estatus = "Esperando";
            break;
            case "2": $estatus = "Pre-Aprobado";
            break;
            case "3": $estatus = "Aprobado";
            break;
            case "4": $estatus = "Donado";
            break;
            case "5": $estatus = "Rechazado";
            break;
            default: $estatus = "Pendiente";
            break;

        }
return $estatus;
        }
        function obtenerListaMedicamentos(){
             include "conexion.php";
            $consulta = "SELECT Nombre,IdMedicamento  FROM medicamento where Activo=1 ";

            $result = $con->query($consulta);

            
            $i=0;
            $select= '<select name="selectMedicamento" onChange"" class="form-control" id="selectMedicamento">';
            while( $fila = $result->fetch_assoc() ) {
                $select .= '<option value="' .$fila["IdMedicamento"] . '">' . $fila["Nombre"] . '</option>';
                $i++;
            }
            $select .= '</select>';
            return $select;
        }
        function obtenerListaMedicamentosSelected($select_edit){
             include "conexion.php";
            $consulta = "SELECT Nombre,IdMedicamento  FROM medicamento where Activo=1  ";

            $result = $con->query($consulta);

            
            $i=0;
            $select= '<select name="selectMedicamento" onChange"" class="form-control" id="selectMedicamento">';
            while( $fila = $result->fetch_assoc() ) {
                if($select_edit == $fila["IdMedicamento"])
                {
                    $select .= '<option value="' .$fila["IdMedicamento"] . '" selected>' . $fila["Nombre"] . '</option>';
                }
                else{
                    $select .= '<option value="' .$fila["IdMedicamento"] . '">' . $fila["Nombre"] . '</option>';
                }
                
                $i++;
            }
            $select .= '</select>';
            return $select;
        }
        function obtenerDatosMedicamento($id){
            include "conexion.php";
            $formula="";
            if ($id <> "0"){
            $consulta = "SELECT *  FROM medicamento where Activo=1 limit 1 ";
            }
            else {
            $consulta = "SELECT *  FROM medicamento where Activo=1 and IdMedicamento=" . $id;    
            }   
            $result = $con->query($consulta);

            while( $fila = $result->fetch_assoc() ) {
                $formula = $fila["Formula"] ;
            }

            return $formula;
        }
        function obtenerListaCentros(){
             include "conexion.php";
            $consulta = "SELECT Nombre,IdCentroAcopio,Domicilio  FROM centroacopio where Activo=1 ";

            $result = $con->query($consulta);

            
            $i=0;
            $select= '<select name="selectcentro" onChange"" class="form-control" id="selectcentro">';
            while( $fila = $result->fetch_assoc() ) {
                $select .= '<option value="' .$fila["IdCentroAcopio"] . '">' . $fila["Nombre"] . ' - ' . $fila["Domicilio"] . '</option>';
                $i++;
            }
            $select .= '</select>';
            return $select;
        }
        function obtenerListaStatus(){
             
            $select= '<select name="selectstatus" class="form-control" id="selectstatus">';
            $select .= '<option value="1">Esperando</option>';
            $select .= '<option value="3">Aprobado</option>';
            $select .= '<option value="4">Donado</option>';
            $select .= '<option value="5">Rechazado</option>';
            $select .= '</select>';
            return $select;
        }
          function obtenerListaStatusPeticiones(){
             
            $select= '<select name="selectstatus" class="form-control" id="selectstatus">';
            $select .= '<option value="1">Esperando</option>';
            $select .= '<option value="2">Pre-Aprobado</option>';
            $select .= '<option value="3">Aprobado</option>';
            $select .= '<option value="5">Rechazado</option>';
            $select .= '</select>';
            return $select;
        }
?>