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
      <script type="text/javascript" src="/Fondo_Catolica/gral_php/validadores.js"></script>
	  <script type="text/javascript" src="jquery-latest.js"></script> 
	  <script type="text/javascript" src="jquery.tablesorter.js"></script>	
	  <script type="text/javascript">
			
	  $(document).ready(function(){
        $("#myTables").tablesorter(); 

    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
$('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { alert('Ready'); }, // Callback for Modal open
      complete: function() { alert('Closed'); } // Callback for Modal close
    }
  );  

});

	</script>
</head>

<body>

	<?php 
	include("../../clases/databaseA.php");
	include("../../clases/claseUsuario.php");
	include("../../clases/clasePrestamo.php");
	include("../../clases/claseHistorial.php");
	include("../../clases/claseParametros.php");
	//paramrtros:
	$pres=ClaseParametros::encontrar_parametros_prestamo(1);
	 foreach ($pres as $pre) {
	 	echo $pre->condicion."<br>";
	 }
	 	$prestamos=ClaseParametros::encontrar_parametro_prestamo(10);
	 	echo $prestamos->condicion;
	 // $users=new ClaseUsuario;
	 // $users->ci="2533";
	 // $users->nombre="sergiolas";
	 // $users->nombre2="favio";
	 // $users->apellido_p="sega";
	 // $users->apellido_m="sebva";
	 // $users->idTipo_usuario="1";
	 // $users->idUsuarioCreador="1";
	 // $users->direccion="nos";
		// $users->telefono="3422";
		// $users->celular="3242";
		// $users->departamento="es";
		// $users->interno="323";
		// $users->correos="dgdf@hdf";
	 // echo $users->nombre;
	 // $users->crear_primario();
	 // $users->crear_secundario();

	 // $pres=ClasePrestamo::encontrar_prestamos();
	 // foreach ($pres as $pre) {
	 // 	echo $pre->cantidad."<br>";
	 // }
	// $rt=6811158;
// 	$seres= new ClaseUsuario;
// 	$seress=$seres->nombre="asdas";
// 	echo $seress.'<br>';
// 	echo $seress2=$seres->nombre.'<br>';;

	// echo $use=ClasePrestamo::verificar_garante(123456);
	// $user=ClaseHistorial::historial_por_ci(123456);
	// foreach ($user as $pre) {
	//  	echo $pre->idHistorial_sueldo."<br>";
	//  }
	 //$user=ClaseHistorial::historial_por_ci(123456);
	// echo "<br>".$user->idHistorial_sueldo;

		// $a=$use->cantidad;
		// $b=2;
		// echo $a;
// 		 $resultados=array('ci'=> $a,'nombre'=>$use->nombre ,'nombre2'=> "123",'apellido_p'=> "1231",'apellido_m'=>"23" );
// var_dump($resultados);
	
	 ?>

 <table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th>Last Name</th> 
    <th>First Name</th> 
    <th>Email</th> 
    <th>Due</th> 
    <th>Web Site</th> 
</tr> 
</thead> 
<tbody> 
<tr> 
    <td>Smith</td> 
    <td>John</td> 
    <td>jsmith@gmail.com</td> 
    <td>$50.00</td> 
    <td>http://www.jsmith.com</td> 
</tr> 
<tr> 
    <td>Bach</td> 
    <td>Frank</td> 
    <td>fbach@yahoo.com</td> 
    <td>$50.00</td> 
    <td>http://www.frank.com</td> 
</tr> 
<tr> 
    <td>Doe</td> 
    <td>Jason</td> 
    <td>jdoe@hotmail.com</td> 
    <td>$100.00</td> 
    <td>http://www.jdoe.com</td> 
</tr> 
<tr> 
    <td>Conway</td> 
    <td>Tim</td> 
    <td>tconway@earthlink.net</td> 
    <td>$50.00</td> 
    <td>http://www.timconway.com</td> 
</tr> 
</tbody> 
</table> 
<?php 
    	date_default_timezone_set('America/La_Paz');

    
    
    print $datetime=date('d/m/Y');
    print $se=date('H:i:s');
    ?>
    <?php
// Imprime ejemplo 'Versión actual de PHP: 5.3.8'
echo 'Versión actual de PHP: ' . phpversion();

// Imprime ejemplo '2.0' o nada si la extensión no está habilitada
echo phpversion('tidy');
?>
<?php 
foreach (get_loaded_extensions() as $i => $ext) 
{ 
   echo $ext .' => '. phpversion($ext). '<br/>'; 
} 
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
if (version_compare(PHP_VERSION, '6.0.0') >= 0) {
    echo 'Soy al menos la versión 6.0.0 de PHP, mi versión: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
    echo 'Soy al menos la versión 5.3.0 de PHP, mi versión: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.0.0', '>=')) {
    echo 'Estoy usando la versión 5 de PHP, mi versión: ' . PHP_VERSION . "\n";
}

if (version_compare(PHP_VERSION, '5.0.0', '<')) {
    echo 'Estoy usando la versión 4 de PHP, mi versión: ' . PHP_VERSION . "\n";
}
?>
</body>
</html>
