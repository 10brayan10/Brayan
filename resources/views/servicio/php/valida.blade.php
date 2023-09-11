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
    date_default_timezone_set('America/Mexico_City');
    $nick = $_POST['nick'];
    $password = md5($_POST['password']);
    $consulta = "SELECT * FROM usuarios WHERE nick = '$nick' and password = '$password'";
    $resultado = $connect->query($consulta);
    $fila = mysqli_fetch_assoc($resultado);
    $total = mysqli_num_rows($resultado);
    $id=$fila['id'];

    echo "id: ".$id. ", nombre: ".$fila['nombre'].", apaterno: ".$fila['apaterno'].", amaterno: ".$fila['amaterno'].", nick: ".$fila['nick'] ;
           
   

    if ($total>0 && $nick!='' && $password!='') {
           echo "<h2>Usuario registrado</h2>";
          $registro = "SELECT id, date_format(entrada, '%Y-%m-%d') as entrada_fecha , date_format(salida, '%Y-%m-%d') as salida_fecha FROM asistencia WHERE id = '$id' order by entrada_fecha desc limit 0, 1" ;
//echo   $registro;
        $resultador=mysqli_query($connect,$registro);
          //$resultador = $connect->query($registro);
          $filar = mysqli_fetch_assoc($resultador);
          $totalr = mysqli_num_rows($resultador);
//echo "totalr: ".$totalr;
          //extrae campos de la consulta
        
            
            $entrada_fecha=isset($filar['entrada_fecha'])? $filar['entrada_fecha'] : '';
            $salida_fecha=isset($filar['salida_fecha'])? $filar['salida_fecha'] : '';
          
          echo "entrada: ".$entrada_fecha."<br>";
          echo "salida: ".$salida_fecha."<br>";

          $hoy_fecha = date('Y-m-d', time());

//echo "Hoy: " . $hoy_fecha . ", Id: " . $id .  ", Usuario: " . $fila['nombre'] . ", Entrada: " . $entrada_fecha . ", Salida: " . $salida_fecha . "<br>";
          $hoy = "'" . date('Y-m-d h:i:s', time()) . "'";
          
          if($entrada_fecha!=$hoy_fecha){
              //Registra nueva entrada
              //echo "<br>No tiene registro de entrada del d&iacutea de hoy, registrar entrada."."<br>";
              $sql = "insert into asistencia (id, entrada) values(". $id . ", " . $hoy . ")";
              if($connect->query($sql)=== TRUE){
                  echo "<br>Registro de entrada exitoso!";
              }else{
                  echo "Error: " . $sql . "<br>" . $connect->error;
              }
          }elseif ($entrada_fecha==$hoy_fecha && $salida_fecha=='' ){
            //Registra salida
          echo "<br>No tiene registro de salida, registrar salida."."<br>";
          echo "el valor de hoy es: \n ".$hoy;
          echo "Hoy fecha es".$hoy_fecha;
          $sql = "update asistencia set salida=" . $hoy . "where id=". $id. " and entrada>='".$hoy_fecha." 00:00:00'";        
echo "update: " . $sql; 
          if($connect->query($sql)=== TRUE){  
                             
          echo "<br>Registro de salida exitoso!";            
            }else{
            echo "Error: " . $sql . "<br>" . $connect->error;
          }
        }             
          elseif ($entrada_fecha==$hoy_fecha && $salida_fecha!=null ){
               //tiene asistencia el día de hoy
            echo "<br>El usuario =" . $fila['nombre'] . " \n ya tiene asistencia el d&iacutea de hoy" . "<br>";
        }
      }      
    else echo '<h2>Usuario no registrado.</h2>';
    ?> 
    <?php
      if($entrada_fecha!=$hoy_fecha){    
      }elseif ($entrada_fecha==$hoy_fecha && $salida_fecha=='' ){
        //Registra salida
         $sql = "update asistencia SET horas= (timediff(salida,entrada)) WHERE id=id  and entrada>='".$hoy_fecha." 00:00:00';";
        //echo "update: " . $sql; 
          if($connect->query($sql)=== TRUE){  
          echo "<br>Horas guardadas!\n"; 
          }else{
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
      }     
      ?>

   <br>
   <a href="{{url('/')}}"><input type="button" value="Regresar"></a>
   
   </center>
</div>
  </form>
  
  </body>
  </html>