<?php

include_once '../../model/configuracion.php';
include_once '../../model/Empresa_model.php';

class EmpresaController extends conexion
{
  public function Listar()
  {
    $datosEmpresa=array();
     $consultar="SELECT * FROM tbl_empresa ORDER BY Nit_Empresa";
 
     try {
           $resultado=$this->conexion->query($consultar);
          // $resultado->execute();

           foreach ($resultado->fetchALL(PDO::FETCH_OBJ) as $dato) {
               $Empresa=new EmpresaModel();
               $Empresa->__SET('Nit_Empresa',$dato->Nit_Empresa);
               $Empresa->__SET('Nombre',$dato->Nombre);
               $Empresa->__SET('Telefono',$dato->Telefono);
               $Empresa->__SET('Direccion',$dato->Direccion);
               $datosEmpresa[]=$Empresa;
           }

         return $datosEmpresa; 

        } catch (Exception $error) {
            echo 'Se ha presentado un error en la conexion'.$error->getMessage();
            die($error->getMessage());
        }

  }
public function Insertar(EmpresaModel $Empresa)
{
 $Insertar="INSERT INTO tbl_empresa (Nit_Empresa, Nombre, Telefono, Direccion) VALUES (?,?,?,?)";
 try{
   $this->conexion->prepare($Insertar)->execute(array(
    $Empresa->__GET('Nit_Empresa'),
    $Empresa->__GET('Nombre'),
    $Empresa->__GET('Telefono'),
    $Empresa->__GET('Direccion')

    
   ));
   return true;

 }catch(\Exeption $error){
  echo 'error al insertar los datos'.$error->getMessage();

 }

}

public function buscar($Nit_Empresa)
{
  $buscar="SELECT * FROM tbl_empresa WHERE Nit_Empresa=?";

  try{
    
    $resultado=$this->conexion->prepare($buscar);
    $resultado->execute(array($Nit_Empresa));

    $datos=$resultado->fetch(PDO::FETCH_OBJ);
    $Empresa=new EmpresaModel();
    $Empresa->__SET('Nit_Empresa',$datos->Nit_Empresa);
    $Empresa->__SET('Nombre',$datos->Nombre);
    $Empresa->__SET('Telefono',$datos->Telefono);
    $Empresa->__SET('Direccion',$datos->Direccion);

    

    return $Empresa;

  }catch(\Exeption $error){
   echo 'error al buscar los datos'.$error->getMessage();
 
  }

}

public function actualizar(EmpresaModel $Empresa)
{
  $insertar="UPDATE tbl_empresa SET Nombre=?, Telefono=?, Direccion=?  WHERE Nit_Empresa=? ";

  try{
    
   $this->conexion->prepare($insertar)->execute(array(
     
    
    $Empresa->__GET('Nombre'),
    $Empresa->__GET('Telefono'),
    $Empresa->__GET('Direccion'),
    $Empresa->__GET('Nit_Empresa') 
    

   ));

     return true;

  }catch(\Exeption $error){
   echo 'error al actualizar los datos'.$error->getMessage();
 
  }
}

public function eliminar($Nit_Empresa)
{
  $borrar='DELETE FROM tbl_empresa WHERE Nit_Empresa=?';

  try{
    
    $this->conexion->prepare($borrar)->execute(array(
      $Nit_Empresa
    ));

   }catch(\Exeption $error){
    echo 'error al actualizar los datos'.$error->getMessage();
  
   }
}

}

