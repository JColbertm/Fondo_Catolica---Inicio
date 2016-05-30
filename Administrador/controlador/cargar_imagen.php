<?php
	$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
	include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
	switch ($opcion) 
	{
		case "cargarimagenes":
			$result=execSqlA("select MAX(idParametros) as idparametro, MAX(fecha_creacion) as fecha from parametros where parametro = 'imagen1'");
			while( $fila = $result->fetch_array() )
			{
			    $sql=execSqlA("select imagen from parametros where idParametros = ".$fila["idparametro"]." and fecha_creacion =\"".$fila["fecha"]."\" ");

			    while( $datos = $sql->fetch_array(MYSQLI_ASSOC) )
			    {
					header("Content-type:"."jpg");
					$imagen = $datos["imagen"];
					echo json_encode('img'=>$imagen,'resp'=>1);					 
			    }   
			}
		break;
	}
?>



