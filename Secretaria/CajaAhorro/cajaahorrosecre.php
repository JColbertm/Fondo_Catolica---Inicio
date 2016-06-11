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
              $('#nombre').val(resp.nombre +' ' +resp.apellido);
              $('#ci').val(resp.ci)          
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
  <div class="row">

    <div class="col offset-m1 m10 s12">
      <?php
        include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/CajaAhorro/panelescajaahorro.php";
      ?>    
    </div>
    
  </div>

<!--  Llamada al pie de pagina -->
  <?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/footer.php";
  ?>


</body>
</html>















