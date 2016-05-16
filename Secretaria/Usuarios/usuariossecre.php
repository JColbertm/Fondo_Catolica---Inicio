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
          $('.crearAfiliado').on('click', crearAfiliado);
          $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
          });

          $('#test2').find('#modAfiliado').on('click',modificarAfiliado);
          obtenerSolicitud();
          listar();
          listar2();

          $('#historico').on('click', function(){
            var historia =  '<div class="row">'+
                              '<div class="col s12 m12">'+
                                '<div class="card">'+                                
                                  '<div class="card-content">'+
                                    '<div class="row">'+
                                      '<center><h4>Registro de Movimiento</h4></center>'+
                                    '</div>'+
                                    '<div class="row">'+
                                      '<div class=" col s6">'+
                                        '<label><i class="fa fa-user" aria-hidden="true"></i> Nombre:</label>'+
                                        '<input readonly value="Juan Perez Molina" type="text">'+
                                      '</div>'+
                                      '<div class="col s6">'+
                                        '<label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Afiliacion:</label>'+
                                        '<input type="text" readonly>'+
                                      '</div>'+
                                    '</div>'+
                                    '<div class="row">'+
                                      '<div class="input-field col s6">'+
                                        '<input type="text" class="validate" required>'+
                                        '<label><i class="fa fa-money" aria-hidden="true"></i> Total Ganado:</label>'+
                                      '</div>'+
                                      '<div class="input-field col s6">'+
                                        '<input type="text" class="validate" required>'+
                                        '<label><i class="fa fa-money" aria-hidden="true"></i> Liquido Pagable:</label>'+
                                      '</div>'+                                      
                                    '</div>'+
                                    '<div class="row">'+
                                      '<div class="input-field col s6">'+
                                        '<input type="text" class="validate" required>'+
                                        '<label><i class="fa fa-money" aria-hidden="true"></i> Monto Aporte:</label>'+
                                      '</div>'+
                                      '<div class="col s6">'+
                                        '<div class="col s3">'+
                                          '<label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Afiliacion:</label>'+
                                        '</div>'+
                                        '<div class="col offset-s3">'+
                                          '<input type="date" class="datepicker" required>'+
                                        '</div>'+                                        
                                      '</div>'+                                 
                                    '</div>'+
                                    '<div class="row">'+
                                      '<div class="col offset-s6 s3">'+
                                         '<button class="waves-effect waves-light btn modal-trigger" type="button" data-target="modalfin">Aceptar</button>'+
                                      '</div>'+        
                                      '<div class="col s3">'+
                                         '<button class="waves-effect waves-light btn modal-trigger" type="button" data-target="modalfin">Finalizar</button>'+
                                      '</div>'+                                   
                                    '</div>'+

                                  '</div>'+                            
                                '</div>'+
                              '</div>'+
                            '</div>'+

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
          });
          
    	});
        function obtenerSolicitud(){
          var m = "opcion=" + encodeURIComponent('obtenerSolicitud');
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: m
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
              console.log(data);
               $('#modal1').openModal();
               $('#modal1 label').addClass('active');
               $('#usuarioModal').val(resp.usuario);
               $('#passwordModal').val(resp.password);
              listar();    listar2();    
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

        function modificarAfiliado()
        {
          var m = $('#test2').find('#formAfiliacion').serialize();
          m += "&opcion=" + encodeURIComponent('modificarAfiliado');
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
              console.log("success");
              Materialize.toast('Modificado!', 4000)

              listar();     listar2();   
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
        function listar()
      {
          //setTimeout("$('.ocultar').hide();", 5000);
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {opcion: 'listar'}
          })
          .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<table class="highlight centered"  ><thead><tr><th width=1>N</th><th>Nombre</th><th>Apellido</th></tr></thead><tbody>';
                 

                  for(i in resp){ 
                    //si encuentra un resultado
                    if(resp[i].res==1)
                    {

                    html+='<tr onclick="mostrar_datos(this)"><td width=1>'+resp[i].idAfiliado+'</td><td>'+resp[i].nombre+'</td><td>'+resp[i].apellido+'</td></tr>';
                    }
                  }
                  
                html+= '</tbody></table>';

                $('#listado').html(html);

              })
          .fail(function() {
            console.log("error");
          })
          
        
      }
      function listar2()
      {
          //setTimeout("$('.ocultar').hide();", 5000);
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: {opcion: 'listar'}
          })
          .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<table class="highlight centered"  ><thead><tr><th width=1>N</th><th>Nombre</th><th>Apellido</th></tr></thead><tbody>';
                 

                  for(i in resp){ 
                    //si encuentra un resultado
                    if(resp[i].res==1)
                    {

                    html+='<tr onclick="mostrar_datos2(this)"><td width=1>'+resp[i].idAfiliado+'</td><td>'+resp[i].nombre+'</td><td>'+resp[i].apellido+'</td></tr>';
                    }
                  }
                  
                html+= '</tbody></table>';

                $('#listado2').html(html);

              })
          .fail(function() {
            console.log("error");
          })
          
        
      }
      var idU;
      function mostrar_datos(f)
      {

        row= $(f).find('td:eq(0)').text();
        row2 = $(f).find('td:eq(1)').text();
        row3 = $(f).find('td:eq(2)').text();
        //$('#modNombre2').val(row);
        idU=row;
        var m = 'id='+row;
          m += "&opcion=" + encodeURIComponent('obtenerAfiliado');
          console.log(m);


          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: m
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            var t= resp.resp;
            console.log(t);
           if(t==1)
            {
              console.log("success");
              $('label').addClass('active');
              $('#test2').find('#numsol').val(resp.ida);
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
              $('#test2').find('.select-dropdown').val(''+resp.idMes+'');              
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





       // $('#test2').find('#nombres-sp').val(row2);
        //$('#test2').find('#apellidos-sp').val(row3);
        //idU=row;
//          $('#modCategoria').val(row3);
        console.log(row,row2,row3);
        
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















