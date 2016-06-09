<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-action">
        <a>Solicitudes</a>
      </div>
      <div class="card-content">
       <div id="tabla_solicitudes"></div>
      </div>           
    </div> 
  </div>  
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        

        <!-- formulario de prestamo -->
        
          <div class="card">
  <div class="card-action">
    <a>Formularios</a>
  </div>
  <div class="card-content">
    <div class="row">
      <form class="col s12 m12" name="FormPrestamo_reg_sol" id="FormPrestamo_reg_sol">
        <div class="row">
          <div class="col s4 m5 l3 right">
            <h6><b>Formulario A</b></h6>
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
          <div align="center">
            
            <h4>SOLICITUD DE PRESTAMO</h4>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="input-field col s4">
              <input type="text" id="num-sp" readonly="" value=" ">
                <label >Solicitud N°:</label>
          </div>
          <div class="input-field col s4 offset-s4">
              <input type="text" id="fechaactual-sp" readonly="" value="<?php echo date("d-m-Y");?>">
              <label>Fecha:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s3">
            <input type="text" name="ci" id="ci-sp" class="validate" placeholder="" readonly required>
            <label class="active">CI:</label>
          </div>
          <div class="input-field col s4">
            <input type="text" id="nombres-sp" class="validate" placeholder="" readonly required>
            <label class="active">Nombre:</label>
          </div>
          <div class="input-field col s4">
          <input type="text" id="apellidos-sp" class="validate" placeholder="" readonly required>
          <label class="active">Apellidos:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
          <input type="text" id="direccion-sp" class="validate" placeholder="" readonly required>          
          <label class="active">Direccion:</label>
          </div>
          <div class="input-field col s6">
          <input type="text" id="celular-sp" class="validate" placeholder="" readonly required>
          <label class="active">N° Celular:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
          <input type="text" id="depar-ucb-sp" class="validate" placeholder="" readonly required>
          <label class="active">Departamento UCB:</label>
          </div>
          <div class="input-field col s6">
          <input type="text" id="interno-sp" class="validate" placeholder="" readonly required>
          <label class="active">Interno:</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input type="email" id="correo-sp" class="validate" placeholder="" readonly required>
            <label class="active" data-error="Correo Electronico no valido">Correo Electronico:</label>
          </div>
        </div>
        <div class="row">
        <p>Señores del Comité de Crédito: Presento a Uds. mi solicitud de préstamo por la cantidad de Bs:</p>
          <div class="input-field col s2">
            <input type="text" id="cantidad-sp" name="cantidad" class="validate" placeholder readonly required>
            <label class="active" >Cantidad Prestamo:</label>
          </div>
          <p><br><br>. Comprometiéndome a su total cancelación en un plazo de:</p>
        </div>
        <div class="row">
          <div class="input-field col s2 l2">
            <input placeholder="" type="text" id="plazo-mes-sp" name="meses" class="validate" readonly required >
            <label class="active">Meses</label>
          </div>
          <div class=" col s1 l1">
          <br><br>
            <p>a</p>
          </div>
          <div class="input-field col s2 l2">
            <input type="text" id="porcentaje-sp" name="porcentaje" class="validate center" placeholder readonly required >
            <label class="active" for="porcentaje-sp">%</label>
          </div>
          <div class="col s7 l7">
            <br><br>
            <p>, mas el interés del 1% sobre saldo.</p>
          </div>
        </div>
        <div class="row ">
        <p>También me comprometo a seguir aportando la cantidad de:</p>
          <div class="input-field col s2 l2">
            <input type="text" id="aporte-sp" class="validate center" placeholder readonly required>
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
            <input type="text" id="ci-garante-sp" name="garante" class="validate center" placeholder readonly required>
            <label class="active">Ci</label>
          </div>
            <div class="input-field col s4 l4">
            <input type="text" id="nombre-garante-sp" class="validate" placeholder readonly required  >
            <label class="active">Nombres:</label>
          </div>
          <div class="input-field col s4 l4">
            <input type="text" id="apellido-garante-sp" class="validate" placeholder readonly required >
            <label class="active">Apellidos:</label>
          </div>
        </div>
                <div id="mensa_verif_garante_sol"></div>

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
            <input type="text" id="ganado-sp" class="validate center" placeholder readonly required >
            <label class="active">Total Ganado:</label>
          </div>
          <div class="input-field col s5 l2">
            <input type="text" id="liquido-sp" class="validate center" placeholder readonly required>
            <label class="active">Liquido Pagable:</label>
          </div>
        </div>
                <div id="alerta_revision_sol"></div>
    </div>
  </div>
  </div>
          <!-- Fin formulario de prestamo -->

        <div class="row"> 
          <div class="col s6 offset-m2 m4 offset-l4 l3">
            <button class="btn waves-effect waves-light blue" type="button" id="boton_revision_sol" name="action" onclick="javascript:revision_prestamo_solicitud();" ><i class="fa fa-eye"></i> Revisar</button>
          </div>   
          <div class="col s6 m6 l4">
          <button class="btn waves-effect waves-light" type="button" id="boton_registrar_sol" onclick="javascript:enviar_prestamo_sol();" name="action"><i class="fa fa-paper-plane-o"></i> Enviar</button>
          </div>
        </div>
        </form>                   
      </div> 
            <div id="mensaje_registrado_sol"></div>                     
    </div> 
  </div>  
</div>