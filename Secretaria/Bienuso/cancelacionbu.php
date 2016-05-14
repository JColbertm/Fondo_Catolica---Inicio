<div class="row">
  <div class="col s4 m3">
    <div class="card">
	  <div class="card-action">
        <a>Registro Cuota</a>
      </div>
      <div class="card-content">
    	<table class="highlight centered">
          <thead>
        	<tr>
              <th>Nro.</th>
              <th>Bien de Uso</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>24214</td>
            </tr>
            <tr>
              <td>2</td>
              <td>43123</td> 
            </tr>
            <tr>
              <td>3</td>
              <td>24312</td> 
    	    </tr>
          </tbody>
        </table>
      </div>           
    </div> 
  </div>  
  <div class="col s8 m9">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <div align="center">
            <h5>Registro Cancelacion Bien de Uso</h5>
          </div>
          <br>
          <form class="col offset-s1 s10">
  	        <div class="row">
              <div class="input-field col s3">
                <input placeholder="02151" id="idbienuso" type="text" readonly="">
                <label>Nro. Cliente</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="nombre" type="text" readonly="" placeholder="Juan Perez">
                <label>Nombre Socio:</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="fecha" type="text" readonly="" value="<?php echo date("d-m-Y");?>">
                <label>Fecha:</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="monto" type="text" readonly="" placeholder="100.00">
                <label>Monto:</label>
              </div>
            </div>
            <div class="row">
              <div class="col offset-s7">
                <a class="waves-effect waves-light btn"><i class="fa fa-check"></i> Confirmar</a>
              </div>
            </div>
          </form>
        </div>
      </div>           
    </div> 
  </div>  
</div>