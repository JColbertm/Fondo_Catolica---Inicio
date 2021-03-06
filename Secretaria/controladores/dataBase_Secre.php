<?php
@session_start();
		$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
		include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
		include("../../clases/claseUsuario.php");
		include("../../clases/claseAfiliacion.php");
		include("../../clases/claseHistorial.php");
		include("../../clases/claseAhorro.php");

	switch ($opcion) {
		case "registrarAfiliado":
			$fecha = filter_var($_POST['fechaactual'],FILTER_SANITIZE_STRING);
			$a = explode('-',$fecha);
			$my_new_date = $a[2].'-'.$a[1].'-'.$a[0];

			$antiguedad = filter_var($_POST['antiguedad-sp'],FILTER_SANITIZE_NUMBER_INT);
			$parametro = RecuperarIdItemA('parametros',array('parametro'),array('antiguedad'));
			$usuario= new ClaseUsuario;
			$usuario_i= new ClaseAfiliacion;
			$usuario_h= new ClaseHistorial;


			if($antiguedad>=$parametro['condicion'])
			{
				$usuario->ci= filter_var($_POST['carnet'],FILTER_SANITIZE_STRING);
				$usuario->nombre = filter_var($_POST['nombres-sp'],FILTER_SANITIZE_STRING);
				$apellidoss= filter_var($_POST['apellidoP-sp'],FILTER_SANITIZE_STRING).' '.filter_var($_POST['apellidoM-sp'],FILTER_SANITIZE_STRING);
				$usuario->apellido_p =$apellidoss;
				$usuario->direccion = filter_var($_POST['direccion-sp'],FILTER_SANITIZE_STRING);
				$usuario->telefono= filter_var($_POST['telefono-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->celular = filter_var($_POST['celular-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->departamento= filter_var($_POST['depar-ucb-sp'],FILTER_SANITIZE_STRING);
				$usuario->interno = filter_var($_POST['interno-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->idUsuarioCreador=$_SESSION['ideusuario'];
				$usuario->correos = filter_var($_POST['correo-sp'],FILTER_SANITIZE_STRING);
				$usuario->institucion = filter_var($_POST['institucion-sp'],FILTER_SANITIZE_STRING);

				$usuario_i->fecha= $my_new_date;
				$usuario_i->idUsuarioCreador=$_SESSION['ideusuario'];
				
				$usuario_h->cantidad_sueldo = filter_var($_POST['totGanado-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->liquido = filter_var($_POST['liquido-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->monto_aporte = filter_var($_POST['aporte-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->idMes = filter_var($_POST['mes-sp'],FILTER_SANITIZE_STRING);
				$usuario_h->antiguedad= $antiguedad;
				$usuario_h->desde_year=filter_var($_POST['year'],FILTER_SANITIZE_NUMBER_INT);

				
				$usuario_h->fecha_mod= '';

				
				$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);

				if($id==0)

				{
					$resultados= $usuario->registrar_afiliado();
					$row= execSqlA("select idUsuario FROM usuario WHERE idUsuario=(SELECT MAX(idUsuario) FROM usuario)");
					while ($data = mysqli_fetch_array($row)){$id = $data[0];}
					$usuario_i->registrar_afiliacion($id);
					$usuario_h->registrar_historial($id);
				}
				else
				{
					$resultados= $usuario->modificar_afiliado($id);
					$usuario_h->modificar_historial($id);	
				}
			}
			else{$resultados['resp']=2;}
			echo json_encode($resultados);
			flush();
		break;

		case "registrarAfiliadoH":

		    $fecha = filter_var($_POST['calendario-sp'],FILTER_SANITIZE_NUMBER_INT);
		    $a = explode('-',$fecha);
			$my_new_date = $a[2].'-'.$a[1].'-'.$a[0];
			$parametro = RecuperarIdItemA('parametros',array('parametro'),array('antiguedad'));
			$usuario= new ClaseUsuario;
			$usuario_i= new ClaseAfiliacion;
			$usuario_h= new ClaseHistorial;

			/*$datetime1=new DateTime($fecha);
			# obtenemos la diferencia entre las dos fechas
			$interval=time()->diff($datetime1);
			# obtenemos la diferencia en meses
			$intervalMeses=$interval->format("%m");
			# obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
			//$interval = $interval->format("%y")*12;*/
			$interval = 12;

			if($interval>=$parametro['condicion'])
			{
				$usuario_i->fecha=$my_new_date;
				$usuario_i->idUsuarioCreador=$_SESSION['ideusuario'];

				$usuario->ci= filter_var($_POST['ci-sp'],FILTER_SANITIZE_STRING);
				$usuario->nombre = filter_var($_POST['nombre-sp'],FILTER_SANITIZE_STRING);
				$apellidoss= filter_var($_POST['apellidoP-sp'],FILTER_SANITIZE_STRING).' '.filter_var($_POST['apellidoM-sp'],FILTER_SANITIZE_STRING);
				$usuario->apellido_p = $apellidoss;
				$usuario->direccion = filter_var($_POST['direccion-sp'],FILTER_SANITIZE_STRING);
				$usuario->telefono= filter_var($_POST['telefono-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->celular = filter_var($_POST['celular-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->departamento= filter_var($_POST['depar-ucb-sp'],FILTER_SANITIZE_STRING);
				$usuario->interno = filter_var($_POST['interno-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->correos = filter_var($_POST['correo-sp'],FILTER_SANITIZE_STRING);
				$usuario->institucion = filter_var($_POST['institucion-sp'],FILTER_SANITIZE_STRING);

				$usuario_h->cantidad_sueldo = filter_var($_POST['total-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->liquido = filter_var($_POST['liquido-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->monto_aporte = filter_var($_POST['aporte-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->idMes = 1;
				$usuario_h->antiguedad= $interval;
				$usuario_h->desde_year=2016;
				$usuario_h->fecha_mod= '';

				$resultados= $usuario->registrar_afiliado();
				$row= execSqlA("select idUsuario FROM usuario WHERE idUsuario=(SELECT MAX(idUsuario) FROM usuario)");
				while ($data = mysqli_fetch_array($row)){$id = $data[0];}

				$usuario_i->registrar_afiliacion($id);
				$resultados['fecha']=$fecha;
				$usuario_h->registrar_historial($id);
			}
			else{$resultados['resp']=2;}
			echo json_encode($resultados);
			flush();
		break;

		case "registrarHistorico":
			$usuario_h= new ClaseHistorial;
			$fecha=filter_var($_POST['calendario-sp-2'],FILTER_SANITIZE_STRING);
			$a = explode('-',$fecha);
			$my_new_date = $a[2].'-'.$a[1].'-'.$a[0];

		    $usuario_h->cantidad_sueldo = filter_var($_POST['totalGanado'],FILTER_SANITIZE_NUMBER_FLOAT);
			$usuario_h->liquido = filter_var($_POST['liquido'],FILTER_SANITIZE_NUMBER_FLOAT);
			$usuario_h->monto_aporte = filter_var($_POST['aporte'],FILTER_SANITIZE_NUMBER_FLOAT);
			$usuario_h->idMes = $a[1];
			$usuario_h->fecha_mod= $my_new_date;
			$usuario_h->desde_year= $a[0];
			

			$row= execSqlA("select idUsuario FROM usuario WHERE idUsuario=(SELECT MAX(idUsuario) FROM usuario)");
			while ($data = mysqli_fetch_array($row)){$id = $data[0];}

			$resultados=$usuario_h->registrar_historial($id);
			
			
			echo json_encode($resultados);
			flush();
		break;

		case "registrarAhorro":
			$ci=filter_var($_POST['ci'],FILTER_VALIDATE_INT);
			$datos_usuario =ClaseUsuario::encontrar_por_ci($ci);
			$id=$datos_usuario->idUsuario;
			
			$a= new ClaseAhorro;
			$a ->cantidad_ahorro=filter_var($_POST['aporte'],FILTER_SANITIZE_NUMBER_FLOAT);

			$ahorro= $a->registrar_ahorro($id);



			
			echo json_encode($ahorro);
			flush();
		break;

		
		case "modificarPassword":
			$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
			$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

			$resultados= ClaseUsuario::modificar_password($id,$password);

			echo json_encode($resultados);
			flush();
		break;

		case "eliminarAfiliado":
				$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
				$resultados= ClaseUsuario::eliminar_afiliado($id);
				echo json_encode($resultados);
				flush();
		break;

		case "obtenerAfiliado":

			$idu = filter_var($_POST['idu'],FILTER_SANITIZE_NUMBER_INT);
			$use=ClaseUsuario::encontrar_por_id($idu);
			$ci=$use->ci;
			$nomb=$use->nombre;
			$nomb2=$use->nombre2;
			$ap=$use->apellido_p;
			$ap2=$use->apellido_m;
			$user=$use->nombre_usuario;
			$pass=$use->password;
			$direccion=$use->direccion;
			$telefono=$use->telefono;
			$celular=$use->celular;
			$departamento=$use->departamento;
			$correo=$use->correos;
			$interno=$use->interno;
			$institucion=$use->institucion;

			$use_h=ClaseHistorial::encontrar_por_id($idu);
			$cantidad_sueldo=$use_h->cantidad_sueldo;
			$monto_aporte=$use_h->monto_aporte;
			$mes=$use_h->idMes;
			$liquido=$use_h->liquido;
			$antiguedad=$use_h->antiguedad;
			$year=$use_h->desde_year;

			$use_i=ClaseAfiliacion::encontrar_por_id($idu);
			$idafi=$use_i->idAfiliacion;
			$fecha=$use_i->fecha;

			$a = explode('-',$fecha);
			$my_new_date = $a[2].'-'.$a[1].'-'.$a[0];


			$resultados=array('ci'=> $ci,'nombre'=> $nomb.' '.$nomb2,'apellidoP'=> $ap,'apellidoM'=>$ap2,'direccion'=>$direccion,'telefono'=>$telefono,'celular'=>$celular,'departamento'=>$departamento,'institucion'=>$institucion,'correos'=>$correo,'interno'=>$interno,'cantidad_sueldo'=>$cantidad_sueldo,'user'=>$user,'pass'=>$pass,'monto_aporte'=>$monto_aporte,'idMes'=>$mes,'liquido'=>$liquido,'antiguedad'=>$antiguedad,'idAfiliacion'=>$idafi,'fecha'=>$my_new_date,'year'=>$year,'resp'=> 1);
			
			//else{
			//	$resultados=array('resp'=> 0);
			//}
			echo json_encode($resultados);
			flush();
		break;

		case "generarPass":
			$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
			$resultados= ClaseUsuario::genera_password($id);	
			echo json_encode($resultados);
			flush();
		break;

		case "obtenerSolicitud":
			
			$use=ClaseAfiliacion::ultima_afiliacion();
			$id=$use->idAfiliacion;

				echo $id+1;
		break;

		case "listar":
			$num = filter_var($_POST['numero'],FILTER_SANITIZE_NUMBER_INT);
			$resultados=array();

			 $html = '<table class="highlight centered"  ><thead><tr><th width=1 style="display:none">Nro. Afi</th><th>Nro. Afi</th><th>CI</th><th>Nombre</th><th>Apellido</th></tr></thead><tbody>';
          
           	$users=ClaseUsuario::encontrar_a_todos();
           foreach ($users as $user) { 
           	$usersA=ClaseAfiliacion::encontrar_por_id($user->idUsuario);
           	$html = $html.'<tr onclick="mostrar_datos'.$num.'(this)"><td width=1 style="display:none">'.$user->idUsuario.'</td><td>SA-'.$usersA->idAfiliacion.'</td><td>'.$user->ci.'</td><td>'.$user->nombre.'</td><td>'.$user->apellido_p.'</td></tr> ';
           	} 
           	echo $html;
		break;

		case "buscar_afi":
			$num = filter_var($_POST['numero'],FILTER_SANITIZE_NUMBER_INT);
			$nom = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
			$resultados=array();

			 $html = '<table class="highlight centered"  ><thead><tr><th width=1 style="display:none">Nro. Afi</th><th>Nro. Afi</th><th>CI</th><th>Nombre</th><th>Apellido</th></tr></thead><tbody>';
          
           	$users=ClaseUsuario::encontrar_por_nom($nom);
           foreach ($users as $user) { 
           	$usersA=ClaseAfiliacion::encontrar_por_id($user->idUsuario);
           	$html = $html.'<tr onclick="mostrar_datos'.$num.'(this)"><td width=1 style="display:none">'.$user->idUsuario.'</td><td>SA-'.$usersA->idAfiliacion.'</td><td>'.$user->ci.'</td><td>'.$user->nombre.'</td><td>'.$user->apellido_p.'</td></tr> ';
           	} 
           	echo $html;
		break;

		case "obtenerAhorro":

			$idu = filter_var($_POST['idu'],FILTER_SANITIZE_NUMBER_INT);


			$sql = execSqlA("select idAhorro, cantidad_ahorro WHERE idUsuario = $idu from ahorro");
			
			while ($data = mysqli_fetch_array($sql))
				{
					$id = $data[0];
					$ahorro = $data[1];
					$fecha=$data[2];					
					$date = date("Y-m-d");
					$segundos=  strtotime($date) - strtotime($fecha);
					$diferencia = intval($segundos/60/60/24/30);
				}							

			$resultados=array('ahorro'=>$ahorro,'meses'=>$diferencia,'resp'=> 1);

			echo json_encode($resultados);
			flush();
		break;



	}

?>