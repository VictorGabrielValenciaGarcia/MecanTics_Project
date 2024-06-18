@extends('layouts.base')
@section('content')


<div id="splash">

    <div class="col-8 offset-1 text-center mt-5">
        <img src="{{asset('Img/logowhitetiny.png')}}" height="200px" width="auto" class="imgsplah">
    </div>
    <div class="col-8 offset-2 text-center">

        <h1 class="trueborinicio-splah">M<span class="trueboriniciosec-splah">E</span><span class="trueborinicio-splah">CAN</span><span class="trueboriniciosec-splah">TIC´s</span></h1>
                    
    </div>

</h1>

</div>    
    <!-- Navegacion -->

       
            <nav class="navbar navbar-expand-lg backbarsup sticky-top ">
              <div class="container-fluid ps-3">
            
              
                    
                    <div class="col-xs-2 mb-1 mx-auto">
                        
                        <img src="Img/logowhitetiny.png" height="65px" width="auto" class="mt-1 mb-1">
                        
                    </div>
                    <div class="col-xs-3 text-start aling-middle me-5">
                        
                
                        <h1 class="trueborinicio">M<span class="trueboriniciosec">E</span><span class="trueborinicio">CAN</span><span class="trueboriniciosec">TIC´s</span></h1>
                
                    </div>
                

               
                        
                    
                    
  
              </div>
            </nav>

    <!--Hex-->
    <div class=" margintopaxoldown margintopaxol">
        <div class="col-xs-12 text-center fondaxolt">
        </div>
    </div>

    <!-- Inicia Sesión -->
    <div class="container margintophome">
        <div class="col-xs-3 text-center grentop">

                    <button type="button" class="btn btn-success loginletter  border-2 mt-1" data-bs-toggle="modal" data-bs-target="#LOGIN">
                        INICIAR SESIÓN
                      </button>
                      
        </div>
    </div>


    <div class="row mx-auto">

        <div class="col-6">
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg secundarios" data-bs-toggle="modal" data-bs-target="#sobrenosotros">
            Sobre nosotros
            </button>
            
        </div>

        <div class="col-6">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg secundarios" data-bs-toggle="modal" data-bs-target="#contact">
              Contáctanos
            </button>

        </div>

    </div>

    
    <!-- Modal about us -->

        <div class="modal fade mt-5" id="sobrenosotros" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">

                <div class="modal-header gren">

                    <div class="container">
                        
                        <div class="row">
                            
                                         
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
    
                        </div>
                        
                        
                        <div class="row mb-1 text-center">
    
                            <div class="col-4">
                            
                                <img src="Img/logo.png" height="100%" width="auto" class="mt-1 img-fluid">
                                
                            </div>
                            
                            <div class="col-7">

                                <h4 class="modal-title-conocenos text-center">Sobre Nosotros</h4>
                                   
                            </div>
                            
                        </div>

                    </div>

    
                </div>


                    <div class="modal-body">
                        <div class="container card text-center padding-centrador">

                                <p class="card-text textdesc ">MECANTIC´s es un proyecto de índole ecológico que se realizó con la finalidad de reciclar el Aluminio producido por el desecho de las latas.</p>
                                    
                                <p class="card-text textdesc ">Con esta aplicación tendrás acceso a una plataforma en donde podrás ver el registro de tus puntos acumulados. </p>
                                    
                                <p class="card-text textdesc ">Gracias por apoyar a esta noble causa y esperamos que logres ahorrar los suficientes puntos para alcanzar tu objetivo.</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Modal contacto -->
        <div class="modal fade mt-5" id="contact" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">

                    <div class="modal-content">

                        <div class="modal-header gren">

                            <div class="container">
                                
                                <div class="row">
                                    
                                                
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
            
                                </div>
                                
                                
                                <div class="row mb-1 text-center">
            
                                    <div class="col-xs-2">
                                    
                                        <img src="Img/logo.png" height="60px" width="auto" class="mt-1 mb-4">

                                        <div class="col-xs-8">
                                            <h4 class="modal-title-contact">Contáctanos</h4>                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>

                            </div>

            
                        </div>

                        <div class="modal-body padding-centrador text-center">
                            <p class=" textinfcon">Tel.  <a href="tel:+529514590568" class="textinfcon">(+52) 951 459 0568</a></p>
                            <p class=" textinfconcorr">Correo: <a href="mailto: utti212024@utvco.edu.mx" class="textinfcon">  utti212024@utvco.edu.mx</a></p>
                        </div>

                    </div>
                </div>
        </div>

    
    <!-- Modal Login -->
    <div class="modal fade mt-5" id="LOGIN" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm|lg" role="document">
            <div class="modal-content">

                <!--Modal Header-->
                <div class="modal-header gren">

                    <div class="container">
                        
                        <div class="row">
                            
                                         
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
    
                        </div>
                        
                        
                        <div class="row mb-1 text-center">
    
                            <div class="col-xs-2">
                            
                                <img src="Img/logo.png" height="60px" width="auto" class="mt-1 mb-4">

                                <div class="col-xs-8">
                                    <h4 class="modal-title-home">Inicia Sesión</h4>
                                    <h6 class="modal-title-homemini">- Bienvenido Agente del Cambio -</h6>
                                    
                                </div>
                                
                            </div>
                            
                            
                        </div>

                    </div>

    
                </div>



                <!--Modal Body-->

                <div class="modal-body">
                    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs justify-content-center aling-items-center" id="myTab" role="tablist">
                      
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="login" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Inicia Sesión</button>
                      </li>

                      <li class="nav-item" role="presentation">
                        <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Regístrate</button>
                      </li>

                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content mt-2">


                        <!--Tab 1-->

                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                          
                          <div class="container">

                                  <div class="mb-3 row justify-content-center aling-items-center">
                                  
                                    <button type="button" class="mt-4 btn btn-primary p-1 widthbut opensans"><a class="opensans" href="/login">Iniciar Sesión</a></button>
                                          
                                  </div>

                          </div>

                        </div>  

                        <!--Tab 2-->

                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
                        
                        <div class="container-fluid">
                            <div class="row mt-2 mb-4 text-center">
                                <h5 class="modal-titlereg libreFranklin">¿Cómo deseas registrarte?</h5>
                            </div>

                            <div class="row justify-content-center aling-items-center mt-4" >
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary p-1 widthbut opensans" href="/register"><a class="opensans" href="/register/1">Usuario</a></button>

                                                    
                                
                            </div>

                            <div class="row mt-3 mb-3 justify-content-center aling-items-center">
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary p-1 widthbut opensans" href="/register"><a class="opensans" href="/register/2">Centro de Canjeo</a></button>
                            </div>
                        </div>
                    
                    
                    </div>


                </div>
              
                



            </div>
        </div>
    </div>

  

    @endsection





    