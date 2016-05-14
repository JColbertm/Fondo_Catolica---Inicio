
<div class="card">
    <div class="card-action">
        <a>Formularios</a>
    </div>
    <div class="card-content">
        <div class="row">
              <form class="col s12 m12">
              <div class="row">
					<div class="col s4 m5 l3 right">
						<h6><b>Formulario C</b></h6>
					</div>
				</div>
                <div class="row">
                  <div class="col s2 m2">
                    <img class="responsive-img" src="/Fondo_Catolica/Imagenes/logo_form.png" width="60" heigth="60">
                  </div>
                  <div align="center">  
                    <h5>FONDO DE AHORRO Y CREDITO "SAN PABLO"</h5><BR>
                    <h4>SOLICITUD PARA CRÉDITO DE BIENES DE USO </h4>
                  </div>                  
                </div>
                <br>
                <div class="row">
                  <div class="input-field col s4 m5">
                    <input placeholder="00001" id="numsol" type="text" readonly="">
                    <label>Solicitud No:</label>
                  </div>
                  <div class="input-field col s4 m6 offset-s4 offset-m1">
                    <input id="fechaactual" type="text" readonly="" value="<?php echo date("d-m-Y");?>">
                    <label>Fecha:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s4 m5">
                    <input placeholder="6048521" id="carnet" type="text" class="validate">
                    <label>CI:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6 m7">
                    <i class="fa fa-user prefix "></i>
                    <input type="text" id="nombres-sp" class="validate">
                    <label>Nombres:</label>

                  </div>
                  <div class="input-field col s6 m5">
                    <input type="text" id="apellidos-sp" class="validate">
                    <label>Apellidos:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6 m12">
                    <input type="text" id="direccion-sp" class="validate">
                    <label>Direccion:</label>
                  </div>
                  <div class="input-field col s3 m6">
                    <input type="text" id="celular-sp" class="validate">
                    <label>N° Telefono:</label>
                  </div>
                  <div class="input-field col s3 m6">
                    <input type="text" id="celular-sp" class="validate">
                    <label>N° Celular:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6 m8">
                    <input type="text" id="depar-ucb-sp" class="validate">
                    <label>Departamento UCB:</label>
                  </div>
                  <div class="input-field col s6 m4">
                    <input type="text" id="interno-sp" class="validate">
                    <label>Interno:</label>
                  </div>
                </div>
                <div class="row">
                  <p>Señores de la Directiva solicito a ustedes los siguientes productos de acuerdo a proforma del proveedor:</p>
                  <div class="row">
                    <div class="col s7 m7 l2">
                      <br><br>
                      <p>Nombre:</p>
                    </div>
                    <div class="input-field col s5 m5 l4">
                      <input type="text" id="cantidad-sp" class="validate">
                      <label></label>
                    </div>
                   	<div class="col s7 m7 l2">
                      <br><br>
                      <p>Marca:</p>
                    </div>
                    <div class="input-field col s5 m5 l4">
                      <input type="text" id="cantidad-sp" class="validate">
                      <label></label>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col s7 m7 l2">
                      <br><br>
                      <p>Codigo:</p>
                    </div>
                    <div class="input-field col s5 m5 l4">
                      <input type="text" id="cantidad-sp" class="validate">
                      <label></label>
                    </div>
                   	<div class="col s7 m7 l2">
                      <br><br>
                      <p>Monto Bs:</p>
                    </div>
                    <div class="input-field col s5 m5 l4">
                      <input type="text" id="cantidad-sp" class="validate">
                      <label></label>
                    </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col s3 m2 l1">
                      <br><br> 
                      <p>A:</p>
                    </div>
                    <div class="input-field col s5 m5 l2">
                      <input type="text" id="cantidad-sp" class="validate">
                      <label>Meses:</label>
                    </div>
                    <div class="col s4 m3 l1">
                      <br><br> 
                      <p>Meses.</p>
                    </div>
                </div>
                <div class="row">
                  <div class="col s8 m7 l5">
                      <br><br>
                      <p>El interés a descontar será de:</p>
                    </div>
                    <div class="input-field col s2 m6 l4">
                      <input type="text" id="cantidad-sp" class="validate">
                      <label></label>
                    </div>
                    <div class="col s2 m4 l3">
                      <br><br>
                      <p>% anual.</p>
                    </div>
                </div>
                <div class="row">
                  <div class="col s7 m7 l8">
                      <br><br> 
                      <p>El monto a descontar mensualmente es de Bs:</p>
                    </div>
                    <div class="input-field col s5 m5 l2">
                      <input type="text" id="cantidad-sp" class="validate">
                      <label>Bs:</label>
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m12 l12">
                    <input type="text" id="literal-sp" class="validate">
                    <label>00/100 bolivianos</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s6 m2 l4">
                      <br><br> 
                      <p>Numero de Cheque:</p>
                    </div>
                    <div class="input-field col s6 m5 l2">
                      <input type="text" id="cantidad-sp" class="validate">
                      <label>No:</label>
                    </div>
                  <div class="col s6 m2 l4">
                      <br><br> 
                      <p>Resibi Conforme:</p>
                    </div>
                    
                </div>            
              </form>
            </div> 
    </div> 
    
</div>       

			
		