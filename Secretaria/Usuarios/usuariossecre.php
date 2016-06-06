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

           $('#limpia').on('click', function()
          {
            $('label').removeClass('active');
            $('#formAfiliacion').trigger("reset");
          });
          $('#cierre_sesion').on('click', function()
          {
            cerrar_sesion();            
          });
          $('#test2').find('#busca_afi').on('keyup',buscar_teclado)
          //$('#test2').find('select').material_select();


  

         
          $('.crearAfiliado').on('click', crearAfiliado);
          $('.datepicker').pickadate({
            format: 'dd-mm-yyyy',
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
          });

          $('#test2').find('#modAfiliado').on('click',modificarAfiliado); 
          $('#test3').find('#elim_afiliado').on('click',eliminarAfiliado);
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


         
    	});


        function buscar_teclado(){
            //setTimeout("$('.ocultar').hide();", 5000);
            var nombre = $('#test2').find('#buscar_afi').val();
            
            console.log(nombre);
            var numero=1;
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {opcion: 'buscar_afi', numero: numero,nombre: nombre}
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
            $('#numsol').val(data);
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
               $('#usuarioModal').val(resp.usuario);
               $('#passwordModal').val(resp.password);
              listar(1);    listar(2);   listar(3); 
              obtenerSolicitud();

               $('#formAfiliacion').trigger("reset");

            }
             if(t==2)
            {

              Materialize.toast('No cumple con la antiguedad requerida', 4000)

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
          $('#test4').find('#formGenera').trigger("reset");

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
                                      '<div class="col offset-s6 s3">'+
                                         '<button class="waves-effect waves-light btn" type="button" id="registrar_historico" onclick="javascript:crearHistorico();">Aceptar</button>'+
                                      '</div>'+        
                                      '<div class="col s3">'+
                                         '<button class="waves-effect waves-light btn modal-trigger" type="button" data-target="modalfin" onclick="javascript:terminar_historico();">Finalizar</button>'+
                                         '<button class="btn waves-effect waves-light red" type="button" name="limpia" id="limpia"><i class="fa fa-trash-o"></i> Limpiar</button>'+
                                      '</div>'+                                   
                                    '</div>'+
                                      '<div class="row"><div id="resultado2"></div></div>'+
                                  '</div>'+                            
                                '</div>'+
                              '</div>'+
                            '</div></form>'+

                            '<div id="modalfin" class="modal modal-fixed-footer">'+
                              '<div class="modal-content">'+
                                '<h4>Modal Header</h4>'+
                                '<p>A bunch of text</p>'+
                              '</div>'+
                              '<div class="modal-footer">'+
                                '<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>'
                              '</div>'+
                            '</div>';
            $('#historia_afi').html(historia);

            $('#test5').find('#nombre').val( $('#test5').find('#nombre-sp').val()+' '+$('#test5').find('#apellido-sp').val());
            $('#test5').find('#fechaAfi').val($('#test5').find('#calendario-sp').val());//////////////////////////////////
             /*  $('#modal1').openModal();
               $('#modal1 label').addClass('active');
               $('#usuarioModal').val(resp.usuario);
               $('#passwordModal').val(resp.password);
              listar(1);    listar(2);   listar(3); 
              obtenerSolicitud();*/
              // $('#formHistorico').trigger("reset");
            }
             if(t==2)
            {

              Materialize.toast('No cumple con la antiguedad requerida', 4000)

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
               $('#test5').find('#nombre').val( $('#test5').find('#nombre-sp').val()+' '+$('#test5').find('#apellido-sp').val());
               $('#test5').find('#fechaAfi').val($('#test5').find('#calendario-sp').val());
                $('#historia_afi').html('');
                $('label').removeClass('active');

            }

          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
          
        }
        function terminar_historico(){

               $('#test5').find('#modalfin').openModal();
               $('#test5').find('#modalfin label').addClass('active');
               $('#test5').find('#formHistorico').trigger("reset");
               $('#test5').find('#formHistorico_2').trigger("reset");

              
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
              Materialize.toast('Modificado!', 4000)
              $('#test2').find('#formAfiliacion').trigger("reset");

              listar(1);    listar(2);   listar(3); 
            }
             if(t==2)
            {

              Materialize.toast('No cumple con la antiguedad requerida', 4000)
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
              console.log("success");
              Materialize.toast('Eliminado!', 4000);
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
              Materialize.toast('Modificado!', 4000)
             // $('#test4').find('#formGenera').trigger("reset");
              listar(1);    listar(2);   listar(3); 
            }
             if(t==2)
            {

              Materialize.toast('No cumple con la antiguedad requerida', 4000)
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
      var idU;
      function mostrar_datos1(f)
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
            if(t==1)
            {
              console.log("success");
              $('label').addClass('active');
              $('#test2').find('#numsol').val(resp.idAfiliacion);
              $('#test2').find('#fechaactual').val(resp.fecha);
              $('#test2').find('#carnet').val(resp.ci);
              $('#test2').find('#nombres-sp').val(resp.nombre);
              $('#test2').find('#apellidos-sp').val(resp.apellido);
              $('#test2').find('#direccion-sp').val(resp.direccion);
              $('#test2').find('#telefono-sp').val(resp.telefono);
              $('#test2').find('#celular-sp').val(resp.celular);
              $('#test2').find('#depar-ucb-sp').val(resp.departamento);
              $('#test2').find('#interno-sp').val(resp.interno);
              $('#test2').find('#correo-sp').val(resp.correos);
              $('#test2').find('#totGanado-sp').val(resp.cantidad_sueldo);
              $('#test2').find('#liquido-sp').val(resp.liquido);
              $('#test2').find('#antiguedad-sp').val(resp.antiguedad);
              $('#test2').find('#aporte-sp').val(resp.monto_aporte);
              $('#test2').find('#literal-sp').val(resp.literal);
              $('#test2').find('#mes-sp').val(resp.idMes);        
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
              $('#test3').find('#first_name').val(resp.nombre+' '+resp.apellido);
              $('#test3').find('#ci').val(resp.ci);
              $('#test3').find('#depar-ucb-sp').val(resp.departamento);                  
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
                         
            }
             if(t==2)
            {

              Materialize.toast('No cumple con la antiguedad requerida', 4000)

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















