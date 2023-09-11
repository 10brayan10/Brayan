<?php
use function PHPSTORM_META\exitPoint;

include('conexion_be.php');

$objeto =new conexion();

$conexion = $objeto->Conectar();



$nombre= $_POST['nombre'];
$precio=$_POST['precio'];
$imagen= $_POST['imagen'];

$stmt = $conexion->prepare("SELECT nombre,precio,imagen FROM carrito");
$stmt->execute();
$userExists = $stmt->fetchColumn();
while($datos=$userExists->fetch_objecto())
?>