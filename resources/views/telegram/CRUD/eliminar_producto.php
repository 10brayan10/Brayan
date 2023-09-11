<?php
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $stmt = $conexion->prepare("delete from usuarios where id_telegram=$id");
        $stmt->execute();
        if($stmt){
            echo'<script>
            alert("usuario eliminado");
            
            window.location = "index.php";
            </script>';
        }else{
            echo'<div class="alert alert-danger">error</div>';
        }
}
?>