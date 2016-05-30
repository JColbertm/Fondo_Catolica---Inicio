<?php
	include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
	
		$dato = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
		$fecha = date('Y-m-d');
		$campos = array('idParametros','parametro','condicion', 'imagen','fecha_creacion');
		$valores = array('','Imagen3','',$dato,$fecha);
		$result= insertA('parametros', $campos, array(2,2,2,2,2), $valores);
		if ($result)
		{		
			$resultados=array('resp'=> 1);
			header('Location: /Fondo_Catolica/Administrador/Imagen/imagen.php'); 
		}
		else
		{
			$resultados=array('resp'=> 0);
		}
?>