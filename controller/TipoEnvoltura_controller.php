<?php

include_once '../../model/configuracion.php';
include_once '../../model/TipoEnvoltura_model.php';

class TipoEnvolturaController extends conexion
{
  public function Listar()
  {
    $datosTipoEnvoltura=array();
     $consultar="SELECT * FROM tbl_Tipo_Envoltura ORDER BY Id_Tipo_Envoltura";
 
     try {
           $resultado=$this->conexion->query($consultar);
          // $resultado->execute();

           foreach ($resultado->fetchALL(PDO::FETCH_OBJ) as $dato) {
               $TipoEnvoltura=new TipoEnvolturaModel();
               $TipoEnvoltura->__SET('Id_Tipo_Envoltura',$dato->Id_Tipo_Envoltura);
               $TipoEnvoltura->__SET('Nombre_Tipo_Envoltura',$dato->Nombre_Tipo_Envoltura);
               $TipoEnvoltura->__SET('Estado',$dato->Estado);
               $datosTipoEnvoltura[]=$TipoEnvoltura;
           }

         return $datosTipoEnvoltura; 

        } catch (Exception $error) {
            echo 'Se ha presentado un error en la conexion'.$error->getMessage();
            die($error->getMessage());
        }

  }
public function Insertar(TipoEnvolturaModel $TipoEnvoltura)
{
 $Insertar="INSERT INTO tbl_tipo_envoltura (Id_Tipo_Envoltura, Nombre_Tipo_Envoltura) VALUES (?,?)";
 try{
   $this->conexion->prepare($Insertar)->execute(array(
    $TipoEnvoltura->__GET('Id_Tipo_Envoltura'),
    $TipoEnvoltura->__GET('Nombre_Tipo_Envoltura')
    
   ));
   return true;

 }catch(\Exeption $error){
  echo 'error al insertar los datos'.$error->getMessage();

 }

}

public function buscar($Id_Tipo_Envoltura)
{
  $buscar="SELECT * FROM tbl_Tipo_Envoltura WHERE Id_Tipo_Envoltura=?";

  try{
    
    $resultado=$this->conexion->prepare($buscar);
    $resultado->execute(array($Id_Tipo_Envoltura));

    $datos=$resultado->fetch(PDO::FETCH_OBJ);
    $TipoEnvoltura=new TipoEnvolturaModel();
    $TipoEnvoltura->__SET('Id_Tipo_Envoltura',$datos->Id_Tipo_Envoltura);
    $TipoEnvoltura->__SET('Nombre_Tipo_Envoltura',$datos->Nombre_Tipo_Envoltura);
    

    return $TipoEnvoltura;

  }catch(\Exeption $error){
   echo 'error al buscar los datos'.$error->getMessage();
 
  }

}
public function actualizar(TipoEnvolturaModel $TipoEnvoltura)
{
  $insertar="UPDATE tbl_Tipo_Envoltura SET Nombre_Tipo_Envoltura=? WHERE Id_Tipo_Envoltura=? ";

  try{
    
   $this->conexion->prepare($insertar)->execute(array(
     
    
    $TipoEnvoltura->__GET('Nombre_Tipo_Envoltura'),
    $TipoEnvoltura->__GET('Id_Tipo_Envoltura')
    

   ));

     return true;

  }catch(\Exeption $error){
   echo 'error al actualizar los datos'.$error->getMessage();
 
  }
}


public function activar(TipoEnvolturaModel $TipoEnvoltura){
  $activar="UPDATE tbl_tipo_envoltura SET Estado=? WHERE Id_Tipo_Envoltura=? ";
  
  try{

    $this->conexion->prepare($activar)->execute(array(
      $TipoEnvoltura->__GET('Estado'),
      $TipoEnvoltura->__GET('Id_Tipo_Envoltura')

    ));
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar del Tipo de Envoltura'.$error->getMessage();
   }
}


public function desactivar(TipoEnvolturaModel $TipoEnvoltura){
  $desactivar="UPDATE tbl_tipo_envoltura SET Estado=? WHERE Id_Tipo_Envoltura=? ";
  try{
    $this->conexion->prepare($desactivar)->execute(array(
      $TipoEnvoltura->__GET('Estado'),
      $TipoEnvoltura->__GET('Id_Tipo_Envoltura')
    ));
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar el Tipo de Envoltura'.$error->getMessage();
   }
}

}

