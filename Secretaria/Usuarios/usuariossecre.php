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
      <link href="/Fondo_Catolica/materialize/css/estilos_fondo.css" rel="stylesheet">
      <script type="text/javascript" src="/Fondo_Catolica/materialize/jquery.min.js"></script>
      <script type="text/javascript" src="/Fondo_Catolica/materialize/js/materialize.min.js"></script>
      <script type="text/javascript" src="/Fondo_Catolica/gral_php/validadores.js"></script>
      <script type="text/javascript">
      	$(document).ready(function(){

          // botones redondos estaticos "estilos_fondo.css"
          var altura = $('#test2').find('#botones-circulares').offset().top=750;
          $(window).on('scroll', function(){
            if ( $(window).scrollTop() > altura ){
              $('#test2').find('#botones-circulares').addClass('menu-fixed');
            } else {
              $('#test2').find('#botones-circulares').removeClass('menu-fixed');
            }
          });


      		$('.slider').slider();
          $('.modal-trigger').leanModal();
          $(".button-collapse").sideNav();
          $('select').material_select();
          $('#test4').find('#limpia').on('click', function()
          {
            $('label').removeClass('active');
            $('#test4').find('#formGenera').trigger("reset");
          });

           $('#test2').find('#limpia').on('click', function()
          {
            inicia_mes();
            $('label').removeClass('active');
            $('#test2').find('#formAfiliacion').trigger("reset");
          });

           $('#limpia').on('click', function()
          {
            $('label').removeClass('active');
            $('#formAfiliacion').trigger("reset");
          });

           $('#test5').find('#limpiaM').on('click', function()
          {
             $('#test5').find('#aporte').val('');
             $('#test5').find('#liquido').val('');
             $('#test5').find('#totalGanado').val('');
             $('#test5').find('#calendario-sp-2').val('');
          });


          $('#cierre_sesion').on('click', function()
          {
            cerrar_sesion();            
          });

          cargar_select();

          $('#test1').find('#institucion').on('change',function(){cargar_epc_H(1)});
          $('#test5').find('#institucion').on('change',function(){cargar_epc_H(5)});
          $('#test2').find('#institucion').on('change',function(){cargar_epc_H(2)});
        
          


  

         
          $('.crearAfiliado').on('click', crearAfiliado);
          $('.datepicker').pickadate({
            format: 'dd-mm-yyyy',
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
          });

          $('#test2').find('#modAfiliado').on('click',modificarAfiliado); 
          $('#test3').find('#elim_afiliado').on('click',abrir_eliminar);
          $('#test4').find('#guardaNP').on('click',guardaPassword);
          $('#test5').find('#historico').on('click',crearAfiliadoH);
          obtenerSolicitud();
          listar(1);
          listar(2);
          listar(3);



          $('.side-nav-inner').on('click', 'a', function(e){
              e.preventDefault();
             $('label').removeClass('active');
          })


         
    	verifica_sesion();
        });
        var idU;
        var epc=['Elija un departamento','epc 1','epc 2','epc 3','epc 4'];
        var depa=['Elija un departamento','derecho','pastoral','contabilidad','administracion','personal'];
        
        function cargar_epc_H(num){
          var html;
          if($('#test'+num+'').find('#institucion-sp').val()=='EPC')
          {
            html='<select name="depar-ucb-sp">';
            for(i=0; i<=4;i++)
            {
              html=html+'<option value="'+epc[i]+'" >'+epc[i]+'</option>';
            }
            html=html+'</select>';
            }


            if($('#test'+num+'').find('#institucion-sp').val()=='UCB')
          {
            html='<select name="depar-ucb-sp">';
            for(j=0; j<=5;j++)
            {
              html=html+'<option value="'+depa[j]+'" >'+depa[j]+'</option>';
            }
         
            html=html+'</select>';
            }
            $('#test'+num+'').find('#departamento').html(html);
            $('select').material_select();
        }
        function abrir_eliminar(){
          $('#test3').find('#modal1').openModal();

         

          $('#test3').find('#nombreModal').val($('#test3').find('#first_name').val());
          $('#test3').find('#carnetModal').val($('#test3').find('#ci').val());
          $('#test3').find('#institucionModal').val($('#test3').find('#institucion').val());
          $('#test3').find('#departamentoModal').val($('#test3').find('#depar-ucb-sp').val());

          $('#test3').find('#eliminar_afi').on('click',eliminarAfiliado);


        }
        function inicia_mes(){
          var mes;
            mes = ['Elija un mes', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            var html;
            html='<select name="mes-sp">';
              for(var i=0; i<=12; i++ )
              {
       
                html=html+'<option value="'+i+'">'+mes[i]+'</option>';

              }
            html=html+'</select>';
            $('#test2').find('#year').val('  ');              
            $('#test2').find('#select_mes').html(html);
            $('select').material_select();
        }
      function cargar_select(){

          var mes;
          var y;
          mes = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
          var f = new Date();
          var m =f.getMonth() +1;
          var y=f.getFullYear();
          var html;
          html='<select name="mes-sp">';
          
          if(m==12)
          {
            m=1;
            y=y+1;
          } 
          else{
            m=m+1;
          }
            for(var i=m; i<=12; i++ )
            {
              html=html+'                <option value="'+i+'">'+mes[i]+'</option>';
            }
          html=html+'                </select>';
          $('#test1').find('#year').val(y);              
          $('#test1').find('#select_mes').html(html);
          $('select').material_select();
        }
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


        function buscar_teclado(g,numero){

            //setTimeout("$('.ocultar').hide();", 5000);
            var nombre = $(g).val();
            
            console.log(nombre);
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {opcion: 'buscar_afi', numero: numero, nombre: nombre}
          })
          .done(function(data2) {
                $('#listado'+numero+'').html(data2);
              })
          .fail(function() {
            console.log("error");
          })
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
        
        function obtenerSolicitud(){
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {opcion: 'obtenerSolicitud'}
          })
          .done(function(data) {
            console.log("success");
            $('#numsol').val('SA-'+data);
          })
     
          
        }


        function crearAfiliado()
        {
           setTimeout("$('.ocultar').hide();", 5000);
          var m = $('#formAfiliacion').serialize();
          m += "&opcion=" + encodeURIComponent('registrarAfiliado');
          m += "&id=0";

          if($('#carnet').val()=="" || $('#nombres-sp').val()=="" || $('#apellidos-sp').val()=="" || $('#direccion-sp').val()=="" || $('#telefono-sp').val()=="" || $('#celular-sp').val()=="" || $('#depar-ucb-sp').val()=="" || $('#interno-sp').val()=="" || $('#correo-sp').val()=="" || $('#totGanado-sp').val()=="" || $('#liquido-sp').val()=="" || $('#antiguedad-sp').val()=="" || $('#aporte-sp').val()=="")
          {
            var html='<div id="card-alert" class="card red lighten-5 ocultar">';
                html=html+'<div class="card-content red-text">';
                html=html+' <p>Datos incompletos.</p>';
                html=html+'</div>';
                html=html+      '    </div>';
                $('#resultado').html(html);
          }
        else{
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: $('#formAfiliacion').attr('method'),
            data: m
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
              

                var html='<div id="card-alert" class="card green lighten-5 ocultar">';
                html=html+'<div class="card-content green-text">';
                html=html+' <p>EXITO : Afiliado creado.</p>';
                html=html+'</div>';
                html=html+      '    </div>';
                $('#resultado').html(html);


                
              console.log(data);
               $('#modal1').openModal();
               $('#modal1 label').addClass('active');
               $('#nombreModal').val(resp.nombre_ap);
               $('#usuarioModal').val(resp.usuario);
               $('#passwordModal').val(resp.password);
              listar(1);    listar(2);   listar(3); 
              obtenerSolicitud();

               $('#formAfiliacion').trigger("reset");

            }
             if(t==2)
            {

              Materialize.toast('No cumple con la antiguedad requerida', 4000, 'rounded')

            }

          })
          .fail(function() {
            console.log("error");
          })
        }
          event.preventDefault();
          
        }

        function quitar_label(){
          $('label').removeClass('active');
          $('#test3').find('#eliForm').trigger("reset");
           $('#test2').find('#formAfiliacion').trigger("reset");
          $('#test4').find('#formGenera').trigger("reset");
          $('#buscar_afi').val('');
          $('#buscar_afi2').val('');
          $('#buscar_afi3').val('');
          idU=0;
           enviar_pdf(0);
           enviar_pdf_pass(0,0);

          listar(1);listar(2);listar(3);

        }

        function crearAfiliadoH()
        {
          setTimeout("$('.ocultar').hide();", 5000);
          var m = $('#formHistorico').serialize();
          m += "&opcion=" + encodeURIComponent('registrarAfiliadoH');
          m += "&id=0";

           if($('#test5').find('#calendario-sp').val()=="" ||  $('#test5').find('#ci-sp').val()=="" || $('#test5').find('#nombre-sp').val()=="" || $('#test5').find('#apellido-sp').val()=="" || $('#test5').find('#direccion-sp').val()=="" || $('#test5').find('#telefono-sp').val()=="" || $('#test5').find('#celular-sp').val()=="" || $('#test5').find('#depar-ucb-sp').val()=="" || $('#test5').find('#interno-sp').val()=="" || $('#test5').find('#correo-sp').val()=="" || $('#test5').find('#total-sp').val()=="" || $('#test5').find('#liquido-sp').val()=="" || $('#test5').find('#aporte-sp').val()=="")
          {
            var html='<div id="card-alert" class="card red lighten-5 ocultar">';
                html=html+'<div class="card-content red-text">';
                html=html+' <p>Datos incompletos.</p>';
                html=html+'</div>';
                html=html+      '    </div>';
                $('#test5').find('#resultado').html(html);
          }
        else{
            $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: $('#formHistorico').attr('method'),
            data: m
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
              console.log(data);
              var html='<div id="card-alert" class="card green lighten-5 ocultar">';
                html=html+'<div class="card-content green-text">';
                html=html+' <p>EXITO : Afiliado creado.</p>';
                html=html+'</div>';
                html=html+      '    </div>';
                $('#test5').find('#resultado').html(html);

               var historia =  '<form id="formHistorico_2" method="POST"><div class="row">'+
                              '<div class="col s12 m12">'+
                                '<div class="card">'+                                
                                  '<div class="card-content">'+
                                    '<div class="row">'+
                                      '<center><h4>Registro de Movimiento</h4></center>'+
                                    '</div>'+
                                    '<div class="row">'+
                                      '<div class=" col s6">'+
                                        '<label><i class="fa fa-user" aria-hidden="true"></i> Nombre:</label>'+
                                        '<input readonly id="nombre" name="nombre" value="Juan Perez Molina" type="text">'+
                                      '</div>'+
                                      '<div class="col s6">'+
                                        '<label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Afiliacion:</label>'+
                                        '<input type="text" id="fechaAfi" name="fechaAfi" readonly>'+
                                      '</div>'+
                                    '</div>'+
                                    '<div class="row">'+
                                      '<div class="input-field col s6">'+
                                        '<input type="text" id="totalGanado" name="totalGanado" class="validate" required>'+
                                        '<label><i class="fa fa-money" aria-hidden="true"></i> Total Ganado:</label>'+
                                      '</div>'+
                                      '<div class="input-field col s6">'+
                                        '<input type="text" class="validate" id="liquido" name="liquido" required>'+
                                        '<label><i class="fa fa-money" aria-hidden="true"></i> Liquido Pagable:</label>'+
                                      '</div>'+                                      
                                    '</div>'+
                                    '<div class="row">'+
                                      '<div class="input-field col s6">'+
                                        '<input type="text" id="aporte" name="aporte" class="validate" required>'+
                                        '<label><i class="fa fa-money" aria-hidden="true"></i> Monto Aporte:</label>'+
                                      '</div>'+
                                      '<div class="col s6">'+
                                        '<div class="col s3">'+
                                          '<label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Afiliacion:</label>'+
                                        '</div>'+
                                        '<div class="col offset-s3">'+
                                          '<input type="date" class="datepicker" id="calendario-sp-2" name="calendario-sp-2" required>'+
                                        '</div>'+                                        
                                      '</div>'+                                 
                                    '</div>'+
                                    '<div class="row">'+
                                    '<div class="col s3">'+
                                      
                                         '<button class="btn waves-effect waves-light red" type="button" name="limpia" id="limpiaM"><i class="fa fa-trash-o"></i> Limpiar</button>'+
                                      '</div>'+  
                                      '<div class="col s3">'+
                                         '<button class="waves-effect waves-light btn" type="button" id="registrar_historico" onclick="javascript:crearHistorico();">Aceptar</button>'+
                                      '</div>'+        
                                      '<div class="col s3">'+
                                         '<button class="waves-effect waves-light btn modal-trigger" type="button" data-target="modalfin" onclick="javascript:terminar_historico();">Finalizar</button>'+
                                         
                                      '</div>'+                                   
                                    '</div>'+
                                      '<div class="row"><div id="resultado2"></div></div>'+
                                  '</div>'+                            
                                '</div>'+
                              '</div>'+
                            '</div></form>'+

                            '<div id="modalfin" class="modal modal-fixed-footer">'+
                              '<div class="modal-content">'+
                                '<h4><i class="fa fa-money" aria-hidden="true"></i>  REGISTRAR AHORRO</h4>'+
                                '<br><p>Registrar el ahorro total</p><br>'+
                                 '<div class="row">'+
                                      '<div class="input-field col s9">'+
                                        '<input type="text" id="nombreF" name="nombreF" class="validate" required>'+
                                        '<label><i class="fa fa-user" aria-hidden="true"></i> Usuario:</label>'+
                                      '</div>'+ 
                                    '</div>'+ 
                                    '<div class="row">'+
                                      '<div class="input-field col s6">'+
                                        '<input type="text" id="aporteF" name="aporteF" class="validate" onkeypress="return soloNumeros(event);" required>'+
                                        '<label> Total aporte:</label>'+
                                      '</div>'+ 
                                    '</div>'+ 

                                    '<div class="resultados"></div>'+

                              '</div>'+
                              '<div class="modal-footer">'+
                              '<button class="btn waves-effect waves-light red" type="button" name="limpia" id="limpia"> Cancelar</button>'+
                                '<button class="waves-effect waves-light btn modal-trigger" type="button" data-target="modalfin" onclick="javascript:finalizar_historico();">Finalizar</button>'+
                              '</div>'+
                            '</div>';
            $('#historia_afi').html(historia);

            $('#test5').find('#nombre').val( $('#test5').find('#nombre-sp').val()+' '+$('#test5').find('#apellidoP-sp').val()+' '+$('#test5').find('#apellidoM-sp').val());
            $('#test5').find('#fechaAfi').val($('#test5').find('#calendario-sp').val());//////////////////////////////////
             
             /*  $('#modal1').openModal();
               $('#modal1 label').addClass('active');
               $('#usuarioModal').val(resp.usuario);
               $('#passwordModal').val(resp.password);
              listar(1);    listar(2);   listar(3); 
              obtenerSolicitud();*/
              // $('#formHistorico').trigger("reset");
              $('#test5').find('.histo').prop("readonly",true);
              $('label').addClass('active');

              $('#test5').find('#boton_histo').html('<button class="waves-effect waves-light btn disabled" type="button" id="">Registrar</button>');

            }
             if(t==2)
            {

              Materialize.toast('No cumple con la antiguedad requerida', 4000, 'rounded')

            }

          })
          .fail(function() {
            console.log("error");
          })
        }
          event.preventDefault();
          
        }

         function crearHistorico()
        {
          setTimeout("$('.ocultar').hide();", 5000);
          var m = $('#test5').find('#formHistorico_2').serialize();
          m += "&opcion=" + encodeURIComponent('registrarHistorico');

          if($('#test5').find('#calendario-sp-2').val()!="" || $('#test5').find('#aporte').val()!="" || $('#test5').find('#liquido').val()!="" || $('#test5').find('#totalGanado').val()!="" ){
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: $('#test5').find('#formHistorico_2').attr('method'),
            data: m
          })
          .done(function(data) {
            console.log('registrado');
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
                var html='<div id="card-alert" class="card green lighten-5 ocultar">';
                html=html+'<div class="card-content green-text">';
                html=html+' <p>EXITO : Historial agregado.</p>';
                html=html+'</div>';
                html=html+      '    </div>';
               $('#test5').find('#resultado2').html(html);
               $('#test5').find('#formHistorico_2').trigger("reset");
               $('#test5').find('#nombre').val( $('#test5').find('#nombre-sp').val()+' '+$('#test5').find('#apellidoP-sp').val() +' '+$('#test5').find('#apellidoM-sp').val());
               $('#test5').find('#fechaAfi').val($('#test5').find('#calendario-sp').val());
               $('label').addClass('active');

            }

          })
          .fail(function() {
            console.log("error");
          })
        }
        else
        {
          var html='<div id="card-alert" class="card red lighten-5 ocultar">';
                html=html+'<div class="card-content red-text">';
                html=html+' <p>EXITO : Datos incompletos.</p>';
                html=html+'</div>';
                html=html+      '    </div>';
               $('#test5').find('#resultado2').html(html);
        }
          event.preventDefault();
        
          
        }
        function terminar_historico(){

               $('#test5').find('#modalfin').openModal();
               $('#test5').find('#modalfin label').addClass('active');
               $('#test5').find('#nombreF').val($('#test5').find('#nombre-sp').val()+' '+$('#test5').find('#apellidoP-sp').val() +' '+$('#test5').find('#apellidoM-sp').val());
     
        }
        function finalizar_historico(){
           
           var carnet= $('#test5').find('#ci-sp').val();
           var ap = $('#test5').find('#aporteF').val();


           if($('#test5').find('#aporteF').val()!=""){
            $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {ci: carnet, opcion:'registrarAhorro', aporte:ap }
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
              Materialize.toast('<i class="fa fa-user-secret" aria-hidden="true"></i>Registrado!', 4000, 'rounded');
              $('#test5').find('#formHistorico').trigger("reset");
              $('#test5').find('#formHistorico_2').trigger("reset");
            }
             if(t==2)
            {
              Materialize.toast('Error', 4000, 'rounded')
            }

          })
          .fail(function() {
            console.log("error");
          })
        }
        else{
           var html='<div id="card-alert" class="card red lighten-5 ocultar">';
                html=html+'<div class="card-content red-text">';
                html=html+' <p>Datos incompletos.</p>';
                html=html+'</div>';
                html=html+      '    </div>';
                $('#test5').find('#resultados').html(html);
        }
          event.preventDefault();
        
        }

        function modificarAfiliado()
        {
          var m = $('#test2').find('#formAfiliacion').serialize();
          m += "&opcion=" + encodeURIComponent('registrarAfiliado');
          m += "&id=" + encodeURIComponent(idU);
          console.log(m);
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: $('#formAfiliacion').attr('method'),
            data: m
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
              Materialize.toast('<i class="fa fa-user-secret" aria-hidden="true"></i>Modificado!', 4000, 'rounded')
              $('#test2').find('#formAfiliacion').trigger("reset");



              inicia_mes();
          $('select').material_select();

              listar(1);    listar(2);   listar(3); 
            }
             if(t==2)
            {

              Materialize.toast('No cumple con la antiguedad requerida', 4000, 'rounded')
            }

          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
          
        }

        function eliminarAfiliado()
        {
          var m = "id="+encodeURIComponent(idU);
          m += "&opcion=" + 'eliminarAfiliado';
          console.log(m);
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: $('#formAfiliacion').attr('method'),
            data: m
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
              Materialize.toast('Eliminado!', 4000, 'rounded');
              $('#test3').find('#eliForm').trigger("reset");
              listar(1);    listar(2);   listar(3); 
              $('label').removeClass('active');

            }
             
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
          
        }

        function guardaPassword()
        {
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: $('#formAfiliacion').attr('method'),
            data: {id: idU, password:$('#test4').find('#password2').val(), opcion:'modificarPassword' }
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
              Materialize.toast('Modificado!', 4000, 'rounded')
             // $('#test4').find('#formGenera').trigger("reset");
              listar(1);    listar(2);   listar(3); 
            }
             if(t==2)
            {

              Materialize.toast('No cumple con la antiguedad requerida', 4000, 'rounded')
            }

          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
          
        }

        //funciones pertenecientes a modificacion
      function listar(numero)
      {
          //setTimeout("$('.ocultar').hide();", 5000);
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {opcion: 'listar', numero: numero}
          })
          .done(function(data2) {
                $('#listado'+numero+'').html(data2);
              })
          .fail(function() {
            console.log("error");
          })
      }
      function enviar_pdf(r){
        if(r!=0){
        var h='<a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Imprimir" href="/Fondo_Catolica/Secretaria/Usuarios/tcpdf/too/formulario_afi_pdf.php?idu='+r+'" target="_blank"><i class="fa fa-print"></i></a>';
        $('#test2').find('#botones-circulares').html(h);}
        else{$('#test2').find('#botones-circulares').html('');}

      }

      function enviar_pdf_pass(r,pass){
       if(r!=0){
        var h='<a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Imprimir" href="/Fondo_Catolica/Secretaria/Usuarios/tcpdf/too/formulario_password_pdf.php?idu='+r+'&pass='+pass+'" target="_blank"><i class="fa fa-print"></i></a>';
        $('#test4').find('#botones-circulares').html(h);}
        else{$('#test4').find('#botones-circulares').html('');}

      }
      
      function mostrar_datos1(f)
      {
        row= $(f).find('td:eq(0)').text();
        row2 = $(f).find('td:eq(1)').text();
        row3 = $(f).find('td:eq(2)').text();
        idU = row;
        enviar_pdf(idU);
        $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {opcion: 'obtenerAfiliado', idu: row}
          })
          .done(function(data) {
                 var resp = $.parseJSON(data);
                  var t= resp.resp;
            if(t==1)
            {
              console.log("success");
              $('label').addClass('active');
              $('#test2').find('#numsol').val('SA-'+resp.idAfiliacion);
              $('#test2').find('#fechaactual').val(resp.fecha);
              $('#test2').find('#carnet').val(resp.ci);
              $('#test2').find('#nombres-sp').val(resp.nombre);
              $('#test2').find('#apellidoP-sp').val(resp.apellidoP);
              $('#test2').find('#apellidoM-sp').val(resp.apellidoM);
              $('#test2').find('#direccion-sp').val(resp.direccion);
              $('#test2').find('#telefono-sp').val(resp.telefono);
              $('#test2').find('#celular-sp').val(resp.celular);
              
              $('#test2').find('#interno-sp').val(resp.interno);
              $('#test2').find('#correo-sp').val(resp.correos);
              $('#test2').find('#totGanado-sp').val(resp.cantidad_sueldo);
              $('#test2').find('#liquido-sp').val(resp.liquido);
              $('#test2').find('#antiguedad-sp').val(resp.antiguedad);
              $('#test2').find('#aporte-sp').val(resp.monto_aporte);
              $('#test2').find('#year').val(resp.year);

              var h,d,l;
              h='<select name="institucion-sp" id="institucion-sp">';
              if(resp.institucion=='UCB'){
                h=h+'           <option value="UCB" selected>UCB</option>';
                h=h+'            <option value="EPC" >EPC</option>';
                h=h+'          </select>';
                d='<select name="depar-ucb-sp" id="depar-ucb-sp">';
                for(i=0; i<=4; i++){
                  if(depa[i]==resp.departamento)
                  {
                    l='selected'
                  }
                  else{l='';}
                  d=d+'<option value="'+depa[i]+'" '+l+'>'+depa[i]+'</option>';
                }
              $('#test2').find('#departamento').html(d);


              }
              if(resp.institucion=='EPC'){
                h=h+'           <option value="UCB" >UCB</option>';
                h=h+'            <option value="EPC" selected>EPC</option>';
                h=h+'          </select>';
                
                d='<select name="depar-ucb-sp" id="depar-ucb-sp">';
                for(i=0; i<=4; i++){
                  if(epc[i]==resp.departamento)
                  {
                    l='selected'
                  }
                  else{l='';}
                  d=d+'<option value="'+epc[i]+'" '+l+'>'+epc[i]+'</option>';
                }
              $('#test2').find('#departamento').html(d);


              }
              
              $('#test2').find('#institucion').html(h);


              
             



              var mes;

          mes = ['Elija un mes', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
          var html;
          html='<select name="mes-sp">';
            for(k=resp.idMes; k<=12; k++ )
            { 
              if(resp.idMes == k)
              {  html=html+'<option value="'+k+'" selected>'+mes[k]+'</option>';              }
              else{ html=html+'                <option value="'+k+'">'+mes[k]+'</option>';              }
            }
          html=html+'   </select>';
      
          $('#test2').find('#select_mes').html(html);
          $('select').material_select();



               
            }

              })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault(); 
      }


      function mostrar_datos2(f)
      {

        row= $(f).find('td:eq(0)').text();
        row2 = $(f).find('td:eq(1)').text();
        row3 = $(f).find('td:eq(2)').text();
        idU = row;
        $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {opcion: 'obtenerAfiliado', idu: row}
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
              console.log("success");
              $('label').addClass('active');
              $('#test3').find('#first_name').val(resp.nombre+' '+resp.apellidoP+' '+resp.apellidoM);
              $('#test3').find('#ci').val(resp.ci);
              $('#test3').find('#depar-ucb-sp').val(resp.departamento);
              $('#test3').find('#institucion').val(resp.institucion);                  
            }
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();

        console.log(row,row2,row3);
        
      }

       function mostrar_datos3(f)
      {
        row= $(f).find('td:eq(0)').text();
        row2 = $(f).find('td:eq(1)').text();
        row3 = $(f).find('td:eq(2)').text();
        //$('#modNombre2').val(row);
        idU=row;
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {opcion: 'generarPass', id: row}
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp; 
            
           if(t==1)
            {
              
              $('label').addClass('active');
              $('#test4').find('#last_name').val(resp.nombre+' '+resp.apellido);
              $('#test4').find('#carnet').val(resp.ci);
              $('#test4').find('#fecha_afi').val(resp.fecha_afi);
              $('#test4').find('#user').val(resp.user);
              $('#test4').find('#password1').val(resp.original);
              $('#test4').find('#password2').val(resp.pass);
              var pass= resp.pass;
        enviar_pdf_pass(idU,pass);
                         
            }
             if(t==2)
            {

              Materialize.toast('<i class="fa fa-user-secret" aria-hidden="true"></i>No cumple con la antiguedad requerida', 4000, 'rounded')

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
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/barramenusecre.php";
 	?>
<!--  llamada al menu de botones del lado izquierdo -->
	
<!--  Creacion del contenido del index -->
	<br><br>
	<div class="row ">

		<div class="col offset-m1 m10 s12">
			<?php
				include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Usuarios/panelesusu.php";
			?>		
		</div>
		
	</div>

<!--  Llamada al pie de pagina -->
	<?php 
		require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/footer.php";
 	?>


</body>
</html>















