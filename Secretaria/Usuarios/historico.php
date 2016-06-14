<div class="row">
  <!-- CONTENEDOR DEL CONTROL DE AHORROS -->
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <div class="row">

          <form class="col s12" id="formHistorico" method="POST">
            <div class="row">
              <center><h4>Afiliacion de Socio Historico</h4></center>
            </div>
            <div class="row">
              <div class="col s6">
                <label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Afiliacion:</label> 
                <input type="date" class="datepicker" id="calendario-sp" name="calendario-sp" required>
              </div>              
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="text" class="validate" id="ci-sp" name="ci-sp" required onkeypress="return soloNumeros(event);" maxlength="10">
                <label><i class="fa fa-user" aria-hidden="true"></i> Carnet de Identidad:</label>
              </div>              
            </div>
            <div class="row">
              <div class="input-field col s4 m4">
                <input type="text" class="validate histo" id="nombre-sp" name="nombre-sp" onkeypress="return soloLetras(event)" required>
                <label><i class="fa fa-user" aria-hidden="true"></i> Nombres:</label>
              </div>       
              <div class="input-field col s4 m4">
                <input type="text" class="validate histo" id="apellidoP-sp" name="apellidoP-sp" onkeypress="return soloLetras(event)" required>
                <label>Apellido paterno:</label>
              </div>
              <div class="input-field col s4 m4">
                <input type="text" class="validate histo" id="apellidoM-sp" name="apellidoM-sp" onkeypress="return soloLetras(event)" required>
                <label>Apellido materno:</label>
              </div>

            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate histo" id="direccion-sp" name="direccion-sp" required>
                <label><i class="fa fa-map-marker" aria-hidden="true"></i> Direccion:</label>
              </div>              
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="text" class="validate histo" id="telefono-sp" name="telefono-sp" onkeypress="return soloNumeros(event);" maxlength="7" required>
                <label><i class="fa fa-phone" aria-hidden="true"></i> Nro. Telefono:</label>
              </div>
              <div class="input-field col s6">
                <input type="text" class="validate histo" id="celular-sp" name="celular-sp" onkeypress="return soloNumeros(event);" maxlength="8" required>
                <label><i class="fa fa-mobile" aria-hidden="true"></i> Nro. Celular:</label>
              </div>                
            </div>
            <div class="row">
                  <div class="input-field col s6 m8" id="institucion">
                    <select name="institucion-sp" id="institucion-sp">
                          <option value="UCB" >UCB</option>
                          <option value="EPC" >EPC</option>
                        </select>
                    <label>Institucion:</label>
                    </div>
            </div>
            <div class="row">
                  <div class="input-field col s6 m8" id="departamento">
                    <select name="depar-ucb-sp" id="depar-ucb-sp">
                          <option value="Elija un departamento" >Elija un departamento</option>
                          <option value="derecho" >Derecho</option>
                          <option value="pastoral" >Pastoral</option>
                          <option value="contabilidad">Contabilidad</option>
                          <option value="administracion">Administracion</option>
                          <option value="personal">Personal</option>
                        

                        </select>
                    <label>Departamento UCB:</label>
                  </div>
                  <div class="input-field col s6 m4">
                    <input type="text" id="interno-sp" name="interno-sp" class="validate histo" onkeypress="return soloNumeros(event);" maxlength="4">
                    <label>Interno:</label>
                  </div>
                </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="email" class="validate histo" id="correo-sp" name="correo-sp" required>
                <label><i class="fa fa-envelope-o" aria-hidden="true"></i> Correo Electronico:</label>
              </div>              
            </div>
            
            <div class="row">
              <div class="input-field col s6">
                <input type="text" class="validate histo" id="total-sp" name="total-sp" onkeypress="return soloNumeros(event);" required>
                <label><i class="fa fa-money" aria-hidden="true"></i> Total Ganado:</label>
              </div>    
              <div class="input-field col s6">
                <input type="text" class="validate histo" id="liquido-sp" name="liquido-sp" onkeypress="return soloNumeros(event);" required>
                <label><i class="fa fa-money" aria-hidden="true"></i> Liquido Pagable:</label>
              </div>              
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="text" class="validate histo" id="aporte-sp" name="aporte-sp" onkeypress="return soloNumeros(event);" required>
                <label><i class="fa fa-money" aria-hidden="true"></i> Aporte Mensual:</label>
              </div>                            
            </div>
          </form>
           
        </div>
        <div class="row">
          <div class="col offset-m9" id="boton_histo">
            <button class="waves-effect waves-light btn" id="historico"><i class="fa fa-check"></i> Registrar</button>
          </div>   
        </div>
        <div class="row">
            <div id="resultado">
             </div>   
          </div> 


      </div>           
    </div> 
  </div>
</div>