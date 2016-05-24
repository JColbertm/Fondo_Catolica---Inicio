<?php
@session_start();
		$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
		include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
		include("../../clases/claseUsuario.php");
		include("../../clases/claseAfiliacion.php");
	switch ($opcion) {
		case "registrarAfiliado":
			$fecha = filter_var($_POST['fechaactual'],FILTER_SANITIZE_STRING);
			$carnet = filter_var($_POST['carnet'],FILTER_SANITIZE_STRING);
			$nombres = filter_var($_POST['nombres-sp'],FILTER_SANITIZE_STRING);
			$apellidos = filter_var($_POST['apellidos-sp'],FILTER_SANITIZE_STRING);
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
			$mes = filter_var($_POST['mes-sp'],FILTER_SANITIZE_STRING);
			$resultados= ClaseUsuario::registrar_afiliado($fecha,$carnet,$nombres,$apellidos,$direccion,$telefono,$celular,$departamento,$interno,$correo,$totGanado,$liquido,$antiguedad,$aporte,$mes,1);
			echo json_encode($resultados);
			flush();
		break;

		case "registrarAfiliadoH":
			$fecha = filter_var($_POST['calendario-sp'],FILTER_SANITIZE_STRING);
			$carnet = filter_var($_POST['ci-sp'],FILTER_SANITIZE_STRING);
			$nombres = filter_var($_POST['nombre-sp'],FILTER_SANITIZE_STRING);
			$apellidos = filter_var($_POST['apellido-sp'],FILTER_SANITIZE_STRING);
			$direccion = filter_var($_POST['direccion-sp'],FILTER_SANITIZE_STRING);
			$telefono = filter_var($_POST['telefono-sp'],FILTER_SANITIZE_NUMBER_INT);
			$celular = filter_var($_POST['celular-sp'],FILTER_SANITIZE_NUMBER_INT);
			$departamento = filter_var($_POST['depar-ucb-sp'],FILTER_SANITIZE_STRING);
			$interno = filter_var($_POST['interno-sp'],FILTER_SANITIZE_NUMBER_INT);
			$correo = filter_var($_POST['correo-sp'],FILTER_SANITIZE_STRING);
			$totGanado = filter_var($_POST['total-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
			$liquido = filter_var($_POST['liquido-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
			$antiguedad = 15;//filter_var($_POST[15],FILTER_SANITIZE_NUMBER_INT);
			$aporte = filter_var($_POST['aporte-sp'],FILTER_SANITIZE_NUMBER_FLOAT);
			$mes = 13;//filter_var($_POST['mes-sp'],FILTER_SANITIZE_STRING);
			$resultados= ClaseUsuario::registrar_afiliado($fecha,$carnet,$nombres,$apellidos,$direccion,$telefono,$celular,$departamento,$interno,$correo,$totGanado,$liquido,$antiguedad,$aporte,$mes,1);
			echo json_encode($resultados);
			flush();
		break;

		case "modificarAfiliado":
			$fecha = filter_var($_POST['fechaactual'],FILTER_SANITIZE_STRING);
			$carnet = filter_var($_POST['carnet'],FILTER_SANITIZE_STRING);
			$nombres = filter_var($_POST['nombres-sp'],FILTER_SANITIZE_STRING);
			$apellidos = filter_var($_POST['apellidos-sp'],FILTER_SANITIZE_STRING);
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
			$mes = filter_var($_POST['mes-sp'],FILTER_SANITIZE_STRING);
			$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);

			$resultados= ClaseUsuario::modificar_afiliado($fecha,$carnet,$nombres,$apellidos,$direccion,$telefono,$celular,$departamento,$interno,$correo,$totGanado,$liquido,$antiguedad,$aporte,$mes,1,$id);

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
			$cantidad_sueldo=$use->cantidad_sueldo;
			$monto_aporte=$use->monto_aporte;
			$mes=$use->idMes;
			$liquido=$use->liquido;
			$antiguedad=$use->antiguedad;
			$idafi=$use->idAfiliacion;
			$fecha=$use->fecha;


			$resultados=array('ci'=> $ci,'nombre'=> $nomb.' '.$nomb2,'apellido'=> $ap.' '.$ap2,'direccion'=>$direccion,'telefono'=>$telefono,'celular'=>$celular,'departamento'=>$departamento,'correos'=>$correo,'interno'=>$interno,'cantidad_sueldo'=>$cantidad_sueldo,'user'=>$user,'pass'=>$pass,'monto_aporte'=>$monto_aporte,'idMes'=>$mes,'liquido'=>$liquido,'antiguedad'=>$antiguedad,'idAfiliacion'=>$idafi,'fecha'=>$fecha,'resp'=> 1);
			
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
	}

?>