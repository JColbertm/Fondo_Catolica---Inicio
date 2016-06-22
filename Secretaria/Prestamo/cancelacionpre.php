<div class="row">
  <div class="col s12 m12 l12">
    <div class="card">
      <div class="card-action">
        <a>Cancelacion Prestamo</a>
      </div>
      <div class="card-content">
        <div class="form-group" id="resultado2">
                
              </div>
      </div>           
    </div> 
  </div> 
</div>
<div class="row"> 
  <div class="col offset-l1 s8 m9 l10">
    <div class="card">
      <div class="card-content">
        <div class="row">
          <div align="center">
            <h5>Registro Cancelacion Prestamo</h5>
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
              <div class="col offset-s7 s5">
                <a class="waves-effect waves-light btn"><i class="fa fa-check"></i> Confirmar</a>
              </div>
            </div>
          </form>
        </div>
      </div>           
    </div> 
  </div>  
</div>