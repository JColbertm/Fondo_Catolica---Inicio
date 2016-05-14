<div class="row">
    <div class="card">
      <div class="card-action">
        <a>Estado Bien de Uso</a>
      </div>
      <div class="card-content">
         <table class="highlight responsive-table centered">
          <thead>
            <tr>
                <th data-field="id">Nro.</th>
                <th data-field="id">Cantidad</th>
                <th data-field="name">Fecha</th>
                <th data-field="price">Estado</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>1000</td>
              <td>15-03-2016</td>
              <td> <div class="chip #9ccc65 light-green lighten-1">Aceptado</div></td>
              <td> <a href="#!" class="waves-effect waves-green btn-flat">Verificar</a></td>
              
            </tr>

            <tr>
              <td>2</td>
              <td>10000</td>
              <td>16-06-2016</td>
              <td> <div class="chip #9575cd deep-purple lighten-2">Pagado</div></td>
              <td> <a href="#!" class="waves-effect waves-purple btn-flat">Verificar</a></td>
              
            </tr>
            <tr>
              <td>3</td>
              <td>20000</td>
              <td>26-08-2016</td>
              <td> <div class="chip #ef5350 red lighten-1">Rechazado</div></td>
              <td> <a class="waves-effect waves-red btn-flat">Verificar</a></td>
            </tr>
            <tr>
              <td>4</td>
              <td>25000</td>
              <td>19-09-2016</td>
              <td> <div class="chip #eeff41 lime accent-2">Espera</div></td>
              <td> <a class="waves-effect waves-yellow btn-flat">Verificar</a></td>
            </tr>
            
            <tr>
              <td>5</td>
              <td>30000</td>
              <td>22-12-2016</td>
              <td> <div class="chip #4db6ac teal lighten-2">Observado</div></td>
              <td> <a class="waves-effect waves-teal btn-flat">Verificar</a></td>
            </tr>
          </tbody>
        </table>         
      </div>           
    </div> 
</div>

<div class="row">
  <div class="card">
    <div class="card-content">        
      <?php
          include $_SERVER["DOCUMENT_ROOT"]."/Fondo_Catolica/Formularios/formulario_bien_uso.php";
        ?>
    </div>
  </div>
</div>

<div class="row">
  <div class="card">
    <div class="card-action">
      <a>Nota de Observacion(es)</a>
    </div>
    <div class="card-content">
      <form>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" readonly=""></textarea>
            <label for="textarea1"><i class="fa fa-comment-o" aria-hidden="true"></i> Nota(s)</label>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
            