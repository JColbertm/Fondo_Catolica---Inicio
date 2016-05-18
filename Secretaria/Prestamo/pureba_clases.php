<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
</head>

<body>

	<?php 
	include("../../clases/databaseA.php");
	include("../../clases/claseUsuario.php");

	 $users=ClaseUsuario::encontrar_a_todos();
	 foreach ($users as $user) {
	 	echo $user->nombre."<br>";
	 }
	$rt=123456;
	$seres= new ClaseUsuario;
	$seress=$seres->nombre="asdas";
	echo $seress.'<br>';
	echo $seress2=$seres->nombre.'<br>';;
	$use=ClaseUsuario::encontrar_por_id($rt);
		$a=$use->ci;
		$b=2;
		echo $a;
		 $resultados=array('ci'=> $a,'nombre'=>$use->nombre ,'nombre2'=> "123",'apellido_p'=> "1231",'apellido_m'=>"23" );
var_dump($resultados);
	 ?>
</body>
</html>
