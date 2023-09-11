<?php
//error_reporting(0);
header("Cahe-Control: no-cahe, muts-revalidate"); //HTTP/1.1
header("Expire: Sat, 26 jul 1997 05:00:00 GTM"); //Date in the past
header("Pragma: no-cahe");
//header("Accsess-Control-Allow-Origen: *");

  $token="bot6287603602:AAFvIqTn2m2etVMGH2A6BUSO1AOYU_cE2k8";
  $data=file_get_contents("php://input");
  $update= json_decode($data,true);
  $message= $update['message'];

  $id = $message ["from"]["id"];
  $name = $message ["from"]["first_name"];
  $text = $message["text"];



  if(isset($text)&& $text=='Hola')
    {
   $respuesta= "hola😱🫥 " .$name;
 sendMessage($id,$respuesta,$token) ;
    
  }
  if(isset($text)&& $text=='hola')
    {
   $respuesta= "hola😱🫥 " .$name;
 sendMessage($id,$respuesta,$token) ;
    
  }
  if(isset($text)&& $text=='HOLA')
    {
   $respuesta= "hola😱🫥 " .$name;
 sendMessage($id,$respuesta,$token) ;
    
  }
  if(isset($text)&& $text=='gracias')
  {
 $respuesta= "de nada 😁 " .$name;
sendMessage($id,$respuesta,$token) ;
  
}
if(isset($text)&& $text=='Gracias')
  {
 $respuesta= "de nada 😁 " .$name;
sendMessage($id,$respuesta,$token) ;
  
}
if(isset($text)&& $text=='GRACIAS')
  {
 $respuesta= "De nada 😁 " .$name;
sendMessage($id,$respuesta,$token) ;
  
}

/////////////////////////////////////

use function PHPSTORM_META\exitPoint;
include('conexion_be.php');
$objeto =new conexion();
$conexion = $objeto->Conectar();

date_default_timezone_set('America/Mexico_City');
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE telefono='$id'");
$stmt->execute();
$userExists = $stmt->fetchColumn();

if ($userExists){
  
  $stmt = $conexion->prepare("SELECT * FROM usuarios where telefono='$id'");
  $stmt->execute();
  $datos= $stmt->fetchObject();

  if(isset($text)&& $text=='/entrar'){
    
    $nick = $datos->nick;
    $password = $datos->password;
  
    $consulta = $conexion->prepare("SELECT * FROM usuarios where nick='$nick' and password='$password'");
    $consulta->execute();
    $fila= $consulta->fetchObject();
    $id_id=$fila->id;

    if ( $nick!='' && $password!='') {
          
      $registro= $conexion->prepare("SELECT id, date_format(entrada, '%Y-%m-%d') as entrada_fecha , date_format(salida, '%Y-%m-%d') as salida_fecha FROM asistencia WHERE id = '$id_id' order by entrada_fecha desc limit 0, 1" );
      $registro->execute();
      $filar= $registro->fetchObject();
   
      $entrada_fecha=isset($filar->entrada_fecha)? $filar->entrada_fecha : '';
      $salida_fecha=isset($filar->salida_fecha)? $filar->salida_fecha : '';
          
      $hoy_fecha = date('Y-m-d', time());

                //echo "Hoy: " . $hoy_fecha . ", Id: " . $id .  ", Usuario: " . $fila['nombre'] . ", Entrada: " . $entrada_fecha . ", Salida: " . $salida_fecha . "<br>";
      $hoy =date('Y-m-d h:i:s', time());
      $sihoy=$hoy;
          
      if($entrada_fecha!=$hoy_fecha){
            
        //Registra nueva entrada
              //echo "<br>No tiene registro de entrada del d&iacutea de hoy, registrar entrada."."<br>";
              
        $resposne=$conexion-> prepare("INSERT INTO asistencia(id,area,entrada) VALUES (:id,:area,:hoy)");
        $resposne->bindParam(':id',$id_id);
        $resposne->bindParam(':area',$fila->area);
        $resposne->bindValue(':hoy',$sihoy);
        if($resposne->execute()){
          $respuesta= "bienvenido 🖐".$nick;
          sendMessage($id,$respuesta,$token) ;      
        }else{
          sendMessage($id,' noo Registro de entrada exitoso',$token) ;
        }
    
      }elseif ($entrada_fecha==$hoy_fecha && $salida_fecha=='' ){
        //Registra salida
 
        $resposne=$conexion-> prepare("UPDATE asistencia SET salida=:hoy WHERE id=:id AND entrada>=:hoy_fecha '00:00:00' ");
        $resposne->bindParam(':id',$id_id);
        $resposne->bindValue(':hoy_fecha',$hoy_fecha);
        $resposne->bindValue(':hoy',$sihoy);
        if($resposne->execute()){
          $respuesta= "Registra salida";
          sendMessage($id,$respuesta,$token) ;
   
        }else{
          sendMessage($id,' noo Registro de entrada exitoso',$token) ;
          }
           
      }elseif ($entrada_fecha==$hoy_fecha && $salida_fecha!=null ){
        //tiene asistencia el día de hoy
        
        $respuesta= "hola ✋ \n ya tiene asistencia el día de hoy";
        sendMessage($id,$respuesta,$token) ;
        
        }
    }else;
   
    
      if($entrada_fecha!=$hoy_fecha){    
      }elseif ($entrada_fecha==$hoy_fecha && $salida_fecha=='' ){
        //Registra salida

        $resposne=$conexion-> prepare("UPDATE asistencia SET horas='(timediff(salida,entrada))' WHERE id=:id AND entrada>=:hoy_fecha '00:00:00' ");
        $resposne->bindParam(':id',$id_id);
        $resposne->bindValue(':hoy_fecha',$hoy_fecha);
       
        if($resposne->execute()){
          $respuesta= "✋";
          sendMessage($id,$respuesta,$token) ;
         }
        }     
      
  }

}else{
  sendMessage($id,"NO estas registrado en S.S 🫥",$token) ;
}

/////////////////////////////////////////////////////////////////////////////

function sendMessage($chatID, $messaggio, $token, &$k= ''){
$url = "https://api.telegram.org/" . $token . "/sendMessage?disable_web_page_preview=false&parse_mode=HTML&chat_id=" . $chatID;
/*
if (isset($k)){
  $url = $url."&reply_markup=",$k;
}
*/
 $url = $url."&text=" . urlencode($messaggio);
 $ch = curl_init();
 $optArray = array(
 CURLOPT_URL =>$url,
 CURLOPT_RETURNTRANSFER => true
 );
 curl_setopt_array($ch, $optArray);
 $result = curl_exec($ch);
 curl_close($ch);

}
?>