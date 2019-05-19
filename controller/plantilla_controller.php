<?php
require_once "../../model/configuracion.php";
include_once "../../model/Plantilla_model.php";
include_once "../../model/TipoPlan_model.php";
include_once "../../model/DetallePlantillaInsumo.php";

class PlantillaController extends Conexion {

         public function Insertar(PlantillaModel $Plantilla){
               $insertar="INSERT INTO tbl_plantilla (codigo_plantilla,Nombre_plantilla,Fecha_Registro,Id_Tipo_Plantilla) values (?,?,?,?)";
               try {
                $this->conexion->prepare($insertar)->execute(array(
				$Plantilla->__GET('Codigo_Plantilla'),
				$Plantilla->__GET('Nombre_plantilla'),
                $Plantilla->__GET('Fecha_Registro'),
                $Plantilla->__GET('Id_Tipo_Plantilla')
                
            ));

            return true;
           } catch (Exception $e) {
            echo "Error al ingresar datos ".$e->getMessage();
          }
       }

        public function Listar(){

            $Datos=array();
            $listar="SELECT P.Codigo_Plantilla, P.Nombre_Plantilla, P.Fecha_Registro, 
            Plan.Nombre_Tipo FROM tbl_plantilla P
             JOIN tbl_tipo_plantilla Plan where P.Id_Tipo_Plantilla=Plan.Id_Tipo_Plantilla";
              try {
               $resultado=$this->conexion->prepare($listar);
               $resultado->execute();
                foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $dato) {

               $Lista= new PlantillaModel();

               $Lista->__SET('Codigo_Plantilla', $dato->Codigo_Plantilla);//resultado conjunto de datos, transforma a array asociativo
               $Lista->__SET('Nombre_plantilla', $dato->Nombre_Plantilla);
               $Lista->__SET('Fecha_Registro', $dato->Fecha_Registro); //modelo, segundo a la base de datos
               $Lista->__SET('Id_Tipo_Plantilla', $dato->Nombre_Tipo);
        
               $Datos[]=$Lista;
       
           } return $Datos;
       
           } catch (Exception $e) {
       
           echo "Error al Consultar".$e->getMessage();
           }
         }

         public function Buscar($Codigo_Plantilla){
            $buscar="SELECT * from tbl_plantilla where Codigo_Plantilla=?";
            try {
                $resultado=$this->conexion->prepare($buscar);
                $resultado->execute(array($Codigo_Plantilla));
                $dato=$resultado->fetch(PDO::FETCH_OBJ);
                $DatosUser= new PlantillaModel();
    
                $DatosUser->__SET('Codigo_Plantilla',$dato->Codigo_Plantilla);
                $DatosUser->__SET('Nombre_plantilla',$dato->Nombre_Plantilla);
                $DatosUser->__SET('Fecha_Registro',$dato->Fecha_Registro);
                $DatosUser->__SET('Id_Tipo_Plantilla',$dato->Id_Tipo_Plantilla);
               
    
                return $DatosUser;
                
            } catch (Exception $e) {
              echo 'Error al buscar los Datos'.$e->getMessage();
            }
        }

        public function Modificar(PlantillaModel $Plantilla){
            $actualizar="UPDATE tbl_plantilla SET Nombre_plantilla=?, Fecha_Registro=? where Codigo_Plantilla=? ";
            try {
                $this->conexion->prepare($actualizar)->execute(array(

                    $Plantilla->__GET('Nombre_plantilla'),
                    $Plantilla->__GET('Fecha_Registro'),
                    $Plantilla->__GET('Codigo_Plantilla')
                ));
                return true;
            } catch (Exception $e) {
                echo 'Error al Actualizar Datos'.$e->getMessage();
            }
        }

        public function Eliminar($Codigo_Plantilla){
            $borrar="DELETE from tbl_plantilla where Codigo_Plantilla=?";
            try {
                $this->conexion->prepare($borrar)->execute(array($Codigo_Plantilla));
                return true;
            } catch (Exception $e) {
                echo "Error al eliminar los Datos".$e->getmessage();
            }
        }

        public function InsertarDetalle(DetalleModel $detalle){
            $consulta="INSERT INTO tbl_insumo_has_plantilla(Codigo_Insumo, Cantidad) values (?,?)";
            try {
                $this->conexion->prepare($consulta)->execute(array(
                   
                    //$detalle->__GET('idDetalle'),
                    $detalle->__GET('idInsumo'),
                    //$detalle->__GET('idPlantilla'),
                    $detalle->__GET('Cantidad')
     
                   ));
                
               return true;
            } catch (Exception $error) {
                echo ("Error al Ingresar los Datos".$error->getMessage());
            }
        }
     
          public function ConsultarDetalle($id){
              //echo $id;
            $dato=array();
              $listar="SELECT tbl_insumo_has_plantilla.id_Detalle_InsumoPlan, 
              tbl_insumo_has_plantilla.Codigo_Insumo, tbl_insumo_has_plantilla.Codigo_Plantilla,
               tbl_insumo.Nombre_Insumo, tbl_insumo_has_plantilla.Cantidad 
              FROM tbl_insumo JOIN tbl_insumo_has_plantilla JOIN tbl_plantilla ON 
              tbl_insumo.Codigo_insumo= tbl_insumo_has_plantilla.Codigo_insumo  and
               tbl_insumo_has_plantilla.Codigo_Plantilla=tbl_plantilla.Codigo_Plantilla
              WHERE tbl_insumo_has_plantilla.Codigo_Plantilla=$id";
                try {
                 $resultado=$this->conexion->prepare($listar);
                 $resultado->execute();
                foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos) {
     
                 $Lista= new DetalleModel();
     
               $Lista->__SET('idDetalle', $datos->id_Detalle_InsumoPlan);
               $Lista->__SET('idInsumo', $datos->Codigo_Insumo);
               $Lista->__SET('idPlantilla', $datos->Codigo_Plantilla);
               $Lista->__SET('Cantidad', $datos->Cantidad);
        
               $dato[]=$Lista;
       
           } return $dato;
       
           } catch (Exception $e) {
       
           echo "Error al Consultar".$e->getMessage();
           }
        }
 
    }

 