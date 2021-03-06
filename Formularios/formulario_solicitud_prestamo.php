
<div class="card">
	<div class="card-action">
		<a>Formularios</a>
	</div>
	<div class="card-content">
		<div class="row">
			<form class="col s12 m12" name="formprestamo" id="formprestamo">
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
							<input type="text" id="num-sp" readonly="" value="PRE-1">
								<label >Solicitud N°:</label>
					</div>
					<div class="input-field col s4 offset-s4">
							<input type="text" id="fechaactual-sp" readonly="" value="<?php echo date("d-m-Y");?>">
							<label>Fecha:</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s3">
						Ci:<input type="text" name="" id="ci-sp" class="validate" required>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<i class="fa fa-user prefix "></i>
						.<input type="text" id="nombres-sp" class="validate" required>

					</div>
					<div class="input-field col s6">
				Apellidos:<input type="text" id="apellidos-sp" class="validate" required>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						Direccion:<input type="text" id="direccion-sp" class="validate" required>
					</div>
					<div class="input-field col s6">
						N° Celular:<input type="text" id="celular-sp" class="validate" required>
						<label></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						Departamento UCB:<input type="text" id="depar-ucb-sp" class="validate" required>
					</div>
					<div class="input-field col s6">
						Interno:<input type="text" id="interno-sp" class="validate" required>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						Correo Electronico:<input type="email" id="correo-sp" class="validate" required>
						<label data-error="Correo Electronico no valido"></label>
					</div>
				</div>
				<div class="row">
				<p>Señores del Comité de Crédito:</p>
				<p>Presento a Uds. mi solicitud de préstamo por la cantidad de Bs:</p>
					<div class="input-field col s4">
						<input type="text" id="cantidad-sp" class="validate" required>
						<label>Cantidad</label>
					</div>
					<div class="input-field col s8">
						<input type="text" id="literal-sp" class="validate" required>
						<label>00/100 bolivianos</label>
					</div>
				</div>
				<div class="row">
				<p>Comprometiéndome a su total cancelación en un plazo de:</p>
					<div class="input-field col s2 l2">
						<input type="text" id="plazo-mes-sp" class="validate"required>
						<label>Meses</label>
					</div>
					<div class=" col s1 l1">
					<br><br>
						<p>a</p>
					</div>
					<div class="input-field col s2 l2">
						<input type="text" id="porcentaje-sp" class="validate" required>
						<label>%</label>
					</div>
					<div class="col s7 l7">
						<br><br>
						<p>, mas el interés del 1% sobre saldo.</p>
					</div>
				</div>
				<div class="row ">
				<p>También me comprometo a seguir aportando la cantidad de Bs</p>
					<div class="input-field col s2 l2">
						<input type="text" id="aporte-sp" class="validate" required>
					</div>
					<div class="col s10 l10">
						<br><br>
						<p>mensual, este monto acepté voluntariamente a que se me descuente por planilla.</p>
					</div>
				</div>
				<div class="row " >
					<p>Ofrezco como garantía personal:</p>
					<div class="col s1 l1">
						<br><br>

						<p>CI:</p>
					</div>
					<div class="input-field col s3 l3">
						<input type="text" id="ci-garante-sp" class="validate" required>
						<label>Ci</label>
					</div>
				</div>
				<div class="row">
					<div class="col s2 l2">
						<br><br>
						<p>Nombre</p>
					</div>
					<div class="input-field col s4 l4">
						<input type="text" id="nombre-garante-sp" class="validate" required>
					</div>
					<div class="col s2 l2">
						<br><br>
						<p>Apellido</p>
					</div>
					<div class="input-field col s4 l4">
						<input type="text" id="apellido-garante-sp" class="validate" required>
					</div>
				</div>
				
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
						<input type="text" id="ganado-sp" class="validate"required >
					</div>
				</div>
				<div class="row">
					<div class="col s5 l4">
						<br><br>
						<p>Liquido Pagable:</p>
					</div>
					<div class="input-field col s4 l4">
						<input type="text" id="liquido-sp" class="validate"required>
					</div>
				</div>
				<div id="cheque">
				<div class="row">
					<div class="col s5 l3" >
						<br><br>
						<p>Nº de Cheque</p>
					</div>
					<div class="input-field col s7 l4" >
						<input type="text" id="nu-cheque-sp" placeholder="numero">
					</div>
				</div>
				</div>
			</form>
		</div>
	</div>
	</div>
	