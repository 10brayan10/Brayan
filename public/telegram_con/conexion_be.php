<?php
include('datosconexion.php'); 
class conexion{
    function Conectar(){
        try{
        $conexion=new PDO("mysql:host=".servername.";dbname=".dbname,username,password);
        
        return $conexion;
        } catch(Exception $error){
            die("El error de conexion es:".$error->getMessage());

        }

    }
}
?>