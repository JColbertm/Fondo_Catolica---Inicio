<?php
@session_start();
  if (isset($_SESSION['ideusuario']))
  {
  date_default_timezone_set('America/La_Paz');

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
      <script type="text/javascript" src="/Fondo_Catolica/gral_php/validadores.js"></script>

      <script type="text/javascript">
      	$(document).ready(function(){ 
      
          
        $('#formRealizarPrestamo').hide(); 
            $('.tooltipped').tooltip({delay: 50});
    
            //porcentaje actual
            interes();
            //
          $('#boton_aceptar').prop('disabled', true);//bloqueo boton del boton aceptar_simulacion modal
          $('#cheque').hide();//Ocultamos input de cheque solprestamo.php
          $('#botones_envio').hide();//ocultar boton registrar
          $('#boton_registrar_sol').hide();//ocultar boton registrar solicitud89
          var altura = $('#botones-circulares').offset().top=950;
          $(window).on('scroll', function(){
            
            if ( $(window).scrollTop() > altura ){
              $('#botones-circulares').addClass('menu-fixed');
              $('#boton-circular').addClass('menu-fixed');
            } else {
              $('#botones-circulares').removeClass('menu-fixed');
              $('#boton-circular').removeClass('menu-fixed');
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
          buscar_prestamos_seguimiento();
          buscar_prestamos_cancelar();
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
            if($('#nu-cheque-sp').val().length > 1){
            $('#imprimir_boton').show();
            var monto=$('#cantidad-sp').val();
            var meses=$('#plazo-mes-sp').val();
            var porc=$('#porcentaje-sp').val();
            var j=(porc/100)/12;
          var cuota_prestamo=(monto*(j/(1-Math.pow(1+j,-meses)))).toFixed(2);
            setTimeout("$('.ocultar').hide();", 5000);
            var datos= $('#FormPrestamo_reg_sol').serialize();
            datos +="&opcion=" + encodeURIComponent('registrar_prestamo')+"&cuota_pres=" + encodeURIComponent(cuota_prestamo);
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
            if(resp.resultados==true){
              
                $('#boton_registrar').prop('disabled', true);


              var boton='<a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="top" target="_blank" href="/Fondo_Catolica/tcpdf/too/Prestamo.php?idprestamo_im='+resp.idpres+'" data-delay="50" data-tooltip="Imprimir"><i class="fa fa-print"></i></a>';
          $('#imprimir_boton').html(boton);
          $("#FormPrestamo_reg_sol")[0].reset();
          var html='<div id="card-alert" class="card green lighten-5 ocultar"><div class="card-content green-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Prestamo Registrado!</div></p></div></div>';  
          $('#mensaje_registrado').html(html);
          }else{
            var html='<div id="card-alert" class="card red lighten-5 ocultar"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Por favor llene los espacios requeridos</div></p></div></div>';  
          $('#mensaje_registrado').html(html);
          }

       
          });
        }else{
              Materialize.toast('Ingrese numero de cheque valido', 4000, 'rounded');
          }
           
          }
    function buscar_prestamos_cancelar(){
                  o = "&opcion=" + encodeURIComponent('tabla_prestamos_cancelacion');
          $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                var html = '<div style="height: 200px; overflow-y:scroll;" ><table class="responsive-table highlight"><thead><tr><th>N°</th><th>Prestamo</th><th>Ci</th><th>Nombre(s)</th><th>Apellido(s)</th><th>Estado</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                   html+='<tr onclick="mostrar_datos_cancelar(this)"><td>'
                   +resp[i].idPrestamo+'</td><td>'
                   +resp[i].cod_form_pres+'</td><td>'
                   +resp[i].ci+'</td><td>'
                   +resp[i].nombre+' '+resp[i].nombre2+'</td><td>'
                   +resp[i].apellido_p+' '+resp[i].apellido_m+'</td><td>'
                   +resp[i].estado+'</td><td style="display:none">'
                   +resp[i].cuota_pres+'</td><td style="display:none">'
                   +resp[i].porcentaje+'</td><td style="display:none">'
                   +resp[i].cantidad+'</td><td style="display:none">'
                   +resp[i].meses+'</td><td style="display:none">'
                   +resp[i].fecha+'</td><td style="display:none">'
                   +resp[i].ci_ga+'</td><td style="display:none">'
                   +resp[i].nombre_ga+' '+resp[i].nombre2_ga+'</td><td style="display:none">'
                   +resp[i].apellido_p_ga+' '+resp[i].apellido_m_ga+'</td><td style="display:none">'
                   +resp[i].ahorro+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';
                  $('#resultado2').html(html);
              })
              .fail(function() {
                console.log("error");
              })
         event.preventDefault();
                }
function mostrar_datos_cancelar(f){

              idpres_can=$(f).find('td:eq(0)').text();
              num_pres_can=$(f).find('td:eq(1)').text();
              ci_can_can = $(f).find('td:eq(2)').text();
              nombre_can = $(f).find('td:eq(3)').text();
              apellido_can = $(f).find('td:eq(4)').text();
              cuotas_pre_can = $(f).find('td:eq(6)').text();
              porcentaje_can = $(f).find('td:eq(7)').text();
              cantidad_can = $(f).find('td:eq(8)').text();
              meses_can = $(f).find('td:eq(9)').text();
              fecha_can = $(f).find('td:eq(10)').text();
              ci_ga_can = $(f).find('td:eq(11)').text();
              nom_ga_can = $(f).find('td:eq(12)').text();
              ape_ga_can = $(f).find('td:eq(13)').text();
              ahorro_can = $(f).find('td:eq(14)').text();

               var fe = new Date(fecha_can);
               var dia = fe.getDate()+1;
               var mes = 11-fe.getMonth();
               var ano = fe.getFullYear();
  
               var fe_actual=new Date();
               var dia_ac = fe_actual.getDate();
               var mes_ac = fe_actual.getMonth()+1;
               var ano_ac = fe_actual.getFullYear();
            
               var resto_ano=ano_ac-ano;
               if(resto_ano==0){
                var mul_mes=0;
               var meses_pagar=mes_ac-fe.getMonth();

               console.log(meses_pagar);
               }else{
               var mul_mes=resto_ano*12;
               var meses_pagar=mul_mes-mes_ac+1+mes;
               console.log(meses_pagar);
               
             }
             var amorti=0;
               var cant=cantidad_can;
               var to_inte=0;
               var to_cuota=0;
               for(var i=0;i<=meses_pagar;i++){
              var monto=(cant-amorti).toFixed(2);
              var inter=(monto*0.01).toFixed(2);
              amorti=(cuotas_pre_can-inter).toFixed(2);
              cant=monto;
              to_inte=eval(to_inte+'+'+inter);
              to_cuota=eval(to_cuota+'+'+cuotas_pre_can);
              }
              console.log(monto);
              console.log((meses_can-meses_pagar)*cuotas_pre_can);
              var ver_ahorro=ahorro_can*3;
              console.log(ahorro_can);
              console.log((ver_ahorro).toFixed(2));

              $('#ci-sc').val(ci_can_can);
              $('#nombres-sc').val(nombre_can);
              $('#apellidos-sc').val(apellido_can);
              $('#direccion-sc').val();
              $('#celular-sc').val();
              $('#depar-ucb-sc').val();
              $('#pagar-sc').val(monto);
             

}
    function buscar_prestamos_seguimiento(){
           o = "&opcion=" + encodeURIComponent('tabla_prestamos');
          $.ajax({
                url: 'prestamo_php/prestamo_socio.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                var html = '<div style="height: 200px; overflow-y:scroll;" ><table class="responsive-table highlight"><thead><tr><th>N°</th><th>Prestamo</th><th>Ci</th><th>Nombre(s)</th><th>Apellido(s)</th><th>Estado</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                   html+='<tr onclick="mostrar_datos_cuotas(this)"><td>'
                   +resp[i].idPrestamo+'</td><td>'
                   +resp[i].cod_form_pres+'</td><td>'
                   +resp[i].ci+'</td><td>'
                   +resp[i].nombre+' '+resp[i].nombre2+'</td><td>'
                   +resp[i].apellido_p+' '+resp[i].apellido_m+'</td><td>'
                   +resp[i].estado+'</td><td style="display:none">'
                   +resp[i].cuota_pres+'</td><td style="display:none">'
                   +resp[i].porcentaje+'</td><td style="display:none">'
                   +resp[i].cantidad+'</td><td style="display:none">'
                   +resp[i].meses+'</td><td style="display:none">'
                   +resp[i].fecha+'</td><td style="display:none">'
                   +resp[i].ci_ga+'</td><td style="display:none">'
                   +resp[i].nombre_ga+' '+resp[i].nombre2_ga+'</td><td style="display:none">'
                   +resp[i].apellido_p_ga+' '+resp[i].apellido_m_ga+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';
                  $('#resultado3').html(html);
              })
              .fail(function() {
                console.log("error");
              })
         event.preventDefault();
     }
     function mostrar_datos_cuotas(f)
          {
              idpres=$(f).find('td:eq(0)').text();
              num_pres=$(f).find('td:eq(1)').text();
              ci = $(f).find('td:eq(2)').text();
              nombre = $(f).find('td:eq(3)').text();
              apellido = $(f).find('td:eq(4)').text();
              cuotas_pre = $(f).find('td:eq(6)').text();
              porcentaje = $(f).find('td:eq(7)').text();
              cantidad = $(f).find('td:eq(8)').text();
              meses = $(f).find('td:eq(9)').text();
              fecha = $(f).find('td:eq(10)').text();
              ci_ga = $(f).find('td:eq(11)').text();
              nom_ga = $(f).find('td:eq(12)').text();
              ape_ga = $(f).find('td:eq(13)').text();
              console.log(fecha);
                              var d = new Date(fecha);
                               var curr_date = d.getDate()+1;
                               var curr_month = d.getMonth();
    var curr_year = d.getFullYear();
    var days = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiempre","Octubre","Noviembre","Diciembre"];

              var html=' <div align="right"><a class="btn-floating btn waves-effect waves-light red" href="/Fondo_Catolica/tcpdf/too/prestamo_nuevo.php?idprestamo_im='+idpres+'" target="_blank"><i class="fa fa-print"></i></a></div><div class="row"><p><strong>N°</strong> '+num_pres+'</p><p><strong>Garante</strong> '+nom_ga+' '+ape_ga+'</p><p><strong>Ci</strong> '+ci_ga+'</p><h4 align="center" style="background:gray;color:white;">PRÉSTAMO NUEVO</h4><h5 align="center">SOCIO: '+nombre+' '+apellido+'</h5><h5 align="center">CI:'+ci+'</h5><div align="center"><p>Préstamo realizado el '+curr_date+' de '+days[d.getMonth()]+' de '+curr_year+'</p></div></div> <div class="row"> <table class="responsive-table highlight pres_nuevo"><tr style="background:lightgray;"><th>Monto Capital Bs <br> '+cantidad+'</div></th><th></th><th>Tasa de interés <br> '+porcentaje+' %</th><th>Periodo de la<br>cuota en<br>meses <br> 12</th><th>Tasa<br>periodica<br>1,00%</th><th>N° de cuotas <br> '+meses+'</th><th></th></tr>'  
                html+='<tr><th>N° de Cuotas</th><th>Mes</th><th>Capital al<br>inicio del<br> periodo</th><th>Amortizacion</th><th>Intereses de<br>periodo</th><th>Cuota</th></tr>';
                var cuotas=1;
                var amorti=0;
                var cant=cantidad;
                var capital=0;
                var to_inte=0;
                var to_cuota=0;
                var pago_to=meses;
                 var jj=curr_month;
                var sumar_years=curr_year;
             for(var i=0;i<meses;i++){
              if(jj==12){jj=0;}
              var mes=days[jj];
              var monto=(cant-amorti).toFixed(2);
              var inter=(monto*0.01).toFixed(2);
              amorti=(cuotas_pre-inter).toFixed(2);
              if(i<5){
                if(jj==11){mes=mes+" "+sumar_years;}
                if(curr_month==0){sumar_years=eval(sumar_years);curr_month++;}else
                {if(jj==0){mes=mes+" "+eval(sumar_years+'+'+1);
                sumar_years=eval(sumar_years+'+'+1);}}
              html+='<tr><td style="text-align: center;">'+cuotas+'</td><td>'+mes+'</td><td style="text-align: center;">'+monto+'</td><td style="text-align: center;">'+amorti+'</td><td style="text-align: center;">'+inter+'</td><td style="text-align: center;">'+cuotas_pre+'</td></tr>';
              }else{
                if(jj==11){mes=mes+" "+sumar_years;}
                if(jj==0){mes=mes+" "+eval(sumar_years+'+'+1);
                sumar_years=eval(sumar_years+'+'+1);}
                var mul=pago_to-i;
                html+='<tr><td style="text-align: center;">'+cuotas+'</td><td>'+mes+'</td><td style="text-align: center;">'+monto+'</td><td style="text-align: center;">'+amorti+'</td><td style="text-align: center;">'+inter+'</td><td style="text-align: center;">'+cuotas_pre+'</td><td style="text-align: center;">'+(mul*cuotas_pre).toFixed(2)+'</td></tr>';
              }
              cuotas++;
              cant=monto;
              to_inte=eval(to_inte+'+'+inter);
              to_cuota=eval(to_cuota+'+'+cuotas_pre);
              jj++;
              }
              console.log(capital);
                html+='<br><tr><td></td><td></td><td><strong>Totales:</strong></td><td>'+cantidad+'</td><td>'+(to_inte).toFixed(2)+'</td><td>'+(to_cuota).toFixed(2)+'</td></tr>';
              html+='</table></div>';
              $('#tabla_cuotas').html(html);           
             
          

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
                var html = '<div style="height: 200px; overflow-y:scroll;"><table class="responsive-table highlight"><thead><tr><th>N°</th><th>Solicitud</th><th>Ci</th><th>Nombre(s)</th><th>Apellido(s)</th><th>Estado</th><th>Fecha Envio</th></tr></thead><tbody>';
            
                  for(i in resp){ 
                    if(resp[i].estado_sol=="Verificar"){
                     html+='<tr onclick="mostrar_solicitud(this)"><td>'
                     +resp[i].idSolicitud+'</td><td>'
                     +resp[i].cod_form_solpres+'</td><td>'
                     +resp[i].ci+'</td><td>'
                     +resp[i].nombre+' '+resp[i].nombre2+'</td><td>'
                     +resp[i].apellido_p+' '+resp[i].apellido_m+'</td><td class="chip #4db6ac teal lighten-2">'
                     +resp[i].estado_sol+'</td><td>'
                     +resp[i].fecha_sol+'</td></tr>';
                   }
                   if(resp[i].estado_sol=="Evaluado"){
                     html+='<tr onclick="mostrar_solicitud(this)" ><td>'
                     +resp[i].idSolicitud+'</td><td>'
                     +resp[i].cod_form_solpres+'</td><td>'
                     +resp[i].ci+'</td><td>'
                     +resp[i].nombre+' '+resp[i].nombre2+'</td><td>'
                     +resp[i].apellido_p+' '+resp[i].apellido_m+'</td><td class="chip #9ccc65 light-green lighten-1">'
                     +resp[i].estado_sol+'</td><td>'
                     +resp[i].fecha_sol+'</td></tr>';
                   }
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
              estado = $(f).find('td:eq(5)').text();
              if(estado=="Evaluado"){
                $('#imprimir_boton').hide();
                $('#boton_revision_sol').hide();
                $('#boton_registrar_sol').hide();
                $('#cheque').show();
                $('#botones_envio').show();
              }else{
                $('#botones_envio').hide();//ocultar boton registrar
                $('#boton_revision_sol').show();
                $('#imprimir_boton').hide();
                $('#cheque').hide();
              }            
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
          $('#mensaje_enviado').html(html);

         
          $('#carnet-actual-rp').prop('readonly', false);
            $('#sueldo-actual-rp').prop('readonly', false);
            $('#liquido-actual-rp').prop('readonly', false);
            $('#boton_actualizar').prop('disabled', false);
            $('#formRealizarPrestamo').hide(); 
            $('#FormDatosSueldo')[0].reset(); 
          }else{
            var html='<div id="card-alert" class="card red lighten-5 ocultar"><div class="card-content red-text "><p><i class="mdi-social-notifications"></i> <div align="center"> Por favor llene los espacios requeridos</div></p></div></div>';  
          $('#mensaje_registrado').html(html);
          }

       
           });
           }
     function simular_pres(){
            setTimeout("$('.ocultar_alerta').hide();", 10000);
            var ci=$('#carnet-actual-rp').val();
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
          var mes_max=resp.max_meses;
          if(meses==4 || meses==5 || meses==6 || meses==7 || meses==8 || meses==9){meses=+'0'+meses;}
          if(monto<=resp.prestamo_max)
          {
                if(meses<=mes_max)
                {
                    if(cuota_prestamo<=resp.cuota_maxima)
                    {    
                        $('#alerta_simulacion').hide();
                        $('#simu_pres_interes').val(resp.interes*100);
                        $('#simu_pres_cuota').val(cuota_prestamo);
                        $("#boton_aceptar").removeAttr("disabled");
                        $("#mostrar_cal").show();
                    }else{
                        var alerta='<div class="ocultar_alerta">* La cuota es mas del 30% del sueldo, cuota permitida '+resp.cuota_maxima+' bs</div>';
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
      function cancelar_solicitud(){
        $('#FormPrestamo_reg')[0].reset();
        $('#formRealizarPrestamo').hide(); 
        $('#FormDatosSueldo')[0].reset(); 
        $('#carnet-actual-rp').prop('readonly', false);
            $('#sueldo-actual-rp').prop('readonly', false);
            $('#liquido-actual-rp').prop('readonly', false);
            $('#boton_actualizar').prop('disabled', false);
      }
      function revision_prestamo(){
            setTimeout("$('.ocultar_revision').hide();", 5000);
            if($('#ci-rp').val().length >= 5){
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
          if(meses==4 || meses==5 || meses==6 || meses==7 || meses==8 || meses==9){meses=+'0'+meses;}

          if(monto<=resp.prestamo_max){
            if(meses<=resp.max_meses){
                if(cuota_prestamo<=resp.cuota_maxima){
                  $('#cantidad-rp').prop('readonly', true);
                  $('#plazo-mes-rp').prop('readonly', true);
                  $('#ci-garante-rp').prop('readonly', true);
                  $('#nombre-garante-rp').prop('readonly', true);
                  $('#apellido-garante-rp').prop('readonly', true);

                    $('#sugerencias').hide();
                    $('#alerta_revision').hide();
                    $('#boton_revision').hide();
                    $("#boton_enviar_rp").show();
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
      function actualizar_saldo(){
        if($('#carnet-actual-rp').val()!=""){
          if($('#sueldo-actual-rp').val()!=""){
          if($('#liquido-actual-rp').val()!=""){
        if($('#sueldo-actual-rp').val()>$('#liquido-actual-rp').val())
        {
        var datos='opcion='+ encodeURIComponent("actualizar_saldo")+'&carnet='+ encodeURIComponent($('#carnet-actual-rp').val())+'&sueldo='+ encodeURIComponent($('#sueldo-actual-rp').val())+'&liquido='+ encodeURIComponent($('#liquido-actual-rp').val());
        console.log(datos);
        $.ajax({
          url:'prestamo_php/prestamo_socio.php',
          type:'POST',
          data:datos

        }).done(function(data){
          var resp=$.parseJSON(data);
          console.log(resp);
          if(resp=1)
          {
          $('#boton_enviar_rp').hide();
          $('#boton_revision').show();
          $('#cantidad-rp').prop('readonly', false);
          $('#plazo-mes-rp').prop('readonly', false);
          $('#ci-garante-rp').prop('readonly', false);
          $('#nombre-garante-rp').prop('readonly', false);
          $('#apellido-garante-rp').prop('readonly', false);

            $('#ci-rp').val($('#carnet-actual-rp').val());
            $('#carnet-actual-rp').prop('readonly', true);
            $('#sueldo-actual-rp').prop('readonly', true);
            $('#liquido-actual-rp').prop('readonly', true);
            $('#boton_actualizar').prop('disabled', true);
              buscar_usuario();
            $('#formRealizarPrestamo').show(); 
            $('#simu_ci').val($('#carnet-actual-rp').val());
            $('#ci-rp').val($('#carnet-actual-rp').val());
          }
        });
      }else{
            Materialize.toast('Sueldo Liquido mayor a Total Ganado', 4000, 'rounded');
      }}else{
            Materialize.toast('Ingrese Liquido Pagable', 4000, 'rounded');
      }}else{
            Materialize.toast('Ingrese Total Ganado', 4000, 'rounded');
      }}else{
            Materialize.toast('Ingrese numero de Carnet', 4000, 'rounded');
      }
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















