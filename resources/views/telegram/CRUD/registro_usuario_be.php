<?php

use function PHPSTORM_META\exitPoint;

include('conexion_be.php');

$objeto =new conexion();

$conexion = $objeto->Conectar();


if(isset($_POST["submit"])){
    $id= $_POST['id'];
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
    if($_FILES["imagen"]["error"] == 4){
      echo
      "<script> alert('Image Does Not Exist'); </script>"
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
  

        $resposne=$conexion-> prepare("INSERT INTO usuarios (Nombre_completo,nombre_de_usuario,id_telegram,imagen) 
                                VALUES ('$id','$nombre','$precio','$newImageName')");




          $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE Nombre_completo='$nombre'");
         $stmt->execute();
        $userExists = $stmt->fetchColumn();

          if ($userExists){

    echo'
    <script>
    alert("Este correo ya esta registrado, intenta con otro diferente");
    
    window.location = "index.php";
    </script>
    ';
    exit;
}

#$consulta = "SELECT * FROM usuarios";
#$resultado = $conexion->prepare($consulta);
#$resultado->execute();
#$datos = $resultado->fetchAll();
#var_dump($datos);

if($resposne){
    echo'
    <script>
       alert(" registrado");
       window.location = "index.php";
    </script>
    ';
}else{
    echo'
    <script>
       alert("Intentalo de nuevo, usuario no almacenado");
       window.location = "indx.php";
    </script>
    ';
    

}
$resposne->execute();
        
        echo
        "
        <script>
          alert('Successfully Added');
          document.location.href = 'data.php';
        </script>
        ";
      }
    }
  }
?>