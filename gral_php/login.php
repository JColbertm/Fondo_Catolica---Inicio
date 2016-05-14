<?php
  	require_once("class_afiliado.php");
  	include("databaseA.php");
  	session_start();
	$fecha_actual=date("d/m/Y");
	$a = filter_var($_POST['usuario'],FILTER_SANITIZE_STRING);
	$b = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
	//bucamos al usuario registrado
	$sql = "select idUsuario, nombre, apellido_p, apellido_m from usuario where nombre_usuario = '$a' and password = '$b'";
	$result= execSqlA($sql);
	$resultados=array();
	$data = mysqli_fetch_array($result);
	if($data > 0)
	{
		$resultados = array('ideu' => $data[0] ,'nom' => $data[1], 'app' => $data[2], 'apm' => $data[3],'res'=> 1);  
		//$afiliado = new afiliado($data[0], $data[1], $data[2], $data[3]);
		$_SESSION['usuario'] = $data[1];
	}
	else
	{
	  	$resultados=array('res'=> 0 );	
	}
	echo json_encode($resultados);
?>