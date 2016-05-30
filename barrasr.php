<div class="row"> 
<div class="col s12 m12">
 <nav class="#009688 teal">
    <div class="nav-wrapper">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <ul class="left hide-on-med-and-down">
        <li><a href="/Fondo_Catolica/index.php"><i class="fa fa-home"></i><b> HOME</b></a></li>
      </ul>
      <ul id="nav-" class="right hide-on-med-and-down">
        <li><a class="waves-effect waves-light modal-trigger" href="#modallogin"><i class="fa fa-sign-in" aria-hidden="true"></i><b> Ingresar</b></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="/Fondo_Catolica/Socio/indexsocio.php"><i class="fa fa-home"></i> HOME</a></li>
        <li><a class="waves-effect waves-light modal-trigger" href="#modallogin"><i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</a></li>
      </ul>
    </div>
  </nav>
</div>
</div>
<!-- Modal Structure -->
  <div id="modallogin" name="modallogin" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="col offset-m1 m10">
          <h4>Inicio Sesion</h4>
          <form name="form_login" id="form_login" method="POST">                
                <div class="row">
                  <div class="input-field col s12">
                    <input id="usuario" name="usuario" type="text" class="validate" required>
                    <label><i class="fa fa-user" aria-hidden="true"></i> Nombre de Usuario:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" name="password" type="password" class="validate" required>
                    <label for="password"><i class="fa fa-key" aria-hidden="true"></i>
                      Password
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col m3">
                    <button class="waves-effect waves-light btn" type="submit">
                      Ingresar
                    </button>
                  </div>                  
                </div>               
              </form>
            <div class="row">
              <div id="Mensaje_welcome">
                
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
    </div>
  </div>