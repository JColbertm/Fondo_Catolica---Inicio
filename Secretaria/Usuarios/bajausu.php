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
                            <input id="buscar_afi2" type="text" class="validate" onkeyup="javascript:buscar_teclado(this,2);">
                            <label for="icon_prefix">Buscar (apellido, carnet, formulario)</label>
                          </div>
                        </div>

                        <div style="">
                          <div  id="listado2" style="height: 150px;  overflow-y: scroll" >
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
                    <div class="row">
                      <form class="col s12" id="eliForm">
                      <div class="col s12 m12 center">
                        <h4>ELIMINAR AFILIADO</h4>
                      </div>
                        <div class="row">
                          <div class="input-field col s8">
                            <input  id="first_name" type="text" class="validate" readonly="">
                            <label for="first_name"><i class="fa fa-user" aria-hidden="true"></i> Nombre y Apellido:</label>
                          </div>
                          <div class="input-field col s4">
                            <input  id="ci" type="text" class="validate" readonly="">
                            <label for="last_name"><i class="fa fa-user" aria-hidden="true"></i> Carnet de identidad:</label>
                          </div>
                          <div class="input-field col s6">
                            <input  id="institucion" type="text" class="validate" readonly="">
                            <label for="last_name">Institucion:</label>
                          </div>
                          <div class="input-field col s6">
                            <input  id="depar-ucb-sp" type="text" class="validate" readonly="">
                            <label for="last_name">Departamento:</label>
                          </div>
                        </div>




                        
                        
                      </form>
                    </div>
                    <div class="row">
                      <div class="col offset-m8">
                        <button class="btn waves-effect waves-light red" id="elim_afiliado"><i class="fa fa-ban"></i> Eliminar</button>
                      </div>   
                    </div>                      
                  </div>           
                </div> 
              </div>
            </div>





            <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4><i class="fa fa-user" aria-hidden="true"></i>  Eliminar afiliado</h4>
      <div class="row">
        <div class="row">
            <div class="input-field col s10">
               Esta seguro de eliminar al siguiente afiliado?:
            </div>
            
          </div>
        
        <div class="row">
            <div class="input-field col s8">
              <input id="nombreModal" name="nombre" type="text" readonly>
              <label><i class="fa fa-user" aria-hidden="true"></i> Afiliado:</label>
            </div>

            <div class="input-field col s4">
              <input id="carnetModal" name="ci" type="text" readonly>
              <label><i class="fa fa-user" aria-hidden="true"></i> Carnet:</label>
            </div>
            
          </div>


          <div class="row">
            <div class="input-field col s6">
              <input id="institucionModal" type="text" name="departamento" readonly>
              <label><i class="fa fa-user" aria-hidden="true"></i> Institucion:</label>
            </div>
            
            <div class="input-field col s6">
              <input id="departamentoModal" type="text" name="institucion" readonly="">
              <label><i class="fa fa-key" aria-hidden="true"></i> Departamento:</label>
            </div>
          </div>
            
        
      </div>
      
    </div>
    <div class="modal-footer">
      <button class=" modal-action modal-close btn waves-effect waves-light red" id="eliminar_afi"><i class="fa fa-trash-o"></i> Eliminar</button>
      <button class=" modal-action modal-close waves-effect waves-light btn" id="cancelar">Cancelar</button>
    </div>
  </div>