<div class="row"> 
<div class="col s12 m12">
 <nav class="#009688 teal">
    <ul id="perfil_usuario" class="dropdown-content">
      <li><a href="#!">one</a></li>
      <li><a href="#!">Cambiar Password</a></li>
      <li class="divider"></li>
      <li><a class="modal-trigger" href="#cierre_sesion"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesi&oacute;n</a></li>
    </ul>
    <div class="nav-wrapper">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <ul class="left hide-on-med-and-down">
        <li><a href="/Fondo_Catolica/Socio/indexsocio.php"><i class="fa fa-home"></i><b> HOME</b></a></li>
        <li><a href="/Fondo_Catolica/Socio/Prestamos/prestamos.php?opcion=informacion"><b>Pr&eacute;stamo</b></a></li>
        <li><a href="/Fondo_Catolica/Socio/Bienuso/bienuso.php?opcion=informacion"><b>Bien de Uso</b></a></li>
        <li><a href="/Fondo_Catolica/Socio/CajaAhorro/cajaahorro.php?opcion=informacion"><b>Caja de Ahorro</a></b></li>
        <li><a href="/Fondo_Catolica/Socio/IncreDismi/incredismi.php?opcion=informacion"><b>Solicitudes</b></a></li>
        <li><a href="/Fondo_Catolica/Socio/Faqs/faqs.php?opcion=informacion"><b>FAQ`s</b></a></li>
      </ul>
      <ul id="nav-" class="right hide-on-med-and-down">
        <ul id="perfil_usuario" class="dropdown-content">
          <li><a href="#!">one</a></li>
          <li><a href="#!">Cambiar Password</a></li>
          <li class="divider"></li>
          <li><a class="modal-trigger" href="#cierre_sesion"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesi&oacute;n</a></li>
        </ul> 
        <li><a class="dropdown-button" data-activates="perfil_usuario"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['nombre'].' '.$_SESSION['apellidop'].' '.$_SESSION['apellidom'] ?></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="/Fondo_Catolica/Socio/indexsocio.php"><i class="fa fa-home"></i> HOME</a></li>
        <li><a class="dropdown-button" data-activates="perfil_usuario"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['nombre'].' '.$_SESSION['apellidop'].' '.$_SESSION['apellidom'] ?></a></li>
        <li><a href="/Fondo_Catolica/Socio/Prestamos/prestamos.php?opcion=informacion"><i class="fa fa-money" aria-hidden="true"></i> Pr&eacute;stamo</a></li>
        <li><a href="/Fondo_Catolica/Socio/Bienuso/bienuso.php?opcion=informacion"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Bien de Uso</a></li>
        <li><a href="/Fondo_Catolica/Socio/CajaAhorro/cajaahorro.php?opcion=informacion"><i class="fa fa-archive" aria-hidden="true"></i> Caja de Ahorro</a></li>
        <li><a href="/Fondo_Catolica/Socio/IncreDismi/incredismi.php?opcion=informacion"><i class="fa fa-file-text-o" aria-hidden="true"></i> Solicitudes</a></li>
        <li><a href="/Fondo_Catolica/Socio/Faqs/faqs.php?opcion=informacion"><i class="fa fa-question" aria-hidden="true"></i> FAQ`s</a></li>
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