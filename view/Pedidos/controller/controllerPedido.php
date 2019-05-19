<?php
session_start();
 require_once '../model/config.php';
 require_once '../model/pedidoModel.php';
class controllerPedido extends Conexion{

    public function ConsultarDireccion(){
        sleep(2);
        $sql="call ConsultarDireccionTienda()";
       try {
           
           $resultado = $this->conexion->query($sql);
           $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
           if ( count($resultado) > 0 ) {
            echo json_encode($resultado); 
           }else {
                echo "0";
           }
           
       } catch (\exception $th) {
           echo($th);
       }
    }
    public function ConsultarDireccionUser($documento){
        $sql="call ConsultarDireccionUser($documento)";
       try {
           
           $resultado = $this->conexion->query($sql);
           $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
           if ( count($resultado) > 0 ) {
            echo json_encode($resultado); 
           }else {
                echo "0";
           }
           
       } catch (\exception $th) {
           echo($th);
       }
    }

    public function RegistrarPedido($tipoEnvio,$direccion,$fecha,$hora,$id_persona,$productos){
       
        $sql = " call RegistrarPedido(?,?,?,?,?)";
        
        try {
            $this->conexion->prepare($sql)->execute(array(
                 $direccion,
                 $fecha,
                 $tipoEnvio,
                 $id_persona,
                 $hora
                ));
            $idpedido = $this->ConsultarUltimoPedido($id_persona);
            if($this->RegistrarDetallePedido($idpedido,$productos)){
                $this->ActualizarExistencias($productos);
                echo $idpedido;
            }
        } catch (Exception $e) {
        echo $e;
        }
    }
    public function ActualizarExistencias($productos){
        try {
            $bandera = true;
         foreach ($productos  as $ancheta) {
              $insumos = $this->GetInsumos($ancheta->Id_Plantilla,$ancheta->cantidad);
              if ($insumos != false ) {
                   foreach ($insumos as $insumo) {
                       if ($this->ActualizarStockInsumo($insumo['Insumos_Restantes'],$insumo['Codigo_insumo']) == false) {
                           $bandera = false ;
                            break;
                       }
                   }
              }
              if ($bandera == false ) {
                  break;
              }
         }
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function ActualizarStockInsumo($stock,$id_insumo){
        
        $sql = " call ActualizarStockInsumo(?,?)";
        try {
            $this->conexion->prepare($sql)->execute(array(
                 $stock,
                 $id_insumo
                ));
            return true ;
        } catch (\Throwable $th) {
        echo false;
        }
    }
    public function GetEdad($fecha_Nacimiento){
        try {
            $fecha_N = new DateTime($fecha_Nacimiento);
            $hoy = new DateTime();
            $edad =$hoy->diff($fecha_N);
            return $edad->y;
        
            } catch (Exception  $e) {
            echo $e;
        }
       
       
    }
    public function ValidarInsumosLicor($productos){
       $bandera = true ;//Se considera que no hay insumos de licor 
       try {
        foreach ($productos as $ancheta) {
            $sql = "call ValidarInsumoLicor($ancheta->Id_Plantilla)";
            $resultado = $this->conexion->query($sql);
            $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
            if ( count($resultado) > 0 ) {
                $bandera = false ;
                break;
            }
        } 
            return $bandera;
     } catch (\Throwable $th) {
     echo $th;
     }
      
    }
    public function ValidarInsumos($productos){
        $bandera = true;
        try {
            foreach ($productos as $ancheta) {
                $sql = "call PlantillaInsumos($ancheta->Id_Plantilla,$ancheta->cantidad)";
                $resultado = $this->conexion->query($sql);
                $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
                if ( count($resultado) > 0 ) {
                    for ($i=0 ; $i < count($resultado) ; $i++ ) { 
                         if ($resultado[$i]['Insumos_Restantes'] < 0) {
                             $bandera = false;
                             break;
                         }
                    }
                }
                if ($bandera == false) {
                    break;
                }
            } 
                return $bandera;
         } catch (\Throwable $th) {
         echo $th;
         }
    }
    public function GetInsumos($id_plantilla,$cantidad){

        try {
                $sql = "call PlantillaInsumos($id_plantilla,$cantidad)";
                $resultado = $this->conexion->query($sql);
                $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
                 if (count($resultado) > 0) {
                    return $resultado;
                 }else{
                     echo false ; 
                 }
               
         } catch (\Throwable $th) {
         echo $th;
         }
    }
    public function ConsultarUltimoPedido($id){
        $sql = " call ConsultarUltimoPedido ($id)";
        
        try {
           $resultado = $this->conexion->query($sql);
           $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
           if ( count($resultado) > 0 ) {
               return $resultado[0]['Id_Pedido'];
           }else {
                return 0 ;
           } 
        } catch (\Throwable $th) {
        echo $th;
        }
    }

    public function RegistrarDetallePedido($Pedido,$Productos){
        $sql = " call RegistrarDetallePedido(?,?,?,?)";
        try {
            foreach ($Productos as $producto) {
                 $subtotal = $this->subTotal($producto);
                $this->conexion->prepare($sql)->execute(array(
                    $Pedido,
                    $producto->Codigo_Ancheta,
                    $producto->cantidad,
                    $subtotal
                   ));
            }
            return true;
        } catch (\Throwable $th) {
        return false;
        }
    }

    public function ConsultarPedido($id){
        $id = $this->conexion->quote($id);
        $sql = " call ConsultarEstadoPedido($id)";
        
        try {
           $resultado = $this->conexion->query($sql);
           $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
           if ( count($resultado) > 0 ) {
            echo json_encode($resultado); 
           }else {
            echo 0 ;
           }
            
            
        } catch (\Throwable $th) {
        echo $th;
        }
    }

    public  function ConsultarPedidosCliente($id){
        $sql = " call ConsultarPedidos($id)";
        
        try {
           $resultado = $this->conexion->query($sql);
           $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
           if ( count($resultado) > 0 ) {
            echo json_encode($resultado); 
           }else {
            echo 0 ;
           }
            
            
        } catch (\Throwable $th) {
        echo $th;
        }
    }

    public function subTotal($producto){
        if ($producto->Descuento != null) {
             $precio = $producto->Precio - ($producto->Precio*($producto->Descuento/100));
             $subtotal = $precio * $producto->cantidad;
             return $subtotal;
        }else{
            return $producto->Precio * $producto->cantidad;
        }
    }

}
$controlPedido = new controllerPedido();
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
switch (intval($_REQUEST['option'])) {
    case 1:
    if ($action == 'ajax') {
        $controlPedido->ConsultarDireccionUser(intval($_REQUEST['documento']));  
    }
        break;
    case 2:
      if ($action == 'ajax') {
          $controlPedido->ConsultarDireccion();  
      }
      break;
    case 3 : 
    sleep(2);
    if ($action == 'ajax') {
        $productos = json_decode($_REQUEST['Products']);
        $datos = json_decode($_REQUEST['datos']);
         $TipoEnvio = $datos->Tipoenvio;
         if ($TipoEnvio == 2) {
             $direccion = $datos->Direccion;
         }else{
             if ($TipoEnvio == 1) {
            $direccion = $datos->direccionUser;
             }
         }
         $fecha_actual = date('Y-m-d');
         date_default_timezone_set('America/Bogota');
         $hora = date('h:i:s');
         
         if ($controlPedido->GetEdad($_SESSION['usuario']['Fecha_Nacimiento']) >= 18) {
            if ($controlPedido->ValidarInsumos($productos)) {
                 $controlPedido->RegistrarPedido($TipoEnvio,$direccion,$fecha_actual,$hora,$_SESSION['usuario']['Id_Persona'],$productos);
            }else{
                echo -2;
            }

        }else{
             $respuesta = $controlPedido->ValidarInsumosLicor($productos);
             if ($respuesta) {
                  if ($controlPedido->ValidarInsumos($productos)) {
                    $controlPedido->RegistrarPedido($TipoEnvio,$direccion,$fecha_actual,$hora,$_SESSION['usuario']['Id_Persona'],$productos);
                  }else{
                      echo -2;
                  }
                
             }else{
                 echo -1;
             }
        }
         
    }
    break;
    case 4:
        if ($action == 'ajax') {
            $controlPedido->ConsultarPedido($_REQUEST['idPedido']);
        }
    break;
    case 5:
        if ($action == 'ajax') {
             sleep(2);
             $controlPedido->ConsultarPedidosCliente($_SESSION['usuario']['Id_Persona']);
        }
    break;
    default:
        
        break;
}
?>