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

		<div class="col offset-m1 m10">
			<div class="card">
			    <div class="card-action">
			        <a>Preguntas Frecuentes</a>
			    </div>
			    <div class="card-content">
			        <ol class="lista_paginas">
			        	<li>
			        		<h5>Primera Pregunta</h5>
			        		<ul>
			        			<li>
			        				Primera Respuesta Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			        				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			        				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			        				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			        				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			        				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			        			</li>
			        		</ul>
			        	</li>		
			        	<li>
			        		<h5>Segunda Pregunta</h5>
			        		<ul>
			        			<li>
			        				Segunda Respuesta Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			        				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			        				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			        				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			        				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			        				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			        			</li>
			        		</ul>
			        	</li>		
			        	<li>
			        		<h5>Tercera Pregunta</h5>
			        		<ul>
			        			<li>
			        				Tercera Respuesta Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			        				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			        				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			        				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			        				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			        				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			        			</li>
			        		</ul>
			        	</li>		
     	            </ol>
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















