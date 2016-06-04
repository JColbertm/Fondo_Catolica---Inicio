<div class="row">
  <div class="">
    <div class="card">
      <div class="card-action">
        <a>Prestamos</a>
      </div>
      <div class="card-content">
      <!--  Paneles opciones de bienes de uso -->
       <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s4"><a class="active" href="#test1">Solicitudes Prestamo</a></li>
              <li class="tab col s4"><a href="#test2">Seguimiento Prestamos</a></li>
              <li class="tab col s4"><a href="#test3">Registro Cancelacion Prestamo</a></li>
              <li class="tab col s4"><a href="#test4">Realizar Prestamo</a></li>
            </ul>
          </div>
          <!--  PRIMER PANEL (SOLICITUDES DE BIENES DE USO) -->
          <div id="test1" class="col s12">
            <br>
              <?php
                include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Prestamo/solprestamos.php";
              ?>
          </div>
          <!--  SEGUNDO PANEL (BIENES DE USO)-->
          <div id="test2" class="col s12">
            <br>
              <?php
                include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Prestamo/seguimientospre.php";
              ?>
          </div>
          <!--  TERCER PANEL (REGISTRO CUOTA) -->
          <div id="test3" class="col s12">
            <br>
              <?php
                include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Prestamo/cancelacionpre.php";
              ?>
          </div>
          <div id="test4" class="col s12">
            <br>
              <?php
                include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Prestamo/realizarpre.php";
              ?>
          </div>
        </div>           
      </div>           
    </div> 
  </div>  
</div>
