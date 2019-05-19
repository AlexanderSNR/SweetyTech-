<?php
		$conexion=new PDO("mysql:host=localhost;dbname=sweety1;charset=utf8", "root", "");
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_REQUEST['idInsumo']) && isset($_REQUEST['cantidad'])) {
    $idInsumo=$_REQUEST['idInsumo'];
    $cantidad=$_REQUEST['cantidad'];
    $detalles="INSERT INTO tmp (Codigo_Insumo,Cantidad) values (?,?)";
    try{
			$conexion->prepare($detalles)->execute(array(
				$idInsumo,
                $cantidad,
				));
                echo 1;			
			} catch (Exception $e) {
				echo $e->getMessage();
			}

}else if (isset($_REQUEST['listar'])) {
    $json=array();
        $consulta="SELECT t.id_tmp,t.Codigo_Insumo,t.Cantidad,i.Nombre_Insumo FROM tmp t JOIN tbl_insumo i ON t.Codigo_Insumo = i.Codigo_insumo";
        try {
            $resultado=$conexion->query($consulta);
            $resultado->execute();
            
            foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos) {
                $json[] = array(
                    'idTmp' => $datos->id_tmp,
                    'idInsumo' => $datos->Codigo_Insumo,
                    'cantidad' => $datos->Cantidad,
                    'nombre' => $datos->Nombre_Insumo,
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;

        } catch (Exception $e) {
            die($e->getMessage());
        }
}else if (isset($_REQUEST['idInsumo'])) {
        $cod = $_REQUEST['idInsumo'];
        $consulta="DELETE FROM `tmp` WHERE `id_tmp`=$cod";
        try {
            $resultado=$conexion->query($consulta);
            $resultado->execute();
          echo "delete";
        } catch (Exception $e) {
            die($e->getMessage());
        }
} else{
    $json=array();
    $consulta="SELECT * FROM `tbl_insumo`";
    try {
        $resultado=$conexion->query($consulta);
        $resultado->execute();
        
        foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos) {
            $json[] = array(
                'idInsumo' => $datos->Codigo_insumo,
                'nombre' => $datos->Nombre_Insumo,
                'cantidad' => $datos->cantidad,
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;

    } catch (Exception $e) {
        die($e->getMessage());
    }
}