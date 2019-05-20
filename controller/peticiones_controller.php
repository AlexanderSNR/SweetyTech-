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
}
if (isset($_POST['action'])) {
    $control = new PeticionesAjax();
    switch ($_POST['option']) {
        case '1':
           $control->AplicarRecargo($_POST['idPedido'],$_POST['recargo']);
            break;
        
        default:
            echo "no es";
            break;
    }
}
?>