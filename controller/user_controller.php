<?php 

require_once '../../model/configuracion.php';
require_once '../../model/user_model.php';
require_once '../../model/Persona_model.php';
session_start();
class User_Controller extends Conexion
{
    public function ListaDatos()
    {
        $datos=array();
        $consulta="SELECT * FROM tbl_persona  Where Id_Tipo_Persona = 2  ORDER BY Id_Persona  ";
        try {
            $resultado=$this->conexion->prepare($consulta);
            $resultado->execute();
            foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos) {
                $persona = new PersonasModel();
                $persona->__SET('Id_Persona',$datos->Id_Persona);
                $persona->__SET('Nombre',$datos->Nombre);
                $persona->__SET('Apellido',$datos->Apellido);
                $persona->__SET('Documento_Identificacion',$datos->Documento_Identificacion);
                $persona->__SET('Direccion',$datos->Direccion);
                $persona->__SET('Telefono',$datos->Telefono);
                $persona->__SET('Celular',$datos->Celular);
                $persona->__SET('Fecha_Nacimiento',$datos->Fecha_Nacimiento);
                $persona->__SET('Estado',$datos->Estado);
                $persona->__SET('Id_Tipo_Persona',$datos->Id_Tipo_Persona);
                $persona->__SET('Id_Tipo_Documento',$datos->Id_Tipo_Documento);
                $dato[]=$persona;
            }
            return $dato;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
public function iniciar($usuario,$pass)
    {    
    //escapa carecteres especiales 
     $usuario = $this->conexion->quote($usuario);
     $pass = $this->conexion->quote($pass);
     $usu=$usuario;
     $password=hash('md5',$_POST['pwd']);
     $iniciar=" call ValidarLogin(:userEmail,:pwd)";
         try {
             $resultado = $this->conexion->prepare($iniciar);
             $resultado->bindParam("userEmail", $usuario,PDO::PARAM_STR) ;
             $resultado->bindParam("pwd", $password,PDO::PARAM_STR) ;
             $resultado->execute();
             $count = $resultado->rowCount();
             $datos=$resultado->fetch(PDO::FETCH_ASSOC);
             if($count) {
             $_SESSION['usuario']= $datos;
             return $datos['Id_Rol'];
            }
            else{
                return false;
            } 
         } catch (Exception $e) {
             echo $e;
         }
}
            
        
    
    public function insertar(Usuariomodel $persona)
    {
        var_dump($persona);
        $insertar="INSERT INTO tbl_persona (Documento_Identificacion,Nombre,Apellido,Direccion,Telefono,
        Celular,Fecha_Nacimiento,Estado,Id_Tipo_Persona,Id_Tipo_Documento) values (?,?,?,?,?,?,?,?,?,?)";
        
        try {
            $this->conexion->prepare($insertar)->execute(array(
                $persona->__GET('Documento_Identificacion'),
                $persona->__GET('Nombre'),
                $persona->__GET('Apellido'),
                $persona->__GET('Direccion'),
                $persona->__GET('Telefono'),
                $persona->__GET('Celular'),
                $persona->__GET('Fecha_Nacimiento'),
                $persona->__GET('Estado'),
                $persona->__GET('Id_Tipo_Persona'),
                $persona->__GET('Id_Tipo_Documento')
            ));
             
            $Id_Persona = $this->ConsultarPersona($persona->__GET('Documento_Identificacion'));
              
            $insertarUser="INSERT INTO tbl_usuario(Email,Pass,id_Persona,Id_Rol) values (?,?,?,?)";
            $this->conexion->prepare($insertarUser)->execute(array(
                $persona->__GET('Email'),
                $persona->__GET('password'),
                $Id_Persona,
                '2'
                
            ));


            return true;
        } catch (Exception $e) {
            echo "error al ingresar datos ".$e->getMessage();
            return false ;
        }
    }
    
    private function ConsultarPersona($cedula){

         $sql="Select Id_Persona from tbl_Persona  where Documento_Identificacion  = '$cedula' ";
         try {
             $nueva_consulta = $this->conexion->prepare($sql);
             //ejecutamos la consulta
             $nueva_consulta->execute();
             if($nueva_consulta->rowCount() > 0)
             {
                 $datos=$nueva_consulta->fetch(PDO::FETCH_ASSOC);         
                  return  $datos['Id_Persona'];
     
             }else
             return '<script>swal("ohh ocuurio un problema :) !", "Intenta mas tarde!", "error");</script>';
          

         } catch (\Exeption $e) {
             
         }
    }
    

    public function buscar($Id_Persona)
    {
        $buscar="SELECT * FROM tbl_Persona where Id_Persona=?";
        try {
            $resultado=$this->conexion->prepare($buscar);
            $resultado->execute(array($Id_Persona));
            $datos=$resultado->fetch(PDO::FETCH_OBJ);
            $persona= new PersonasModel();
            
                $persona->__SET('Documento_Identificacion',$datos->Documento_Identificacion);
                $persona->__SET('Id_Persona',$datos->Id_Persona);
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

     public function actualizar(Usuariomodel $persona)
    {
        $actualizar="call  ActualizarUser(?,?,?,?,?,?)";
        try {
            $this->conexion->prepare($actualizar)->execute(array(
                
                $persona->__GET('Nombre'),
                $persona->__GET('Apellido'),
                $persona->__GET('Direccion'),
                $persona->__GET('Telefono'),
                $persona->__GET('Celular'),
                $persona->__GET('Documento_Identificacion')
               

            ));
             var_dump($persona);

        } catch (Exception $e) {
            echo "error al ingresar datos ".$e->getMessage();
        }
    }
    
    public function CambiarEstado($cambio,$id)
	{
		$cambiar="UPDATE  tbl_persona SET Estado=$cambio WHERE Documento_Identificacion=$id";
		try {
			$this->conexion->prepare($cambiar)->execute(array());
			return true;

		} catch (Exception $e) {
			echo "error al cambiar estado".$e->getMessage();
		}



    
        
}
    
    public function Paginacion()
	{
		 $consulta="SELECT * FROM tbl_persona";
         $resultado=$this->conexion->prepare($consulta);
         $resultado->execute();
         $total=$resultado->rowCount();
         $paginas=$total/2;
         $paginas=ceil($paginas);
         return $paginas;       
}
    
    public function verificarUsuario($Email){
        $consulta="SELECT * FROM tbl_usuario Where Email='$Email'";
        $resul=$this->conexion->prepare($consulta);
            $resul->execute();
            $dato=$resul->rowCount();
         if ($dato > 0){
                 $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $cod = '' ;
    
        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 4);
            $codigo = time().$cod . $tmp;
            $i++;
        }
             $fechaRecuperacion = date("Y-m-d H:i:s", strtotime('+24 hours'));
            
            $cambiar="UPDATE  tbl_usuario SET RestablecerPass='$codigo',Fecha_recuperacion='$fechaRecuperacion' WHERE Email='$Email'";
            $resul=$this->conexion->prepare($cambiar);
            $resul->execute();
            
             
              echo'<script type="text/javascript">
              swal({
  title: "RECUPERACION",
  text: "Se encontro una cuenta asociada a este correo!",
  type: "success",
  confirmButtonColor: "#DB00DB",
  confirmButtonText: "OK!"
},
function(){
  window.location.href="../../helps/mail.php?user='.$Email.'&code='.$codigo.'";
});
            </script>';
               
         } else {
             
               echo '<script type="text/javascript">
              swal({
  title: "Error",
  text: "Este correo no esta asociado a ninguna cuenta!",
  type: "warning",
  confirmButtonColor: "#ce3a1e",
  confirmButtonText: "ok!",
  closeOnConfirm: false
});
            </script>';
         }
        
        
    }
    
    
     public function newPassword($Code){
         
          $consulta="SELECT Email,RestablecerPass,Fecha_recuperacion from tbl_usuario Where RestablecerPass='$Code'"; 
          $resul=$this->conexion->prepare($consulta);
          $resul->execute();
          $dato=$resul->rowCount();

            if ($dato > 0) {
                $datos=$resul->fetch(PDO::FETCH_ASSOC);
                $user = new Usuariomodel();
                $user->__SET('RestablecerPass',$datos['RestablecerPass']);
                $user->__SET('Email',$datos['Email']);
                $user->__SET('Fecha_recuperacion',$datos['Fecha_recuperacion']);
                 $current = date("Y-m-d H:i:s");
                
                if (strtotime($current) > strtotime($user->__GET('Fecha_recuperacion'))) {
                
               echo '<script type="text/javascript">
              swal({
  title: "Error con el codigo",
  text: "Este codigo ya expiro!",
  type: "warning",
  confirmButtonColor: "#ce3a1e",
  confirmButtonText: "ok!",
  closeOnConfirm: false
});
            </script>';
             
               
                   
         } else {
              echo'<script type="text/javascript">
              swal({
  title: "Codigo Correcto",
  text: "Puede restablecer su cuenta!",
  type: "success",
  confirmButtonColor: "#DB00DB",
  confirmButtonText: "OK!"
},
function(){
  window.location.href="newPassword.php?user='.$user->__GET('Email').'";
});
            </script>';
         }
         
         
     
    
          }
        }
    
    public function change_Password($user,$pass){
        
       $cambiar="UPDATE  tbl_usuario SET Pass='$pass' WHERE Email='$user'";
		try {
			$this->conexion->prepare($cambiar)->execute(array());
			return true;
            

		} catch (Exception $e) {
			echo "error al cambiar estado".$e->getMessage();
            
		}
 
        
    }
    
    }





?>
