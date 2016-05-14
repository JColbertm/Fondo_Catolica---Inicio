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
          llenar_imagenes();

          //$(".btncargar").on('click', cargar_imagen);
    	 });

        function llenar_imagenes(){

          var m = "&opcion=" + encodeURIComponent('cargarimagenes');
          console.log(m);
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

        function cargar_imagen(){     
          var m = $('.form_imagen').serialize();
          m += "&opcion=" + encodeURIComponent('cargaimagen');
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