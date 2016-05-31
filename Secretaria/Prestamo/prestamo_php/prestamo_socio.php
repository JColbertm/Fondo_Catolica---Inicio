
<?php 
	include("../../../clases/databaseA.php");
	include("../../../clases/claseUsuario.php");
	include("../../../clases/clasePrestamo.php");
	include("../../../clases/claseHistorial.php");
	include("../../../clases/claseSolicitud.php");
$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
	switch ($opcion) {
		case "buscar_garante":
		$rt=filter_var($_POST['a'],FILTER_VALIDATE_INT);
		// verificamos que el garante cumpla con la condicion de garantizar 3 veces
		$garante=ClasePrestamo::verificar_garante($rt);
		$datos_garante=ClaseUsuario::encontrar_por_ci($rt);
		if($garante<3){
			 $resultados=array(
			 	//alerta 2 significa que el garante esta habilitado
		 	'alerta'=>2,
		 	'ci'=> $datos_garante->ci,
		 	'nombre'=>$datos_garante->nombre ,
		 	'nombre2'=> $datos_garante->nombre2,
		 	'apellido_p'=> $datos_garante->apellido_p,
		 	'apellido_m'=>$datos_garante->apellido_m );
		 	
		}else{
			$resultados=array(
			//alerta 1 significa que el garante esta no habilitado
			'alerta'=>1,
		 	'ci'=>$datos_garante->ci ,
		 	'nombre'=> " ",
		 	'nombre2'=> " ",
		 	'apellido_p'=> " ",
		 	'apellido_m'=> " ");
		}
			echo json_encode($resultados);
			flush();
		break;

		case "buscar_ganancia":
			$ci_solicitante = $_POST['a'];
			$ganancias=ClaseHistorial::historial_por_ci($ci_solicitante);
 			$resultados=array(
		 	'total_ganado'=> $ganancias->total_ganado,
		 	'liquido_pagable'=>$ganancias->liquido_pagable ,
		 	'monto_aporte'=> $ganancias->monto_aporte );
		 				
			echo json_encode($resultados);
			flush();

			break;
			case "buscar_datos_socio":
			$rt=filter_var($_POST['a'],FILTER_VALIDATE_INT);
			$use=ClaseUsuario::encontrar_por_ci($rt);
		 	$resultado=array(
		 	'ci'=> $use->ci,
		 	'nombre'=>$use->nombre ,
		 	'nombre2'=> $use->nombre2,
		 	'apellido_p'=> $use->apellido_p,
		 	'apellido_m'=>$use->apellido_m,
		 	'direccion'=> $use->direccion,
		 	'telefono'=>$use->telefono,
		 	'celular'=>$use->celular,
		 	'departamento'=>$use->departamento,
		 	'correos'=>$use->correos,
		 	'interno'=>$use->interno);
			echo json_encode($resultado);
			flush();

			break;
			case "buscar_datos_socio_id":
			$rt=filter_var($_POST['a'],FILTER_VALIDATE_INT);
			$usuario=ClaseUsuario::encontrar_por_id($rt);
			$ganancias=ClaseHistorial::historial_por_ci($usuario->ci);
		 	$resultado=array(
		 	'ci'=> $usuario->ci,
		 	'nombre'=>$usuario->nombre ,
		 	'nombre2'=> $usuario->nombre2,
		 	'apellido_p'=> $usuario->apellido_p,
		 	'apellido_m'=>$usuario->apellido_m,
		 	'direccion'=> $usuario->direccion,
		 	'telefono'=>$usuario->telefono,
		 	'celular'=>$usuario->celular,
		 	'departamento'=>$usuario->departamento,
		 	'correos'=>$usuario->correos,
		 	'interno'=>$usuario->interno,
		 	'total_ganado'=> $ganancias->total_ganado,
		 	'liquido_pagable'=>$ganancias->liquido_pagable ,
		 	'monto_aporte'=> $ganancias->monto_aporte
		 	);

			echo json_encode($resultado);
			flush();

			break;
			case "registrar_prestamo":
			if($_POST['ci']!="" && $_POST['cantidad']!="" && $_POST['meses']!="" && $_POST['porcentaje']!="" && $_POST['garante']!="" && $_POST['numero_cheque']!=""){
			$idusu_prestamo=ClaseUsuario::encontrar_por_ci($_POST['ci']);
			$datos=new ClasePrestamo();
			$datos->idUsuario = $idusu_prestamo->idUsuario;
			$datos->cantidad = $_POST['cantidad'];
			$datos->meses = $_POST['meses'];
			$datos->porcentaje = $_POST['porcentaje'];
			$idgarante_pres=ClaseUsuario::encontrar_por_ci($_POST['garante']);
			$datos->idGarante = $idgarante_pres->idUsuario;
			$datos->idRegistrador =2;//cambiar por inicio sesion
			$datos->numero_cheque = $_POST['numero_cheque'];
			$datos->estado=1;
			$resultados=$datos->crear_prestamo();
		}else{$resultados="false";}
			echo json_encode($resultados);
			flush();

			break;
			case "tabla_prestamos":
			$resultados=array();
			$c=0;
			$pres=ClasePrestamo::encontrar_prestamos();
			 foreach ($pres as $pre) {
			 	$resultados[$c]=array('idPrestamo'=>$pre->idPrestamo,'cod_form_pres'=>$pre->cod_form_pres);
					$c++;
			 }
			echo json_encode($resultados);
			flush();

		break;
		case "tabla_solicitudes":
			$resultados=array();
			$c=0;
			$pres=ClaseSolicitud::encontrar_solicitudes();
			 foreach ($pres as $pre) {
			 	$resultados[$c]=array(
			 		'idSolicitud'=>$pre->idSolicitud,
			 		'cod_form_solpres'=>$pre->cod_form_solpres,
			 		'idUsuario'=>$pre->idUsuario,
			 		'cantidad_sol'=>$pre->cantidad_sol,
			 		'meses_sol'=>$pre->meses_sol,
			 		'porcentaje_sol'=>$pre->porcentaje_sol,
			 		'idGarante'=>$pre->idGarante);
					$c++;
			 }
			echo json_encode($resultados);
			flush();

		break;
	}
 ?>