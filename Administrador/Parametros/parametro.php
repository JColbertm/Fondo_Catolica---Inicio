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
          llenar_parametros();
          $('#cierre_sesion').on('click', function()
          {
            cerrar_sesion();            
          });
          $('#btn_guarda_parametro').on('click',function(){
            guardar_parametro();
          })
    	  });

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
            if(t==1)
            {
              window.location="/Fondo_Catolica/index.php"; 
            }
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();          
        }


        function llenar_parametros()
        {
          setTimeout("$('.ocultar').hide();", 3000);        
          var datos = "opcion=" + encodeURIComponent('llenar_parametros');
          console.log(datos);
          $.ajax({
            url: '/Fondo_Catolica/Administrador/controlador/ctrl_parametros.php',
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
              var mostrar =   0;
              console.log("datos recogidos");
            }
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
        
        }


        function guardar_parametro()
        {
          setTimeout("$('.ocultar').hide();", 3000);
          var datos= $('#form_parametro').serialize();
          datos += "&opcion=" + encodeURIComponent('registro_parametro');
          console.log(datos);
          $.ajax({
            url: '/Fondo_Catolica/Administrador/controlador/ctrl_parametros.php',
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
              var mostrar = '<div class="row ocultar">'+
                              '<div class="col s12 m12 l12">'+
                                '<div class="card #43a047 green darken-1">'+
                                  '<div class="card-content white-text">'+                                    
                                    '<p> Parametro Actualizado! </p>'+
                                  '</div>'+                                  
                                '</div>'+
                              '</div>'+
                            '</div>';   
              console.log("hecho bd");
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