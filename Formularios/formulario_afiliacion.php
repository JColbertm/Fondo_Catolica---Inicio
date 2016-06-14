
<div class="card">
    <div class="card-action">
        <a>Formularios</a>
    </div>
    <div class="card-content">
        <div class="row">
             
                <div class="row">
                  <div class="row">
                      <div class="col s4 m5 l3 right">
                        <h6><b>Formulario H</b></h6>
                      </div>
                    </div>
                <div class="row">       
                      <div class="col s3 m3 l3">
                      <img class="responsive-img" src="/Fondo_Catolica/Imagenes/logo_form.png" width="100%" heigth="100%">
                    </div>
                    <div class="col s8 m8 center">
                    <br>
                      <h5>FONDO DE AHORRO Y CREDITO "SAN PABLO"</h5>
                    </div>
                    </div>
                    <div class="row">
                    <div class="row center">
                        <h4>SOLICITUD PARA AFILIACION</h4>
                    </div>
                 </div>                  
                </div>
                <br>
                <div class="row">
                  <div class="input-field col s4 m5">
                    <input placeholder="00001" id="numsol" type="text" readonly="">
                    <label>Solicitud No:</label>
                  </div>
                  <div class="input-field col s4 m6 offset-s4 offset-m1">
                    <input  id="fechaactual" name="fechaactual" type="date" readonly="" value="<?php echo date('d-m-Y') ?>" class="datepicker">
                    <label>Fecha: (dia/mes/año)</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s4 m5">
                    <input id="carnet" name="carnet" type="text" class="validate" onkeypress="return soloNumeros(event);" maxlength="10">
                    <label>Carnet de identidad:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s4 m4">
                    <i class="fa fa-user prefix "></i>
                    <input type="text" id="nombres-sp" name="nombres-sp" class="validate" onkeypress="return soloLetras(event)">
                    <label>Nombres:</label>

                  </div>
                  <div class="input-field col s4 m4">
                    <input type="text" id="apellidoP-sp" name="apellidoP-sp" class="validate" onkeypress="return soloLetras(event)">
                    <label>Apellido paterno:</label>
                  </div>

                  <div class="input-field col s4 m4">
                    <input type="text" id="apellidoM-sp" name="apellidoM-sp" class="validate" onkeypress="return soloLetras(event)">
                    <label>Apellido materno:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6 m12">
                    <input type="text" id="direccion-sp" name="direccion-sp" class="validate">
                    <label>Direccion:</label>
                  </div>
                  <div class="input-field col s3 m6">
                    <input type="text" id="telefono-sp" name="telefono-sp" class="validate" onkeypress="return soloNumeros(event);" maxlength="7">
                    <label>N° Telefono:</label>
                  </div>
                  <div class="input-field col s3 m6">
                    <input type="text" id="celular-sp" name="celular-sp" class="validate" onkeypress="return soloNumeros(event);" maxlength="8">
                    <label>N° Celular:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6 m8" id="institucion">
                    <select name="institucion-sp" id="institucion-sp">
                          <option value="UCB" >UCB</option>
                          <option value="EPC" >EPC</option>
                        </select>
                    <label>Institucion:</label>
                    </div>
                    </div>
                <div class="row">
                  <div class="input-field col s6 m8" id="departamento">
                    <select name="depar-ucb-sp" id="depar-ucb-sp">
                          <option value="Elija un departamento" >Elija un departamento</option>
                          <option value="derecho" >Derecho</option>
                          <option value="pastoral" >Pastoral</option>
                          <option value="contabilidad">Contabilidad</option>
                          <option value="administracion">Administracion</option>
                          <option value="personal">Personal</option>
                        

                        </select>
                    <label>Departamento UCB:</label>
                  </div>
                  <div class="input-field col s6 m4">
                    <input type="text" id="interno-sp" name="interno-sp" class="validate" onkeypress="return soloNumeros(event);" maxlength="4">
                    <label>Interno:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m12">
                    <input type="text" id="correo-sp" name="correo-sp" class="validate">
                    <label data-error="Correo Electronico no valido">Correos Electronico:</label>
                  </div>
                </div>
                <div class="row">
                  <p>Señores de la Directiva:</p>
                  <p>Presento a Uds. el detalle de mi boleta de pago:</p>
                    <div class="col s7 m7 l3">
                      <br><br>
                      <p>Total Ganado:</p>
                    </div>
                    <div class="input-field col s5 m5 l2">
                      <input type="text" id="totGanado-sp" name="totGanado-sp" class="validate" onkeypress="return soloNumeros(event);">
                      <label>Bs:</label>
                    </div>
                    <div class="col s7 m7 l3">
                      <br><br> 
                      <p>Liquido Pagable:</p>
                    </div>
                    <div class="input-field col s5 m5 l2">
                      <input type="text" id="liquido-sp" name="liquido-sp" class="validate" onkeypress="return soloNumeros(event);">
                      <label>Bs:</label>
                    </div>
                    
                </div>
                <div class="row">
                   <div class="col s7 m7 l7">
                      <br><br> 
                      <p>Antigüedad como personal administrativo:</p>
                    </div>
                    <div class="input-field col s5 m5 l2">
                      <input type="text" id="antiguedad-sp" name="antiguedad-sp" class="validate" onkeypress="return soloNumeros(event);" maxlength="3">
                      <label>Meses:</label>
                    </div>
                </div>
                <div class="row">
                  <p>Los aportes seran unicamente por descuento en planilla de haberes mensuales segun art.24:</p>
                  <div class="col s7 m7 l9">
                      <br><br> 
                      <p>El monto que deseo aportar mensualmente es de Bs:</p>
                    </div>
                    <div class="input-field col s5 m5 l2">
                      <input type="text" id="aporte-sp" name="aporte-sp" class="validate">
                      <label>Bs:</label>
                    </div>
                </div>
                
                <div class="row">
                  <div class="col s12 m12 l12">                       
                      <div class="col s3 m3 l3">
                        <br><br>
                        A partir del año:
                      </div>
                     <div class="input-field col s2 m2 l2">
                      <input  type="text" id="year" name="year" style="color:black" readonly="">
                    </div>
                    <div class="col s2 m2 l2">
                      <br><br>
                      <p>y mes:</p>
                    </div>

                        
                    
                    <div class="input-field col s5 m4 l5" id="select_mes">
                        <select name="mes-sp" id="mes_val">
                          <option value="0" >Elija un mes</option>
                          <option value="1">Enero</option>
                          <option value="2">Febrero</option>
                          <option value="3">Marzo</option>
                          <option value="4">Abril</option>
                          <option value="5">Mayo</option>
                          <option value="6">Junio</option>
                          <option value="7">Julio</option>
                          <option value="8">Agosto</option>
                          <option value="9">Septiembre</option>
                          <option value="10">Octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>

                        </select>
                    </div>
                </div>
                </div>
                <div class="row">
                  <div id="resultado"></div>
                </div>  
                        
              
            </div> 
    </div> 
    
</div>
       

			
		