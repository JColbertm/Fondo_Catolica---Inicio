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

            <div style="">
              <div  id="listado3" style="height: 300px;  overflow-y: scroll" >
              </div>
            </div> 
          </form>
          <!-- tabla de resultados -->
                           
        </div>
      </div>           
    </div> 
  </div>  
  <!-- CONTENEDOR DEL CONTROL DE AHORROS -->
  <div class="col s8 m9">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <form class="col s12" id="formGenera">
            <div class="row">
              <div class="input-field col s9">
                <input placeholder="Nombre" id="last_name" type="text" class="validate" readonly="">
                <label for="last_name">Nombre y Apellido</label>
              </div>
              <div class="input-field col s9">
                <input  id="carnet" placeholder="Carnet" type="text" class="validate" readonly="">
                <label for="last_name">CI</label>
              </div>
              

            </div>
            <div class="row">
              <div class="input-field col s8">
                <input  placeholder="12/04/2016" id="fecha_afi" type="text" class="validate" readonly="">
                <label for="disabled">Fecha Afiliacion</label>
              </div>
               <div class="input-field col s6">
                <input placeholder="ASDSA12412ASD" id="password1" type="text" class="validate" readonly="">
                <label for="password">Anterior Contraseña</label>
              </div>
              <div class="input-field col s6">
                <input placeholder="ASDSA12412ASD" id="password2" type="text" class="validate" readonly="">
                <label for="password">Nueva Contraseña</label>
              </div>
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col offset-m7">
            <button id="guardaNP" class="waves-effect waves-light btn"><i class="fa fa-check"></i>Guardar Nueva Contraseña</button>
          </div>   
        </div>                      
      </div>           
    </div> 
  </div>
</div>