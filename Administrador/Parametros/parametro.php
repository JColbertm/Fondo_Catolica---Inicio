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
          $('#btn_guarda_parametro').on('click',function(){
            guardar_parametro();
          })
    	  });
        function guardar_parametro()
        {
          var datos= $('#form_parametro').serialize();
          datos += "&opcion=" + encodeURIComponent('registrar_pagina');
          console.log(datos);
          $.ajax({
            url: '/Fondo_Catolica/Administrador/controlador/.php',
            type: 'POST',
            data: datos
          })
          .done(function(data) {
            console.log(data);
            var resp = $.parseJSON(data);
            console.log(resp);
            var t= resp.resp; 
            if(t==1)
            {
              mostrar();   
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
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Administrador/barramenuadmi.php";
 	?>
<!--  llamada al menu de botones del lado izquierdo -->
	
<!--  Creacion del contenido del index -->
	<br><br>
  <?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Administrador/Parametros/abmparametro.php";
  ?>
	

<!--  Llamada al pie de pagina -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/footer.php";
 	?>


</body>
</html>