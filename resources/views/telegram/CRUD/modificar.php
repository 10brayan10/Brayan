<?php
 use function PHPSTORM_META\exitPoint;
 include('conexion_be.php');
 $objeto =new conexion();
 $conexion = $objeto->Conectar(); 
 $id=$_GET["id"];   
 $stmt = $conexion->prepare("SELECT * FROM usuarios where id=$id");
 $stmt->execute();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/01022f292d.js" crossorigin="anonymous"></script>

</head>
<body >
   
        <form  class="col-4 p-3 m-auto"  method="POST" enctype="multipart/form-data">
       <h5 class="text-center alert alert-secondary">Modificar</h5>
        <h3 class="text-center text-secondary">Modificar el registro </h3>
        <input type="hidden" name="id" value="<?= $_GET["id"]?>">

          <?php
          include "modificar_campos.php";
          while( $datos= $stmt->fetchObject()){
          ?>
<div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">area </label>
              <input type="tetx" name="area"value="<?= $datos->area?>" class="form-control" id="area" aria-describedby="emailHelp">
              
            </div>  
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">nombre</label>
              <input type="text" name="nombre" value="<?= $datos->nombre?>"class="form-control" id="nombre" aria-describedby="emailHelp">
              <!--<div id="emailHelp" class="form-text">Nombre_completo</div>-->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">apaterno</label> 
                <input type="text" name="apaterno"value="<?= $datos->apaterno?>" class="form-control" id="apaterno" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">amaterno</label> 
                <input type="text" name="amaterno" value="<?= $datos->amaterno?>"class="form-control" id="amaterno" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">nick</label> 
                <input type="text" name="nick" value="<?= $datos->nick?>"class="form-control" id="nick" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">password</label> 
                <input type="text" name="password" value="<?= $datos->password?>"class="form-control" id="password" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">telefono</label> 
                <input type="text" name="telefono" value="<?= $datos->telefono?>"class="form-control" id="telefono" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>

                
        
          <?PHP
          }
          ?>
           
            <button type="submit"  name="btnregistrar" class="btn btn-primary" value="ok">Modificar Registro</button>
        </form>
         
    </div>



    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>