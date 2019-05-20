<?php
include_once '../../model/configuracion.php';
class PedidosAdmin extends conexion{

    public function ListarPedidosClientes()
    {
      $datosInsumo=array();
      $consultar="call 	ConsultarPedidosAdmin()";
   
       try {
             $resultado=$this->conexion->query($consultar);
             $pedidos = $resultado->fetchALL(PDO::FETCH_ASSOC) ;
             return $pedidos; 
  
          } catch (Exception $error) {
              echo 'Se ha presentado un error en la conexion'.$error->getMessage();
              die($error->getMessage());
          }
    }
    public function estadosPedidos()
    {
      $datosInsumo=array();
      $consultar="call ConsultarEstadosPedido()";
   
       try {
             $resultado=$this->conexion->query($consultar);
             $pedidos = $resultado->fetchALL(PDO::FETCH_ASSOC) ;
             return $pedidos; 
  
          } catch (Exception $error) {
              echo 'Se ha presentado un error en la conexion'.$error->getMessage();
              die($error->getMessage());
          }
    }
}

?>