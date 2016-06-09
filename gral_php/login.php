<?php
  	require_once("class_afiliado.php");
  	include("databaseA.php");
  	session_start();
  	$opc = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
  	$key = 'catolica';
  	switch ($opc)
  	{
  		case 'inicio_sesion':  			
			$fecha_actual=date("d/m/Y");
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

  		case 'verificacion':  
  			$id_usu = filter_var($_POST['id_usu'],FILTER_SANITIZE_NUMBER_INT);
  			$sql = "select inisesion from usuario where idUsuario = $id_usu";
			$result= execSqlA($sql);
			$resultados=array();
			$data = mysqli_fetch_array($result);
			if($data > 0)
			{
				$resultados = array('inisesion'=>$data[0], 'res'=> 1);  
			}
			else
			{
			  	$resultados=array('res'=> 0 );	
			}
			echo json_encode($resultados);			
  		break;

  		case "verifica":
			$id = filter_var($_POST['ide'],FILTER_SANITIZE_NUMBER_INT);
			$cad = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
			$pass = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cad, MCRYPT_MODE_CBC, md5(md5($key))));

			//bucamos al entrenador registrado
			$sql = "select idUsuario, password from usuario where idUsuario = $id and password = '$pass'";
			$result= execSqlA($sql);
			$resultados=array();
			$data = mysqli_fetch_array($result);
	        if($data > 0)
	        {
				$resultados = array('iden' => $data[0] ,'pass' => $data[1], 'res'=> 1);  
	        }
	        
	        else
	        {
	        	$resultados=array('res'=> 0 );	
	        }
			
			echo json_encode($resultados);
			flush();
		break;

		case "cambiar_pass":
			$nuevopass = filter_var($_POST['nuevopass'],FILTER_SANITIZE_STRING);
			$id = filter_var($_POST['id_usu'],FILTER_SANITIZE_NUMBER_INT);
			$key='catolica';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $nuevopass, MCRYPT_MODE_CBC, md5(md5($key))));
			$inisesion = 1;
			
			$campos = array('password','inisesion');
			$valores = array($encrypted,$inisesion);
			
			$result= updateA('usuario', $campos, array(2,2) , $valores, 'idUsuario', $id);
			if ($result)
			{		
				$resultados=array('resp'=> 1);
			}
			else
			{
				$resultados=array('resp'=> 0);
			}

			echo json_encode($resultados);
			flush();
		break;





  	} 
  	
?>