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
          var usuario ='<?php echo $_SESSION['nombre'] ?>';
          var app ='<?php echo $_SESSION['apellidop'] ?>';
          var apm ='<?php echo $_SESSION['apellidom'] ?>';
          var $toastContent = $('<span><i class="fa fa-user" aria-hidden="true"></i> Bienvenida(o): '+usuario+' '+app+' '+apm+'</span>');
          Materialize.toast($toastContent, 8000);          
          //Para Cerrar la sesion
          $('#cierre_sesion').on('click', function()
          {
            cerrar_sesion();            
          });
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
      
<!--  llamada a la cabecera -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/head.php";
 	?>
<!--  llamada al menu de barra -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/barramenu.php";
 	?>
	
<!--  Creacion del contenido del index -->
	<br><br>
	<div class="row">

		<div class="col offset-m1 m10">

		<div class="card">
           <div class="card-action">
              <a>Movimientos</a>
            </div>
            <div class="card-content">
            <!--  CREACION DEL CONTENIDO -->
              <div class="row">
                <div class="col offset-m1 m5 s12">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <div class="slider">
                        <ul class="slides">
                          <li>
                            <img src="/Fondo_Catolica/Imagenes/color3.jpg"> <!-- random image -->
                            <div class="caption left-align">
                              <h4>Caja de Ahorros</h4>
                              <h5 class="light grey-text text-lighten-3">Informacion de su Caja de Ahorro.</h5>
                            </div>
                          </li>
                          <li>
                            <img src="/Fondo_Catolica/Imagenes/ima1.jpg"> <!-- random image -->
                            <div class="caption left-align">
                              <h4>Left Aligned Caption</h4>
                              <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><i class="fa fa-angle-up right"></i><h6>Informacion de su Caja de Ahorros</h6></span>
                      
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Mi Caja de Ahorros<i class="fa fa-times right"></i></span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <p><a href="#">Ver m&aacute;s...</a></p>
                    </div>
                  </div>
                </div>

                <div class="col m5 s12">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <div class="slider">
                        <ul class="slides">
                          <li>
                            <img src="/Fondo_Catolica/Imagenes/color2.jpeg"> <!-- random image -->
                            <div class="caption right-align">
                              <h4>Prestamos!</h4>
                              <h5 class="light grey-text text-lighten-3">Informacion de su Caja de Ahorro.</h5>
                            </div>
                          </li>
                          <li>
                            <img src="/Fondo_Catolica/Imagenes/ima2.jpg"> <!-- random image -->
                            <div class="caption right-align">
                              <h4>Left Aligned Caption</h4>
                              <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                            </div>
                          </li>                          
                        </ul>
                      </div>
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><i class="fa fa-angle-up right"></i><h6>Prestamos</h6></span>
                      
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Card Title<i class="fa fa-times right"></i></span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <p><a href="#">Ver m&aacute;s...</a></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col offset-m1 m5 s12">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <div class="slider">
                        <ul class="slides">
                          <li>
                            <img src="/Fondo_Catolica/Imagenes/color4.png"> <!-- random image -->
                            <div class="caption left-align">
                              <h4>Bien de Uso!</h4>
                              <h5 class="light grey-text text-lighten-3">Informacion de Bien de Uso</h5>
                            </div>
                          </li>
                          <li>
                            <img src="/Fondo_Catolica/Imagenes/ima3.jpg"> <!-- random image -->
                            <div class="caption left-align">
                              <h4>Left Aligned Caption</h4>
                              <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                            </div>
                          </li>                          
                        </ul>
                      </div>
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><i class="fa fa-angle-up right"></i><h6>Bienes de Uso</h6></span>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Card Title<i class="fa fa-times right"></i></span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <p><a href="#">Ver m&aacute;s...</a></p>
                    </div>
                  </div>
                </div>

                <div class="col m5 s12">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <div class="slider">
                        <ul class="slides">
                          <li>
                            <img src="/Fondo_Catolica/Imagenes/color6.png"> <!-- random image -->
                            <div class="caption right-align">
                              <h4>Promociones</h4>
                              <h5 class="light grey-text text-lighten-3">Informacion de Promociones.</h5>
                            </div>
                          </li>
                          <li>
                            <img src="/Fondo_Catolica/Imagenes/ima4.jpg"> <!-- random image -->
                            <div class="caption right-align">
                              <h4>Left Aligned Caption</h4>
                              <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                            </div>
                          </li>                          
                        </ul>
                      </div>
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><i class="fa fa-angle-up right"></i><h6>Promociones</h6></span>                      
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Card Title<i class="fa fa-times right"></i></span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <p><a href="#">Ver m&aacute;s...</a></p>
                    </div>
                  </div>
                </div>
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