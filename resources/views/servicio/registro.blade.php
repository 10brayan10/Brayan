<?php
session_start();
?>

<?php require_once('comple/conn/connect.php') ?>

<?php
date_default_timezone_set('America/Mexico_City'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="comple/js/index.js"></script>
	<script type="text/javascript" src="comple/js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="comple/css/estilosm.css">
	<link rel="stylesheet" href="comple/materialize/css/materialize.min.css" />
	<script src="comple/materialize/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	
	
	<!--<div id="container">
		<img src="img/logoMetro.png" id="logo">
	</div>


	<div class="btn-group center">
			<a href="cuentas.php"><button>Cuentas de usuarios</button></a>
			<a href="registro.php"><button>Registro entrada/salida</button></a>
			<a href="php/consultas.php"><button>Consultas y reportes</button></a>
	</div>
-->

<!--
@media screen and (max-width:480px){
	body {
		font-size:80%; // achicamos la fuente en pantallas pequeñas 
-->

<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="comple//img/logo.png"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
     <!--<li><i class="material-icons">account_circle</i></li>-->
	 <li><a href="{{url('cuentas/')}}">Cuentas de usuarios</a></li>
	 <!--<li><i class="material-icons">assignment</i></li>-->
	 <li><a href="{{url('/')}}">Registro entrada/salida</a></li>
	 <!--<li><i class="material-icons">content_paste</i></li>-->
	 <li><a href="{{url('consultas/')}}">Consultas y reportes</a></li>
      </ul>
    </div>
  </nav>
<!--
} 
}
-->

	<br>
	<div class="form center">
			<h5><b>Sistema de registro de asistencia personal</b></h5>
			<h5><b>Servicio Social</b></h5>
			<h4><b>Registro de entrada/salida</b></h4>
	</div>
	<br>
	<div class="container">
		<div class="form">

			<form action="{{url('/valida')}}" method="POST" name="nick_form" id="nick_form">
@csrf
				<center><h5><b>Ingrese sus datos para registrar entrada/salida</b></h5><br></center>
				<div class="input-field col s12">
                <!--<i class="material-icons prefix">account_circle</i>-->
                <label>Nick name</label>
				<input type="text" name="nick" id="nick">
               </div>
				<div class="input-field col s12">
                <!--<i class="material-icons prefix">offline_pin</i>-->
                <label>Contraseña</label>
		        <input type="password" name="password" id="password">
                </div>

			</form>

			<div class="center">
			<button type="submit" form="nick_form" value="Submit">Aceptar</button>
		</div>

		</div>

	</div>
	<footer class="center">
		© 2018 Copyright
	</footer>


	
	

</body>
</html>

