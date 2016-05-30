<?php
@session_start();
  if (isset($_SESSION['ideusuario']))
  {
  
  }
  else
  {
    header('Location: /Fondo_Catolica/index.php');  
  }
?>
 <!DOCTYPE html> 
 <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="/Fondo_Catolica/materialize/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/Fondo_Catolica/materialize/css/materialize.min.css"  media="screen,projection"/>
      <script type="text/javascript" src="/Fondo_Catolica/materialize/jquery.min.js"></script>
      <script type="text/javascript" src="/Fondo_Catolica/materialize/js/materialize.min.js"></script>
      <script type="text/javascript">
      	$(document).ready(function(){
      		$('.slider').slider();
          	$('.modal-trigger').leanModal();
          	$(".button-collapse").sideNav();
          	$('#cierre_sesion').on('click', function()
	          {
	            window.location="/Fondo_Catolica/index.php"; 
	          });
    	});
      </script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      
<!--  llamada a la cabecera -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/head.php";
 	?>
<!--  llamada al menu de barra -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/barramenu.php";
 	?>
<!--  llamada al menu de botones del lado izquierdo -->
	
<!--  Creacion del contenido del index -->
	<br><br>
	<div class="row">

		<div class="col offset-m1 m2">
			<?php 
				require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/Prestamos/opcprestamos.php";
		 	?>			
		</div>

		<div class="col m8 col s12">
			<?php
	        $opc=$_GET['opcion'];

	        switch ($opc) {
	          /*============================= OPCION SIMULACION ==================================*/
	              case "simulacion":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/Prestamos/simulacion.php";
	              break;
	          /*============================= OPCION SOLICITUD PRESTAMO =================================*/
	              case "solprestamo":    //planificacion trimestral
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/Prestamos/solprestamo.php"; 
	              break;
	          /*=============================   OPCION VER ESTADO PRESTAMO ==================================*/
	            case "estprestamo":  //planificacion semestral
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/Prestamos/estprestamo.php";
	              break;
	          /*============================= OPCION CUOTAS PRESTAMO ==================================*/
	            case "cuoprestamo":  //planificacion por competencia
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/Prestamos/cuoprestamo.php";
	              break;
	          /*============================= OPCION INFORMACION ==================================*/
	            case "informacion":  //planificacion por competencia
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/Prestamos/informacion.php";
	              break;
	          }
	    	?>	
		</div>
		
	</div>

<!--  Llamada al pie de pagina -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/footer.php";
 	?>


</body>
</html>















