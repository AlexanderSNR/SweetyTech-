<?php

include_once '../../model/configuracion.php';
include_once '../../model/Compra_model.php';

class CompraController extends conexion
{
  public function Listar()
  {
    $datosCompra=array();
     $consultar="SELECT C.Id_Compra, C.Precio_Unidad, C.Fecha_Compra, E.Nombre FROM tbl_compra C 
     INNER JOIN tbl_empresa E ON C.Nit_Empresa = E.Nit_Empresa ORDER BY Id_Compra";
 
     try {
           $resultado=$this->conexion->query($consultar);
          // $resultado->execute();

           foreach ($resultado->fetchALL(PDO::FETCH_OBJ) as $dato) {
               $Compra=new CompraModel();
               $Compra->__SET('Id_Compra',$dato->Id_Compra);
               $Compra->__SET('Precio_Unidad',$dato->Precio_Unidad);
               $Compra->__SET('Fecha_Compra',$dato->Fecha_Compra);
               $Compra->__SET('Nombre',$dato->Nombre);
               $datosCompra[]=$Compra;
           }

         return $datosCompra; 

        } catch (Exception $error) {
            echo 'Se ha presentado un error en la conexion'.$error->getMessage();
            die($error->getMessage());
        }

  }
public function Insertar(CompraModel $Compra)
{
 $Insertar="INSERT INTO tbl_compra (Id_Compra, Precio_Unidad, Fecha_Compra, Nit_Empresa) VALUES (?,?,?,?)";
 try{
   $this->conexion->prepare($Insertar)->execute(array(
    $Compra->__GET('Id_Compra'),
    $Compra->__GET('Precio_Unidad'),
    $Compra->__GET('Fecha_Compra'),
    $Compra->__GET('Nit_Empresa')
    
   ));
   return true;

 }catch(\Exeption $error){
  echo 'error al insertar los datos'.$error->getMessage();

 }

}

public function buscar($Id_Compra)
{
  $buscar="SELECT C.Id_Compra, C.Precio_Unidad, C.Fecha_Compra, E.Nombre FROM tbl_compra C 
  INNER JOIN tbl_empresa E ON C.Nit_Empresa = E.Nit_Empresa  WHERE Id_Compra=?";

    
    try{
    
      $resultado=$this->conexion->prepare($buscar);
      $resultado->execute(array($Id_Compra));

      $dato=$resultado->fetch(PDO::FETCH_OBJ);
      $Compra=new CompraModel();
      $Compra->__SET('Id_Compra',$dato->Id_Compra);
      $Compra->__SET('Precio_Unidad',$dato->Precio_Unidad);
      $Compra->__SET('Fecha_Compra',$dato->Fecha_Compra);
      $Compra->__SET('Nombre',$dato->Nombre);
    

    return $Compra;

  }catch(\Exeption $error){
   echo 'error al buscar los datos'.$error->getMessage();
 
  }

}

public function actualizar(CompraModel $Compra)
{
  $insertar="UPDATE tbl_compra SET Precio_Unidad=?, Fecha_Compra=?, Nit_Empresa=? WHERE Id_Compra=? ";

  try{
    
   $this->conexion->prepare($insertar)->execute(array(
     
    
    $Compra->__GET('Precio_Unidad'),
    $Compra->__GET('Fecha_Compra'), 
    $Compra->__GET('Nit_Empresa'), 
    $Compra->__GET('Id_Compra') 
    

   ));

     return true;

  }catch(\Exeption $error){
   echo 'error al actualizar los datos'.$error->getMessage();
 
  }
}

public function eliminar($Id_Compra)
{
  $borrar='DELETE FROM tbl_compra WHERE Id_Compra=?';

  try{
    
    $this->conexion->prepare($borrar)->execute(array(
      $Id_Compra
    ));

   }catch(\Exeption $error){
    echo 'error al actualizar los datos'.$error->getMessage();
  
   }
}

}

