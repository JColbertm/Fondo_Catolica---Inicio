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
          llenar_imagenes();
          $('#cierre_sesion').on('click', function()
          {
            cerrar_sesion();            
          });
          //$(".btncargar").on('click', cargar_imagen1);
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
                window.location="/Fondo_Catolica/Administrador/cambiopassa.php"; 
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

        function llenar_imagenes(){

          var m = "&opcion=" + encodeURIComponent('cargarimagenes');
          $.ajax({
            url: '/Fondo_Catolica/Administrador/controlador/cargar_imagen.php',
            type: 'POST',
            data: m
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
            if(t==1)
            {
              console.log("success");
            }
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
           
        }

        function cargar_imagen1(){     
          var m = $('.form_imagen').serialize();
          m += "&opcion=" + encodeURIComponent('imagen1');
          console.log(m);
          $.ajax({
            url: '/Fondo_Catolica/Administrador/controlador/data_imagen.php',
            type: $('.form_imagen').attr('method'),
            data: m
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
            if(t==1)
            {
              console.log("success");
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

  <div class="row">
    <div class="col offset-l1 l10">
      
      <?php 
        require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Administrador/Imagen/panelimagen.php";
      ?>

    </div>
  </div>

<!--  Llamada al pie de pagina -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/footer.php";
 	?>

</body>
</html>