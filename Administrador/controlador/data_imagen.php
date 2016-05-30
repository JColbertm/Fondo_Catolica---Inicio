<?php
	include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/gral_php/databaseA.php";
	
		if ($_FILES["archivo"]["type"]=="image/jpeg" || $_FILES["archivo"]["type"]=="image/pjpeg" || $_FILES["archivo"]["type"]=="image/gif" || $_FILES["archivo"]["type"]=="image/bmp" || $_FILES["archivo"]["type"]=="image/png")
		{
			$info=getimagesize($_FILES["archivo"]["tmp_name"]);
			# Escapa caracteres especiales
 	        $imagenEscapes=file_get_contents($_FILES["archivo"]["tmp_name"]);
 			$fecha = date('Y-m-d H:i:s');
			$campos = array('idParametros','parametro','condicion', 'imagen','tipoima','fecha_creacion');
			$valores = array('','Imagen1','',$imagenEscapes,$_FILES["archivo"]["type"],$fecha);
			$result= insertA('parametros', $campos, array(2,2,2,2,2,2), $valores);
			if ($result)
			{		
				$resultados=array('resp'=> 1);
				header('Location: /Fondo_Catolica/Administrador/Imagen/imagen.php'); 
			}
			else
			{
				$resultados=array('resp'=> 0);
			}
		}
?>


<?php
########## imagen_agregar.php ##########
# http://www.lawebdelprogramador.com
 
/*
La base de datos utilizada para el ejemplo se llama imagenes

CREATE TABLE IF NOT EXISTS `imagephp` (
  `id` smallint(6) NOT NULL auto_increment,
  `anchura` smallint(6) NOT NULL,
  `altura` smallint(6) NOT NULL,
  `tipo` char(15) NOT NULL,
  `imagen` mediumblob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;
*/
 
// Los posible valores que puedes obtener de la imagen son:
//echo "<BR>".$_FILES["userfile"]["name"];      //nombre del archivo
//echo "<BR>".$_FILES["userfile"]["type"];      //tipo
//echo "<BR>".$_FILES["userfile"]["tmp_name"];  //nombre del archivo de la imagen temporal
//echo "<BR>".$_FILES["userfile"]["size"];      //tamaño
 
 ?>
 
 
 
 
 
 
 
 
 
