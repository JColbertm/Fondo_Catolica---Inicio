<?php 
	include("databaseA.php");
	include("claseUsuario.php");
?>
<?php 
$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
	switch ($opcion) {
		case "buscar_garante":
		$rt=filter_var($_POST['a'],FILTER_VALIDATE_INT);
		$uses=ClaseUsuario::encontrar_por_ci($rt);
		 $resultados=array('ci'=> $uses->ci,'nombre'=>$uses->nombre ,'nombre2'=> $uses->nombre2,'apellido_p'=> $uses->apellido_p,'apellido_m'=>$uses->apellido_m );
			echo json_encode($resultados);
			flush();
		break;

		case "buscar_ganancia":

			$a = $_POST['a'];
			$result= execSqlA("SELECT total_ganado, liquido_pagable, monto_aporte FROM historial_sueldo WHERE idUsuario = any (select d.idUsuario from  usuario d where d.ci  like '%$a%') ");
			$resultados=array();
			if (mysqli_num_rows($result)  > 0) {
				$c=0;
				while($data = mysqli_fetch_array($result))
			{
					$resultados[$c]=array('total_ganado'=> $data[0],'liquido_pagable'=> $data[1],'monto_aporte'=> $data[2]);
					$c++;
				}	
			}
			else {
				$resultados=array(0);
			}
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
			case "registrar_prestamo":

			$a = $_POST['ci'];
			$b = $_POST['cantidad'];
			$c = $_POST['literal'];
			$d = $_POST['meses'];
			$e = $_POST['porcentaje'];
			$f = $_POST['garante'];
			$g = $_POST['registrador'];
			$h = $_POST['numero_cheque'];
			$result2= insertA('prestamo', array('idPrestamo', 'idUsuario', 'cantidad', 'literal', 'meses', 'porcentaje', 'idGarante', 'idRejistrador', 'numero_cheque'),array(2,2,2,2,2,2,2,2,2), array("",$a,$b,$c,$d,$e,$f,$g,$h));
				    	if ($result2){		
				
								$resultados=array('resp'=> 1);
							}
							else
							{
								$resultados=array('resp'=> 0);
							}

			echo json_encode($resultados);
			flush();

			break;
			case "tabla_llena":
				    
			
			$result= execSqlA("SELECT * FROM prestamo ");
			$resultados=array();
			if (mysqli_num_rows($result)  > 0) {
				$c=0;
				while($data = mysqli_fetch_array($result))
			{
					$resultados[$c]=array('idPrestamo'=> $data[0],'idUsuario'=> $data[1],'cantidad'=> $data[2],'literal'=> $data[3],'meses'=> $data[4],'porcentaje'=> $data[5],'idGarante'=> $data[6],'idRejistrador'=> $data[7],'numero_cheque'=> $data[8]);
					$c++;
				}	
			}
			else {
				$resultados=array(0);
			}
			echo json_encode($resultados);
			flush();

		break;
	}
 ?>