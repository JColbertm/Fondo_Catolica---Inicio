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
              <a>Modificacion Parametros</a>
            </div>
            <div class="card-content">
              <!--  CONTENIDO DE LA OPCION PARAMETROS -->
              <div class="row">
                <div class="col m4 s12">     
                  <div class="card">
                        <div class="card-content">
                          <!--  CONTENIDO TABLA DE PARAMETROS -->
                            <table class="highlight centered">
                              <thead>
                                <tr>
                                    <th data-field="id">Name</th>
                                    <th data-field="name">Item Name</th>
                                    <th data-field="price">Item Price</th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td>Alvin</td>
                                  <td>Eclair</td>
                                  <td>$0.87</td>
                                </tr>
                                <tr>
                                  <td>Alan</td>
                                  <td>Jellybean</td>
                                  <td>$3.76</td>
                                </tr>
                                <tr>
                                  <td>Jonathan</td>
                                  <td>Lollipop</td>
                                  <td>$7.00</td>
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
                            <center><h4>Modificacion Parametros</h4></center>
                          </div>

                          <div class="row">
                            <form class="col s12">
                              <div class="row">
                                <div class="input-field col s12">
                                  <i class="fa fa-info-circle prefix"></i>
                                  <textarea id="textarea1" class="materialize-textarea"></textarea>
                                  <label>Informacion</label>
                                </div>
                              </div>
                            </form>
                          </div>

                          <div class="row">
                            <form class="col s12">
                              <div class="row">
                                <div class="input-field col s6">
                                  <input id="first_name" type="text" class="validate">
                                  <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col s6">
                                  <input id="last_name" type="text" class="validate">
                                  <label for="last_name">Last Name</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12">
                                  <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                                  <label for="disabled">Disabled</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12">
                                  <input id="password" type="password" class="validate">
                                  <label for="password">Password</label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="input-field col s12">
                                  <input id="email" type="email" class="validate">
                                  <label for="email">Email</label>
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