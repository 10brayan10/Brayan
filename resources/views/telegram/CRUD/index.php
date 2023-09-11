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
<body>

<!--<nav class="navbar navbar-expand-lg navbar-light bg-light"
                    <div class="container-fluid">

                        <img src="../administrador/img/logo.jpg" alt="logo" width="50px">
                        
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                          
                      <a class="nav-link" href="../index.html">CERRAR SESION</a>
			            

                          <a class="nav-link disabled" tabindex="-1" aria-disabled="true">ADMINISTRADOR</a>
                        </div>
                      </div>
                      
                    </div>
                  </nav>-->




  
  <script>
    function eliminar(){
      var respuesta=confirm("Estas seguro que deseas eliminarlo")
    }
  </script>
    <h1 class="text-center p-3">Administrador</h1>
    
    <div class="container-fluid row">
        <form class="col-4 p-3" action="registro_usuario_be.php" method="POST" enctype="multipart/form-data">
        
        <h3 class="text-center text-secondary">Registro de usuarios </h3>
           
        <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">area </label>
              <input type="tetx" name="area" class="form-control" id="area" aria-describedby="emailHelp">
              
            </div>  
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">nombre</label>
              <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="emailHelp">
              <!--<div id="emailHelp" class="form-text">Nombre_completo</div>-->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">apaterno</label> 
                <input type="text" name="apaterno" class="form-control" id="apaterno" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">amaterno</label> 
                <input type="text" name="amaterno" class="form-control" id="amaterno" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">nick</label> 
                <input type="text" name="nick" class="form-control" id="nick" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">password</label> 
                <input type="text" name="password" class="form-control" id="password" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">telefono</label> 
                <input type="text" name="telefono" class="form-control" id="telefono" aria-describedby="emailHelp">
                <!--<div id="emailHelp"  class="form-text">nombre_de_usuario</div>-->
              </div>
              
            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen</label>
          <input type="file" type="file" id="selImg" name="imagen" class="form-control" 
          onclick="actualizarImg()">
             </div>
            
           
            <button type="submit" name="submit" class="btn btn-primary">Registrar</button>
        </form>
          <div class="col-8 p4">

            <table class="table">
              <thead class="bg-info">
                <tr>
                <th scope="col">id</th>
                  <th scope="col">area</th>
                  <th scope="col">nombre</th>
                  <th scope="col">apaterno</th>
                  <th scope="col">amaterno</th>
                  <th scope="col">nick</th>
                  <th scope="col">password</th>
                  <th scopr="col">telefono</th>
                  <th scopr="col"></th>
                </tr>
              </thead>
              <tbody >

                <?php 
                use function PHPSTORM_META\exitPoint;
                include('conexion_be.php');
                $objeto =new conexion();
                $conexion = $objeto->Conectar();  
                
                include "eliminar_producto.php";



                
                $stmt = $conexion->prepare("SELECT id,area,nombre,apaterno,amaterno,nick,password,telefono FROM usuarios");
                $stmt->execute();
                
                while($datos= $stmt->fetchObject()){?>

                <tr>
                 <td ><?= $datos->id ?></td>
                  <td ><?= $datos->area ?></td>
                  <td ><?= $datos->nombre ?></td>
                  <td ><?= $datos->apaterno ?></td>
                  <td ><?= $datos->amaterno ?></td>
                  <td ><?=$datos->nick ?></td>
                  <td ><?=$datos->password ?></td>
                  <td ><?=$datos->telefono ?></td>
                  
                
                  
                  
                  <td>
                    <a href="modificar.php?id=<?= $datos->id?> " class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return eliminar()" href="index.php?id=<?= $datos->id?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
                <?PHP }
                ?>
                  
              </tbody>
            </table>
          </div>
    </div>



    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>