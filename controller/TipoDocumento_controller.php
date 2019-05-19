<?php

include_once '../../model/configuracion.php';
include_once '../../model/TipoDocumento_model.php';

class TipoDocumentoController extends conexion
{
  public function Listar()
  {
    $datosTipoDocumentos=array();
     $consultar="SELECT * FROM tbl_tipo_documento ORDER BY Id_Tipo_Documento";
 
     try {
           $resultado=$this->conexion->query($consultar);

           foreach ($resultado->fetchALL(PDO::FETCH_OBJ) as $dato) {
               $TipoDocumento=new TipoDocumentoModel();
               $TipoDocumento->__SET('Id_Tipo_Documento',$dato->Id_Tipo_Documento);
               $TipoDocumento->__SET('Nombre',$dato->Nombre);
               $datosTipoDocumento[]=$TipoDocumento;
           }

         return $datosTipoDocumento; 

        } catch (Exception $error) {
            echo 'Se ha presentado un error en la conexion'.$error->getMessage();
            die($error->getMessage());
        }

  }
public function Insertar(TipoBaseModel $TipoBase)
{
 $Insertar="INSERT INTO tbl_tipo_base (Id_Tipo_Base, Nombre) VALUES (?,?)";
 try{
   $this->conexion->prepare($Insertar)->execute(array(
    $TipoBase->__GET('Id_Tipo_Base'),
    $TipoBase->__GET('Nombre')
    
   ));
   return true;

 }catch(\Exeption $error){
  echo 'error al insertar los datos'.$error->getMessage();

 }

}

public function buscar($Id_Tipo_Base)
{
  $buscar="SELECT * FROM tbl_tipo_base WHERE Id_Tipo_Base=?";

  try{
    
    $resultado=$this->conexion->prepare($buscar);
    $resultado->execute(array($Id_Tipo_Base));

    $datos=$resultado->fetch(PDO::FETCH_OBJ);
    $TipoBase=new TipoBaseModel();
    $TipoBase->__SET('Id_Tipo_Base',$datos->Id_Tipo_Base);
    $TipoBase->__SET('Nombre',$datos->Nombre);
    

    return $TipoBase;

  }catch(\Exeption $error){
   echo 'error al buscar los datos'.$error->getMessage();
 
  }

}

public function actualizar(TipoBaseModel $TipoBase)
{
  $insertar="UPDATE tbl_tipo_base SET Nombre=? WHERE Id_Tipo_Base=? ";

  try{
    
   $this->conexion->prepare($insertar)->execute(array(
     
    
    $TipoBase->__GET('Nombre'),
    $TipoBase->__GET('Id_Tipo_Base')
    

   ));

     return true;

  }catch(\Exeption $error){
   echo 'error al actualizar los datos'.$error->getMessage();
 
  }
}

public function eliminar($Id_Tipo_Base)
{
  $borrar='DELETE FROM tbl_tipo_base WHERE Id_Tipo_Base=?';

  try{
    
    $this->conexion->prepare($borrar)->execute(array(
      $Id_Tipo_Base
    ));

   }catch(\Exeption $error){
    echo 'error al actualizar los datos'.$error->getMessage();
  
   }
}

}

