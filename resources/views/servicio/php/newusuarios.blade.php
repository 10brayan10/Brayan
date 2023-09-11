<?php require_once('comple/conn/connect.php'); ?>
<html>
<head><meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="comple/css/estilosm.css">
  <script type="text/javascript" src="comple/js/jquery.js"></script>
  <script src="comple/materialize/js/materialize.min.js"></script>
	<title>Buscador</title>
  <link rel="stylesheet" href="comple/materialize/css/materialize.min.css" />
</head>
<body>
  <form action="" method="POST">
@csrf
<div id="container">
  <img src="comple/img/logoMetro.png" id="logo">
</div>

<div class="container center">
  <center>
<?php
$area=$_POST['area'];
$nombre=$_POST['nombre'];
$apaterno=$_POST['apaterno'];
$amaterno=$_POST['amaterno'];
$nick=$_POST['nick'];
$password=$_POST['password'];
$telefono=$_POST['telefono'];
echo "Área: ".$area."<br>"; 
echo "Nombre: ".$nombre."<br>";
echo "Apellido Paterno: ".$apaterno."<br>";
echo "Apellido Materno: ".$amaterno. "<br>";
echo "Nick: ".$nick."<br>";
echo "Telefono:".$telefono;
$consulta = "INSERT into usuarios values(null,'$area','$nombre','$apaterno','$amaterno','$nick',md5('$password'),'$telefono')";
//echo "$consulta";
//$resultado = $connect->query($consulta);
$resultado=mysqli_query($connect,$consulta);
?>
<br>
<a href="{{url('/cuentas')}}"><input type="button" value="Regresar"></a>
</center>
</div>

  </form>
  
</body>
</html>
