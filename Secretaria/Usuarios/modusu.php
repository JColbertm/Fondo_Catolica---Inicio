
  <div class="row">
              <div class="col s12 m12">
                <div class="card">
                  <div class="card-content">
                    <!-- contenido -->
                    <div class="row">
                      <!-- input busqueda -->
                      <form class="col s12">
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="fa fa-search prefix"></i>
                            <input id="buscar_afi" type="text" class="validate" onkeyup="javascript:buscar_teclado(this,1);">
                            <label for="icon_prefix">Buscar</label>
                          </div>
                        </div>
                        <div style="">
                          <div  id="listado1" style="height: 150px;  overflow-y: scroll" >
                          </div>
                          
                        </div>                      
                      </form>
                      <!-- tabla de resultados -->

                        
                    </div>

                  </div>           
                </div> 
              </div>  
          </div> 
        <div class="row">
              <!-- CONTENEDOR DEL CONTROL DE AHORROS -->
              <div class="col s12 m12">
              <div class="card">
                  <div class="card-content">
                    <!-- con css hacemos que los botones sean estaticos -->
                    
                     <input type="hidden" value="" id="planifi" name="planifi">
                      <div id="botones-circulares" align="right" class="menu-fixed">
                        
                      </div>
                    
        
                    <form method="POST" id="formAfiliacion" class="col s12 m12">
                      <?php
                        include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_afiliacion.php";
                      ?>
                    </form>
                      <div class="row">
                        <div class="col offset-m5">
                          <a class="waves-effect waves-light btn"><i class="fa fa-ban"></i> Rechazar</a>
                          <button class="waves-effect waves-light btn" id="modAfiliado"><i class="fa fa-check"></i> Aceptar</button>
                        </div>   
                      </div>                      
                  </div>           
                </div> 
              </div>
</div> 
