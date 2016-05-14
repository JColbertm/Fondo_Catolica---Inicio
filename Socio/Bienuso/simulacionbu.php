<div class="row">
  <div class="card">
    <div class="card-action">
      <a>Simulaci&oacute;n Bien de Uso</a>
    </div>
    <div class="card-content">
      <div class="row">
        <form class="col s12 offset-m1 m10">
          <div class="row">
            <div class="input-field col s12">
              <input id="montosimu" type="text" class="validate" required>
              <label><i class="fa fa-usd" aria-hidden="true"></i> Monto:</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="cantmeses" type="text" class="validate" required>
              <label><i class="fa fa-calendar" aria-hidden="true"></i> Meses Plazo:</label>
            </div>
          </div>
          <div class="row">
            <div class="col offset-m8 m4">
              <button class="waves-effect waves-light modal-trigger btn" href="#modalsimu" type="submit"><h6><i class="fa fa-gamepad" aria-hidden="true"></i> Simular</h6></button>
            </div>                  
          </div>               
        </form>
      </div> 
    </div>           
  </div>  
</div>

<div id="modalsimu" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="col offset-m1 m10">
          <h4>Simulaci&oacute;n Bien de Uso</h4>
          <form>                
                <div class="row">
                  <div class="input-field col s12">
                    <input id="usuario" type="text" readonly>
                    <label><i class="fa fa-usd" aria-hidden="true"></i> Monto:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="mesesplazo" type="text" readonly>
                    <label><i class="fa fa-calendar" aria-hidden="true"></i> Meses Plazo:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="interessimu" type="text" readonly>
                    <label><i class="fa fa-percent" aria-hidden="true"></i> Interes</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="cuotasimu" type="text" readonly>
                    <label><i class="fa fa-money" aria-hidden="true"></i> Monto Cuota</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col m3">
                    <a class="waves-effect waves-light btn">Prestarme</a>
                  </div>                  
                </div>               
              </form>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    </div>
  </div> 