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
      <!--Import Font Awesomw icons Font-->
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
            	cerrar_sesion();            
          	});
    	verifica_sesion();
      }); 

        function verifica_sesion()
        {
          var id_usu = "id_usu=" + encodeURIComponent('<?php echo $_SESSION['ideusuario']?>');
          id_usu += "&opcion=" + encodeURIComponent('verificacion');
          id_usu += "&tipo_usu=" + encodeURIComponent('<?php echo $_SESSION['tipousu']?>');
          console.log(id_usu);
          $.ajax({
            url: '/Fondo_Catolica/gral_php/login.php',
            type: 'POST',
            data: id_usu
          })
          .done(function(data) {
            console.log(data);
            var resp = $.parseJSON(data);
            if(resp.res==1)
            {
              if(resp.inisesion == 0)
              {
                window.location="/Fondo_Catolica/Socio/cambiopass.php"; 
              }
              else
              {

              }
            }
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();          
        }
    	function cerrar_sesion()
        {          
          var id = "opcion=" + encodeURIComponent('cierra_sesion');
          console.log(id);
          $.ajax({
            url: '/Fondo_Catolica/gral_php/login.php',
            type: 'POST',
            data: id
          })
          .done(function(data) {
            console.log(data);
            var resp = $.parseJSON(data);
            if(resp.res==1)
            {
              window.location="/Fondo_Catolica/index.php"; 
            }
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();          
        }
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
				require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/CajaAhorro/opccajaahorros.php";
		 	?>			
		</div>

		<div class="col m8">

            <?php
		       $opc=$_GET['opcion'];
		        switch ($opc) {
				    /*============================= OPCION MI CUENTA DE AHORRO =================================*/
				    case "cueahorro":    
				        include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/CajaAhorro/cuentaahorro.php"; 
				    break;
				    /*=============================   OPCION MIS APORTES   ==================================*/
				    case "aportes":  
				    	include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/CajaAhorro/aportes.php";
				    break;
				    /*=============================   OPCION MIS RETIROS   ==================================*/
				    case "movimiento":  
				    	include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/CajaAhorro/movimiento.php";
				    break;
				    /*============================= OPCION MIS MULTAS ==================================*/
				    case "multas": 
				        include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/CajaAhorro/multas.php";
				    break;
				    /*============================= OPCION INFORMACION ==================================*/
				    case "informacion":  
				        include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/CajaAhorro/informacion.php";
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















