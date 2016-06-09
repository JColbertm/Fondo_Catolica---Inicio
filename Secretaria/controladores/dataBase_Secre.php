<?php
@session_start();
		$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
		include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
		include("../../clases/claseUsuario.php");
		include("../../clases/claseAfiliacion.php");
		include("../../clases/claseHistorial.php");

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
				$usuario->apellido_p =filter_var($_POST['apellidos-sp'],FILTER_SANITIZE_STRING);
				$usuario->direccion = filter_var($_POST['direccion-sp'],FILTER_SANITIZE_STRING);
				$usuario->telefono= filter_var($_POST['telefono-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->celular = filter_var($_POST['celular-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->departamento= filter_var($_POST['depar-ucb-sp'],FILTER_SANITIZE_STRING);
				$usuario->interno = filter_var($_POST['interno-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->idUsuarioCreador=1;
				$usuario->correos = filter_var($_POST['correo-sp'],FILTER_SANITIZE_STRING);

				$usuario_i->fecha= $my_new_date;
				
				$usuario_h->cantidad_sueldo = filter_var($_POST['totGanado-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->liquido = filter_var($_POST['liquido-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->monto_aporte = filter_var($_POST['aporte-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->idMes = filter_var($_POST['mes-sp'],FILTER_SANITIZE_STRING);
				$usuario_h->antiguedad= $antiguedad;
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

				$usuario->ci= filter_var($_POST['ci-sp'],FILTER_SANITIZE_STRING);
				$usuario->nombre = filter_var($_POST['nombre-sp'],FILTER_SANITIZE_STRING);
				$usuario->apellido_p = filter_var($_POST['apellido-sp'],FILTER_SANITIZE_STRING);
				$usuario->direccion = filter_var($_POST['direccion-sp'],FILTER_SANITIZE_STRING);
				$usuario->telefono= filter_var($_POST['telefono-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->celular = filter_var($_POST['celular-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->departamento= filter_var($_POST['depar-ucb-sp'],FILTER_SANITIZE_STRING);
				$usuario->interno = filter_var($_POST['interno-sp'],FILTER_SANITIZE_NUMBER_INT);
				$usuario->correos = filter_var($_POST['correo-sp'],FILTER_SANITIZE_STRING);

				$usuario_h->cantidad_sueldo = filter_var($_POST['total-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->liquido = filter_var($_POST['liquido-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->monto_aporte = filter_var($_POST['aporte-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
				$usuario_h->idMes = 13;
				$usuario_h->antiguedad= $interval;
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

		    $usuario_h->cantidad_sueldo = filter_var($_POST['totalGanado'],FILTER_SANITIZE_NUMBER_FLOAT);
			$usuario_h->liquido = filter_var($_POST['liquido'],FILTER_SANITIZE_NUMBER_FLOAT);
			$usuario_h->monto_aporte = filter_var($_POST['aporte'],FILTER_SANITIZE_NUMBER_FLOAT);
			$usuario_h->idMes = 13;
			$usuario_h->fecha_mod= filter_var($_POST['calendario-sp-2'],FILTER_SANITIZE_STRING);
			

			$row= execSqlA("select idUsuario FROM usuario WHERE idUsuario=(SELECT MAX(idUsuario) FROM usuario)");
			while ($data = mysqli_fetch_array($row)){$id = $data[0];}

			$resultados=$usuario_h->registrar_historial($id);
			
			
			echo json_encode($resultados);
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

			$use_h=ClaseHistorial::encontrar_por_id($idu);
			$cantidad_sueldo=$use_h->cantidad_sueldo;
			$monto_aporte=$use_h->monto_aporte;
			$mes=$use_h->idMes;
			$liquido=$use_h->liquido;
			$antiguedad=$use_h->antiguedad;

			$use_i=ClaseAfiliacion::encontrar_por_id($idu);
			$idafi=$use_i->idAfiliacion;
			$fecha=$use_i->fecha;

			$a = explode('-',$fecha);
			$my_new_date = $a[2].'-'.$a[1].'-'.$a[0];


			$resultados=array('ci'=> $ci,'nombre'=> $nomb.' '.$nomb2,'apellido'=> $ap.' '.$ap2,'direccion'=>$direccion,'telefono'=>$telefono,'celular'=>$celular,'departamento'=>$departamento,'correos'=>$correo,'interno'=>$interno,'cantidad_sueldo'=>$cantidad_sueldo,'user'=>$user,'pass'=>$pass,'monto_aporte'=>$monto_aporte,'idMes'=>$mes,'liquido'=>$liquido,'antiguedad'=>$antiguedad,'idAfiliacion'=>$idafi,'fecha'=>$my_new_date,'resp'=> 1);
			
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

			 $html = '<table class="highlight centered"  ><thead><tr><th width=1>N</th><th>Nombre</th><th>Apellido</th></tr></thead><tbody>';
          
           	$users=ClaseUsuario::encontrar_a_todos();
           foreach ($users as $user) { 
           	$html = $html.'<tr onclick="mostrar_datos'.$num.'(this)"><td width=1>'.$user->idUsuario.'</td><td>'.$user->nombre.'</td><td>'.$user->apellido_p.'</td></tr> ';
           	} 
           	echo $html;
		break;

		case "buscar_afi":
			$num = filter_var($_POST['numero'],FILTER_SANITIZE_NUMBER_INT);
			$nom = filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
			$resultados=array();

			 $html = '<table class="highlight centered"  ><thead><tr><th width=1>N</th><th>Nombre</th><th>Apellido</th></tr></thead><tbody>';
          
           	$users=ClaseUsuario::encontrar_por_nom($nom);
           foreach ($users as $user) { 
           	$html = $html.'<tr onclick="mostrar_datos'.$num.'(this)"><td width=1>'.$user->idUsuario.'</td><td>'.$user->nombre.'</td><td>'.$user->apellido_p.'</td></tr> ';
           	} 
           	echo $html;
		break;


	}

?>