<div class="row">
	<div class="col offset-m1 m10 s12">			
	  <div class="card">
      <div class="card-action">
        <a>Modificacion Parametros</a>
      </div>
      <div class="card-content">
        <!--  CONTENIDO DE LA OPCION PARAMETROS -->
        <div class="row">
          <div class="col m4 s12">     
            <div class="card">
              <div class="card-content">
                <!--  CONTENIDO TABLA DE PARAMETROS -->
                <table class="highlight centered">
                  <thead>
                    <tr>
                      <th data-field="id">Name</th>
                      <th data-field="name">Item Name</th>
                      <th data-field="price">Item Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Alvin</td>
                      <td>Eclair</td>
                      <td>$0.87</td>
                    </tr>
                    <tr>
                      <td>Alan</td>
                      <td>Jellybean</td>
                      <td>$3.76</td>
                    </tr>
                    <tr>
                      <td>Jonathan</td>
                      <td>Lollipop</td>
                      <td>$7.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>      
          </div>
          <div class="col m8 s12">     
            <div class="card">
              <div class="card-content">
                <!--  CONTENIDO TABLA DE PARAMETROS -->                          
                <div class="row">
                  <center><h4>Modificacion Parametros</h4></center>
                </div>
                <div class="row">
                  <form class="col s12 form-horizontal" id="form_parametro" method="POST">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="fa fa-info-circle prefix"></i>
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label>Informacion</label>
                      </div>                  
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="name_parametro" name="name_parametro" type="text" readonly>
                        <label><i class="fa fa-cogs" aria-hidden="true"></i> Nombre Parametro</label>
                      </div>
                      <div class="input-field col s6">
                        <input id="fecha_creacion" name="fecha_creacion" type="text" readonly>
                        <label><i class="fa fa-calendar" aria-hidden="true"></i> Fecha Creacion</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="valor_parametro" name="valor_parametro" type="text" class="validate">
                        <label><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Valor</label>
                      </div>
                    </div>
                  </form>
                  <button class="waves-effect waves-light btn right" id="btn_guarda_parametro" type="button"><i class="fa fa-wrench left"></i>Modificar</button> 
                </div>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </div>			
  </div>
</div>