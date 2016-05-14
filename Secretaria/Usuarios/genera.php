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
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Buscar</label>
              </div>
            </div>
          </form>
          <!-- tabla de resultados -->
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
                <td>Alvaro</td>
                <td>Mendez</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Diego</td>
                <td>Jaldin</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Maria</td>
                <td>Cabrera</td>
              </tr>
            </tbody>
          </table>                      
        </div>
      </div>           
    </div> 
  </div>  
  <!-- CONTENEDOR DEL CONTROL DE AHORROS -->
  <div class="col s8 m9">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s6">
                <input disabled value="Oscar Paz Gonzales" id="last_name" type="text" class="validate">
                <label for="last_name">Nombre y Apellido</label>
              </div>
              <div class="input-field col s6">
                <input disabled value="5633233" id="last_name" type="text" class="validate">
                <label for="last_name">CI</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input disabled placeholder="12/04/2016" id="disabled" type="text" class="validate">
                <label for="disabled">Fecha Afiliacion</label>
              </div>
              <div class="input-field col s6">
                <input disabled placeholder="ASDSA12412ASD" id="password" type="text" class="validate">
                <label for="password">Nueva Contraseña</label>
              </div>
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col offset-m7">
            <a class="waves-effect waves-light btn"><i class="fa fa-check"></i> Generar Contraseña</a>
          </div>   
        </div>                      
      </div>           
    </div> 
  </div>
</div>