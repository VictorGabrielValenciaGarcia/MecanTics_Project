@extends('layouts.base')
@section('content')

<nav class="navbar navbar-expand backbarsup sticky-top ">
        <div class="container-fluid">
      
        
              
              <div class="col-xs-2 mb-1">
                  
                  <img src="Img/logowhite.png" height="55px" width="auto" class="mt-1 mb-1">
                  
              </div>
              <div class="col-xs-3 ms-2">
                  
          
              <h1 class="letrastittlelogin mt-3">M<span class="letrastittleloginminus">E</span><span class="letrastittlelogin">CAN</span><span class="letrastittleloginminus">TIC´s</span></h1>
          
              </div>
          
              <div class="col-xs-3">
                  
                      <!-- Button trigger modal -->
                 <!-- <button type="button" class="btn btn-success opensans ms-3 mb-1 border-2 mt-1" data-bs-toggle="modal" data-bs-target="#modelId"><a href="" class="text-dark opensans">Iniciar Sesión</a></button> -->
                  <button type="submit" class="btn btn-success opensansBackHome ms-3 mb-1 border-2 mt-1">
                    <a class="opensans" href="/">Regresar al inicio</a></button>
                     
                    </button>
              </div>
         
                  
              
              

        </div>
</nav>


    
<div class="container-fluid mt-4 mb-3">

    <div class="container-fluid mb-1">
        
        <div class="modal-dialog modal-sm|lg" role="document">
            <div class="modal-content">
    
    
                <div class="modal-header">
    
                    <div class="container">

                        
                        <div class="row mb-1 text-center">
    
                            <div class="col-xs-2">
                            
                                <img src="Img/logo.png" height="60px" width="auto" class="mt-1 ">
                                <div class="col-xs-8">
                                <h4 class="modal-title-login mt-3">Inicia Sesión</h4>
                                <h6 class="modal-title-homemini mt-2">- ¡Es hora de Actuar! -</h6>
                                    
                                </div>
                                
                            </div>
                            
                            
                        </div>
    
                    </div>
    
    
                </div>
    
    
    
                <!--Modal Body-->
    
                <div class="modal-body">

                            <div class="container">


                                <form method="post" action="/login">
                                @csrf
                                @include('Layouts.partials.messages')
                                    <div class="mb-3 mt-1 row">

                                        <div class="col-sm-1-12">
                                            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" placeholder="Usuario / Correo personal">
                                            
                                        </div>
                                    </div>
                                
                                    <div class="mb-1 row">

                                        <div class="col-sm-1-12">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                                        </div>
                                    </div>


                                    <input type="checkbox" name="" id="" onclick="showPassword();"> <span  class="showpass mb-5"> Mostrar Contraseña</span>
        
                                    <!-- <div class="row mb-1 mt-3 aling-items-left">


                                        <button type="button" class="olvpass btn libreFranklin" data-bs-toggle="modal" data-bs-target="#ForgetPass">
                                            ¿Olvidaste tu contraseña?
                                        </button>

                                    </div> -->

                                    <div class="row mb-3 mt-3 aling-items-left">

                                        <p class="libreFranklin">¿No tienes Cuenta?
                                            
                                        <a href="" data-bs-toggle="modal" data-bs-target="#LOGIN"><strong>Regístrate</strong></a>
                                    
                                        </p>
                                    </div>

                                
                                    <div class="mb-3 row justify-content-center aling-items-center">
                                    
                                            <button type="submit" class="btn btn-primary p-1 widthbut opensans">Iniciar Sesión</button>
                                        <!--<a class="opensans" href="Usuario.html"></a>-->
                                    </div>


                                </form>
                            </div>
 
                </div>
    
            </div>
        </div>

    </div>
    
</div>
    

<nav class="navbar navbar-expand backbarinflogin">
    <div class="container-fluid text-center">
     
       
      <div class="col-4 offset-4 text-center">
                      
          <img src="Img/large.png" height="38px" width="auto" class="mt-1 mb-1">
          
      </div>
          
    
    </div>
</nav>



    <!-- Modal ForPass -->
    <div class="modal fade mt-5" id="ForgetPass" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <div class="container yell">
                        
                        <div class="row">
                            
                                         
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
    
                        </div>
                        
                        
                        <div class="row text-center">
    
                            <div class="col-xs-2">
                            
                                <img src="Img/logo.png" height="60px" width="auto" class="mb-3">
                                <div class="col-xs-8">
                                    <h4 class="modal-title">Recupera tu Constraseña</h4>
                                    <h6 class="modal-title">-  Ingresa tu Correo Personal -</h6>
                                    
                                </div>
                                
                            </div>
                            
                            
                        </div>

                    </div>

    
                </div>

                <div class="modal-body">
                    <div class="container">
                        <form>
                          
                            <div class="mb-3 row passpos">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="email" class="form-control" name="inputName" id="inputName" placeholder="Ingresa tu Correo Personal    ">
                                </div>
                            </div>

                            <div class="mb-3 row justify-content-center aling-items-center">
                            
                                    <button type="submit" class="btn btn-success p-1 widthbut border-1"><a class="opensans" href="Usuario.html">Solicitar Contraseña</a></button>
                             
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL LOGIN -->
    
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
                            
                                <img src="Img/logo.png" height="60px" width="auto" class="mt-1 mb-2">

                                <div class="col-xs-8">
                                    <h4 class="modal-title">Únete a nosotros!!</h4>
                                    <h6 class="modal-title-homemini mt-1 mb-1">- Juntos logramos el Cambio -</h6>
                                    
                                </div>
                                
                            </div>
                            
                            
                        </div>

                    </div>

    
                </div>



                <!--Modal Body-->

                <div class="modal-body">
                    
                        
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


@endsection