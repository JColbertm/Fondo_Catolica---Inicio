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

<div class="card">
  <div class="card-action">
    <a>Formulario Cancelacion</a>
  </div>
  <div class="card-content">
    <div class="row">
      <form class="col s10 m10 offset-l2 l10">
        <div class="row">
          <div class="col s4 m5 l3 right">
            <h6><b>Formulario G</b></h6>
          </div>
        </div>
        <div class="row">       
          <div class="col s3 m3 l3">
                      <img class="responsive-img" src="/Fondo_Catolica/Imagenes/logo_form.png" width="70%" heigth="70%">
                    </div>
                    <div class="col s6 m6 l6 center">
                      <h5>FONDO DE AHORRO Y CREDITO "SAN PABLO"</h5>
                    </div>
                 </div>
                 <div class="row">
          <div align="center">
            
            <h4>CANCELACIÓN DE DEUDA</h4>
          </div>
        </div>
        
        <div class="row">
          <div class="input-field col s2">
              <input type="text" id="num-sc" placeholder="Form_Sol" readonly="">
                <label >Solicitud N°:</label>
          </div>
          <div class="input-field col offset-l6 l2">
              <input type="text" id="fechaactual-sc" readonly="" value="<?php echo date("d-m-Y");?>">
              <label>Fecha:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s2">
            <input type="text" name="" id="ci-sc" class="validate" placeholder readonly>
            <label class="active">Ci:</label>
          </div>
          <div class="input-field col s4">
            <i class="fa fa-user prefix "></i>
            <input type="text" id="nombres-sc" class="validate" placeholder readonly>
            <label class="active">Nombres:</label>

          </div>
          <div class="input-field col s4">
            <input type="text" id="apellidos-sc" class="validate" placeholder readonly>
            <label class="active">Apellidos:</label>
          </div>
        </div>
        
        <div class="row">
              <p>Señores del Comité Administrativo, de Crédito y de Vigilancia: Cancelé mi deuda pendiente TOTAL,</p>            
            <div class="col s5 l5">
            <br><br>
              <p>los mismos que ascienden a un valor de Bs </p>
            </div>
            <div class="input-field col s2 l2">
                <input type="text" id="pagar-sc" class="validate" placeholder readonly>
                <label class="active">Bs</label>
            </div>
        </div>
        <div class="row">
        <p>Pago con:</p>
          <div class="col s12 l2">
          <br><br>
            <p>Aportes Bs</p>
          </div>
          <div class="input-field col s6 l2">
                <input type="text" id="aportes-sc" class="validate"  >
                <label class="active">Bs</label>
          </div>
          <div class="col s12 l2">
          <br><br>
            <p>Deposito Bs</p>
          </div>
          <div class="input-field col s6 l2">
                <input type="text" id="deposito-sc" class="validate"  >
                <label class="active">Bs</label>
          </div>
        </div>

      </form>
    </div>
  </div>
  </div>
<div class="row"> 
          <div class="col s6 m4 l3">
            <button class="btn waves-effect waves-light blue" type="button" id="boton_revision_sol" name="action" onclick="javascript:revision_prestamo_solicitud();" ><i class="fa fa-eye"></i> Revisar</button>
          </div>   
          <div class="col s6 m6 offset-l6 l3">
          <button class="btn waves-effect waves-light" type="button" id="boton_registrar_sol" onclick="javascript:enviar_prestamo_sol();" name="action"><i class="fa fa-paper-plane-o"></i> Enviar</button>
          </div>
          </div>
</div>