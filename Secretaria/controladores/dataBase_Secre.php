<?php
@session_start();
		$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
		include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
	switch ($opcion) {
		case "registrarAfiliado":
			$fecha = filter_var($_POST['fechaactual'],FILTER_SANITIZE_STRING);
			$carnet = filter_var($_POST['carnet'],FILTER_SANITIZE_STRING);
			$nombre = filter_var($_POST['nombres-sp'],FILTER_SANITIZE_STRING);
			$apellido = filter_var($_POST['apellidos-sp'],FILTER_SANITIZE_STRING);
			$direccion = filter_var($_POST['direccion-sp'],FILTER_SANITIZE_STRING);
			$telefono = filter_var($_POST['telefono-sp'],FILTER_SANITIZE_NUMBER_INT);
			$celular = filter_var($_POST['celular-sp'],FILTER_SANITIZE_NUMBER_INT);
			$departamento = filter_var($_POST['depar-ucb-sp'],FILTER_SANITIZE_STRING);
			$interno = filter_var($_POST['interno-sp'],FILTER_SANITIZE_NUMBER_INT);
			$correo = filter_var($_POST['correo-sp'],FILTER_SANITIZE_STRING);
			$totGanado = filter_var($_POST['totGanado-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
			$liquido = filter_var($_POST['liquido-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
			$antiguedad = filter_var($_POST['antiguedad-sp'],FILTER_SANITIZE_NUMBER_INT);
			$aporte = filter_var($_POST['aporte-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
			$literal = filter_var($_POST['mes-sp'],FILTER_SANITIZE_STRING);
			$literalr = filter_var($_POST['literal-sp'],FILTER_SANITIZE_STRING);
			


			$parametro = RecuperarIdItemA('parametros',array('parametro'),array('antiguedad'));

			if($antiguedad>=$parametro['condicion'])
			{

				$nom = explode(" ", $nombre);
				$ap = explode(" ", $apellido);

				ini_set('date.timezone','America/Manaus'); 

				$result3= insertA('form_afiliacion', array('idUsuario','fecha','hora'), array(2,2,2) , array(1,strftime( "%Y-%m-%d-%H-%M-%S", time()),date("g:i A")));//$_SESSION['id_en']

				$rowa= execSqlA("select idAfiliacion FROM form_afiliacion WHERE idAfiliacion=(SELECT MAX(idAfiliacion) FROM form_afiliacion)");
				while ($dataa = mysqli_fetch_array($rowa)){$af = $dataa[0];}

				$user = substr($nombre,0,1).'.'.$ap[0].'.'.substr($ap[1],0,1);
				$pass = '1234';


				$campos = array('ci','nombre','nombre2', 'apellido_p', 'apellido_m', 'idTipo_usuario', 'idUsuarioCreador','password','idAfiliacion','nombre_usuario');
				$valores = array($carnet,$nom[0],$nom[1],$ap[0],$ap[1],1,1,1234,$af,$user);
				//$_SESSION['id_en']

				$result= insertA('usuario', $campos, array(2,2,2,2,2,2,2,2,2,2) , $valores);

				//obtenemos el ultimo id de usuarios
				$row= execSqlA("select idUsuario FROM usuario WHERE idUsuario=(SELECT MAX(idUsuario) FROM usuario)");
				while ($data = mysqli_fetch_array($row)){$var = $data[0];}

				$result2= insertA('datos_secundario', array('idUsuario','direccion','telefono','celular','departamento','correos','interno'), array(2,2,2,2,2,2,2) , array($var,$direccion,$telefono,$celular,$departamento,$correo,$interno));


				$result4= insertA('historial_sueldo', array('cantidad_sueldo','monto_aporte','idMes','idUsuario','liquido','literal','antiguedad'), array(2,2,2,2,2,2,2) , array($totGanado,$aporte,$literal,$var,$liquido,$literalr,$antiguedad));


				if ($result && $result2 && $result3 && $result4){		
					
					$resultados=array('resp'=> 1,'password'=>'1234','usuario'=>$user);
				}
				else
				{
					$resultados=array('resp'=> 0);
				}
			}
			else{
				$resultados=array('resp'=> 2);
			}
			echo json_encode($resultados);
			flush();



		break;

		case "modificarAfiliado":
			$fecha = filter_var($_POST['fechaactual'],FILTER_SANITIZE_STRING);
			$carnet = filter_var($_POST['carnet'],FILTER_SANITIZE_STRING);
			$nombre = filter_var($_POST['nombres-sp'],FILTER_SANITIZE_STRING);
			$apellido = filter_var($_POST['apellidos-sp'],FILTER_SANITIZE_STRING);
			$direccion = filter_var($_POST['direccion-sp'],FILTER_SANITIZE_STRING);
			$telefono = filter_var($_POST['telefono-sp'],FILTER_SANITIZE_NUMBER_INT);
			$celular = filter_var($_POST['celular-sp'],FILTER_SANITIZE_NUMBER_INT);
			$departamento = filter_var($_POST['depar-ucb-sp'],FILTER_SANITIZE_STRING);
			$interno = filter_var($_POST['interno-sp'],FILTER_SANITIZE_NUMBER_INT);
			$correo = filter_var($_POST['correo-sp'],FILTER_SANITIZE_STRING);
			$totGanado = filter_var($_POST['totGanado-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
			$liquido = filter_var($_POST['liquido-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
			$antiguedad = filter_var($_POST['antiguedad-sp'],FILTER_SANITIZE_NUMBER_INT);
			$aporte = filter_var($_POST['aporte-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
			$literal = filter_var($_POST['mes-sp'],FILTER_SANITIZE_STRING);
			$literalr = filter_var($_POST['literal-sp'],FILTER_SANITIZE_STRING);
			


			$parametro = RecuperarIdItemA('parametros',array('parametro'),array('antiguedad'));

			if($antiguedad>=$parametro['condicion'])
			{

				$nom = explode(" ", $nombre);
				$ap = explode(" ", $apellido);


				$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
				$row= execSqlA("select idUsuario FROM usuario WHERE idAfiliacion=".$id."");
				while ($data = mysqli_fetch_array($row)){$var = $data[0];}

				

				$result = updateA('usuario',array('ci','nombre','nombre2', 'apellido_p', 'apellido_m', 'idTipo_usuario', 'idUsuarioCreador'),array(2,2,2,2,2,2,2),array($carnet,$nom[0],$nom[1],$ap[0],$ap[1],1,1),'idUsuario',$var);

				$result2 = updateA('datos_secundario',array('idUsuario','direccion','telefono','celular','departamento','correos','interno'),array(2,2,2,2,2,2,2),array($var,$direccion,$telefono,$celular,$departamento,$correo,$interno),'idUsuario',$var);

				$result3 = updateA('historial_sueldo',array('cantidad_sueldo','monto_aporte','idMes','idUsuario','liquido','literal','antiguedad'),array(2,2,2,2,2,2,2),array($totGanado,$aporte,$literal,$var,$liquido,$literalr,$antiguedad),'idUsuario',$var);



				if ($result && $result2 && $result3 ){		

					$resultados=array('resp'=> 1);
				}
				else
				{
					$resultados=array('resp'=> 0);
				}
			}
			else{
				$resultados=array('resp'=> 2);
			}
			echo json_encode($resultados);
			flush();



		break;

		case "obtenerAfiliado":
			$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
			//obtener usuario
			$row= execSqlA("select idUsuario FROM usuario WHERE idAfiliacion=".$id."");
				while ($data = mysqli_fetch_array($row)){$var = $data[0];}

			$result = RecuperarIdItemA('usuario',array('idUsuario'),array($var));
			$nom = $result['nombre'].' '.$result['nombre2'];
			$ap = $result['apellido_p'].' '.$result['apellido_m'];
			//obtener datos
			$result2 = RecuperarIdItemA('datos_secundario',array('idUsuario'),array($var));
			//obtener datos sueldo
			$result3 = RecuperarIdItemA('historial_sueldo',array('idUsuario'),array($var));

			if($result && $result2 && $result3){
				$resultados=array('ida'=> $result['idAfiliacion'],'ci'=> $result['ci'],'nombre'=> $nom,'apellido'=> $ap,'direccion'=>$result2['direccion'],'telefono'=>$result2['telefono'],'celular'=>$result2['celular'],'departamento'=>$result2['departamento'],'correos'=>$result2['correos'],'interno'=>$result2['interno'],'cantidad_sueldo'=>$result3['cantidad_sueldo'],'monto_aporte'=>$result3['monto_aporte'],'idMes'=>$result3['idMes'],'liquido'=>$result3['liquido'],'literal'=>$result3['literal'],'antiguedad'=>$result3['antiguedad'],'resp'=> 1);
			}
			else{
				$resultados=array('resp'=> 0);
			}
			echo json_encode($resultados);
			flush();
		break;

		case "obtenerSolicitud":
			$row= execSqlA("select idAfiliacion FROM form_afiliacion WHERE idAfiliacion=(SELECT MAX(idAfiliacion) FROM form_afiliacion)");
				while ($data = mysqli_fetch_array($row)){$var = $data[0];}
				echo $var+1;
		break;
		case "listar":
			$result= execSqlA("select form_afiliacion.idAfiliacion, usuario.nombre, usuario.apellido_p from form_afiliacion, usuario where form_afiliacion.idAfiliacion = usuario.idAfiliacion
");
			$resultados=array();
			if (mysqli_num_rows($result)  > 0) {
				$c=0;
				while($data = mysqli_fetch_array($result))
				{
						$resultados[$c]=array('idAfiliado'=> $data[0],'nombre'=> $data[1],'apellido'=> $data[2],'res'=> 1);
						$c++;
				}	
			}
			else {
				$resultados=array('res'=> 0);
			}
			echo json_encode($resultados);
			flush();
		break;
	}

?>