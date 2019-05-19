<?php

include_once '../../model/configuracion.php';
include_once '../../model/compra_as_Insumo_model.php';

class CompraAsInsumoController extends conexion
{
    
  public function ListarDetalle($Codigo_insumo)
  {

    $buscar="SELECT C.Id_Compra, I.Nombre_Insumo, D.subtotal, D.Cantidad FROM tbl_insumo_has_compra D 
     INNER JOIN tbl_insumo I ON D.Codigo_insumo = I.Codigo_insumo
     INNER JOIN tbl_compra C ON D.Id_Compra =C.Id_Compra WHERE Codigo_insumo=?";
  
    try{
      
      $resultado=$this->conexion->prepare($buscar);
      $resultado->execute(array($Codigo_insumo));
  
      $datos=$resultado->fetch(PDO::FETCH_OBJ);
      $Detalle=new CompraAsInsumoModel();
      $Detalle->__SET('Id_Compra',$dato->Id_Compra);
      $Detalle->__SET('Nombre_Insumo',$dato->Nombre_Insumo);
      $Detalle->__SET('subtotal',$dato->subtotal);
      $Detalle->__SET('Cantidad',$dato->Cantidad);
      
  
      return $Detalle;
  
    }catch(\Exeption $error){
     echo 'error al buscar los datos'.$error->getMessage();
   
    }
  
  }

  
  
  
  public function ListarInsumo()
  {
    $datosInsumo=array();
    $consultar="SELECT I.Codigo_insumo, I.Nombre_Insumo, I.StockMinimo, I.Precio_Entrada, C.Nombre_Categoria, T.Nombre_Tamano
    FROM tbl_insumo I INNER JOIN tbl_categoria C ON I.id_Categoria=C.Id_Categoria 
    INNER JOIN tbl_Tamano T ON I.Id_Tamano=T.Id_Tamano
    ORDER BY Codigo_insumo ASC";
 
     try {
           $resultado=$this->conexion->query($consultar);
          // $resultado->execute();

           foreach ($resultado->fetchALL(PDO::FETCH_OBJ) as $dato) {
            $Insumo=new InsumoModel();
            $Insumo->__SET('Codigo_insumo',$dato->Codigo_insumo);
            $Insumo->__SET('Nombre_Insumo',$dato->Nombre_Insumo);
            $Insumo->__SET('StockMinimo',$dato->StockMinimo);
            $Insumo->__SET('Precio_Entrada',$dato->Precio_Entrada);
            $Insumo->__SET('Nombre_Categoria',$dato->Nombre_Categoria);
            $Insumo->__SET('Nombre_Tamano',$dato->Nombre_Tamano);
               $datosInsumo[]=$Insumo;
           }

         return $datosInsumo; 

        } catch (Exception $error) {
            echo 'Se ha presentado un error en la conexion'.$error->getMessage();
            die($error->getMessage());
        }

  }

  public function RegistrarCompra($ListaInsumos, $total){


    $query="INSERT INTO tbl_compra VALUES(Id_Compra, Precio_Unidad, Fecha_Compra, $total, Nit_Empresa)";
    $this->conexion->execute($query);

    $query="SELECT MAX(Id_Compra) FROM tbl_compra";
    $resultado=$this->conexion->query($query);
 
    

    $IdUltimaCompra = 0;

    if ($reg = mysql_fetch_array($resultado)){
        $IdUltimaCompra = $reg[0];
    }

    foreach ($ListaInsumos as $Insumo) {
       $query= "INSERT INTO tbl_insumo_has_compra VALUES
       ('".$IdUltimaCompra."',
       '".$Insumo->Codigo_insumo."',
       '".$Insumo->Cantidad."',
       '".$Insumo->Subtotal."')";

       $this->$conexion->execute($query);
       $this->ActualizarStock($Insumo->Codigo_insumo. $Insumo->Cantidad);

    }
    
  }
 


public function ActualizarStock($Codigo_insumo, $stockMenos){

  $query ="SELECT StockMinimo FROM tbl_insumo WHERE Codigo_insumo=$Codigo_insumo";
  $resultado = $this->conexion->execute($query);

  $StockActual = 0;
  if ($reg = mysql_fetch_array($resultado)) {
    $StockActual = $reg[0];
  }
  $StockActual -= $stockMenos;

$query ="UPDATE tnl_insumo SET StockMinimo = $StockActual WHERE Codigo_insumo = $Codigo_insumo ";

 $this->conexion->execute($query);

}


}