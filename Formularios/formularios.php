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
    	$('select').material_select();
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
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/barramenusecre.php";
 	?>
<!--  llamada al menu de botones del lado izquierdo -->
	
<!--  Creacion del contenido del index -->
	<br><br>
	<div class="row">

		<div class="col offset-m1 m2">
			<?php 
				require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/opcformulario.php";
		 	?>			
		</div>

		<div class="col m8">

		<div class="card">
			<?php
	        $opc=$_GET['opcion'];

	        switch ($opc) {
	          /*============================= OPCION FORMULARIOS ==================================*/
	              case "formulario_afiliacion":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_afiliacion.php";
	              break;
	              case "formulario_solicitud_prestamo":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_solicitud_prestamo.php";
	              break;
	              case "formulario_confidencial":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_confidencial.php";
	              break;
	              case "formulario_bien_uso":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_bien_uso.php";
	              break;
	              case "formulario_cancelacion_deuda_parcial":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_cancelacion_deuda_parcial.php";
	              break;
	              case "formulario_retiro_aportes_total":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_retiro_aportes_total.php";
	              break;
	              case "formulario_incremento_aportes":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_incremento_aportes.php";
	              break;
	              case "formulario_disminucion_aportes":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_disminucion_aportes.php";
	              break;
	              case "formulario_cancelacion_deuda_total":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_cancelacion_deuda_total.php";
	              break;
	              case "formulario_retiro_aportes":
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_retiro_aportes.php";
	              break;


	          /*============================= OPCION INFORMACION ===================================================*/
	              case "informacion":    //planificacion trimestral
	              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/informacion.php"; 
	              break;
          }
	    	?>	

	    	<div class="card-content">
          <div class="row" align="right">
              <a class="waves-effect waves-light btn">Enviar
              <i class="fa fa-paper-plane"></i>
              </a>
          </div>
        </div> 
</div>		
		</div>
			
	</div>


<!--  Llamada al pie de pagina -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/footer.php";
 	?>


</body>
</html>















