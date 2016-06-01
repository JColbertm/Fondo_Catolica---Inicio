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
                <input type="text" class="validate" id="ci-sp" name="ci-sp" required>
                <label><i class="fa fa-user" aria-hidden="true"></i> Carnet de Identidad:</label>
              </div>              
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="text" class="validate" id="nombre-sp" name="nombre-sp" required>
                <label><i class="fa fa-user" aria-hidden="true"></i> Nombres:</label>
              </div>       
              <div class="input-field col s6">
                <input type="text" class="validate" id="apellido-sp" name="apellido-sp" required>
                <label>Apellidos:</label>
              </div>              
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="text" class="validate" id="direccion-sp" name="direccion-sp" required>
                <label><i class="fa fa-map-marker" aria-hidden="true"></i> Direccion:</label>
              </div>              
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="text" class="validate" id="telefono-sp" name="telefono-sp" required>
                <label><i class="fa fa-phone" aria-hidden="true"></i> Nro. Telefono:</label>
              </div>
              <div class="input-field col s6">
                <input type="text" class="validate" id="celular-sp" name="celular-sp" required>
                <label><i class="fa fa-mobile" aria-hidden="true"></i> Nro. Celular:</label>
              </div>                
            </div>
            <div class="row">
                  <div class="input-field col s6 m8">
                    <input type="text" id="depar-ucb-sp" name="depar-ucb-sp" class="validate">
                    <label>Departamento UCB:</label>
                  </div>
                  <div class="input-field col s6 m4">
                    <input type="text" id="interno-sp" name="interno-sp" class="validate">
                    <label>Interno:</label>
                  </div>
                </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="email" class="validate" id="correo-sp" name="correo-sp" required>
                <label><i class="fa fa-envelope-o" aria-hidden="true"></i> Correo Electronico:</label>
              </div>              
            </div>
            
            <div class="row">
              <div class="input-field col s6">
                <input type="text" class="validate" id="total-sp" name="total-sp" required>
                <label><i class="fa fa-money" aria-hidden="true"></i> Total Ganado:</label>
              </div>    
              <div class="input-field col s6">
                <input type="text" class="validate" id="liquido-sp" name="liquido-sp" required>
                <label><i class="fa fa-money" aria-hidden="true"></i> Liquido Pagable:</label>
              </div>              
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input type="text" class="validate" id="aporte-sp" name="aporte-sp" required>
                <label><i class="fa fa-money" aria-hidden="true"></i> Aporte Mensual:</label>
              </div>                            
            </div>
          </form>
           
        </div>
        <div class="row">
          <div class="col offset-m9">
            <button class="waves-effect waves-light btn" type="button" id="historico">Registrar</button>
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