<?php
  session_start();
  if (isset($_SESSION['tipousu'])) 
  {
    if ($_SESSION['tipousu']==1) 
    {
      header('Location: /Fondo_Catolica/Socio/indexsocio.php');
    }
    if ($_SESSION['tipousu']==2) 
    {
      header('Location: /Fondo_Catolica/Secretaria/indexsecre.php');
    }
    if ($_SESSION['tipousu']==3)
    {
      header('Location: /Fondo_Catolica/Administrador/indexadmin.php');
    }if ($_SESSION['tipousu']==4)
    {
      header('Location: /Fondo_Catolica/Socio/indexsocio.php');
    }
  }
  else
  {
   
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
      <script type="text/javascript" src="/Fondo_Catolica/gral_php/validadores.js"></script>
      <script type="text/javascript">
      	$(document).ready(function()
        {
      		$('.slider').slider();
          $('.modal-trigger').leanModal();
          $(".button-collapse").sideNav();
          $('#form_login').on('submit', inicio_sesion);
        });

         function inicio_sesion()
        {
          setTimeout("$('.ocultar').hide();", 3000);
          
          var datos= $('#form_login').serialize();
          datos += "&opcion=" + encodeURIComponent('inicio_sesion');
          console.log(datos);
          $.ajax({
            url: '/Fondo_Catolica/gral_php/login.php',
            type: $('#form_login').attr('method'),
            data: datos
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            
            console.log(resp);
            if (resp.res == 1)
            {
              setTimeout("$('#modallogin').closeModal();", 4000);
              var mostrar = '<div class="row ocultar">'+
                              '<div class="col s12 m12 l12">'+
                                '<div class="card #43a047 green darken-1">'+
                                  '<div class="card-content white-text">'+                                    
                                    '<p> Bienvenido! '+ resp.nom+' '+resp.app+' '+resp.apm+' </p>'+
                                  '</div>'+                                  
                                '</div>'+
                              '</div>'+
                            '</div>'; 

              if(resp.tipousu == 1)
              {
                window.location="/Fondo_Catolica/Socio/indexsocio.php"; 
              }
              if(resp.tipousu == 2)
              {
                window.location="/Fondo_Catolica/Secretaria/indexsecre.php"; 
              }
              if(resp.tipousu == 3)
              {
                window.location="/Fondo_Catolica/Administrador/indexadmin.php"; 
              }
              if(resp.tipousu == 4)
              {
                window.location="/Fondo_Catolica/Socio/indexsocio.php"; 
              }
                                     
            }
            else
            {
              var mostrar='<div class="row ocultar">'+
                              '<div class="col s12 m12 l12">'+
                                '<div class="card #e53935 red darken-1">'+
                                  '<div class="card-content white-text">'+                                    
                                    '<p> Usuario y/o Password incorrecto(s) </p>'+
                                  '</div>'+                                  
                                '</div>'+
                              '</div>'+
                            '</div>';
            }    
            $('#Mensaje_welcome').html(mostrar); 
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
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/barrasr.php";
 	?>
<!--  llamada al menu de botones del lado izquierdo -->
	
<!--  Creacion del contenido del index -->
	<br><br>
	<div class="row">

		<div class="col offset-m1 m2">
			<?php 
				require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/opcionesizq.php";
		 	?>			
		</div>

		<div class="col m8">
    <div id="muestra">
          
        </div>
		<div class="card">
           <div class="card-action">
              <a>Quienes Somos?</a>
            </div>
            <div class="card-content">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
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