<?php 
include_once "../model/configuracion.php";
include_once "../model/TipoPlan_model.php";

class TipoPlanController extends Conexion {

    public function Insertar(TipoPlan $Id_Tipo_Plantilla){
        $insertar="INSERT INTO tbl_tipo_plantilla (Id_Tipo_Plantilla,Nombre) values (?,?)";
        try {
         $this->conexion->prepare($insertar)->execute(array(
        
         $Id_Tipo_Plantilla->__GET('Id_Tipo_Plantilla'),
         $Id_Tipo_Plantilla->__GET('Nombre')
     ));

     return true;
    } catch (Exception $e) {
     echo "Error al ingresar datos ".$e->getMessage();
   }
}

    public function Listar(){
        $Todo=array();
            $ListarTipo="SELECT * from tbl_tipo_plantilla ORDER BY Id_tipo_plantilla";
              try {
               $resultado=$this->conexion->execute($listarTipo);
                foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $dato) {

               $usuario= new TipoPlan();

               $usuario->__SET('Id_Tipo_plantilla', $dato->Id_Tipo_plantilla);//resultado conjunto de datos, transforma a array asociativo
               $usuario->__SET('Nombre', $dato->Nombre); 
               $Todo[]=$usuario;
       
           } return $Todo;
       
           } catch (Exception $e) {
       
           echo "Error al Consultar".$e->getMessage();
           }
    }

    public function Buscar($Tipo){
        $buscar="SELECT * from tbl_tipo_plantilla where Id_tipo_plantilla=?";
            try {
                $resultado=$this->conexion->prepare($buscar);
                $resultado->execute(array($Tipo));
                $dato=$resultado->fetch(PDO::FETCH_OBJ);
            
                $DatosUser= new TipoPlan();
    
                $DatosUser->__SET('Id_Tipo_Plantilla',$dato->Id_tipo_plantilla);
                $DatosUser->__SET('Nombre',$dato->Nombre);
    
                return $DatosUser;
                
            } catch (Exception $e) {
              echo 'Error al buscar los Datos'.$e->getMessage();
            }
    }

    public function Actualizar(TipoPlan $Id_Tipo_Plantilla){
        $actualizar="UPDATE * SET Nombre=? where id_Tipo_Plantilla=? ";
            try {
                $this->conexion->prepare($actualizar)->execute(array(
                    $usuario->__GET('Nombre'),
                    $usuario->__GET('id_Tipo_Plantilla')
                ));
                return true;
            } catch (Exception $e) {
                echo 'Error al Actualizar Datos'.$e->getMessage();
            }
    }

    public function Eliminar($Id_Tipo_Plantilla){
        $Borrar="DELETE from tbl_tipo_plantilla where Id_tipo_plantilla=?";
        try {
            $this->conexion->prepare($Borrar)->execute(array($Id_Tipo_Plantilla));
            return true;
        } catch (Exception $e) {
            echo "Error al eliminar los Datos".$e->getmessage();
        }
    }
}

?>