<?php

include_once '../../model/configuracion.php';
include_once '../../model/Tamano_model.php';

class TamanoController extends conexion
{
  public function Listar()
  {
    $datosTamano=array();
     $consultar="SELECT * FROM tbl_tamano ORDER BY Id_Tamano";
 
     try {
           $resultado=$this->conexion->query($consultar);
          // $resultado->execute();

           foreach ($resultado->fetchALL(PDO::FETCH_OBJ) as $dato) {
               $Tamano=new TamanoModel();
               $Tamano->__SET('Id_Tamano',$dato->Id_Tamano);
               $Tamano->__SET('Nombre_Tamano',$dato->Nombre_Tamano);
               $Tamano->__SET('Estado',$dato->Estado);
               $datosTamano[]=$Tamano;
           }

         return $datosTamano; 

        } catch (Exception $error) {
            echo 'Se ha presentado un error en la conexion'.$error->getMessage();
            die($error->getMessage());
        }

  }
public function Insertar(TamanoModel $Tamano)
{
 $Insertar="INSERT INTO tbl_tamano (Id_Tamano, Nombre_Tamano) VALUES (?,?)";
 try{
   $this->conexion->prepare($Insertar)->execute(array(
    $Tamano->__GET('Id_Tamano'),
    $Tamano->__GET('Nombre_Tamano')
    
   ));
   return true;

 }catch(\Exeption $error){
  echo 'error al insertar los datos'.$error->getMessage();

 }

}

public function buscar($Id_Tamano)
{
  $buscar="SELECT * FROM tbl_tamano WHERE Id_Tamano=?";

  try{
    
    $resultado=$this->conexion->prepare($buscar);
    $resultado->execute(array($Id_Tamano));

    $datos=$resultado->fetch(PDO::FETCH_OBJ);
    $Tamano=new TamanoModel();
    $Tamano->__SET('Id_Tamano',$datos->Id_Tamano);
    $Tamano->__SET('Nombre_Tamano',$datos->Nombre_Tamano);
    
    

    return $Tamano;

  }catch(\Exeption $error){
   echo 'error al buscar los datos'.$error->getMessage();
 
  }

}

public function actualizar(TamanoModel $Tamano)
{
  $insertar="UPDATE tbl_tamano SET Nombre_Tamano=? WHERE Id_Tamano=? ";

  try{
    
   $this->conexion->prepare($insertar)->execute(array(
     
    
    $Tamano->__GET('Nombre_Tamano'),
    $Tamano->__GET('Id_Tamano') 
    

   ));

     return true;

  }catch(\Exeption $error){
   echo 'error al actualizar los datos'.$error->getMessage();
 
  }
}

public function activar(TamanoModel $Tamano){
  $activar="UPDATE tbl_tamano SET Estado=? WHERE Id_Tamano=? ";
  
  try{

    $this->conexion->prepare($activar)->execute(array(
      $Tamano->__GET('Estado'),
      $Tamano->__GET('Id_Tamano')

    ));
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar el Tamaño'.$error->getMessage();
   }
}


public function desactivar(TamanoModel $Tamano){
  $desactivar="UPDATE tbl_tamano SET Estado=? WHERE Id_Tamano=? ";
  try{
    $this->conexion->prepare($desactivar)->execute(array(
      $Tamano->__GET('Estado'),
      $Tamano->__GET('Id_Tamano')
    ));
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar el Tamaño'.$error->getMessage();
   }
}

}

