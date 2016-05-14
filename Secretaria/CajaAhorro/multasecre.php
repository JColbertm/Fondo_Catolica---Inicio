<!-- Contenedor de busqueda y tabla de socios -->
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
          <div class="">
            <div class="card">
              <div class="card-action">
                <a>Caja de Ahorro</a>
              </div>
              <div class="card-content">
                <!--  Paneles opciones de bienes de uso -->
                <div class="row">
                  <div class="col s12">
                    <ul class="tabs">
                      <li class="tab col s3"><a class="active" href="#crea">Control</a></li>
                      <li class="tab col s3"><a href="#registra">Registro Aporte</a></li>
                      <li class="tab col s3"><a href="#control">Retiro</a></li>
                    </ul>
                  </div>
                  <!--  PRIMER PANEL (CREA MULTA) -->
                  <div id="crea" class="col s12">
                  <br>
                  </div>
                  <!--  SEGUNDO PANEL (REGISTRO MULTA)-->
                  <div id="registra" class="col s12">
                  <br>
                  </div>
                  <!--  TERCER PANEL (CONTROL MULTA) -->
                  <div id="control" class="col s12">
                  <br>
                  </div>
                </div>
              </div>           
            </div> 
          </div>  
        </div>
      </div>           
    </div> 
  </div>
</div>