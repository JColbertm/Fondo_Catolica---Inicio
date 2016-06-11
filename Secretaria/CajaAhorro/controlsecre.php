<!-- Contenedor de busqueda y tabla de socios -->
<div class="row">
  <div class="col s4 m3">
    <div class="card">
      <div class="card-content">
        <!-- contenido -->
        <div class="row">
          <div class="col m12 s12">     
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
                  <div id="listado1" style="height: 300px;  overflow-y: scroll" >
                      
                  </div>
                </div>                      
              </form>
            </div> 
          </div>
        </div>
      </div>           
    </div> 
  </div>  

  <!-- CONTENEDOR DEL CONTROL DE AHORROS -->
  <div class="col s8 m9">
    <div class="card">
      <div class="card-content">
        <div align="right">
          <a class="btn-floating btn waves-effect waves-light red"><i class="fa fa-print"></i></a>
        </div>
          <?php
            include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/CajaAhorro/cuentaahorro.php";
          ?>
        <div class="row">
          <div class="col offset-m7">
            <a class="waves-effect waves-light btn"><i class="fa fa-ban"></i> Rechazar</a>
            <a class="waves-effect waves-light btn"><i class="fa fa-check"></i> Aceptar</a>
          </div>   
        </div>                      
      </div>           
    </div> 
  </div>
</div>