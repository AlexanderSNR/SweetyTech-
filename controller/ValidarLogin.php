<?php
require_once '../model/configuracion.php';
session_start();
class User_Login extends Conexion
{
    public function iniciar($usuario,$pass)
    {    
     $password=md5($pass);
     $sql=" call ValidarLogin(:email,:pwd)";
         try {
            $query = $this->conexion->prepare($sql);
            $query->bindParam(":email", $usuario,PDO::PARAM_STR) ;
            $query->bindParam(":pwd", $password,PDO::PARAM_STR) ;
            $query->execute();
            $count=$query->rowCount();
            $data=$query->fetch(PDO::FETCH_ASSOC);
            if($count)
            {
              if ($data['Estado'] == 0) {
                   echo "-1";
              }else{
                  $_SESSION['usuario'] = $data;
                  echo $data['Id_Rol'];
              }
            }
            else
             {
                echo "0";
             } 
         } catch (Exception $e) {
             echo $e;
         }
    }
}
if ($_POST['action'] == "ajax") {
     if ($_POST['option']=="1") {
         $login = new User_Login();
         sleep(2);
         $login->iniciar($_POST['email'],$_POST['password']);
     }
}

?>