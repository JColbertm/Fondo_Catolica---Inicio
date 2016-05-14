<div class="row">
  <div class="">
    <div class="card">
      <div class="card-action">
        <a>Caja de Ahorro</a>
      </div>
      <div class="card-content">

      <!--  Paneles opciones de bienes de uso -->
       <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s3"><a class="active" href="#test1">Control</a></li>
              <li class="tab col s3"><a href="#test2">Retiro</a></li>
              <li class="tab col s3"><a href="#test3">Multa</a></li>
            </ul>
          </div>
          <!--  PRIMER PANEL (cAJA DE uSO) -->
          <div id="test1" class="col s12">
          <br>
            <?php
              include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/CajaAhorro/controlsecre.php";
             ?>
          </div>
          
          <!--  TERCER PANEL (REGISTRO CUOTA) -->
          <div id="test2" class="col s12">
            <br>
              <?php
                include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/CajaAhorro/controlsecre.php";
              ?>
          </div>
          <!--  TERCER PANEL (BIENES DE USO)-->
          <div id="test3" class="col s12">
            <br>
              <?php
                include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Secretaria/CajaAhorro/multasecre.php";
              ?>
          </div>

        </div>
              
           
      </div>           
    </div> 
  </div>  
</div>
