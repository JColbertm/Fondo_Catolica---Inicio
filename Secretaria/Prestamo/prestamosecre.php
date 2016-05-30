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
      <script type="text/javascript" src="/Fondo_Catolica/Secretaria/Prestamo/prestamo_js/prestamos.js"></script>
      <script type="text/javascript">
      	$(document).ready(function(){
      		$('.slider').slider();
          $('.modal-trigger').leanModal();
          $(".button-collapse").sideNav();
          $('#ci-rp').on('change', buscar_usuario);
          $('#ci-garante-rp').on('change', buscar_garante);
          buscar_teclado();
          $('#cierre_sesion').on('click', function()
          {
            window.location="/Fondo_Catolica/index.php"; 
          });
    	});
      function buscar_usuario(){
      var n = $('#ci-rp').val();
      if(n.length>=5){
            console.log(n);
            var o = "a="+encodeURIComponent(n)+"&opcion="+ encodeURIComponent('buscar_datos_socio');//{a: n, opcion:'buscar'};
            console.log(o);
            
              $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);
                  var ci_ga=resp.ci;
                    var nombre_ga=resp.nombre+" "+resp.nombre2;
                    var apellido_ga=resp.apellido_p+" "+resp.apellido_m;
                  $("#nombres-rp").val(nombre_ga);
                  $("#apellidos-rp").val(apellido_ga);
                  $("#ci-rp").val(ci_ga);
                  $("#direccion-rp").val(resp.direccion);
                  $("#celular-rp").val(resp.celular);
                  $("#depar-ucb-rp").val(resp.departamento);
                  $("#interno-rp").val(resp.interno);
                  $("#correo-rp").val(resp.correos);
                  salario();
            });
          }
            }
            function buscar_garante(){
      var n = $('#ci-garante-rp').val();
      if(n.length>=5){
            console.log(n);
            var o = "a="+encodeURIComponent(n)+"&opcion="+ encodeURIComponent('buscar_garante');//{a: n, opcion:'buscar'};
            console.log(o);
            
              $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);
                    var ci_ga=resp.ci;
                    var nombre_ga=resp.nombre+" "+resp.nombre2;
                    var apellido_ga=resp.apellido_p+" "+resp.apellido_m;
                  console.log(nombre_ga);
                  console.log(apellido_ga);
                  $("#nombre-garante-rp").val(nombre_ga);
                  $("#apellido-garante-rp").val(apellido_ga);
                  $("#ci-garante-rp").val(ci_ga);
                  var fd=$('#nombres-rp').val();
                  console.log(fd);
            });
          }
            }
           function registrar_prestamo(){
            //var ci=$("#ci-rp").val();
            var ci=1;
            var cantidad=$("#cantidad-rp").val();
            var literal=$("#literal-rp").val();
            var meses=$("#plazo-mes-rp").val();
            var porcentaje=$("#porcentaje-rp").val();
            //var garante=$("#ci-garante-rp").val();
            var garante=2;
            var registrador=2;
            var numero_cheque=$("#nu-cheque-rp").val();
            var o = "opcion="+ encodeURIComponent('registrar_prestamo')+"&ci="+ encodeURIComponent(ci)+"&cantidad="+ encodeURIComponent(cantidad)+"&literal="+ encodeURIComponent(literal)+"&meses="+ encodeURIComponent(meses)+"&porcentaje="+ encodeURIComponent(porcentaje)+"&garante="+ encodeURIComponent(porcentaje)+"&garante="+ encodeURIComponent(garante)+"&registrador="+ encodeURIComponent(registrador)+"&numero_cheque="+ encodeURIComponent(numero_cheque);
            console.log(o);

          $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
          }).done(function(data) {
            var resp = $.parseJSON(data);
            console.log(data);
            console.log(resp);
            var t= resp.resp;
            

       
          });
           }
    function buscar_teclado(){
           o = "&opcion=" + encodeURIComponent('tabla_llena');
            console.log(o);

          $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>N°</th><th>Prestamo</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                    html+='<tr onclick="mostrar_datos(this)"><td>'+resp[i].idPrestamo+'</td><td>'+resp[i].idUsuario+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';

                  $('#resultado2').html(html);
                  $('#resultado3').html(html);

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
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/barramenusecre.php";
 	?>
<!--  llamada al menu de botones del lado izquierdo -->
	
<!--  Creacion del contenido del index -->
	<br><br>
	<div class="row">

		<div class="col offset-m1 m10 s12">
			<?php
				include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Prestamo/panelespre.php";
			?>		
		</div>

	</div>

<!--  Llamada al pie de pagina -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/footer.php";
 	?>


</body>
</html>















