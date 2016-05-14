<?php 
	include("databaseA.php");
$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
	switch ($opcion) {
		case "buscar_garante":
			$a = filter_var($_POST['a'],FILTER_SANITIZE_STRING);
			$result= execSqlA("SELECT a.*,b.* FROM usuario a, datos_secundario b where a.ci LIKE '%$a%' and a.idUsuario=b.idUsuario"); 
			$resultados=array();
			if (mysqli_num_rows($result)  > 0) {
				$c=0;
				while($data = mysqli_fetch_array($result))
			{
					$resultados[$c]=array('ci'=> $data[1],'nombre'=> $data[2],'nombre2'=> $data[3],'apellido_p'=> $data[4],'apellido_m'=> $data[5],'direccion'=> $data[10],'celular'=> $data[12],'departamento'=> $data[13],'interno'=> $data[14],'correo'=> $data[15]);
					$c++;
				}	
			}
			else {
				$resultados=array(0);
			}
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

			$a = $_POST['a'];
			$result= execSqlA("SELECT a.ci, a.nombre, a.nombre2, a.apellido_p, a.apellido_m,b.direccion, b.telefono, b.celular, b.departamento, b.correos,b.interno FROM usuario a,datos_secundario b WHERE a.idUsuario=b.idUsuario and a.idUsuario like '%$a%'");
			$resultados=array();
			if (mysqli_num_rows($result)  > 0) {
				$c=0;
				while($data = mysqli_fetch_array($result))
			{
					$resultados[$c]=array('ci'=> $data[0],'nombre'=> $data[1],'nombre2'=> $data[2],'apellido_p'=> $data[3],'apellido_m'=> $data[4],'direccion'=> $data[5],'telefono'=> $data[6],'celular'=> $data[7],'departamento'=> $data[8],'correos'=> $data[9],'interno'=> $data[10]);
					$c++;
				}	
			}
			else {
				$resultados=array(0);
			}
			echo json_encode($resultados);
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