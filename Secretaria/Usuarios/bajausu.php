<div class="row">
              <div class="col s4 m3">
                <div class="card">
                  <div class="card-content">
                    <!-- contenido -->
                    <div class="row">
                      <!-- input busqueda -->
                      <form class="col s12">
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="fa fa-search prefix"></i>
                            <input id="buscar_afi2" type="text" class="validate" onkeyup="javascript:buscar_teclado(this,2);">
                            <label for="icon_prefix">Buscar</label>
                          </div>
                        </div>

                        <div style="">
                          <div  id="listado2" style="height: 300px;  overflow-y: scroll" >
                          </div>
                          
                        </div>   
                      </form>
                      <!-- tabla de resultados -->
                      <               
                    </div>

                  </div>           
                </div> 
              </div>  
              <!-- CONTENEDOR DEL CONTROL DE AHORROS -->
              <div class="col s8 m9">
                <div class="card">
                  <div class="card-content">
                    <div class="row">
                      <form class="col s12" id="eliForm">
                        <div class="row">
                          <div class="input-field col s9">
                            <input  id="first_name" type="text" class="validate" readonly="">
                            <label for="first_name"><i class="fa fa-user" aria-hidden="true"></i> Nombre y Apellido:</label>
                          </div>
                          <div class="input-field col s9">
                            <input  id="ci" type="text" class="validate" readonly="">
                            <label for="last_name"><i class="fa fa-user" aria-hidden="true"></i> Carnet de identidad:</label>
                          </div>
                          <div class="input-field col s9">
                            <input  id="depar-ucb-sp" type="text" class="validate" readonly="">
                            <label for="last_name">Departamento:</label>
                          </div>
                        </div>




                        
                        
                      </form>
                    </div>
                    <div class="row">
                      <div class="col offset-m8">
                        <button class="waves-effect waves-light btn" id="elim_afiliado"><i class="fa fa-ban"></i> Eliminar</button>
                      </div>   
                    </div>                      
                  </div>           
                </div> 
              </div>
            </div>