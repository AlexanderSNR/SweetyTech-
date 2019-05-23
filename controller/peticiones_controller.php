<?php
include_once '../model/configuracion.php';
class PeticionesAjax extends conexion{
    public function AplicarRecargo($idPedido,$valorRecargo){
        $sql = "call AplicarRecargo(?,?)";
        try {
            $this->conexion->prepare($sql)->execute(array(
                $idPedido,
                $valorRecargo
               ));

            echo 1;
        } catch (\Throwable $th) {
            echo -1;
        }
    }
    
    public function ActualizarEstado($idPedido,$estado){
        $sql = "call ActualizarEstadoPedido(?,?)";
        try {
            $this->conexion->prepare($sql)->execute(array(
                $idPedido,
                $estado
               ));

            echo 1;
        } catch (Exception $e) {
            echo $e;
        }
    }

}
if (isset($_POST['action'])) {
    $control = new PeticionesAjax();
    switch ($_POST['option']) {
        case '1':
           $control->AplicarRecargo($_POST['idPedido'],$_POST['recargo']);
            break;
            case '2':
            $control->ActualizarEstado($_POST['idPedido2'],$_POST['estado']);
             break;
        default:
            echo "no es";
            break;
    }
}
?>