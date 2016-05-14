<div class="row">
  <div class="">
    <div class="card">
      <div class="card-action">
        <a>Modificacion de Imagenes</a>
      </div>
      <div class="card-content">

      <!--  Paneles opciones de bienes de uso -->
       <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s4"><a class="active" href="#test1">Modificar Carrusel</a></li>
              <li class="tab col s4"><a href="#test2">Modificar Promocion</a></li>
            </ul>
          </div>
          <!--  PRIMER PANEL (SOLICITUDES DE BIENES DE USO) -->
          <div id="test1" class="col s12">
          <br>            
            <!--  CONTENIDO DEL MENU CARRUSEL -->
              <div class="row">
                <div class="col offset-m1 m10 s12">     
                  <div class="card">
                    <div class="card-content">
                      <!--  CONTENIDO DEL MENU CARRUSEL -->

                      <div class="row">
                        <form method="POST" enctype="multipart/form-data" class="form_imagen" action="/Fondo_Catolica/Administrador/controlador/data_imagen.php">
                          <div class="col s12 m6">
                            <img class="materialboxed responsive-img" src="/Fondo_Catolica/Imagenes/banner1.jpg"> 
                          </div>
                          <div class="col s12 m6">
                            <div class="row">
                              <div class="row">
                                <div class="input-field">
                                  <input id="direccion" type="text" readonly="">
                                  <label>Direccion</label>
                                </div>                                    
                              </div>                                                            
                            
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>Imagen </span>
                                  <input type="file" name="archivo" id="archivo"><i class="fa fa-picture-o" aria-hidden="true"></i>
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" required>
                                </div>
                              </div>
                              <button class="waves-effect waves-light btn right btncargar" type="submit"><i class="fa fa-upload right"></i>
                                Cargar
                              </button>
                            </div>
                          </div>
                        </form>  
                      </div>  

                      <div class="row">
                        <form>
                          <div class="col s12 m6">
                            <img class="materialboxed responsive-img" src="/Fondo_Catolica/Imagenes/banner2.jpg"> 
                          </div>
                          <div class="col s12 m6">
                            <div class="row">
                              <div class="row">
                                <div class="input-field">
                                  <input id="direccion" type="text" readonly="">
                                  <label>Direccion</label>
                                </div>                                    
                              </div>                                  
                            
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>Imagen</span>
                                  <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                                </div>
                              </div>
                              <a class="waves-effect waves-light btn right"><i class="fa fa-upload right"></i>Cargar</a>
                            </div>
                          </div>
                        </form>
                      </div>

                      <div class="row">
                        <form>
                          <div class="col s12 m6">
                            <img class="materialboxed responsive-img" src="/Fondo_Catolica/Imagenes/banner3.jpg"> 
                          </div>
                          <div class="col s12 m6">
                            <div class="row">
                              <div class="row">
                                <div class="input-field">
                                  <input id="direccion" type="text" readonly="">
                                  <label>Direccion</label>
                                </div>                                    
                              </div>                                
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>Imagen</span>
                                  <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                                </div>
                                <a class="waves-effect waves-light btn right"><i class="fa fa-upload right"></i>Cargar</a>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>  
                    
                      <div class="row">
                        <form>
                          <div class="col s12 m6">
                            <img class="materialboxed responsive-img" src="/Fondo_Catolica/Imagenes/banner4.jpg"> 
                          </div>
                          <div class="col s12 m6">
                            <div class="row">
                              <div class="row">
                                <div class="input-field">
                                  <input id="direccion" type="text" readonly="">
                                  <label>Direccion</label>
                                </div>                                    
                              </div>                                                        
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>Imagen</span>
                                  <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                                </div>
                                <a class="waves-effect waves-light btn right"><i class="fa fa-upload right"></i>Cargar</a>
                              </div>    
                            </div>
                          </div>
                        </form>  
                      </div>

                    </div>
                  </div>      
                </div>
              </div>
            </div>
          <!--  SEGUNDO PANEL (BIENES DE USO)-->
          <div id="test2" class="col s12">
            <br>

            <div class="row">
              
              <div class="col offset-m1 m10 s12">     
                  <div class="card">
                    <div class="card-content">
                      <!--  CONTENIDO DEL MENU CARRUSEL -->
                      <div class="row">
                        <div class="col s12 m6">
                          <center><img class="materialboxed responsive-img" src="/Fondo_Catolica/Imagenes/color6.png"></center>
                        </div>
                        <div class="col s12 m6">
                          <div class="row">

                            <form class="col s12">
                              <div class="row">
                                <div class="input-field">
                                  <input id="direccion" type="text" readonly="">
                                  <label>Direccion</label>
                                </div>                                    
                              </div>                                  
                            </form>

                            <form action="#">
                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>Imagen</span>
                                  <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                                </div>
                              </div>
                              <a class="waves-effect waves-light btn right"><i class="fa fa-upload right"></i>Cargar</a>
                            </form>
                          
                          </div>
                        </div>
                      </div>  
                      
                    
                    <div class="row">
                      <div class="col s12 m6">
                        <center><img class="materialboxed responsive-img" src="/Fondo_Catolica/Imagenes/ima4.jpg"></center>
                      </div>
                      <div class="col s12 m6">
                        <div class="row">

                          <form class="col s12">
                            <div class="row">
                              <div class="input-field">
                                <input id="direccion" type="text" readonly="">
                                <label>Direccion</label>
                              </div>                                    
                            </div>                                  
                          </form>

                          <form action="#">
                            <div class="file-field input-field">
                              <div class="btn">
                                <span>Imagen</span>
                                <input type="file">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                              </div>
                              <a class="waves-effect waves-light btn right"><i class="fa fa-upload right"></i>Cargar</a>
                            </div>
                          </form>
    
                        </div>
                      </div>
                    </div>  
                  </div>
                </div>      
              </div>

            </div>
            
          </div>
        </div>           
      </div>           
    </div> 
  </div>  
</div>













