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
          var $toastContent = $('<span><i class="fa fa-user-secret" aria-hidden="true"></i> Bienvenida(o): '+usuario+' '+app+' '+apm+'</span>');
          Materialize.toast($toastContent, 8000);
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
		<div class="col offset-m1 m10 s12">			
		  <div class="card">
        <div class="card-content">
              
          <!--  CONTENIDO DEL INDEX -->
            <div class="row">
            <!--  CONTENIDO PANEL PARAMETROS -->
              <div class="col offset-m1 m5 s12">
                <div class="card">
                  <div class="card-action">
                    <a>Parametros</a>
                  </div>
                  <div class="card-content">
                      
                    <table class="centered responsive-table">
                      <thead>
                        <tr>
                          <th>Nro.</th>
                          <th>Nombre</th>
                          <th>Parametro</th>
                          <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Cant. Meses</td>
                          <td>36</td>
                          <td>01/07/2015</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Cant. Aportes</td>
                          <td>5</td>
                          <td>02/08/2015</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Interes</td>
                          <td>1</td>
                          <td>09/10/2015</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                    
                </div>
              </div> 
              <!--  CONTENIDO PANEL DIRECTIVA -->
              <div class="col m5 s12">
                <div class="card">
                  <div class="card-action">
                    <a>Directiva</a>
                  </div>
                  <div class="card-content">

                    <table class="centered responsive-table">
                      <thead>
                        <tr>
                          <th>Nro.</th>
                          <th>Puesto</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Dir. Prestamo</td>
                          <td>Willy</td>
                          <td>Tenorio</td>
                          <td>01/07/2015</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Dir. Credito</td>
                          <td>Juan</td>
                          <td>Perez</td>
                          <td>02/08/2015</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Presidente</td>
                          <td>Maria</td>
                          <td>Alvarez</td>
                          <td>09/10/2015</td>
                        </tr>
                      </tbody>
                    </table>
                      
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