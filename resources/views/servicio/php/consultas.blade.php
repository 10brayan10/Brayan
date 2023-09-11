<?php require_once('comple/conn/connect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscador</title>
	<script type="text/javascript" src="comple/js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="comple/css/estilosm.css">
	<link rel="stylesheet" href="comple/materialize/css/materialize.min.css" />
  <script src="comple/materialize/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="comple/img/logo.png"></a>
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
	<div id="container">
		<img src="../img/logoMetro.png" id="logo">
	</div>

	<div class="btn-group center">
			<a href="../cuentas.html"><button>Cuentas de usuario</button></a>
			<a href="../registro.html"><button>Registro entrada/salida</button></a>
			<a href="consultas.html"><button>Consultas y reportes</button></a>
	</div>
-->
	<br>
	<div class="form center">
			<h5><b>Sistema de registro de asistencia personal </b></h5>
			<h5><b>Servicio Social</b></h5>
	<h4><b>Consultas y reportes</b></h4>
	</div>
	<br>
	<div class="container">
		<div class="form">
			<form action="{{url('/periodo')}}" method="POST" name="consulta_form" id="consulta_form">
        @csrf
				<center><h5><b>Ingrese datos para realizar consulta</b></h5><br></center>

               <div class="input-field col s12">
              	<!--<i class="material-icons prefix">account_circle</i>-->
                <label>Nick name</label>
				<input type="text" name="nick" id="nick">
               </div>
               <div class="input-field col s6">
                 <!--<i class="material-icons prefix">date_range</i>-->
                 <label>Fecha inicial</label>
				 <input type="date" name="fi" id="fi" placeholder="">
              </div>
              <div class="input-field col s6">
                 <!--<i class="material-icons prefix">date_range</i>-->
                 <label>Fecha final</label>
                 <input type="date" name="ff" id="ff" placeholder="">
              </div>



				<br><br>


			</form>

			<div class="center">
				<button type="submit" form="consulta_form" value="Submit">Periodo</button>
				<button><a href="{{url('dia/')}}"> Día</a></button>
				<!--<a type="button" ref="dia.php"> Dia </a>-->
			 <!--<a href="dia.php"><input type="button" value="dia"></a>-->
			</div>


		</div>

	</div>
	<footer class="center">
    © 2018 Copyright
  </footer>

</body>
</html>
