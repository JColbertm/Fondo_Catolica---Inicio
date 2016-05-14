<div class="row">
  <div class="card">
    <div class="card-action">
      <a>Cuotas Pr&eacute;stamo</a>
    </div>
    <div class="card-content">
      <div class="row">
        <div class="col m4 s12">
          <div class="card">
            <div class="card-content">
              <table class="highlight centered ">
                <thead>
                  <tr>
                      <th>Nro.</th>
                      <th>Cod. Pr&eacute;stamo</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>1</td>
                    <td>76542</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>12243</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>534534</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    
        <div class="col m8 s12">  
          <!--  llamada a la tarjeta de cuotas bien de uso -->     
          <?php 
            require_once $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Socio/Prestamos/cuoprestamoDer.php";
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

