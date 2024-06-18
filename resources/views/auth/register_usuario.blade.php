@extends('layouts.base')
@section('content')

<nav class="navbar navbar-expand backbarsup sticky-top ">
        <div class="container-fluid">
      
        
              
              <div class="col-xs-2 mb-1">
                  
                  <img src="{{asset('Img/logowhite.png')}}" height="55px" width="auto" class="mt-1 mb-1">
                  
              </div>
              <div class="col-xs-3 ms-2">
                  
          
              <h1 class="letrastittlelogin mt-3">M<span class="letrastittleloginminus">E</span><span class="letrastittlelogin">CAN</span><span class="letrastittleloginminus">TIC´s</span></h1>
          
              </div>
          
              <div class="col-xs-3">
                  
                      <!-- Button trigger modal -->
                 <!-- <button type="button" class="btn btn-success opensans ms-3 mb-1 border-2 mt-1" data-bs-toggle="modal" data-bs-target="#modelId"><a href="" class="text-dark opensans">Iniciar Sesión</a></button> -->
                  <button type="submit" class="btn btn-success opensansBackHome ms-3 mb-1 border-2 mt-1">
                    <a class="opensans" href="/"> Regresar al inicio</a></button>
                     
                    </button>
              </div>
         
                  
              
              

        </div>
</nav>

      <div class="container-fluid mt-4 mb-4">


        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-header">

                    <div class="container yell">
                        
                  
                        
                        <div class="row text-center">
    
                            <div class="col-xs-2">
                            
                                <img src="{{asset('Img/logo.png')}}" height="50px" width="auto">
                                <div class="col-xs-8">
                                    <h4 class="modal-title">Regístrate</h4>
                                    <h6 class="modal-title">- Comienza a Reciclar hoy -</h6>
                                    
                                </div>
                                
                            </div>
                            
                            
                        </div>

                    </div>

    
                </div>

                <div class="modal-body margenestabilizador">
                    <div class="container">

                        <form method="POST" action="/register">
                            @csrf

                            <input type="hidden" name="tipo" value="1">
                           
                            <div class="mb-1 row mt-2">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type= "text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" placeholder="Nombre(s)">
                                @error ('nombre')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>

                            <div class="mb-1 row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="primer_ap" id="primer_ap" value="{{ old('primer_ap') }}" placeholder="Apellido Paterno">
                                @error ('primer_ap')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>

                            <div class="mb-1 row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="segundo_ap" value="{{ old('segundo_ap') }}" id="segundo_ap" placeholder="Apellido Materno">
                                @error ('segundo_ap')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>
                            
                            <div class="mb-1 row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="matricula" id="matricula" value="{{ old('matricula') }}" placeholder="Matrícula Escolar">
                                @error ('matricula')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>

                            <div class="mb-1 row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="correo_inst" id="correo_inst" value="{{ old('correo_inst') }}" placeholder="Correo Institucional">
                                @error ('correo_inst')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>
                            
                            <div class="mb-1 row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="correo_personal" id="correo_personal" value="{{ old('correo_personal') }}" placeholder="Correo Personal">
                                @error ('correo_personal')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>
                             
                            <div class="mb-1 row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="carrera" id="carrera" value="{{ old('carrera') }}" placeholder="Carrera">
                                @error ('carrera')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>
                                         
                            <div class="mb-1 row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="grupo" id="grupo" value="{{ old('grupo') }}" placeholder="Grupo">
                                @error ('grupo')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>
             
                            <div class="mb-0 row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" placeholder="Nombre de Usuario">
                                @error ('username')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña (Mayor a 8 dígitos)">
                                @error ('password')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                <div class="col-sm-1-12">
                                    <input type="password" class="form-control" name="password_confirmada" id="password_confirmada" placeholder="Confirmar Contraseña">
                                @error ('password_confirmada')

                                <small class="text-danger">{{$message}}</small>

                                @enderror
                                </div>
                            </div>

                            <input type="checkbox" name="" id="" onclick="showPassword();"> <span  class="showpass"> Mostrar Contraseña</span>

                            <div class=" mb-3 mt-4 row justify-content-center aling-items-center">
                            
                                    <button type="submit" class="btn btn-primary p-1 widthbut opensans" value="Registrarse">Confirmar Registro</button>
                              
                            </div>


                        </form>


                            <div class="row mb-1 mt-1 text-center">

                                <p class="libreFranklin text-center">¿Ya tienes una Cuenta? <a class="" href="/login"><strong>Inicia Sesión</strong> </a></p>
                            </div>

                    </div>

                    
                </div>
                
            </div>
        </div>


      </div>
    
<nav class="navbar navbar-expand-lg backbarinf">
    <div class="container-fluid text-center pb-2 pt-2">

        <div class="col-6 offset-3 text-center">
                        
            <img src="{{asset('Img/large.png')}}" height="38px" width="auto" class="mt-1 mb-1">
            
        </div>
    
    </div>
</nav>

@endsection