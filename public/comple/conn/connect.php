                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="test";

	$connect=new mysqli($host, $user, $pass, $db) or die("error" . mysqli_errno($connect));
  mysqli_select_db($connect,$db);
  return($connect);
 


 ?>
