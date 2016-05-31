	<?php
		$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
		include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
		switch ($opcion) {

		case "registro_parametro":
			$fecha_actual=date("Y-m-d H:m:s");
			$info = filter_var($_POST['info_parametro'],FILTER_SANITIZE_STRING);
			$nombre = filter_var($_POST['name_parametro'],FILTER_SANITIZE_STRING);
			$valor = filter_var($_POST['valor_parametro'],FILTER_SANITIZE_STRING);
			$campos = array('idParametros','parametro', 'condicion', 'imagen', 'tipoima', 'fecha_creacion', 'info');
				
			$valores = array("", $nombre,$valor,'','',$fecha_actual,$info);
			$result= insertA('parametros', $campos, array(2,2,2,2,2,2,2), $valores);	
			$resultados=array('resp'=> 1);
			echo json_encode($resultados);

		break;

		case "llenar_parametros":
			$fecha_actual=date("Y-m-d H:m:s");
			$info = filter_var($_POST['info_parametro'],FILTER_SANITIZE_STRING);
			$nombre = filter_var($_POST['name_parametro'],FILTER_SANITIZE_STRING);
			$valor = filter_var($_POST['valor_parametro'],FILTER_SANITIZE_STRING);
			$campos = array('idParametros','parametro', 'condicion', 'imagen', 'tipoima', 'fecha_creacion', 'info');
				
			$valores = array("", $nombre,$valor,'','',$fecha_actual,$info);
			$result= insertA('parametros', $campos, array(2,2,2,2,2,2,2), $valores);	
			$resultados=array('resp'=> 1);
			echo json_encode($resultados);

		break;
	}

	?>