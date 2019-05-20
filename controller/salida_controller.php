<?php
// if ($_REQUEST['ajax']==false || $_REQUEST['ajax']==null) {
//     include_once '../model/configuracion.php';
//     include_once '../model/salida_model.php';
// }else{
    include_once '../../model/configuracion.php';
    include_once '../../model/salida_model.php';    
// }

class salida_controller extends  conexion
{
    public function listardatos()
    {
        $datos=array();
        $consulta="SELECT d.Codigo_Salida, i.Nombre_Insumo, d.cantidad, s.Fecha_Salida FROM tbl_salida_has_insumo d inner JOIN tbl_salida s ON d.Codigo_Salida=s.Codigo_Salida INNER JOIN tbl_insumo i on d.Codigo_Insumo=i.Codigo_insumo ORDER BY d.Codigo_Salida DESC";

        try {
            $resultado = $this->conexion->prepare($consulta);
            $resultado->execute();
            foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos ) {
               $salida = new salida();
               $salida->__SET('Codigo_Salida',$datos->Codigo_Salida);
               $salida->__SET('Nombre_Insumo',$datos->Nombre_Insumo);
               $salida->__SET('cantidad',$datos->cantidad);
               $salida->__SET('Fecha_Salida',$datos->Fecha_Salida);              
               $dato[]=$salida;
            }
            return $dato;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
 //--------------------------------------------------------------------------------------------------------   
    public function eliminar($Codigo_Salida)
    {
        $borrar = "DELETE  FROM tbl_salida WHERE Codigo_Salida=?";
        try {
            $this->conexion->prepare($borrar)->execute(array($Codigo_Salida));
			return true;
        } catch (Exception $e) {
            echo "error al eliminar datos ".$e->getMessage();
        }
    }

//-----------------------------------------------------------------------------------------------------------
public function Paginacion()
{
     $consulta="SELECT * FROM tbl_salida_has_insumo ";
     $resultado=$this->conexion->prepare($consulta);
     $resultado->execute();
     $total=$resultado->rowCount();
     $paginas=$total/2;
     $paginas=ceil($paginas);
     return $paginas;       
}
//----------------------------------------------------------------------------------------------------------
public function alertarstock()
{
    $stock="SELECT * FROM tbl_insumo WHERE cantidad<10";   
    $resultado=$this->conexion->prepare($stock);
    $resultado->execute();    
    $noti=$resultado->rowCount();
    return $noti;
}
//-----------------------------------------------------------------------------------------------------------
    public function insertar(salida $salida)
    {
        $insertar= "INSERT INTO tbl_salida (Codigo_Salida, Fecha_Salida, Motivo_Salida) values (?,?,?)";
        try {
            $this->conexion->prepare($insertar)->execute(array(
				
				$salida->__GET('Codigo_Salida'),
				$salida->__GET('Fecha_Salida'),
				$salida->__GET('Motivo_Salida')
                ));

        $ultimaSalida= "SELECT MAX(Codigo_Salida) as codigo FROM `tbl_salida`";
            $ultima = $this->conexion->prepare($ultimaSalida);
            $ultima->execute();

            $codigoSalida = $ultima->fetch(PDO::FETCH_OBJ);
            $codigoSalida = $codigoSalida->codigo;
        $insumos= "SELECT * FROM `tmp`";
            $insumosTmp = $this->conexion->prepare($insumos);
            $insumosTmp->execute();

            foreach ($insumosTmp->fetchAll(PDO::FETCH_OBJ) as $date) {
                $insertDetalle = "INSERT INTO `tbl_salida_has_insumo`(`Codigo_Salida`, `Codigo_Insumo`, `Cantidad`) VALUES (?,?,?)";
                $this->conexion->prepare($insertDetalle)->execute(array(
                    $codigoSalida,
                    (int)$date->Codigo_Insumo,
                    (int)$date->cantidad
                    ));
            }

            $eliminarTmp= "DELETE FROM tmp";
            $this->conexion->prepare($eliminarTmp)->execute();

            $cantidad="SELECT cantidad FROM tbl_salida_has_insumo";
            $cantidad1=$this->conexion->prepare($cantidad);
            $cantidad1->execute();
            $cantidad2="SELECT cantidad from tbl_insumo";
            $nuevacantidad=$this->conexion->prepare($cantidad2);
            $nuevacantidad->execute();
            $resta=$cantidad2-$cantidad1;     
            //consulta2="UPDATE tbl_insumo set cantidad=($resta) where Codigo_insumo=?";
            //$actualizacion=$this->conexion->prepare($consulta2);
            //$actualizacion->execute();

			return true;
        } catch (Exception $e) {
            echo "error al ingresar datos ".$e->getMessage();
        }
    }
//---------------------------------------------------------------------------------------------------------------
    public function buscar($Codigo_Salida)
    {
        $buscar="SELECT *  FROM tbl_salida where Codigo_Salida=?";
		try {
			$resultado=$this->conexion->prepare($buscar);
			$resultado->execute(array($Codigo_Salida));
			$datos=$resultado->fetch(PDO::FETCH_OBJ);
			$salida= new salida();
			$salida->__SET('Codigo_Salida',$datos->Codigo_Salida);
			$salida->__SET('Fecha_Salida',$datos->Fecha_Salida);
			$salida->__SET('Motivo_Salida',$datos->Motivo_Salida);
			return $salida;
		} catch (Exception $e) {
			echo "error al buscar ".$e->getMessage();
		}
    }
//-----------------------------------------------------------------------------------------------------------------
    public function actualizar(salida $salida)
    {
        $actualizar="UPDATE  tbl_salida SET Fecha_Salida=?,Motivo_Salida=? where Codigo_Salida=? ";
		try {
			$this->conexion->prepare($actualizar)->execute(array(
				$salida->__GET('Fecha_Salida'),
				$salida->__GET('Motivo_Salida'),
				$salida->__GET('Codigo_Salida'),
				));
			return true;

		} catch (Exception $e) {
			echo "error al ingresar datos ".$e->getMessage();
		}
    }


}

// $controlador = new salida_controller(); 
// require_once 'Insumo_controller.php';
//             $insumo = new InsumoController();
//             var_dump($insumo->Listar());
// if ($_REQUEST['ajax']==true) {
//     $tipo = $_REQUEST['tipo'];
//     switch ($tipo) {
//         case 1:
            
//         case 2:
//             # code...
//             break;
//         default:
//             # code...
//             break;
//     }
// }else {
    
// }


?>