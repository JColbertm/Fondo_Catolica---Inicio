<?php
  	require_once("class_afiliado.php");
  	include("databaseA.php");
  	session_start();
  	$opc = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
  	switch ($opc)
  	{
  		case 'inicio_sesion':  			
			$fecha_actual=date("d/m/Y");
			$key = 'catolica';
			$a = filter_var($_POST['usuario'],FILTER_SANITIZE_STRING);
			$cad = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
			$pass = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cad, MCRYPT_MODE_CBC, md5(md5($key))));
			//bucamos al usuario registrado
			$sql = "select idUsuario, nombre, apellido_p, apellido_m, idTipo_usuario from usuario where nombre_usuario = '$a' and password = '$pass' and estado = 1";
			$result= execSqlA($sql);
			$resultados=array();
			$data = mysqli_fetch_array($result);
			if($data > 0)
			{
				$resultados = array('ideu' => $data[0] ,'nom' => $data[1], 'app' => $data[2], 'apm' => $data[3], 'tipousu'=>$data[4], 'res'=> 1);  
				$_SESSION['ideusuario'] = $data[0];
				$_SESSION['nombre'] = $data[1];
				$_SESSION['apellidop'] = $data[2];
				$_SESSION['apellidom'] = $data[3];
				$_SESSION['tipousu'] = $data[3];
			}
			else
			{
			  	$resultados=array('res'=> 0 );	
			}
			echo json_encode($resultados);
  		break;

  		case 'cierra_sesion':  			
			session_destroy();
			$resultados = array('res'=> 1);  
			echo json_encode($resultados);
  		break;
  	}
  	
?>