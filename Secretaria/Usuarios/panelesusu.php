<div class="row">
    <div class="card">
      <div class="card-action">
        <a>Socios</a>
      </div>
      <div class="card-content">

      <!--  Paneles opciones de bienes de uso -->
       <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s3"><a class="active" href="#test1">Afiliar Socio</a></li>
              <li class="tab col s3"><a href="#test2">Modificar Socio</a></li>
              <li class="tab col s3"><a href="#test3">Eliminar Socio</a></li>
              <li class="tab col s3"><a href="#test4">Generar Nueva Contraseña</a></li>
            </ul>
          </div>
          <!--  PRIMER PANEL (AFILIACION SOCIO) -->
          <div id="test1" class="col s12">
          <br>
            <?php
              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Usuarios/altausu.php";
            ?>        
          </div>

          <!--  SEGUNDO PANEL (MODIFICACR SOCIO)-->
          <div id="test2" class="col s12">
            <br>
              <?php
                include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Usuarios/modusu.php";
              ?>            
          </div>
          <!--  TERCER PANEL (ELIMINAR SOCIO) -->
          <div id="test3" class="col s12">
            <br>
              <?php
                include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Usuarios/bajausu.php";
              ?>  
          </div>

          <!--  CUARTO PANEL (GENERA CONTRASEÑA SOCIO) -->
          <div id="test4" class="col s12">
            <br>
              <?php
                include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/Usuarios/genera.php";
              ?> 
          </div>

        </div>       
      </div>           
    </div>  
</div>
