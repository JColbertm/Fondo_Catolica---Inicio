<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="/Fondo_Catolica/materialize/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/Fondo_Catolica/materialize/css/materialize.min.css"  media="screen,projection"/>
      <script type="text/javascript" src="/Fondo_Catolica/materialize/jquery.min.js"></script>
      <script type="text/javascript" src="/Fondo_Catolica/materialize/js/materialize.min.js"></script>
      <script type="text/javascript" src="/Fondo_Catolica/Secretaria/Prestamo/prestamo_js/prestamos.js"></script>
	<script type="text/javascript">
	  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
$('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { alert('Ready'); }, // Callback for Modal open
      complete: function() { alert('Closed'); } // Callback for Modal close
    }
  );  });
	</script>
</head>

<body>

	<?php 
	include("../../clases/databaseA.php");
	include("../../clases/claseUsuario.php");
	include("../../clases/clasePrestamo.php");
	include("../../clases/claseHistorial.php");

	 $users=new ClaseUsuario;
	 $users->ci="2533";
	 $users->nombre="sergiolas";
	 $users->nombre2="favio";
	 $users->apellido_p="sega";
	 $users->apellido_m="sebva";
	 $users->idTipo_usuario="1";
	 $users->idUsuarioCreador="1";
	 $users->direccion="nos";
		$users->telefono="3422";
		$users->celular="3242";
		$users->departamento="es";
		$users->interno="323";
		$users->correos="dgdf@hdf";
	 echo $users->nombre;
	 $users->crear_primario();
	 // $users->crear_secundario();

	 // $pres=ClasePrestamo::encontrar_prestamos();
	 // foreach ($pres as $pre) {
	 // 	echo $pre->cantidad."<br>";
	 // }
	$rt=6811158;
// 	$seres= new ClaseUsuario;
// 	$seress=$seres->nombre="asdas";
// 	echo $seress.'<br>';
// 	echo $seress2=$seres->nombre.'<br>';;

	echo $use=ClasePrestamo::verificar_garante(123456);
	$user=ClaseHistorial::historial_por_ci(123456);
	foreach ($user as $pre) {
	 	echo $pre->idHistorial_sueldo."<br>";
	 }
	 //$user=ClaseHistorial::historial_por_ci(123456);
	// echo "<br>".$user->idHistorial_sueldo;

		// $a=$use->cantidad;
		// $b=2;
		// echo $a;
// 		 $resultados=array('ci'=> $a,'nombre'=>$use->nombre ,'nombre2'=> "123",'apellido_p'=> "1231",'apellido_m'=>"23" );
// var_dump($resultados);
	$rt=123456;
	$seres= new ClaseUsuario;
	//poner nombre
	$seress=$seres->nombre="asdas";
	//recupera
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
