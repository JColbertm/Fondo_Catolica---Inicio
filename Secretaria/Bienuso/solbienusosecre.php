<div class="row">
  <div class="col s4 m3">
    <div class="card">
      <div class="card-action">
        <a>Solicitudes</a>
      </div>
      <div class="card-content">
        <table class="highlight centered">
          <thead>
            <tr>
              <th>Nro.</th>
              <th>Solicitud</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>24214</td>
            </tr>
            <tr>
              <td>2</td>
              <td>43123</td> 
            </tr>
            <tr>
              <td>3</td>
              <td>24312</td> 
            </tr>
          </tbody>
        </table>
      </div>           
    </div> 
  </div>  
  <div class="col s8 m9">
    <div class="card">
      <div class="card-content">
        <div align="right">
          <a class="btn-floating btn waves-effect waves-light red"><i class="fa fa-print"></i></a>
        </div>
          <?php
            include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_bien_uso.php";
          ?>
        <div class="row">
          <div class="col offset-m7">
            <a class="waves-effect waves-light btn"><i class="fa fa-ban"></i> Rechazar</a>
            <a class="waves-effect waves-light btn"><i class="fa fa-check"></i> Aceptar</a>
          </div>   
        </div>                    
      </div>           
    </div> 
  </div>  
</div>