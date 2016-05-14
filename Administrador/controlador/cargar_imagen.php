<?php
	$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
	include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
	switch ($opcion) {
		case "cargarimagenes":

			$result= execSqlA("select idParametros, imagen from parametros where idParametros = 3");
			$resultados=array();
			if (mysqli_num_rows($result)  > 0) 
			{
				$c=0;
				while($data = mysqli_fetch_array($result))
				{
					$resultados[$c]=array('idPara'=> $data[0],'img'=> $data[1], 'res'=>1);
					$c++;
				}	
			}
			else {
				$resultados=array('res' => 0);
			}
			echo json_encode($resultados);
			flush();


		break;
	}
?>