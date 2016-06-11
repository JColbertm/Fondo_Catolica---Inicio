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
          listar();
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
                window.location="/Fondo_Catolica/Administrador/cambiopassa.php"; 
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

        function listar()
      {
          //setTimeout("$('.ocultar').hide();", 5000);
          var id = "opcion=" + encodeURIComponent('listar');
          id += "&numero="+encodeURIComponent(1);
          console.log(id);
          $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: id            
          })
          .done(function(data) {
                $('#listado1').html(data);
              })
          .fail(function() {
            console.log("error");
          })
      }

      function mostrar_datos1(f)
      {
        var row= $(f).find('td:eq(0)').text();
        var row2 = $(f).find('td:eq(1)').text();
        var row3 = $(f).find('td:eq(2)').text();
        var idU = row;
        var id = "opcion=" + encodeURIComponent('obtenerAfiliado');
        id += "&idu="+encodeURIComponent(row);
        $.ajax({
            url: '/Fondo_Catolica/Secretaria/controladores/dataBase_Secre.php',
            type: 'POST',
            data: id
          })
          .done(function(data) {
                 var resp = $.parseJSON(data);
                  var t= resp.resp;
            if(t==1)
            {
              console.log("success");
              $('label').addClass('active');
              $('#numsol').val(resp.idAfiliacion);
              $('#fechaactual').val(resp.fecha);
              $('#carnet').val(resp.ci);
              $('#first_name').val(resp.nombre);
              $('#last_name').val(resp.apellido);              
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
        <div class="card-action">
          <a>Modificacion Directivas</a>
        </div>
        <div class="card-content">
          <!--  CONTENIDO DE LA OPCION PARAMETROS -->
          <div class="row">
            <div class="col m4 s12">     
              <div class="card">
                <div class="card-content">
                  <!-- contenido -->
                  <div class="row">
                    <!-- input busqueda -->
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="fa fa-search prefix"></i>
                          <input id="buscar_afi" type="text" class="validate">
                          <label for="icon_prefix">Buscar</label>
                        </div>
                      </div>
                      <div>
                        <div  id="listado1" style="height: 300px;  overflow-y: scroll" >
                        
                        </div>
                      </div>                      
                    </form>
                  </div>
                </div>   
              </div> 
            </div>

            <div class="col m8 s12">     
              <div class="card">
                <div class="card-content">
                  <!--  CONTENIDO TABLA DE PARAMETROS -->                          
                  <div class="row">
                    <center><h4>Seleccion Directiva</h4></center>
                  </div>
                  <div class="row">
                    <form class="col s12">
                      <div class="row">
                        <div class="input-field col s6">
                          <input id="first_name" type="text" readonly="">
                          <label>Nombre:</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="last_name" type="text" readonly="">
                          <label>Apellido:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s6">
                          <input id="date" type="text" readonly="" value="<?php echo date("d-m-Y");?>">
                          <label>Fecha:</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="period" type="text" class="validate" maxlength="2">
                          <label>Duracion:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <select>
                            <option disabled selected>Seleccione un Comit&eacute;</option>
                            <option value="1">Comit&eacute; Administrativo</option>
                            <option value="2">Comit&eacute; de Cr&eacute;dito</option>
                            <option value="3">Comit&eacute; de Vigilancia</option>
                          </select>
                          <label>Comit&eacute;</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <select>
                            <option disabled selected>Seleccione un Cargo</option>
                            <option value="1">Presidente</option>
                            <option value="2">Secretario(a)</option>
                            <option value="3">Vocal</option>
                          </select>
                          <label>Cargo</label>
                        </div>
                      </div>
                      <a class="waves-effect waves-light btn right"><i class="fa fa-wrench left"></i>Modificar</a>
                    </form>
                  </div>
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