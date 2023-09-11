<?php

if(isset($_POST["btnregistrar"])){
    $id=$_POST["id"];
    $area=$_POST["area"];
    $nombre=$_POST["nombre"];
    $apaterno=$_POST["apaterno"];
    $amaterno=$_POST["amaterno"];
    $nick=$_POST["nick"];
    $password=$_POST["password"];
    $telefono=$_POST["telefono"];
    $imagen=$_POST["imagen"];
    if($_FILES["imagen"]["error"] == 4){
      echo
      "<script> alert('Image no'); </script>"
      ;
    }
    else{
      $fileName = $_FILES["imagen"]["name"];
      $fileSize = $_FILES["imagen"]["size"];
      $tmpName = $_FILES["imagen"]["tmp_name"];
  
      $validImageExtension = ['jpg', 'jpeg', 'png','webp'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));
      if ( !in_array($imageExtension, $validImageExtension) ){
        echo
        "
        <script>
          alert('Invalid Image Extension');
        </script>
        ";
      }
      else if($fileSize > 1000000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
        </script>
        ";
      }
      else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
  
        if(!empty($_POST["btnregistrar"])){
            if(!empty($_POST["id"]) and !empty($_POST["area"]) and !empty($_POST["nombre"]) and !empty($_POST["apaterno"]) and !empty($_POST["amaterno"]) and !empty($_POST["nick"]) and !empty($_POST["password"]) and !empty($_POST["telefono"]) ){
               
                
        
                $stmt = $conexion->prepare(" update usuarios set area='$area' nombre='$nombre',apaterno='$apaterno', amaterno='$amaterno', telefono='$telefono',nick='$nick',password='$password',telefono='$telefono' where id=$id");
                $stmt->execute();
                
                if($stmt){
                    header("location:index.php");
                }else{
                    echo"<div class='alert-danger'>Error al modificar</div>";
                }
                $stmt->execute();
            }
        }
        
      }
    }
  }


?>