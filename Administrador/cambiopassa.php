 <?php
@session_start();
  if (!isset($_SESSION['ideusuario']))
  
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
          	$('#modpass').on('click', function()
          	{
            	verfifica_pass($('#passact').val(),$('#newpass').val(),$('#confpass').val());            
          	});
    	});

    	function verfifica_pass(pass, nuevo, conf){
        setTimeout("$('.ocultar').hide();", 5000);
         var id = "password=" +encodeURIComponent(pass) ;
          id += "&opcion=" + encodeURIComponent('verifica');
          id += "&ide=" + encodeURIComponent('<?php echo $_SESSION['ideusuario']?>');
          
          $.ajax({
            url: '/Fondo_Catolica/gral_php/login.php',
            type: 'POST',
            data: id
          })
          .done(function(data) {
            console.log(data);
            var resp = $.parseJSON(data);            
            var t= resp.res; 
            if(t==1)
            {
              if(nuevo == conf)
              {
                cambiar_pass(nuevo, conf);
              }
              else
              {
                var sms = '<div class="row ocultar">'+
                              '<div class="col s12 offset-m3 m6">'+
                                '<div class="card #e53935 red darken-1">'+
                                  '<div class="card-content white-text">'+                                    
                                    '<p><i class="fa fa-thumbs-down" aria-hidden="true"></i> Nuevo Passord y Confirmar Passwords no coinciden!</p>'+
                                  '</div>'+                                  
                                '</div>'+
                              '</div>'+
                            '</div>';
                $('#mensaje').html(sms);  
              }
            }
            else
            {              
              var mostrar = '<div class="row ocultar">'+
                              '<div class="col s12 offset-m3 m6">'+
                                '<div class="card #e53935 red darken-1">'+
                                  '<div class="card-content white-text">'+                                    
                                    '<p><i class="fa fa-thumbs-down" aria-hidden="true"></i> Password Actual Incorrecto!</p>'+
                                  '</div>'+                                  
                                '</div>'+
                              '</div>'+
                            '</div>';
              $('#sms_wrong').html(mostrar);  
            }            
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
      }

    	function cambiar_pass()
    	{
    	  var id = "opcion=" + encodeURIComponent('cambiar_pass');
    	  	id += "&id_usu=" + encodeURIComponent('<?php echo $_SESSION['ideusuario']?>');
          id += "&nuevopass=" + encodeURIComponent($('#newpass').val());
          
          $.ajax({
            url: '/Fondo_Catolica/gral_php/login.php',
            type: 'POST',
            data: id
          })
          .done(function(data) {
            console.log(data);
            var resp = $.parseJSON(data);
            if(resp.resp==1)
            {
              var sms = '<div class="row ocultar">'+
                              '<div class="col s12 offset-m3 m6">'+
                                '<div class="card #43a047 green darken-1">'+
                                  '<div class="card-content white-text">'+                                    
                                    '<p><i class="fa fa-thumbs-up" aria-hidden="true"></i> Password Actualizado!</p>'+
                                  '</div>'+                                  
                                '</div>'+
                              '</div>'+
                            '</div>';
                $('#mensaje').html(sms);
              $('#newpass').val("");
              $('#confpass').val("");
              $('#passact').val(""); 
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
    require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Administrador/barramenuadmi.php";
 	?>
<!--  llamada al menu de botones del lado izquierdo -->
	
<!--  Creacion del contenido del index -->
	<br><br>
	<div class="row">

		<div class="col offset-m1 m10 col s12">
			<div class="card">
			    <div class="card-action">
			        <a>Cambio de Password</a>
			    </div>
			    <div class="card-content">
			    	<div class="row">
			    	<form class="col s12 form-horizontal" id="" method="POST">
	                    <div class="row">
	                      <div class="row">
                          <div class="col s12">
                            <div class="card #039be5 light-blue darken-1">
                              <div class="card-content white-text">
                                <span class="card-title"></span>
                                <center><i class="fa fa-info-circle prefix"></i> Cambie su password periodicamente para tener una mayor seguridad con su informaci&oacute;n.</center>
                              </div>                              
                            </div>
                          </div>
                        </div>
                        
	                    </div>
	                    <div class="row">
	                      <div class="input-field col m6 col offset-m3 col s12">
	                        <input id="passact" name="passact" type="password">
	                        <label><i class="fa fa-key" aria-hidden="true"></i> Password Actual:</label>
	                      </div>
	                    </div>
                      <div id="sms_wrong">
                                                
                      </div>
	                    <div class="row">
	                      <div class="input-field col m6 col offset-m3 col s12">
	                        <input id="newpass" name="newpass" type="password">
	                        <label><i class="fa fa-key" aria-hidden="true"></i> Nuevo Password:</label>
	                      </div>
	                    </div>
	                    <div class="row">
	                      <div class="input-field col m6 col offset-m3 col s12">
	                        <input id="confpass" name="confpass" type="password" class="validate">
	                        <label><i class="fa fa-key" aria-hidden="true"></i> Confirmar Password:</label>
	                      </div>
	                    </div>
                      <div id="mensaje">
                                                
                      </div>
	                </form>
	                <button class="waves-effect waves-light btn right" id="modpass" type="button"><i class="fa fa-wrench left"></i>Modificar</button> 
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















