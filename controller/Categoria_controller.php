<?php

include_once '../../model/configuracion.php';
include_once '../../model/Categoria_model.php';

class CategoriaController extends conexion
{
  public function Listar()  
  {
    $datosCategoria=array();
     $consultar="SELECT * FROM tbl_categoria ORDER BY Id_Categoria";
 
     try {
           $resultado=$this->conexion->query($consultar);
          // $resultado->execute();

           foreach ($resultado->fetchALL(PDO::FETCH_OBJ) as $dato) {
               $Categoria=new CategoriaModel();
               $Categoria->__SET('Id_Categoria',$dato->Id_Categoria);
               $Categoria->__SET('Nombre_Categoria',$dato->Nombre_Categoria);
               $Categoria->__SET('Estado',$dato->Estado);
               $datosCategoria[]=$Categoria;
           }

         return $datosCategoria; 

        } catch (Exception $error) {
            echo 'Se ha presentado un error en la conexion'.$error->getMessage();
            die($error->getMessage());
        }

  }
public function Insertar(CategoriaModel $Categoria)
{
 $Insertar="INSERT INTO tbl_categoria (Id_Categoria, Nombre_Categoria) VALUES (?,?)";
 try{
   $this->conexion->prepare($Insertar)->execute(array(
    $Categoria->__GET('Id_Categoria'),
    $Categoria->__GET('Nombre_Categoria')
    
   ));
   return true;

 }catch(\Exeption $error){
  echo 'error al insertar los datos'.$error->getMessage();

 }

}

public function buscar($Id_Categoria)
{
  $buscar="SELECT * FROM tbl_categoria WHERE Id_Categoria=?";

  try{
    
    $resultado=$this->conexion->prepare($buscar);
    $resultado->execute(array($Id_Categoria));

    $datos=$resultado->fetch(PDO::FETCH_OBJ);
    $Categoria=new CategoriaModel();
    $Categoria->__SET('Id_Categoria',$datos->Id_Categoria);
    $Categoria->__SET('Nombre_Categoria',$datos->Nombre_Categoria);
    $Categoria->__SET('Estado',$datos->Estado);
    

    return $Categoria;

  }catch(\Exeption $error){
   echo 'error al buscar los datos'.$error->getMessage();
 
  }

}

public function actualizar(CategoriaModel $Categoria)
{
  $insertar="UPDATE tbl_categoria SET Nombre_Categoria=? WHERE Id_Categoria=? ";

  try{
    
   $this->conexion->prepare($insertar)->execute(array(
     
    
    $Categoria->__GET('Nombre_Categoria'),
    $Categoria->__GET('Id_Categoria') 
    

   ));

     return true;

  }catch(\Exeption $error){
   echo 'error al actualizar los datos'.$error->getMessage();
 
  }
}

public function activar(CategoriaModel $Categoria){
  $activar="UPDATE tbl_categoria SET Estado=? WHERE Id_Categoria=? ";
  
  try{

    $this->conexion->prepare($activar)->execute(array(
      $Categoria->__GET('Estado'),
      $Categoria->__GET('Codigo_insumo')

    ));
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar la categoria'.$error->getMessage();
   }
}


public function desactivar(CategoriaModel $Categoria){
  $desactivar="UPDATE tbl_categoria SET Estado=? WHERE Id_Categoria=? ";
  try{
    $this->conexion->prepare($desactivar)->execute(array(
      $Categoria->__GET('Estado'),
      $Categoria->__GET('Id_Categoria')
    ));
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar el insumo'.$error->getMessage();
   }
}

}

