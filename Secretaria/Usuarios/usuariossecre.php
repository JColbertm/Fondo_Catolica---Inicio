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
          $('select').material_select();
          $('#cierre_sesion').on('click', function()
          {
            window.location="/Fondo_Catolica/index.php"; 
          });
          //$('#test2').find('select').material_select();

          $('a[data-toggle="tab"]').on('.tab', function (e) {
             $('label').removeClass('active');

          });

  

         
          $('.crearAfiliado').on('click', crearAfiliado);
          $('#test5').find('#registrar_historico').on('click',function(){alert('ddd');});
          $('.datepicker').pickadate({
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


         
    	});
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
          var m = $('#formAfiliacion').serialize();
          m += "&opcion=" + encodeURIComponent('registrarAfiliado');
          m += "&id=0";

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
          event.preventDefault();
          
        }

        function crearAfiliadoH()
        {
          var m = $('#formHistorico').serialize();
          m += "&opcion=" + encodeURIComponent('registrarAfiliadoH');
          m += "&id=0";
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
                                         '<button class="waves-effect waves-light btn modal-trigger" type="button" data-target="" id="registrar_historico" onclick="javascript:crearHistorico();">Aceptar</button>'+
                                      '</div>'+        
                                      '<div class="col s3">'+
                                         '<button class="waves-effect waves-light btn modal-trigger" type="button" data-target="modalfin">Finalizar</button>'+
                                      '</div>'+                                   
                                    '</div>'+
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

            $('#test5').find('#nombre').val(resp.nombre+' '+resp.apellido);
            $('#test5').find('#fechaAfi').val('01/05/2016');//////////////////////////////////
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
          event.preventDefault();
          
        }

         function crearHistorico()
        {
          var m = $('#test5').find('#formHistorico_2').serialize();
          m += "&opcion=" + encodeURIComponent('registrarHistorico');


          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: $('#test5').find('#formHistorico_2').attr('method'),
            data: m
          })
          .done(function(data) {
            console.log('registrado');
          /*  var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
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

            }*/

          })
          .fail(function() {
            console.log("error");
          })
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
              $('#test4').find('#formGenera').trigger("reset");
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















