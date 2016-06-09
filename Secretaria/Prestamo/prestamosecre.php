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
            $('.tooltipped').tooltip({delay: 50});
    
            //porcentaje actual
            interes();
            //
          $('#boton_aceptar').prop('disabled', true);//bloqueo boton del boton aceptar_simulacion modal
          $('#boton_registrar').hide();//ocultar boton registrar
          $('#boton_registrar_sol').hide();//ocultar boton registrar solicitud89
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
          //funciones para buscar garante por ci nombre
          $('#ci-garante-rp').on('change', buscar_garante);
          $('#nombre-garante-rp').on('keyup', buscar_garante_nombre);
          //cuando se cambie parametros ya calculados, se borrara todo lo calculado previamente
          $('#simu_pres_mes').on('keyup', resetear_simulacion);
          $('#simu_pres_monto').on('keyup', resetear_simulacion);
          $('#simu_ci').on('keyup', resetear_simulacion);

          $('#ci-garante-sp').on('change', buscar_garante_sol);
          buscar_prestamos();
          buscar_solicitudes();
          $('#cierre_sesion').on('click', function()
          {
            cerrar_sesion();            
          });

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
                window.location="/Fondo_Catolica/Secretaria/cambiopasss.php"; 
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

      
       
      function buscar_usuario(){
      var ci = $('#ci-rp').val();
      if(ci.length>=5){
            console.log(ci);
            var o = "ci="+encodeURIComponent(ci)+"&opcion="+ encodeURIComponent('buscar_datos_socio');//{a: n, opcion:'buscar'};
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
            //verificacion garante
            function buscar_garante(){
            setTimeout("$('.ocultar').hide();", 5000);
            var ci_garante = $('#ci-garante-rp').val();
            var aporte = $('#aporte-rp').val();
            var o = "ci="+encodeURIComponent(ci_garante)+"&opcion="+ encodeURIComponent("buscar_garante")+"&aporte_pres="+ encodeURIComponent(aporte);
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
                if(alert==2){
                  var html='<div id="card-alert" class="card green lighten-5 ocultar"><div class="card-content green-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Garante Aceptado!</div></p></div></div>';
                 
                  $('#mensa_verif_garante').html(html);
                    var ci_ga=resp.ci;
                    var nombre_ga=resp.nombre+" "+resp.nombre2;
                    var apellido_ga=resp.apellido_p+" "+resp.apellido_m;
                }else{
                  var html='<div id="card-alert" class="card red lighten-5 ocultar"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> No puede ser Garante </div></p></div></div>';
                  $('#mensa_verif_garante').html(html);
                    var ci_ga=resp.ci;
                    var nombre_ga="";
                    var apellido_ga="";
                }
                    
                  $("#nombre-garante-rp").val(nombre_ga);
                  $("#apellido-garante-rp").val(apellido_ga);
                  $("#ci-garante-rp").val(ci_ga);

            })
         }

        function buscar_garante_nombre(){
          
           var n = $('#nombre-garante-rp').val();
            console.log(n);
            var o = "a="+encodeURIComponent(n)+"&opcion="+ encodeURIComponent('garante_nombre');//{a: n, opcion:'buscar'};
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

                var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="highlight"><thead><tr><th>Carnet</th><th>Nombre</th><th>Apellido</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                    html+='<tr onclick="mostrar_opciones(this)"><td>'+resp[i].ci+'</td><td>'+resp[i].nombre+'</td><td>'+resp[i].apellido+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';

                  $('#sugerencias').html(html);

              })
              .fail(function() {
                console.log("error");
              })
        }
        function mostrar_opciones(f){

              ci_opcion = $(f).find('td:eq(0)').text();
              nombre_opcion = $(f).find('td:eq(1)').text();
              apellido_opcion = $(f).find('td:eq(2)').text();
              
              
              $('#ci-garante-rp').val(ci_opcion);
              $('#nombre-garante-rp').val(nombre_opcion);
              $('#apellido-garante-rp').val(apellido_opcion);  
              buscar_garante();  
          
        }
        function buscar_garante_sol(){
              setTimeout("$('.ocultar').hide();", 5000);
            var ci_garante = $('#ci-garante-sp').val();
            var aporte = $('#aporte-sp').val();
            var o = "ci="+encodeURIComponent(ci_garante)+"&opcion="+ encodeURIComponent("buscar_garante")+"&aporte_pres="+ encodeURIComponent(aporte);
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
                // $('#cantidad-sp').val(resp[0].cantidad_sol);
                var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>N°</th><th>Prestamo</th><th>Ci</th><th>Nombres</th><th>Apellidos</th><th>Estado</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                     html+='<tr onclick="mostrar_solicitud(this)"><td>'
                     +resp[i].idSolicitud+'</td><td>'
                     +resp[i].cod_form_solpres+'</td><td>'
                     +resp[i].ci+'</td><td>'
                     +resp[i].nombre+' '+resp[i].nombre2+'</td><td>'
                     +resp[i].apellido_p+' '+resp[i].apellido_m+'</td><td>'
                     +resp[i].estado_sol+'</td></tr>';
                     console.log(resp[i].estado_sol);
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
              idSolicitud_p=$(f).find('td:eq(0)').text();
              cod_form_solpres_p = $(f).find('td:eq(1)').text();              
              $('#num-sp').val(cod_form_solpres_p);

              var o = "a="+encodeURIComponent(idSolicitud_p)+"&opcion="+ encodeURIComponent('buscar_datos_solicitud_id');//{a: n, opcion:'buscar'};
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
                  $("#cantidad-sp").val(resp.cantidad_pres);
                  $("#plazo-mes-sp").val(resp.meses);
                  $("#porcentaje-sp").val(resp.porcentaje);
                  $('#aporte-sp').val(resp.monto_aporte);
                  $('#ci-garante-sp').val(resp.ci_garante);
                  $('#nombre-garante-sp').val(resp.nombres_garante);
                  $('#apellido-garante-sp').val(resp.apellidos_garante);
                  $('#ganado-sp').val(resp.total_ganado);
                  $('#liquido-sp').val(resp.liquido_pagable);
                  
                  
            });
          

          }
          function buscar_garante_solicitud(){
            setTimeout("$('.ocultar').hide();", 5000);
            var ci_garante = $('#ci-garante-sp').val();
            var aporte = $('#aporte-sp').val();
            var o = "ci="+encodeURIComponent(ci_garante)+"&opcion="+ encodeURIComponent("buscar_garante")+"&aporte_pres="+ encodeURIComponent(aporte);
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
                if(alert==2){
                  var html='<div id="card-alert" class="card green lighten-5 ocultar"><div class="card-content green-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Garante Aceptado!</div></p></div></div>';
                 
                  $('#mensa_verif_garante_sol').html(html);
                    
                }else{
                  var html='<div id="card-alert" class="card red lighten-5 ocultar"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> No puede ser Garante </div></p></div></div>';
                  $('#mensa_verif_garante_sol').html(html);
                }

            });
                      }
            function revision_prestamo_solicitud(){
              buscar_garante_solicitud()
              var ci=$('#ci-sp').val();
            var monto=$('#cantidad-sp').val();
            var meses=$('#plazo-mes-sp').val();
            var o = "opcion="+ encodeURIComponent('buscar_paramtros')+"&ci="+encodeURIComponent(ci);
            console.log(o);
              $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
              var resp = $.parseJSON(data2);
          //fomula cuotas mensuales: M = P*(J/(1-(1+J)-N)).
          // M = cuotas mensuales
          // P = principal, que significa el importe de dinero prestado.
          // J = tasa de interés efectiva. Ten en cuenta que generalmente no es la tasa de interés anual, mira más abajo para obtener una explicación.
          // N = número total de pagos
          var j=resp.interes/12;
          var cuota_prestamo=(monto*(j/(1-Math.pow(1+j,-meses)))).toFixed(2);
          console.log(cuota_prestamo);

          if(monto<=resp.prestamo_max){
            if('0'+meses<=resp.max_meses){
                if(cuota_prestamo<=resp.cuota_maxima){
                    $("#boton_registrar_sol").show();
                  }else{
                    var alerta='<div id="card-alert" class="card red lighten-5 ocultar_revision"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> * Se supero el maximo de couta permitido '+resp.cuota_maxima+' bs</div></p></div></div>';
                $('#alerta_revision_sol').html(alerta);
                $('#alerta_revision_sol').show();
                  }
            }else{
              var alerta='<div id="card-alert" class="card red lighten-5 ocultar_revision"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center">* Plazo maximo hasta '+resp.max_meses+' meses</div></p></div></div>';
                $('#alerta_revision_sol').show();
                $('#alerta_revision_sol').html(alerta);
                              console.log(alerta);

            }
          }else{
            var alerta='<div id="card-alert" class="card red lighten-5 ocultar_revision"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center">* El monto excede a lo permitido '+resp.prestamo_max+' bs</div></p></div></div>';
                $('#alerta_revision_sol').show();
                $('#alerta_revision_sol').html(alerta);
                              console.log(alerta);
          }
              })
            }
            function enviar_prestamo_sol(){
            setTimeout("$('.ocultar').hide();", 5000);
            var datos ="opcion=" + encodeURIComponent('estado_enviado')+"&id=" + encodeURIComponent(idSolicitud_p);
            console.log(datos);

          $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: datos
          }).done(function(data) {
            var resp = $.parseJSON(data);
            console.log(data);
            console.log(resp);
            if(resp=1){
          var html='<div id="card-alert" class="card green lighten-5 ocultar"><div class="card-content green-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Enviado!</div></p></div></div>';  
          $('#mensaje_registrado_sol').html(html);
          $("#FormPrestamo_reg_sol")[0].reset();
          }else{
            var html='<div id="card-alert" class="card red lighten-5 ocultar"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center">No se pudo Enviar!</div></p></div></div>';  
          $('#mensaje_registrado_sol').html(html);
          }

       
          });
           }
     function enviar_prestamo_por_terceros(){
             setTimeout("$('.ocultar').hide();", 5000);
            var datos= $('#FormPrestamo_reg').serialize();
            datos +="&opcion=" + encodeURIComponent('enviar_solicitud_prestamo');
            console.log(o);
            console.log(datos);
          $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: datos
          }).done(function(data) {
            var resp = $.parseJSON(data);
            if(resp==true){
            $("#FormPrestamo_reg")[0].reset();
          var html='<div id="card-alert" class="card green lighten-5 ocultar"><div class="card-content green-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Prestamo Enviado a Revision!</div></p></div></div>';  
          $('#mensaje_registrado').html(html);
          }else{
            var html='<div id="card-alert" class="card red lighten-5 ocultar"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Por favor llene los espacios requeridos</div></p></div></div>';  
          $('#mensaje_registrado').html(html);
          }

       
           });
           }
     function simular_pres(){
            setTimeout("$('.ocultar_alerta').hide();", 5000);
            var ci=$('#simu_ci').val();
            var monto=$('#simu_pres_monto').val();
            var meses=$('#simu_pres_mes').val();
            var o = "opcion="+ encodeURIComponent('buscar_paramtros')+"&ci="+encodeURIComponent(ci);
              $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
              var resp = $.parseJSON(data2);
          //fomula cuotas mensuales: M = P*(J/(1-(1+J)-N)).
          // M = cuotas mensuales
          // P = principal, que significa el importe de dinero prestado.
          // J = tasa de interés efectiva. Ten en cuenta que generalmente no es la tasa de interés anual, mira más abajo para obtener una explicación.
          // N = número total de pagos
          var j=resp.interes/12;
          var cuota_prestamo=(monto*(j/(1-Math.pow(1+j,-meses)))).toFixed(2);
          console.log(cuota_prestamo);
          console.log(meses);
          console.log(resp.max_meses);
          var mes=+'0'+meses;
          console.log(mes);
          if(monto<=resp.prestamo_max)
          {
                if(mes<=resp.max_meses)
                {
                    if(cuota_prestamo<=resp.cuota_maxima)
                    {    
                        $('#alerta_simulacion').hide();
                        $('#simu_pres_interes').val(resp.interes*100);
                        $('#simu_pres_cuota').val(cuota_prestamo);
                        $("#boton_aceptar").removeAttr("disabled");
                        $("#mostrar_cal").show();
                    }else{
                        var alerta='<div class="ocultar_alerta">* Se supero el maximo de couta permitido '+resp.cuota_maxima+' bs</div>';
                        $('#alerta_simulacion').show();
                        $('#alerta_simulacion').html(alerta);
                      }
                }else{
                  var alerta='* Plazo maximo hasta '+resp.max_meses+' meses';
                    $('#alerta_simulacion').show();
                    $('#alerta_simulacion').html(alerta);
                                  console.log(alerta);

                }
            }else{
                var alerta='* El monto excede a lo permitido '+resp.prestamo_max+' bs';
                    $('#alerta_simulacion').show();
                    $('#alerta_simulacion').html(alerta);
                                  console.log(alerta);
                    }
              })
            }
      function datos_simulacion(){
        $('#ci-rp').val($('#simu_ci').val());
        buscar_usuario();
        $('#cantidad-rp').val($('#simu_pres_monto').val());
        $('#plazo-mes-rp').val($('#simu_pres_mes').val());
        $('#porcentaje-rp').val($('#simu_pres_interes').val());

      }
      function resetear_simulacion(){
        $("#boton_aceptar").prop("disabled", true);
        $("#mostrar_cal").hide();
        $('#simu_pres_interes').val("");
        $('#simu_pres_cuota').val("");

      }
      function revision_prestamo(){
            setTimeout("$('.ocultar_revision').hide();", 5000);
            if($('#ci-rp').val().length > 5){
            if($('#cantidad-rp').val().length > 1){
            if($('#plazo-mes-rp').val().length > 0){
            if($('#ci-garante-rp').val().length > 5){
            buscar_garante();
            var ci=$('#ci-rp').val();
            var monto=$('#cantidad-rp').val();
            var meses=$('#plazo-mes-rp').val();
            var o = "opcion="+ encodeURIComponent('buscar_paramtros')+"&ci="+encodeURIComponent(ci);
            console.log(o);
              $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
              var resp = $.parseJSON(data2);
          //fomula cuotas mensuales: M = P*(J/(1-(1+J)-N)).
          // M = cuotas mensuales
          // P = principal, que significa el importe de dinero prestado.
          // J = tasa de interés efectiva. Ten en cuenta que generalmente no es la tasa de interés anual, mira más abajo para obtener una explicación.
          // N = número total de pagos
          var j=resp.interes/12;
          var cuota_prestamo=(monto*(j/(1-Math.pow(1+j,-meses)))).toFixed(2);
          console.log(cuota_prestamo);

          if(monto<=resp.prestamo_max){
            if('0'+meses<=resp.max_meses){
                if(cuota_prestamo<=resp.cuota_maxima){
                  $('#ci-rp').prop('readonly', true);
                  $('#cantidad-rp').prop('readonly', true);
                  $('#plazo-mes-rp').prop('readonly', true);
                  $('#ci-garante-rp').prop('readonly', true);
                  $('#nombre-garante-rp').prop('readonly', true);
                  $('#apellido-garante-rp').prop('readonly', true);

                    $('#sugerencias').hide();
                    $('#alerta_revision').hide();
                    $('#boton_revision').hide();
                    $("#boton_registrar").show();
                  }else{
                    var alerta='<div id="card-alert" class="card red lighten-5 ocultar_revision"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> * Se supero el maximo de couta permitido '+resp.cuota_maxima+' bs</div></p></div></div>';
                $('#alerta_revision').html(alerta);
                $('#alerta_revision').show();
                  }
            }else{
              var alerta='<div id="card-alert" class="card red lighten-5 ocultar_revision"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center">* Plazo maximo hasta '+resp.max_meses+' meses</div></p></div></div>';
                $('#alerta_revision').show();
                $('#alerta_revision').html(alerta);
                              console.log(alerta);

            }
          }else{
            var alerta='<div id="card-alert" class="card red lighten-5 ocultar_revision"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center">* El monto excede a lo permitido '+resp.prestamo_max+' meses</div></p></div></div>';
                $('#alerta_revision').show();
                $('#alerta_revision').html(alerta);
                              console.log(alerta);
          }
              })
            }else{
              Materialize.toast('Ingrese un Ci de garante valido', 4000, 'rounded');
            }}else{
              Materialize.toast('Ingrese plazo en meses', 4000, 'rounded');
            }}else{
              Materialize.toast('Ingrese cantidad de prestamo', 4000, 'rounded');
            }}else{
              Materialize.toast('Ingrese el Ci del socio', 4000, 'rounded');
            }
      }
      function interes(){
        var interes='opcion='+ encodeURIComponent("buscar_interes");
        $.ajax({
          url:'prestamo_php/prestamo_socio.php',
          type:'POST',
          data:interes

        }).done(function(data){
          var porcentaje=$.parseJSON(data);
          console.log(porcentaje);
          $('#porcentaje-rp').val(porcentaje);
        });
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















