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
      <!--  -->
      <link href="/Fondo_Catolica/materialize/css/estilos_fondo.css" rel="stylesheet">
      <script type="text/javascript" src="/Fondo_Catolica/materialize/jquery.min.js"></script>
      <script type="text/javascript" src="/Fondo_Catolica/materialize/js/materialize.min.js"></script>
      <script type="text/javascript" src="/Fondo_Catolica/Secretaria/Prestamo/prestamo_js/prestamos.js"></script>
      <script type="text/javascript">
      	$(document).ready(function(){
          // botones redondos estaticos "estilos_fondo.css"
          var altura = $('#botones-circulares').offset().top=750;
          $(window).on('scroll', function(){
            if ( $(window).scrollTop() > altura ){
              $('#botones-circulares').addClass('menu-fixed');
            } else {
              $('#botones-circulares').removeClass('menu-fixed');
            }
          });
          //fin estaticos
      		$('.slider').slider();
          $('.modal-trigger').leanModal();
          $(".button-collapse").sideNav();
          $('#ci-rp').on('change', buscar_usuario);
          $('#ci-garante-rp').on('change', buscar_garante);

          $('#ci-garante-sp').on('change', buscar_garante_sol);
          buscar_prestamos();
          buscar_solicitudes();

          buscar_teclado();
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
              setTimeout("$('.ocultar').hide();", 5000);
      var n = $('#ci-garante-rp').val();
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
                var alert=resp.alerta;
                console.log(alert);
                if(alert==2){
                  var html='<div id="card-alert" class="card green lighten-5 ocultar"><div class="card-content green-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Garante Aceptado!</div></p></div></div>';
                 
                  $('#mensa_verif_garante').html(html);
                }else{
                  var html='<div id="card-alert" class="card red lighten-5 ocultar"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> No puede ser Garante </div></p></div></div>';
                  $('#mensa_verif_garante').html(html);
                }
                    var ci_ga=resp.ci;
                    var nombre_ga=resp.nombre+" "+resp.nombre2;
                    var apellido_ga=resp.apellido_p+" "+resp.apellido_m;
                  $("#nombre-garante-rp").val(nombre_ga);
                  $("#apellido-garante-rp").val(apellido_ga);
                  $("#ci-garante-rp").val(ci_ga);
                  var f=$('#nombre-garante-rp').val();

            });
                      }
                      function buscar_garante_sol(){
              setTimeout("$('.ocultar').hide();", 5000);
      var n = $('#ci-garante-sp').val();
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
                var alert=resp.alerta;
                console.log(alert);
                if(alert==2){
                  var html='<div id="card-alert" class="card green lighten-5 ocultar"><div class="card-content green-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Garante Aceptado!</div></p></div></div>';
                 
                  $('#mensa_verif_garante_sol').html(html);
                }else{
                  var html='<div id="card-alert" class="card red lighten-5 ocultar"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> No puede ser Garante </div></p></div></div>';
                  $('#mensa_verif_garante_sol').html(html);
                }
                    var ci_ga=resp.ci;
                    var nombre_ga=resp.nombre+" "+resp.nombre2;
                    var apellido_ga=resp.apellido_p+" "+resp.apellido_m;
                  
                  $("#nombre-garante-sp").val(nombre_ga);
                  $("#apellido-garante-sp").val(apellido_ga);
                  $("#ci-garante-sp").val(ci_ga);
                  var f=$('#nombre-garante-sp').val();

            });
                      }
           function registrar_prestamo(){
            setTimeout("$('.ocultar').hide();", 5000);
            var datos= $('#FormPrestamo_reg').serialize();
            datos +="&opcion=" + encodeURIComponent('registrar_prestamo');
            console.log(o);
            console.log(datos);

          $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: datos
          }).done(function(data) {
            var resp = $.parseJSON(data);
            console.log(data);
            console.log(resp);
         $("#FormPrestamo_reg")[0].reset();
            if(resp==true){
          var html='<div id="card-alert" class="card green lighten-5 ocultar"><div class="card-content green-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Prestamo Registrado!</div></p></div></div>';  
          $('#mensaje_registrado').html(html);
          }else{
            var html='<div id="card-alert" class="card red lighten-5 ocultar"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Por favor llene los espacios requeridos</div></p></div></div>';  
          $('#mensaje_registrado').html(html);
          }

       
          });
           }
    function buscar_prestamos(){
           o = "&opcion=" + encodeURIComponent('tabla_prestamos');
          $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>N°</th><th>Solicitud</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                   html+='<tr onclick="mostrar_datos(this)"><td>'+resp[i].idPrestamo+'</td><td>'+resp[i].cod_form_pres+'</td></tr>';
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
     function buscar_solicitudes(){
           o = "&opcion=" + encodeURIComponent('tabla_solicitudes');
          $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(resp[0].cantidad_sol);
                // $('#cantidad-sp').val(resp[0].cantidad_sol);
                var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>N°</th><th>Prestamo</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                     html+='<tr onclick="mostrar_solicitud(this)"><td>'+resp[i].idSolicitud+'</td><td>'+resp[i].cod_form_solpres+'</td><td style="display:none">'+resp[i].idUsuario+'</td><td style="display:none">'+resp[i].cantidad_sol+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';
                  $('#tabla_solicitudes').html(html);
              })
              .fail(function() {
                console.log("error");
              })
         event.preventDefault();
     }
     function mostrar_solicitud(f)
          {
              idSolicitud_t= $(f).find('td:eq(0)').text();
              cod_form_solpres_t = $(f).find('td:eq(1)').text();
              idUsuario_t = $(f).find('td:eq(2)').text();
              cantidad = $(f).find('td:eq(3)').text();
              meses_t = $(f).find('td:eq(4)').text();
              porcentaje_t = $(f).find('td:eq(5)').text();
              idGarante_t = $(f).find('td:eq(6)').text();
              
              $('#num-sp').val(cod_form_solpres_t);
              $('#cantidad-sp').val(cantidad);
              $('#plazo-mes-sp').val(meses_t);
              $('#porcentaje-sp').val(porcentaje_t);
              $('#ci_Garante-sp').val(idGarante_t);

              var o = "a="+encodeURIComponent(idUsuario_t)+"&opcion="+ encodeURIComponent('buscar_datos_socio_id');//{a: n, opcion:'buscar'};
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
                  $("#nombres-sp").val(nombre_ga);
                  $("#apellidos-sp").val(apellido_ga);
                  $("#ci-sp").val(ci_ga);
                  $("#direccion-sp").val(resp.direccion);
                  $("#celular-sp").val(resp.celular);
                  $("#depar-ucb-sp").val(resp.departamento);
                  $("#interno-sp").val(resp.interno);
                  $("#correo-sp").val(resp.correos);
                  $('#aporte-sp').val(resp.total_ganado);
                  $('#ganado-sp').val(resp.liquido_pagable);
                  $('#liquido-sp').val(resp.monto_aporte);
                  $('#cantidad-sp').val(resp.cantidad);
                  $('#plazo-mes-sp').val(resp.meses);
                  $('#porcentaje-sp').val(resp.porcentaje);
                  
                  
            });
          

          }
     function simular_pres(){
          $("#mostrar_cal").show();

            var monto=$('#simu_pres_monto').val();
            var mes=$('#simu_pres_mes').val();
            console.log(monto);
            $('#simu_pres_interes').val(12);
            var monto1=monto/mes;
            var monto2=(monto/mes)*0.12;
            console.log(monto2,monto1);
            var sol=monto1+monto2;
            $('#simu_pres_cuota').val(sol.toFixed(2));

            }
      function datos_simulacion(){
        $('#cantidad-rp').val($('#simu_pres_monto').val());
        $('#plazo-mes-rp').val($('#simu_pres_mes').val());
        $('#porcentaje-rp').val($('#simu_pres_interes').val());

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















