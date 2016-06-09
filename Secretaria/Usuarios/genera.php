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
                <input id="buscar_afi3" type="text" class="validate" onkeyup="javascript:buscar_teclado(this,3);">
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
       <div id="botones-circulares" align="right" >
                      <a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Imprimir"><i class="fa fa-print"></i></a>
        </div>
        <div class="row">
          <form class="col s12" id="formGenera">
            <div class="row">
              <div class="input-field col s9">
                <input id="last_name" type="text" class="validate" readonly="">
                <label for="last_name"><i class="fa fa-user" aria-hidden="true"></i> Nombre y Apellido</label>
              </div>
              <div class="input-field col s9">
                <input  id="carnet" type="text" class="validate" readonly="">
                <label for="last_name"><i class="fa fa-user" aria-hidden="true"></i> Carnet de identidad</label>
              </div>
              

            </div>
            <div class="row">
              <div class="input-field col s8">
                <input   id="fecha_afi" type="text" class="validate" readonly="">
                <label for="disabled"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha Afiliacion</label>
              </div>
              <div class="input-field col s9">
                <input id="user" type="text" class="validate" readonly="">
                <label for="last_name"><i class="fa fa-user" aria-hidden="true"></i> Usuario</label>
              </div>
               <div class="input-field col s6">
                <input id="password1" type="password" class="validate" readonly="">
                <label for="password">Anterior Contraseña</label>
              </div>
              <div class="input-field col s6">
                <input id="password2" type="text" class="validate" readonly="">
                <label for="password">Nueva Contraseña</label>
              </div>
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col offset-m5">
          <button class="btn waves-effect waves-light red" type="button" name="limpia" id="limpia"><i class="fa fa-trash-o"></i> Limpiar</button>
            <button id="guardaNP" class="waves-effect waves-light btn"><i class="fa fa-check"></i>Guardar</button>
          </div>  
           
        </div>                      
      </div>           
    </div> 
  </div>
</div>