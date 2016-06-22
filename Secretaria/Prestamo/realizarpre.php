<div class="row">
<!-- Datos primordiales saldo y liquido pagable -->
<div class="col s12 m12">
    <div class="card">
      <div class="card-action">
        <a>Datos Requeridos</a>
      </div>
      <div class="card-content">
      <div class="row">
      <form id="FormDatosSueldo" method="POST" enctype="multipart/form-data">
            <div class="input-field col offset-l2 l2">
              <input type="text" id="carnet-actual-rp" onkeypress="return soloNumeros(event)" name="carnet_actual-rp" class="validate"  required>
              <label class="active">Carnet:</label>
            </div>      
            <div class="input-field col l2">
              <input type="text" id="sueldo-actual-rp" onkeypress="return soloNumeros(event)" name="sueldo-actual-rp" class="validate"  required>
              <label class="active">Total Ganado:</label>
            </div>
            <div class="input-field col l2">
              <input type="text" id="liquido-actual-rp" onkeypress="return soloNumeros(event)" name="liquido-actual-rp" class="validate"  required>
              <label class="active">Sueldo Liquido:</label>
            </div>
            <div class="col l3">
              <button class="btn waves-effect waves-light greed" id="boton_actualizar" onclick="javascript:actualizar_saldo();" type="button" name="action" ><i class="fa fa-check"></i>Actualizar</button>
          </div>
          <div id="mensaje_enviado"></div>
      </form>
      </div>           

      </div>           
    </div> 
  </div> <!-- fin Datos primordiales -->
<div id="formRealizarPrestamo">
	 <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
      <!-- con css hacemos que los botones sean estaticos -->
        <div id="boton-circular" align="right">
          <a class="btn-floating btn-large waves-effect waves-light green tooltipped btn modal-trigger " data-position="top" data-delay="50" data-tooltip="Simulacion" href="#modal3"><i class="fa fa-calculator"></i></a>
        </div>
        <div id="modal3" class="modal" style="display: none; opacity: 1; width:400px;">
                  <div class="modal-content teal white-text">
                <div class="modal-content center">
                    <h4>Simulacion</h4>
                        <div class="row">
                        <div class="col m7 l3">
                          <p><br> Monto: </p>
                        </div>
                        <div class="input-field col l3">
                        <input type="text" id="simu_pres_monto" class="validate center" onkeypress="return soloNumeros(event)">
                        </div>
                        <div class="col m7 l3">
                          <p><br> Meses: </p>
                        </div>
                        <div class="input-field col l3">
                        <input type="text" id="simu_pres_mes" class="validate center" onkeypress="return soloNumeros(event)">
                        </div>
                        </div>
                        <div id="alerta_simulacion"></div>
                        <button class="waves-effect waves-light btn yellow darken-4" type="button" onclick="javascript:simular_pres();">
                        <i class="fa fa-check"></i> Calcular</button>
                        
                        <div id="mostrar_cal" style="display: none;">
                        <div class="row">
                        <div class=" col offset-m3 m2 l3"><br> Interes:</div> 
                        <div class="input-field col m3 l3">
                        <input type="text" id="simu_pres_interes" readonly></div>
                        <div class=" col m3 l2"><br> Monto Cuota:</div> 
                        <div class="input-field col m3 l4">
                        <input type="text" id="simu_pres_cuota" readonly></div>
                        </div>
                        </div>
                  </div>
              </div>
                  <div class="modal-footer  yellow darken-4">
                    <a class="waves-effect waves-red btn-flat white-text modal-action modal-close">Salir</a>
                    <button onclick="javascript:datos_simulacion();" id="boton_aceptar" class="waves-effect waves-green btn-flat white-text modal-action modal-close">Aceptar Simulacion</button>
                  </div>
                </div>
                <!-- formulario de prestamo Registrar -->
          <div class="card">
  <div class="card-action">
    <a>Formularios</a>
  </div>
  <div class="card-content">
    <div class="row">
      <form id="FormPrestamo_reg" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col s4 m5 l3 right">
            <h6><b>Formulario A</b></h6>
          </div>
        </div>
        <div class="row">       
          <div class="col s3 m3 l3">
                      <img class="rerponsive-img" src="/Fondo_Catolica/Imagenes/logo_form.png" width="100%" heigth="100%">
                    </div>
                    <div class="col s8 m8 center">
                    <br>
                      <h5>FONDO DE AHORRO Y CREDITO "SAN PABLO"</h5>
                    </div>
                 </div>
                 <div class="row">
          <div align="center">
            
            <h4>SOLICITUD DE PRESTAMO</h4>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="input-field col s4">
              <input type="text" id="num-rp" readonly="" value="PRE-1">
                <label >Solicitud N°:</label>
          </div>
          <div class="input-field col s4 offset-s4">
              <input type="text" id="fechaactual-rp" readonly="" value="<?php echo date("d-m-Y");?>">
              <label>Fecha:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s3">
            <input type="text" name="ci" id="ci-rp" class="validate" placeholder="Carnet" readonly required>
            <label class="active">CI:</label>
          </div>
          <div class="input-field col s4">
            <input type="text" id="nombres-rp" class="validate" placeholder="" readonly required>
            <label class="active">Nombre:</label>
          </div>
          <div class="input-field col s4">
          <input type="text" id="apellidos-rp" class="validate" placeholder="" readonly required>
          <label class="active">Apellidos:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
          <input type="text" id="direccion-rp" class="validate" placeholder="" readonly required>          
          <label class="active">Direccion:</label>
          </div>
          <div class="input-field col s6">
          <input type="text" id="celular-rp" class="validate" placeholder="" readonly required>
          <label class="active">N° Celular:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
          <input type="text" id="depar-ucb-rp" class="validate" placeholder="" readonly required>
          <label class="active">Departamento UCB:</label>
          </div>
          <div class="input-field col s6">
          <input type="text" id="interno-rp" class="validate" placeholder="" readonly required>
          <label class="active">Interno:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input type="email" id="correo-rp" class="validate" placeholder="" readonly required>
            <label class="active" data-error="Correo Electronico no valido">Correo Electronico:</label>
          </div>
        </div>
        <div class="row">
        <p>Señores del Comité de Crédito: Presento a Uds. mi solicitud de préstamo por la cantidad de Bs:</p>
          <div class="input-field col s2">
            <input type="text" id="cantidad-rp" name="cantidad" class="validate" placeholder="" required onkeypress="return soloNumeros(event)" >
            <label class="active" >Cantidad Prestamo:</label>
          </div>
          <p><br><br>. Comprometiéndome a su total cancelación en un plazo de:</p>
        </div>
        <div class="row">
          <div class="input-field col s2 l2">
            <input placeholder="Ej. 12" type="text" id="plazo-mes-rp" name="meses" class="validate" required onkeypress="return soloNumeros(event)" >
            <label class="active">Meses</label>
          </div>
          <div class=" col s1 l1">
          <br><br>
            <p>a</p>
          </div>
          <div class="input-field col s2 l2">
            <input type="text" id="porcentaje-rp" name="porcentaje" class="validate center" placeholder readonly required >
            <label class="active" for="porcentaje-rp">%</label>
          </div>
          <div class="col s7 l7">
            <br><br>
            <p>, mas el interés del 1% sobre saldo.</p>
          </div>
        </div>
        <div class="row ">
        <p>También me comprometo a seguir aportando la cantidad de:</p>
          <div class="input-field col s2 l2">
            <input type="text" name="aporte" id="aporte-rp" class="validate center" placeholder readonly required>
            <label class="active">Cuota:</label>
          </div>
          <div class="col s10 l10">
            <br><br>
            <p> Bs. mensual, este monto acepté voluntariamente a que se me descuente por planilla.</p>
          </div>
        </div>
        <div class="row " >
          <p>Ofrezco como garantía personal:</p>
          <div class="input-field col s4 l2">
            <input type="text" id="ci-garante-rp" name="cigarante" class="validate center" placeholder required onkeypress="return soloNumeros(event)" >
            <label class="active">Ci</label>
          </div>
            <div class="input-field col s4 l4">
            <input type="text" name="nomgarante" id="nombre-garante-rp" class="validate" placeholder required onkeypress="return soloLetras(event)" >
            <label class="active">Nombres:</label>
          </div>
          <div class="input-field col s4 l4">
            <input type="text" name="apegarante" id="apellido-garante-rp" class="validate" placeholder required onkeypress="return soloLetras(event)" >
            <label class="active">Apellidos:</label>
          </div>
        </div>
        <div id="sugerencias"></div>
        <div id="mensa_verif_garante"></div>
        <div class="row">
          <div class="col s12 l12 ">
            <p>En caso de incumplimiento de pago, yo garante asumo la totalidad de la deuda contraída.</p>
          </div>
        </div>
        <div class="row">
          <div align="center">
              <h6><b>DATOS ECONÓMICOS DEL SOLICITANTE</b></h6>
          </div>
        </div>
        <div class="row">
          <div class="input-field col offset-s1 offset-l4 s5 l2">
            <input type="text" name="ganado" id="ganado-rp" class="validate center" placeholder readonly required >
            <label class="active">Total Ganado:</label>
          </div>
          <div class="input-field col s5 l2">
            <input type="text" name="liquido" id="liquido-rp" class="validate center" placeholder readonly required>
            <label class="active">Liquido Pagable:</label>
          </div>
        </div>
        <div id="alerta_revision"></div>
    </div>
  </div>
  </div>
          <!-- FIN formulario de prestamo -->
        <div class="row"> 
          <div class="col s6 m4 l3 left">
            <button class="btn waves-effect waves-light red" type="reset" onclick="javascript:cancelar_solicitud();" name="action" ><i class="fa fa-ban"></i> Cancelar</button>
          </div>
          <div class="col s6 m4 l3 right">
            <button class="btn waves-effect waves-light blue" type="button" id="boton_revision" name="action" onclick="javascript:revision_prestamo()" ><i class="fa fa-eye"></i> Revisar</button>
          </div>
          <div class="col s6 m4 l3 right">
            <button class="btn waves-effect waves-light blue" type="button" id="boton_enviar_rp" name="action" onclick="javascript:enviar_prestamo_por_terceros()" ><i class="fa fa-paper-plane-o"></i>Enviar</button>
          </div>    
        </div>
          
      </form>                 
      </div>
      <div id="mensaje_registrado"></div>           
    </div> 
    </div> 
  </div>
</div>