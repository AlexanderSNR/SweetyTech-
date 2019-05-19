<?php
require_once '../../model/configuracion.php';
require_once '../../model/proveedor_model.php';
require_once '../../model/Persona_model.php';
ini_set('memory_limit', '512');
class Proveedor_controller extends Conexion
{
	
	public function ListarDatos()
	{
		$datos=array();
		$consulta="SELECT Id_Persona, Documento_Identificacion,Nombre, Apellido, Nit_Empresa, Telefono ,Direccion, Estado from tbl_persona where id_Tipo_Persona=3 order by Id_Persona desc  ";
		try {
			$resultado=$this->conexion->prepare($consulta);
			$resultado->execute();
			foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos) {
				$proveedor = new PersonasModel();
				$proveedor->__SET('Id_Persona',$datos->Id_Persona);	
				$proveedor->__SET('Documento_Identificacion',$datos->Documento_Identificacion);	
				$proveedor->__SET('Nombre',$datos->Nombre);
				$proveedor->__SET('Apellido', $datos->Apellido);
				$proveedor->__SET('Telefono',$datos->Telefono);
				$proveedor->__SET('Direccion',$datos->Direccion);
				$proveedor->__SET('Nit_Empresa',$datos->Nit_Empresa);
				$proveedor->__SET('Estado',$datos->Estado);				
				$dato[]=$proveedor;
			
			}
			return $dato;
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
 
	public function insertar(PersonasModel $proveedor)
	{
	
		try {
				
				$insertar="INSERT INTO tbl_persona (Documento_Identificacion,Nombre,Apellido,Direccion,Telefono,Celular,Fecha_Nacimiento,Estado,Nit_Empresa,Id_Tipo_Persona,Id_Tipo_Documento) values (?,?,?,?,?,?,?,?,?,?,?)";
				$this->conexion->prepare($insertar)->execute(array(
				
					
				$proveedor->__GET('Documento_Identificacion'),
				$proveedor->__GET('Nombre'),
				$proveedor->__GET('Apellido'),
				$proveedor->__GET('Direccion'),
				$proveedor->__GET('Telefono'),
				$proveedor->__GET('Celular'),
				$proveedor->__GET('Fecha_Nacimiento'),			
				$proveedor->__GET('Estado'),
				$proveedor->__GET('Nit_Empresa'),
				$proveedor->__GET('Id_Tipo_Persona'),
				$proveedor->__GET('Id_Tipo_Documento')
				
				));
				echo 'Todo bien hasta aqui';
			return true;
		} catch (Exception $e) {
			echo "error al ingresar datos ".$e->getMessage();
			
		}
	}



	public function buscar($Id_Persona)
	{
		$buscar="SELECT * FROM tbl_persona where Id_Persona=?";
		try {
			$resultado=$this->conexion->prepare($buscar);
			$resultado->execute(array($Id_Persona));
			$datos=$resultado->fetch(PDO::FETCH_OBJ);
			$persona= new PersonasModel();
				$persona->__SET('Id_Persona',$datos->Id_Persona);
				$persona->__SET('Documento_Identificacion',$datos->Documento_Identificacion);
				$persona->__SET('Nombre',$datos->Nombre);
				$persona->__SET('Apellido',$datos->Apellido);
				$persona->__SET('Direccion',$datos->Direccion);
				$persona->__SET('Telefono',$datos->Telefono);
				$persona->__SET('Celular',$datos->Celular);
				$persona->__SET('Fecha_Nacimiento',$datos->Fecha_Nacimiento);
				$persona->__SET('Estado',$datos->Estado);
				$persona->__SET('Nit_Empresa',$datos->Nit_Empresa);
				$persona->__SET('Id_Tipo_Persona',$datos->Id_Tipo_Persona);
				$persona->__SET('Id_Tipo_Documento',$datos->Id_Tipo_Documento);
			return $persona;
		} catch (Exception $e) {
			echo "error al buscar ".$e->getMessage();
		}
	}
	public function actualizar(PersonasModel $persona)
	{
		$actualizar="UPDATE tbl_persona SET Documento_Identificacion=?, Nombre=?,Apellido=?,Direccion=?,Telefono=?,Celular=?,Fecha_Nacimiento=?,Nit_Empresa=? WHERE Id_Persona=?" ;
		try {
			$this->conexion->prepare($actualizar)->execute(array(

				$persona->__GET('Documento_Identificacion'),
				$persona->__GET('Nombre'),
				$persona->__GET('Apellido'),
				$persona->__GET('Direccion'),
				$persona->__GET('Telefono'),
				$persona->__GET('Celular'),
				$persona->__GET('Fecha_Nacimiento'),		
				$persona->__GET('Nit_Empresa'),
				$persona->__GET('Id_Persona')

			));
			return true;

		} catch (Exception $e) {
			echo "error al ingresar datos ".$e->getMessage();
		}
	}
	public function cambiarestado ($cambio,$estado)
	{
		
		$cambiarestado="UPDATE tbl_persona  SET Estado=$cambio WHERE Id_Persona=$estado";
		try {
			$this->conexion->prepare($cambiarestado)->execute(array());
			return true;

		} catch (Exception $e) {
			echo "error al eliminar datos ".$e->getMessage();
		}
	}

	
		
}
