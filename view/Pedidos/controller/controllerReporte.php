<?php
 require_once '../../model/config.php';
 class controllerReporte extends Conexion{
  
    public function ConsultarPedido($id){
        $id = $this->conexion->quote($id);
       
        $sql="call ConsultarPedido($id)";
       try {
           
           $resultado = $this->conexion->query($sql);
           $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
           if ( count($resultado) > 0 ) {
             return $resultado;
           }else {
                return false;
           }
           
       } catch (\exception $th) {
           echo($th);
       }
    }
    public function ConsultarDireccion(){
        
        $sql="call ConsultarDireccionTienda()";
       try {
           
           $resultado = $this->conexion->query($sql);
           $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
           if ( count($resultado) > 0 ) {
                return $resultado;
           }else {
                echo "0";
           }
           
       } catch (\exception $th) {
           echo($th);
       }
    }
    public function ConsultarAnchetasPedido($idPedido){
        $idPedido = $this->conexion->quote($idPedido);
        $sql="call ConsultarAnchetasPedido($idPedido)";
       try {
           
           $resultado = $this->conexion->query($sql);
           $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
           if ( count($resultado) > 0 ) {
                return $resultado;
           }else {
                echo "0";
           }
           
       } catch (\exception $th) {
           echo($th);
       }
    }
 }
?>