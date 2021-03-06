<div class="row">
 <form method="POST" id="formAfiliacion" class="col s12 m12">
	<?php
        include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_afiliacion.php";
    ?>
    <div class="row">
    	<div class="col offset-m8 col m4" id="mostrarModal">
    	 <button class="btn waves-effect waves-light red" type="button" name="limpia" id="limpia"><i class="fa fa-trash-o"></i> Limpiar</button>
        	<a class="waves-effect waves-light btn crearAfiliado" href=""><i class="fa fa-paper-plane" aria-hidden="true"></i> Afiliar</a></div> 
    </div>   
    </form>
</div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
    	<h4>Usuario Afiliado</h4>
    	<div class="row">
		    <form class="col s12" method="POST" action="/Fondo_Catolica/Secretaria/Usuarios/tcpdf/too/formulario_nuevo_pdf.php" target="_blank">
		    <div id="botones-circulares" align="right">
		    <button class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Imprimir" type="submit"><i class="fa fa-print"></i></button>
        </div>

        <div class="row">
		        <div class="input-field col s10">
		          <input id="nombreModal" name="nombre" type="text" readonly>
		          <label><i class="fa fa-user" aria-hidden="true"></i> Afiliado:</label>
		        </div>
		        
		      </div>


		      <div class="row">
		        <div class="input-field col s10">
		          <input id="usuarioModal" type="text" name="usuario" readonly>
		          <label><i class="fa fa-user" aria-hidden="true"></i> Nombre de usuario:</label>
		        </div>
		        
		      </div>
		      <div class="row">
		        <div class="input-field col s10">
		          <input id="passwordModal" type="text" name="pass" readonly="">
		          <label><i class="fa fa-key" aria-hidden="true"></i> Contraseña:</label>
		        </div>
		      </div>
			  <div class="row">
		        <div class="col s12 m12">
		          <div class="card">
		    		<div class="card-action">
		              <a>Nota:</a>
		            </div>
		            <div class="card-content">
		              <p>Es recomendable cambiar su contraseña al momento de ingresar por primera vez a su cuenta en el sistema por motivos de seguridad.</p>
		            </div>
		            
		          </div>
		        </div>
		      </div>
	          
		    </form>
		  </div>
     	
    </div>
    <div class="modal-footer">
    <button class="waves-effect waves-light btn" ><i class="fa fa-check"></i> Aceptar</button>
    </div>
  </div>