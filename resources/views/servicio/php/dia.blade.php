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
<?php require_once('comple/conn/connect.php'); ?>

<?php
date_default_timezone_set('America/Mexico_City');
//$nick = $_POST['nick'];
//$fi=$_POST['fi'];
//$ff=$_POST['ff'];

//se buscara el id del nick
//$consultaid = "SELECT id, nombre, apaterno, amaterno FROM usuarios";

//$filaid = mysqli_fetch_assoc($resultadoid);
//$totalid = mysqli_num_rows($resultadoid);
//$id=$filaid['id'];
//$hoy=date('Y-m-d');
$hoy_fecha = date('Y-m-d', time());

//$consulta = "SELECT u.area, u.nombre, u.apaterno, u.amaterno, a.entrada, a.salida, a.horas from asistencia a, usuarios u where a.id=u.id and //entrada>='".$hoy_fecha." 00:00:00'";

$consulta = "SELECT u.area, u.nombre, u.apaterno, u.amaterno, a.entrada, a.salida, a.horas from asistencia a, usuarios u where a.id=u.id ";
  
$resultado=mysqli_query($connect,$consulta);
//$fila = mysqli_fetch_assoc($resultado);
//$total = mysqli_num_rows($resultado);
$fila = $resultado->fetch_assoc();
$total =$resultado->num_rows;
  


?>

<div class="container center">
<center>
 <table id="table" class="centered">
  <thead>
    <tr>
      <th colspan="6">Lista de horas</th>
    </tr>
    </thead>
  <tbody>
  <tr>
    <td>Área</td>
    <td> Apellido Paterno </td>
    <td> Apellido Materno </td>
    <td> Nombre </td>
    <td>Entrada</td>
    <td>Salida</td>
    <td>Horas</td>
   <td></td>
  </tr>

<?php if ($total>0) { ?>

   <?php do{ ?>
     <div class="detalles">
       <tr>
         <td class="titulo"><?php echo $fila['area']?></td>
         <td class="titulo"><?php echo $fila['apaterno']?></td>
         <td class="titulo"><?php echo $fila['amaterno']?></td>
         <td class="titulo"><?php echo $fila['nombre']?></td>
          <td class="titulo"><?php echo $fila['entrada']?></td>
          <td class="titulo"><?php echo $fila['salida']?></td>
          <td class="titulo"><?php echo $fila['horas']?></td>
          
       </tr>
     </div>
   <?php } while ($fila = mysqli_fetch_assoc($resultado)); ?>
<?php }
elseif ($total>0) echo '';
else echo '<h2>No se encontraron resultados.</h2>';
?>

  </tbody>
 </table>
 <br>
 <a href="{{url('consultas/')}}"><input type="button" value="Regresar"></a>
 </center>
</div>
  </form>
  
</body>
</html>
