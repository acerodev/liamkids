<?php 
$mysqli = new mysqli('localhost','root','','dbropa');
if (mysqli_connect_errno()) {
	echo 'Conexion Fallida: ', mysqli_connect_error();
	exit();
	// code...
}





 ?>