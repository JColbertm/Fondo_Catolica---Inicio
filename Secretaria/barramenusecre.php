<div class="row">
<div class="col m12 s12">
 <nav class="#009688 teal">
  <ul id="perfil_usuario" class="dropdown-content">
      <li><a href="#!">one</a></li>
      <li><a href="/Fondo_Catolica/Secretaria/cambiopasss.php">Cambiar Password</a></li>
      <li class="divider"></li>
      <li><a class="modal-trigger" href="#cierre_sesion"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesi&oacute;n</a></li>
    </ul>
    <div class="nav-wrapper">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <ul class="left hide-on-med-and-down">
        <li><a href="/Fondo_Catolica/Secretaria/indexsecre.php"><i class="fa fa-home"></i> HOME</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/Usuarios/usuariossecre.php">Usuarios</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/Prestamo/prestamosecre.php">Prestamos</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/Bienuso/bienusosecre.php">Bienes de Uso</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/CajaAhorro/cajaahorrosecre.php">Caja de Ahorros</a></li>
        <li><a href="/Fondo_Catolica/Formularios/formularios.php?opcion=informacion">Formularios</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/Reporte/reporte.php">Reportes</a></li>
      </ul>
      <ul id="nav-" class="right hide-on-med-and-down">
      <ul id="perfil_usuario" class="dropdown-content">
        <li><a href="#!">one</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/cambiopasss.php">Cambiar Password</a></li>
        <li class="divider"></li>
        <li><a class="modal-trigger" href="#cierre_sesion"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesi&oacute;n</a></li>
      </ul>
        <li><a class="dropdown-button" data-activates="perfil_usuario"><i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo $_SESSION['nombre'].' '.$_SESSION['apellidop'].' '.$_SESSION['apellidom'] ?></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="/Fondo_Catolica/Secretaria/indexsecre.php"><i class="fa fa-home"></i> HOME</a></li>
        <li><a class="dropdown-button" data-activates="perfil_usuario"><i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo $_SESSION['nombre'].' '.$_SESSION['apellidop'].' '.$_SESSION['apellidom'] ?></a></li>
        <li><a href="/Fondo_Catolica/Secretaria/Usuarios/usuariossecre.php"><i class="fa fa-users" aria-hidden="true"></i> Usuarios</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/Prestamo/prestamosecre.php"><i class="fa fa-money" aria-hidden="true"></i> Prestamos</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/Bienuso/bienusosecre.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Bienes de Uso</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/CajaAhorro/cajaahorrosecre.php"><i class="fa fa-archive" aria-hidden="true"></i> Caja de Ahorros</a></li>
        <li><a href="/Fondo_Catolica/Formularios/formularios.php?opcion=informacion"><i class="fa fa-file-text" aria-hidden="true"></i> Formularios</a></li>
        <li><a href="/Fondo_Catolica/Secretaria/Reporte/reporte.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Reportes</a></li>
      </ul>
    </div>
  </nav>

</div>
</div>


  <!-- Modal Structure -->
  <div id="cierre_sesion" name="cierre_sesion" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="col offset-m1 m10">
          <h4><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesi&oacute;n</h4>                
          <div class="row">
            <div class="col s12">
              <span>Esta seguro de Cerrar Sesi&oacute;n?</span>
            </div>
          </div>
          <div class="row">
            <div class="col m3">
              <a class=" modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
            </div>     
            <div class="col offset-m6 m3">
              <button class="waves-effect waves-light btn" type="button" id="cierre_sesion">
                Aceptar
              </button>
            </div>                  
          </div>               
        </div>
      </div>
    </div>
  </div>