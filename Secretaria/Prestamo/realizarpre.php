<div class="row">
	 <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
      <!-- con css hacemos que los botones sean estaticos -->
        <div id="botones-circulares" align="right">
          <a class="btn-floating btn-large waves-effect waves-light green btn modal-trigger " data-position="top" data-delay="50" data-tooltip="Simulacion" href="#modal3"><i class="fa fa-calculator"></i></a>
          <a class="btn-floating btn-large waves-effect waves-light red tooltipped" data-position="top" data-delay="50" data-tooltip="Imprimir"><i class="fa fa-print"></i></a>
        </div>
        <div id="modal3" class="modal" style="display: none; opacity: 1; top: 0px;">
                  <div class="modal-content teal white-text">
                <div class="modal-content center">
                    <h4>Simulacion</h4>
                        <div class="row"><div class=" col offset-m3 m2 offset-l3 l2"><br> Monto:</div> <div class="col m3 l3">
                        <input type="text" id="simu_pres_monto"></div></div>
                        <div class="row"><div class=" col offset-m2 m3 offset-l3 l2"><br> Mes Plazo:</div> <div class="col m3 l3">
                        <input type="text" id="simu_pres_mes"></div></div>
                        <button class="waves-effect waves-light btn yellow darken-4" type="button" onclick="javascript:simular_pres();">
                        <i class="fa fa-check"></i> Calcular</button>

                        <div id="mostrar_cal" style="display: none;">
                          <div class="row"><div class=" col offset-m3 m2 offset-l3 l2"><br> Interes:</div> <div class="col m3 l3">
                        <input type="text" id="simu_pres_interes" readonly></div></div>
                        <div class="row"><div class=" col offset-m2 m3 offset-l3 l2"><br> Monto Cuota:</div> <div class="col m3 l3">
                        <input type="text" id="simu_pres_cuota" readonly></div></div>
                        </div>
                  </div>
              </div>
                  <div class="modal-footer  yellow darken-4">
                    <a href="#" class="waves-effect waves-red btn-flat white-text modal-action modal-close">Salir</a>
                    <button onclick="javascript:datos_simulacion();" class="waves-effect waves-green btn-flat white-text modal-action modal-close">Aceptar Simulacion</button>
                  </div>
                </div>
        <div id="modal4" class="modal modal-fixed-footer green white-text" style="display: none; opacity: 1; top: 0px;">
              <div class="modal-content">
              <div class="col offset-m5 m4">
                <div class="modal-content center">
                    <h4>Simulaicon</h4>
                    <input type="text" id="simu_num1">
                <input type="text" id="simu_num1">
                <input type="text" id="simu_num1">
                  </div>
              </div>
              </div>
              <div class="modal-footer green lighten-4">
                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Disagree</a>
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
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
            Ci:<input type="text" name="ci" id="ci-rp" class="validate" required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <i class="fa fa-user prefix "></i>
            .<input type="text" id="nombres-rp" class="validate" readonly required>

          </div>
          <div class="input-field col s6">
        Apellidos:<input type="text" id="apellidos-rp" class="validate" readonly required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            Direccion:<input type="text" id="direccion-rp" class="validate" readonly required>
          </div>
          <div class="input-field col s6">
            N° Celular:<input type="text" id="celular-rp" class="validate" readonly required>
            <label></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            Departamento UCB:<input type="text" id="depar-ucb-rp" class="validate" readonly required>
          </div>
          <div class="input-field col s6">
            Interno:<input type="text" id="interno-rp" class="validate" readonly required>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            Correo Electronico:<input type="email" id="correo-rp" class="validate" readonly required>
            <label data-error="Correo Electronico no valido"></label>
          </div>
        </div>
        <div class="row">
        <p>Señores del Comité de Crédito:</p>
        <p>Presento a Uds. mi solicitud de préstamo por la cantidad de Bs:</p>
          <div class="input-field col s4">
            <input value=" " type="text" id="cantidad-rp" name="cantidad" class="validate" required>
            <label class="active" >Cantidad</label>
          </div>
        </div>
        <div class="row">
        <p>Comprometiéndome a su total cancelación en un plazo de:</p>
          <div class="input-field col s2 l2">
            <input value=" " type="text" id="plazo-mes-rp" name="meses" class="validate" required >
            <label class="active">Meses</label>
          </div>
          <div class=" col s1 l1">
          <br><br>
            <p>a</p>
          </div>
          <div class="input-field col s2 l2">
            <input value=" " type="text" id="porcentaje-rp" name="porcentaje" class="validate" required >
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
            <input type="text" id="aporte-rp" class="validate" readonly required>
          </div>
          <div class="col s10 l10">
            <br><br>
            <p> Bs. mensual, este monto acepté voluntariamente a que se me descuente por planilla.</p>
          </div>
        </div>
        <div class="row " >
          <p>Ofrezco como garantía personal:</p>
          <div class="col s1 l1">
            <br><br>

            <p>CI:</p>
          </div>
          <div class="input-field col s3 l3">
            <input type="text" id="ci-garante-rp" name="garante" class="validate" required>
            <label>Ci</label>
          </div>
        </div>
        <div class="row">
          <div class="col s2 l2">
            <br><br>
            <p>Nombre</p>
          </div>
          <div class="input-field col s4 l4">
            <input type="text" id="nombre-garante-rp" class="validate" readonly required  >
          </div>
          <div class="col s2 l2">
            <br><br>
            <p>Apellido</p>
          </div>
          <div class="input-field col s4 l4">
            <input type="text" id="apellido-garante-rp" class="validate" readonly required >
          </div>
        </div>
        <div id="mensa_verif_garante"></div>
        <div class="row">
          <div class="col s12 l12 ">
            <br><br>
            <p>En caso de incumplimiento de pago, yo garante asumo la totalidad de la deuda contraída.</p>
          </div>
        </div>
        <div class="row">
          <div align="center">
              <h6><b>DATOS ECONÓMICOS DEL SOLICITANTE</b></h6>
          </div>
        </div>
        <div class="row">
          <div class="col s5 l4">
            <br><br>
            <p>Total Ganado:</p>
          </div>
          <div class="input-field col s4 l4">
            <input type="text" id="ganado-rp" class="validate" readonly required >
          </div>
        </div>
        <div class="row">
          <div class="col s5 l4">
            <br><br>
            <p>Liquido Pagable:</p>
          </div>
          <div class="input-field col s4 l4">
            <input type="text" id="liquido-rp" class="validate" readonly required>
          </div>
        </div>
        <div id="cheque">
        <div class="row">
          <div class="col s5 l3" >
            <br><br>
            <p>Nº de Cheque</p>
          </div>
          <div class="input-field col s7 l4" >
            <input type="text" id="nu-cheque-rp" name="numero_cheque" placeholder="numero" required>
          </div>
        </div>
        </div>
    </div>
  </div>
  </div>
          <!-- FIN formulario de prestamo -->
        <div class="row"> 
          <div class="col offset-s2 s4 offset-l3 l4">
            <button class="btn waves-effect waves-light red" type="button" name="action" ><i class="fa fa-trash-o"></i> Limpiar</button>
          </div>   
          <div class="col s4 l4">
          <button class="btn waves-effect waves-light" type="button" onclick="javascript:registrar_prestamo();" name="action"><i class="fa fa-check"></i> Aceptar</button>
          </div>
        </div>   
                </form>                 
      </div>
      <div id="mensaje_registrado"></div>           
    </div> 
  </div>
</div>