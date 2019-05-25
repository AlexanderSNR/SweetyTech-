<?php

include_once '../../model/configuracion.php';
include_once '../../model/Insumo_model.php';


class InsumoController extends conexion
{
  public function Listar()
  {
    $datosInsumo=array();
    $consultar="SELECT  I.Codigo_insumo,  I.Nombre_Insumo, E.Nombre, I.Estado, I.Precio_Entrada, I.Precio_Cliente,
     I.StockMinimo, I.cantidad, C.Nombre_Categoria, T.Nombre_Tamano, TI.Nombre_Tipo_Envoltura, I.Imagen 
    FROM tbl_insumo I INNER JOIN tbl_categoria C ON I.id_Categoria=C.Id_Categoria 
    INNER JOIN tbl_Tamano T ON I.Id_Tamano=T.Id_Tamano
    INNER JOIN tbl_tipo_envoltura TI ON I.Id_Tipo_Envoltura=TI.Id_Tipo_Envoltura
    INNER JOIN tbl_empresa E ON I.Nit_Proveedor=E.Nit_Empresa
    ORDER BY Codigo_insumo desc ";
 
     try {
           $resultado=$this->conexion->query($consultar);
          // $resultado->execute();

           foreach ($resultado->fetchALL(PDO::FETCH_OBJ) as $dato) {
               $Insumo=new InsumoModel();
              
               $Insumo->__SET('Codigo_insumo',$dato->Codigo_insumo);
               $Insumo->__SET('Nombre',$dato->Nombre);
               $Insumo->__SET('Nombre_Insumo',$dato->Nombre_Insumo);
               $Insumo->__SET('Estado',$dato->Estado);
               $Insumo->__SET('Precio_Entrada',$dato->Precio_Entrada);
               $Insumo->__SET('Precio_Cliente',$dato->Precio_Cliente);
               $Insumo->__SET('StockMinimo',$dato->StockMinimo);
               $Insumo->__SET('Cantidad',$dato->cantidad);
               $Insumo->__SET('Nombre_Categoria',$dato->Nombre_Categoria);
               $Insumo->__SET('Nombre_Tamano',$dato->Nombre_Tamano);
               $Insumo->__SET('Nombre_Tipo_Envoltura',$dato->Nombre_Tipo_Envoltura);
               $Insumo->__SET('Imagen',$dato->Imagen);


               $datosInsumo[]=$Insumo;
           }

         return $datosInsumo; 

        } catch (Exception $error) {
            echo 'Se ha presentado un error en la conexion'.$error->getMessage();
            die($error->getMessage());
        }

  }
public function Insertar(InsumoModel $Insumo)
{
 $Insertar="INSERT INTO tbl_insumo (Codigo_insumo,  Nombre_Insumo, Precio_Entrada, 
 Precio_Cliente, StockMinimo,id_Categoria, Id_Tamano, Id_Tipo_Envoltura,Nit_Proveedor,Imagen) VALUES (?,?,?,?,?,?,?,?,?,?)";
 try{
   $this->conexion->prepare($Insertar)->execute(array(
    $Insumo->__GET('Codigo_insumo'),
    $Insumo->__GET('Nombre_Insumo'),
    $Insumo->__GET('Precio_Entrada'),
    $Insumo->__GET('Precio_Cliente'),
    $Insumo->__GET('StockMinimo'),
    $Insumo->__GET('id_Categoria'),
    $Insumo->__GET('Id_Tamano'),
    $Insumo->__GET('Id_Tipo_Envoltura'),
    $Insumo->__GET('Nit_Empresa'),
    $Insumo->__GET('Imagen')
   ));
   return true;

 }catch(\Exeption $error){
  echo 'error al insertar los datos'.$error->getMessage();

 }

}

public function buscar($Codigo_insumo)
{
  $buscar="SELECT I.Codigo_insumo, I.Nombre_Insumo, E.Nombre, I.Precio_Entrada, I.Precio_Cliente, 
  I.StockMinimo, I.Cantidad, C.Nombre_Categoria, T.Nombre_Tamano, TI.Nombre_Tipo_Envoltura, I.Imagen 
  ,I.Nit_Proveedor,I.id_Categoria,I.Id_Tamano,I.Id_Tipo_Envoltura FROM tbl_insumo I INNER JOIN tbl_categoria C ON I.id_Categoria=C.Id_Categoria 
  INNER JOIN tbl_Tamano T ON I.Id_Tamano=T.Id_Tamano
  INNER JOIN tbl_tipo_envoltura TI ON I.Id_Tipo_Envoltura=TI.Id_Tipo_Envoltura 
  INNER JOIN tbl_empresa E ON I.Nit_Proveedor=E.Nit_Empresa WHERE Codigo_insumo=? 
  ORDER BY Codigo_insumo DESC";

  try{
    
    $resultado=$this->conexion->prepare($buscar);
    $resultado->execute(array($Codigo_insumo));

    $dato=$resultado->fetch(PDO::FETCH_OBJ);
    $Insumo=new InsumoModel();
    $Insumo->__SET('Codigo_insumo',$dato->Codigo_insumo);
    $Insumo->__SET('Nombre_Insumo',$dato->Nombre_Insumo);
    $Insumo->__SET('Nombre',$dato->Nombre);
    $Insumo->__SET('Precio_Entrada',$dato->Precio_Entrada);
    $Insumo->__SET('Precio_Cliente',$dato->Precio_Cliente);
    $Insumo->__SET('StockMinimo',$dato->StockMinimo);
    $Insumo->__SET('Cantidad',$dato->Cantidad);
    $Insumo->__SET('Nombre_Categoria',$dato->Nombre_Categoria);
    $Insumo->__SET('Nombre_Tamano',$dato->Nombre_Tamano);
    $Insumo->__SET('Nombre_Tipo_Envoltura',$dato->Nombre_Tipo_Envoltura);
    $Insumo->__SET('Imagen',$dato->Imagen);
    $Insumo->__SET('Nit_Proveedor',$dato->Nit_Proveedor);
    $Insumo->__SET('id_Categoria',$dato->id_Categoria);
    $Insumo->__SET('Id_Tamano',$dato->Id_Tamano); 
    $Insumo->__SET('Id_Tipo_Envoltura',$dato->Id_Tipo_Envoltura); 
    

    return $Insumo;

  }catch(\Exeption $error){
   echo 'error al buscar los datos'.$error->getMessage();
 
  }

}

public function actualizar(InsumoModel $Insumo)
{
  $insertar="UPDATE tbl_insumo SET Nombre_Insumo=?, Nit_Proveedor=?,  Precio_Entrada=?, Precio_Cliente=?, 
  StockMinimo=?, id_Categoria=?, Id_Tamano=?, Id_Tipo_Envoltura=?, Imagen=?  
   WHERE Codigo_insumo=? ";

  try{
    
   $this->conexion->prepare($insertar)->execute(array(
     
             
               $Insumo->__GET('Nombre_Insumo'),
               $Insumo->__GET('Nit_Proveedor'),
               $Insumo->__GET('Precio_Entrada'),
               $Insumo->__GET('Precio_Cliente'),  
               $Insumo->__GET('StockMinimo'),
               $Insumo->__GET('id_Categoria'),
               $Insumo->__GET('Id_Tamano'),  
               $Insumo->__GET('Id_Tipo_Envoltura'),
               $Insumo->__GET('Imagen'),
               $Insumo->__GET('Codigo_insumo')

   ));
   
     return true;

  }catch(\Exeption $error){
    return false;
 
  }
}

public function activar(InsumoModel $Insumo){
  $activar="UPDATE tbl_insumo SET Estado=? WHERE Codigo_insumo=? ";
  
  try{

    $this->conexion->prepare($activar)->execute(array(
      1,
      $Insumo->__GET('Codigo_insumo')

    ));
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar el insumo'.$error->getMessage();
   }
}


public function desactivar(InsumoModel $Insumo){
  $desactivar="UPDATE tbl_insumo SET Estado=? WHERE Codigo_insumo=? ";
  try{
    $this->conexion->prepare($desactivar)->execute(array(
       $Insumo->__GET('Estado'),
      $Insumo->__GET('Codigo_insumo')
    ));
    
      return true;
   }catch(\Exeption $error){
    echo 'error al desactivar el insumo'.$error->getMessage();
   }
}

}

