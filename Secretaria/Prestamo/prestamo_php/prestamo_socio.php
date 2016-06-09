
<?php 
date_default_timezone_set('America/La_Paz');
//print $datetime=date('d/m/Y H:i:s');
@session_start();
//registrar_prestamo() no se esta ausando todavia
	include("../../../clases/databaseA.php");
	include("../../../clases/claseUsuario.php");
	include("../../../clases/clasePrestamo.php");
	include("../../../clases/claseHistorial2.php");
	include("../../../clases/claseSolicitud.php");
	include("../../../clases/claseParametros.php");
	include("../../../clases/claseAhorro.php");
$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
	switch ($opcion) {
		case "buscar_garante":
		$ci=filter_var($_POST['ci'],FILTER_VALIDATE_INT);
		$aporte=$_POST['aporte_pres'];
		// verificamos que el garante cumpla con la condicion de garantizar 3 veces
		$garante=ClasePrestamo::verificar_garante($ci);
		$datos_garante=ClaseUsuario::encontrar_por_ci($ci);
		$liquido_pagable=ClaseHistorial::historial_por_ci($ci);			
		if($garante<3){
			$parametro=ClaseParametros::encontrar_parametro_prestamo(14);
			$soporte=round($aporte*100/30,2);
			if($soporte<=$liquido_pagable->liquido){
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
			'ci'=> $datos_garante->ci,
		 	'nombre'=>"" ,
		 	'nombre2'=>"",
		 	'apellido_p'=>"",
		 	'apellido_m'=>"" );
		}
		 	
		}else{
			$resultados=array(
			//alerta 1 significa que el garante esta no habilitado
			'alerta'=>1);
		}
			echo json_encode($resultados);
			flush();
		break;

		case "buscar_ganancia":
			$ci_solicitante = $_POST['a'];
			$ganancias=ClaseHistorial::historial_por_ci($ci_solicitante);
 			$resultados=array(
		 	'cantidad_sueldo'=> $ganancias->cantidad_sueldo,
		 	'liquido'=>$ganancias->liquido,
		 	'monto_aporte'=> $ganancias->monto_aporte );
		 				
			echo json_encode($resultados);
			flush();

			break;
			case "buscar_datos_socio":
			if(isset($_POST['ci']) &&$_POST['ci']!=""){$use=ClaseUsuario::encontrar_por_ci($_POST['ci']);}
			if(isset($_POST['nombre']) && !empty($_POST['nombre'])){$use=ClaseUsuario::encontrar_por_nombre($_POST['nombre']);}
			if(isset($_POST['apellido']) && !empty($_POST['apellido'])){$use=ClaseUsuario::encontrar_por_apellido($_POST['apellido']);}
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
			case "buscar_datos_solicitud_id":
			$idSol=filter_var($_POST['a'],FILTER_VALIDATE_INT);
			$solicitud=ClaseSolicitud::solicitud_por_id($idSol);
			$usuario=ClaseUsuario::encontrar_por_id($solicitud->idUsuario);
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
		 	'cantidad_pres'=>$solicitud->cantidad_sol,
		 	'meses'=>$solicitud->meses_sol,
		 	'porcentaje'=>$solicitud->porcentaje_sol,
		 	'monto_aporte'=> $solicitud->cuota_sol,
		 	'ci_garante'=> $solicitud->ciGarante,
		 	'nombres_garante'=> $solicitud->nombres_ga,
		 	'apellidos_garante'=> $solicitud->apellidos_ga,
		 	'total_ganado'=> $solicitud->cantidad_sueldo_sol,
		 	'liquido_pagable'=>$solicitud->liquido_sol
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
			$datos->idRegistrador =$_SESSION['ideusuario'];//cambiar por inicio sesion
			$datos->numero_cheque = $_POST['numero_cheque'];
			$datos->estado=1;
			$resultados=$datos->crear_prestamo();
			$idpres=$datos->idPrestamo;
			$resultado = array('resultados' =>$resultados ,'idpres' =>$idpres );
		}else{
			$resultado=array('resultados'=>"false");}
			echo json_encode($resultado);
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
			 $usuario=ClaseUsuario::encontrar_por_id($pre->idUsuario);
			 	$resultados[$c]=array(
			 		'idSolicitud'=>$pre->idSolicitud,
			 		'cod_form_solpres'=>$pre->cod_form_solpres,
			 		'estado_sol'=>$pre->nombre_estado,
			 		'fecha_sol'=>date("d-m-Y",strtotime($pre->fecha_sol)),
			 		'ci'=> $usuario->ci,
				 	'nombre'=>$usuario->nombre,
				 	'nombre2'=> $usuario->nombre2,
				 	'apellido_p'=> $usuario->apellido_p,
				 	'apellido_m'=>$usuario->apellido_m);
					$c++;
			 }
			echo json_encode($resultados);
			flush();

		break;
		case "buscar_paramtros":
			$ci=filter_var($_POST['ci'],FILTER_VALIDATE_INT);
			$ganancias=ClaseHistorial::historial_por_ci($ci);			
			$ahorro=ClaseAhorro::encontrar_ahorro_ci($ci);			
			$interes=ClaseParametros::encontrar_parametro_prestamo(10);
			$max_meses=ClaseParametros::encontrar_parametro_prestamo(8);
			$porcentaje_prestamo=ClaseParametros::encontrar_parametro_prestamo(19);
			$cantidad_max_prestamo=ClaseParametros::encontrar_parametro_prestamo(14);
			//calculo de la cuota maxima del socio
			$max_couta_prestamo=$ganancias->liquido*$porcentaje_prestamo->condicion;
			//calculo prestamo max
			$max_prestamo=$ahorro->cantidad_ahorro*$cantidad_max_prestamo->condicion;
			$resultados=array('interes'=>$interes->condicion,'max_meses'=>$max_meses->condicion,'cuota_maxima'=>$max_couta_prestamo,'prestamo_max'=>$max_prestamo);
			echo json_encode($resultados);
			flush();

		break;
		case "garante_nombre":
			$search = $_POST['a'];
			$pres=ClaseUsuario::encontrar_por_nom($search);
			$resultados=array();
			$c=0;
			foreach ($pres as $pre) {
				$resultados[$c]=array('ci'=>$pre->ci,'nombre'=>$pre->nombre." ".$pre->nombre2,'apellido'=>$pre->apellido_p." ".$pre->apellido_m);
					$c++;
			 }
			 echo json_encode($resultados);
			flush();
		break;
		case "estado_enviado":
			$id = $_POST['id'];
			$sol_es=new ClaseSolicitud;
			$sol_es->idTipo_estado=2;
			$res=$sol_es->modificar_solicitud($id);
			
			 echo json_encode($res);
			flush();
		break;
		case "enviar_solicitud_prestamo":
			$idusu_prestamo=ClaseUsuario::encontrar_por_ci($_POST['ci']);
			$datos=new ClaseSolicitud();
			$datos->idUsuario=$idusu_prestamo->idUsuario;
			$datos->cantidad_sol=$_POST['cantidad'];
			$datos->meses_sol=$_POST['meses'];
			$datos->porcentaje_sol=$_POST['porcentaje'];
			$datos->cuota_sol=$_POST['aporte'];
			$datos->cantidad_sueldo_sol=$_POST['ganado'];
			$datos->liquido_sol=$_POST['liquido'];
			$idgarante_pres=ClaseUsuario::encontrar_por_ci($_POST['cigarante']);
			$datos->ciGarante=$idgarante_pres->ci;
			$datos->nombres_ga=$idgarante_pres->nombre;
			$datos->apellidos_ga=$idgarante_pres->apellido_p;
			$datos->fecha_sol=date('Y/m/d');
			$datos->idRegistrador=$_SESSION['ideusuario'];
			$datos->idTipo_estado=1;
			$datos->estado=1;
			$resultados=$datos->crear_solicitud();
			 echo json_encode($resultados);
			flush();
		break;
		case "buscar_interes":
			$parametro=ClaseParametros::encontrar_parametro_prestamo(10);
			$interes=100*$parametro->condicion;
			 echo json_encode($interes);
			flush();
		break;
	}
 ?>