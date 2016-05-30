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
      });
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
                          <!--  CONTENIDO TABLA DE PARAMETROS -->
                            <form class="col s12">
                              <div class="row">
                                <div class="input-field col s12">
                                  <i class="fa fa-search prefix"></i>
                                  <input id="icon_prefix" type="text" class="validate">
                                  <label for="icon_prefix">Buscar</label>
                                </div>
                              </div>
                            </form>
                            <table class="highlight centered">
                              <thead>
                                <tr>
                                    <th>Nro.</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Juan</td>
                                  <td>Perez</td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Marco</td>
                                  <td>Aurelio</td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Debora</td>
                                  <td>Tejerina</td>
                                </tr>
                              </tbody>
                            </table>
                          
                                
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
                                  <input id="period" type="text" class="validate">
                                  <label>Duracion:</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12">
                                  <select>
                                    <option value="" disabled selected>Seleccione un Comite</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                  </select>
                                  <label>Comite</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12">
                                  <select>
                                    <option value="" disabled selected>Seleccione un Cargo</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
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