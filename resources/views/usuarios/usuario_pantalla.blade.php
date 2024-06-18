<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{asset('Img/logo.png')}}">

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/bootstrap/estilos_generales.css')}}">

    <!--ICONOS-->
    <link rel="stylesheet" href="{{asset('icons/css/fontawesome.min.css')}}">


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('icons/js/all.min.js') }}"></script> 
    <script src="{{ asset('bootstrap/togglePW.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
   
    <title>Mecantic´s | Usuarios</title>
</head>
<body>


<!------------------------------------------------------------------------>
@auth

    <!-- Splash -->
        <div id="splashusuario">

            <div class="col-8 offset-2 text-center">
                <img src="{{ auth()->user()->foto_perfil }}" height="250px" width="250px" class="rounded-circle imgsplah">
            </div>

            <div class="col-8 offset-2 text-center">
                <h1 class="trueborinicio-splah">B<span class="trueboriniciosec-splah">ienvenid@</span></h1>
                <p class="usuario-splash">{{ auth()->user()->username }}</p>
            </div>

        </div> 
        
    <!-- Usuarios -->
        @if (Auth::user()->tipo == 'USUARIO')
        
            <div>

                <!--Navegacion-->
                    <nav class="navbar navbar-expand backbarsupsec sticky-top ">
                        <div class="container-fluid">
                    
                        
                            
                            <div class="col-xs-4">
        
                                <h1 class="trueborinicionot">M<span class="trueboriniciosecnot">E</span><span class="trueborinicionot">CAN</span><span class="trueboriniciosecnot">TIC´s</span></h1>
                                
                            </div>
                            
                            <div class="col-xs-5 text-end ">
                            
                                <h4 class="userfont">{{ auth()->user()->username }}</h4>
                                <h4 class="userfont">#{{ auth()->user()->matricula }}</h4>
                            
                            </div>
                            
                            <div class="col-xs-3">
        
                                    <button type="menu" class="btn " data-bs-toggle="modal" data-bs-target="#PerfilInfo">
                                        <img src="{{ auth()->user()->foto_perfil }}" height="70px" width="70px" class=" rounded-circle botonperfil">
                                    </button>
                                
                            </div>
                                
                            
                            
        
                        </div>
                    </nav>
                    @include('Layouts.partials.messages2')
                <!--Titulo-->
        
                    <div class="container-fluid text-center mt-5 justify-content-center aling-items-center" >
        
                        @if (Session::has('password_success'))
                            <div class="alert alert-success" role="alert"> {{ Session::get('password_success') }} </div>
                        @endif
                            
                        @if (Session::has('password_error'))
                            <div class="alert alert-danger" role="alert"> {{ Session::get('password_error') }} </div>
                            
                        @endif
                        
                        <h1 class="Titles mb-1">Mis Puntos</h1>
                        
                        </div>
        
                        <!--Tarjeta-->
        
                        <div class="container-fluid barra">
        
                        @if(Auth::user()->puntos >= 8000)
                            <img src="{{asset('Img/Tarjetas/Special.jpg')}}" class="tarjetasCamb" alt="Tartejat">
                        
                        @else
        
                            @if(Auth::user()->puntos >= 4000)
                            <img src="{{asset('Img/Tarjetas/LVL3.png')}}" class="tarjetasCamb" alt="Tartejat">
                            
                            @else
        
                                @if(Auth::user()->puntos >= 700)
                                <img src="{{asset('Img/Tarjetas/LVL2.png')}}" class="tarjetasCamb" alt="Tartejat">
                                
                                @else
        
                                    @if(Auth::user()->puntos > 0)
                                    <img src="{{asset('Img/Tarjetas/LVL1.png')}}" class="tarjetasCamb" alt="Tartejat">
                                    
                                    @else
        
                                        <img src="{{asset('Img/Tarjetas/LVL0.png')}}" class="tarjetasCamb" alt="Tartejat">
        
                                    @endif
        
                                @endif
                            @endif
                        @endif
        
                        </div>
        
                        <!--Puntos-->
        
                        <div class="container-fluid text-center  justify-content-center aling-items-center " >
                            
                            <h1 class="Puntosusuario points">{{ auth()->user()->puntos }} <span class="Puntosletterusuario">pt</span></h1>
                                
                        </div>
        
                        <div class="container-fluid text-center mt-4 justify-content-center aling-items-center" >
                            
                        <h1 class="Titles2">Catalogo de Cambio</h1>
                        
                    </div>
                
                <!--Collapse Catalogo-->

                    <div class="container-fluid text-center mt-3">
                        
                        <p>
                            <a class="btn btn-info border-2 opensans secundariosCatalogo" data-bs-toggle="collapse" href="#CatalogoCambio" aria-expanded="false" aria-controls="contentId">
                            - Mostrar Catálogo de Cambio -
                            </a>
                        </p>
                        <div class="collapse mt-2 mb-3 card poscarruser" id="CatalogoCambio">
                        
                            <div class="container">
                            
                                @foreach ($productos as $producto)

                                <?php
                                //Almacenatimento de valores
                                $precio_puntos = $producto->puntos_requeridos; //Precio requerido para canje
                                $puntos_actuales = Auth::user()->puntos; // Puntos reunidos por el ususario

                                //Porcentaje de avance _ Regla de 3
                                $avance = $puntos_actuales*100;
                                $progreso_usuario = intdiv($avance, $precio_puntos);

                                if ($progreso_usuario >= 100) {
                                    $progreso_usuario=100;
                                }

                                ?>

                                    <div class="row  mt-2 mb-3 gren-catalogo">
                                                        
                                            <div class="text-center col-4 p-3">
                                            
                                                <img src="{{$producto->imagen}}" class="img-fluid ms-2" alt="">
        
                                            </div>
                                
                                            <div class="text-start col-8">
                                                
                                                <div class="card-body">
                                    
                                                    <div class="row">
                                                
                                                        <h5 class="h5-cata text-center">{{$producto->tipo}}</h5>
       
                                                        <p class="p-cata"> <span class="denotar-cata">Puntos Necesarios:</span> {{number_format($producto->puntos_requeridos)}}</p>
        
                                                        @if ($producto->cantidad_disponible > 0)
        
                                                            <p class="p-cataedo"> <span class="denotar-cata">Estado:</span> <span class="disponible">Disponible</span> </p>

                                                            <p class="denotar-avance text-center">{{ $progreso_usuario }}%</p>
        
                                                        @else
        
                                                        <p class="p-cataedo"><span class="denotar-cata">Estado:</span> <span class="outstock">Fuera de Stock</span> </p>
        
                                                        @endif

                                                        
                                                    </div>

                                                    @if ($producto->cantidad_disponible > 0)
                                    
                                                    <div class="row">

                                                        <div class="">

                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-progressbar" role="progressbar"
                                                                    style="width: {{ $progreso_usuario }}%;" aria-valuenow="{{ $progreso_usuario }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>

                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    @endif
                                                    
                                                </div>
                                                
                                            </div>

                                    </div>
                                @endforeach
                            </div>
        
                            <div class="row mb-3 mt-2">
                                <div class="offset-3 col-6 justify-content-center">
                                    <div class="d-flex justify-content-center">
                                        {!! $productos->links() !!}
                                    </div>                        
                                </div>
                            </div>
                        
                        </div>
                
                    </div>
                
        
                
                <!-- Modal Profile -->
                    <div class="modal fade" id="PerfilInfo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                
                                <div class="modal-header">
                
                                    <div class="container ">
                                            
                                        <div class="row">
                                            
                                                        
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row mt-1 text-center">
                
                                            <div class="col-xs-2 mb-2">
                                            
                                                <img src="{{ auth()->user()->foto_perfil}}" height="180px" width="180px" class="  rounded-circle">
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                        <div class="col-xs-8">
                                            <h4 class="modal-title-user">{{ auth()->user()->username }}</h4>
        
                                            @if(Auth::user()->id >= 100000)
                                                <h6 class="modal-subtitle-user">#{{ auth()->user()->id }}</h6>
                                            @else
                                                @if(Auth::user()->id >= 10000){
                                                    <h6 class="modal-subtitle-user">#0{{ auth()->user()->id }}</h6>
                                                @else
                                                    @if(Auth::user()->id >= 1000)
                                                        <h6 class="modal-subtitle-user">#00{{ auth()->user()->id }}</h6>
                                                    @else
                                                        @if(Auth::user()->id >= 100)
                                                            <h6 class="modal-subtitle-user">#000{{ auth()->user()->id }}</h6>
                                                        @else
                                                            @if(Auth::user()->id >= 10)
                                                                <h6 class="modal-subtitle-user">#0000{{ auth()->user()->id }}</h6>
                                                            @else
                                                                <h6 class="modal-subtitle-user">#00000{{ auth()->user()->id }}</h6>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                
                                    </div>
                                
                                </div>
                
                
                
                                <div class="modal-body">         
                                        <div class="container-fluid">
                
                                                
                                                <h5 class="textuser">Nombre completo</h5>
                                                <p class="bgsucs"> {{ auth()->user()->nombre }} {{ auth()->user()->primer_ap }} {{ auth()->user()->segundo_ap }}</p>
                                                
                                                
                                                <h5 class="textuser">Correo Personal</h5>
                                                <p class="bgsucs">{{ auth()->user()->correo_personal }}</p>
                                                
                                                
                                                <h5 class="textuser" >Correo Institucional</h5>
                                                <p class="bgsucs">{{ auth()->user()->correo_inst }}</p>
                                                
                                                
                                                
                                                <h5 class="textuser">Matrícula Escolar</h6>
                                                <p class="bgsucs mb-4">{{ auth()->user()->matricula }}</p>
                                                

                                            <div class="row">
                                            <!-- Button trigger modal -->
                                                <button type="button" class="changeresprofile btn " data-bs-toggle="modal" data-bs-target="#CambiarPass">
                                                    Cambiar Contraseña<i class="fa-solid fa-angles-right mar-iconnav2"></i>
                                                </button>                           
                                            </div>
                                                
                                            <div class="row">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="changeresprofile btn " data-bs-toggle="modal" data-bs-target="#CambiarFoto">
                                                    Cambiar Foto de Perfil<i class="fa-solid fa-angles-right mar-iconnav1"></i>
                                                </button>
                                            </div>

                                            <div class="row">
                                            <!-- Button trigger modal -->
                                                <button type="button" class="changeresprofile btn " data-bs-toggle="modal" data-bs-target="#CambiarInfo">
                                                    Editar Información Personal<i class="fa-solid fa-angles-right mar-iconnav3" ></i>
                                                </button>
                                            </div>        
                
                                            <div class="mt-4 mb-0 row justify-content-center aling-items-center">
                                                                    
                                                <button type="submit" class="btn btn-primary p-1 widthbut"><a class="opensans" href="/logout">Cerrar Sesión</a></button>
                                        
                                            </div>
                                        
                                        </div>               
                                </div>
                
                
                            </div>
                        </div>
                    </div>
                
                <!----------------------------------------------------------------------------------------------------------------------->
                    
                <!-- Modal  FOTO-->
                    <div class="modal fade mt-3" id="CambiarFoto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header pb-5 gren-log">
                
                                    <div class="container gren-changeprofile">
                                        
                                        <div class="row">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row text-center">
                
                                            <div class="col-xs-2">
                                            
                                                <img id="foto_actual" src="{{ auth()->user()->foto_perfil }}" height="100px" width="100px" class="rounded-circle">
                                                <div class="col-xs-8 mt-2">
                                                    <h4 class="modal-title">- Actualiza tus Datos -</h4>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                    </div>
                
                
                                </div>
                
                                <div class="modal-body margenestabilizador">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs justify-content-center aling-items-center" id="myTab" role="tablist">
                                    
                                        <li class="nav-item tabs-login" role="presentation">
                                        <button class="nav-link nav-link-login active " id="login" data-bs-toggle="tab" data-bs-target="#galeria1" type="button" role="tab" aria-controls="home" aria-selected="true">Galería 1</button>
                                        </li>

                                        <li class="nav-item tabs-login" role="presentation">
                                            <button class="nav-link nav-link-login" id="profile-tab" data-bs-toggle="tab" data-bs-target="#galeria2" type="button" role="tab" aria-controls="profile" aria-selected="false">Galería 2</button>
                                        </li>

                                        <li class="nav-item tabs-login" role="presentation">
                                            <button class="nav-link nav-link-login" id="profile-tab" data-bs-toggle="tab" data-bs-target="#galeria3" type="button" role="tab" aria-controls="profile" aria-selected="false">Galería 3</button>
                                        </li>

                                    </ul>
                                    
                                    <!-- Tab panes -->
                                    <div class="tab-content mt-3">


                                        <!--Tab 1-->

                                        <div class="tab-pane active" id="galeria1" role="tabpanel" aria-labelledby="home-tab"> 

                                            <div class="container">
                                            
                                                    <div class="row mb-1 text-center">
                        
                                                        <div class="col-4">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_1.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_2.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_3.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                                
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_4.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_5.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_6.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                            
                                                    <div class="row">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_7.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_8.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_9.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                            </div>
                                        
                                        </div>  

                                        <!--Tab 2-->

                                        <div class="tab-pane" id="galeria2" role="tabpanel" aria-labelledby="profile-tab"> 

                                            <div class="container">
                                            
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_1.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_2.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_3.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                                
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_4.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_5.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_6.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                            
                                                    <div class="row">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_7.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_8.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_9.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                
                                            </div>

                                        </div>

                                        <!--Tab 3-->

                                        <div class="tab-pane" id="galeria3" role="tabpanel" aria-labelledby="profile-tab"> 

                                            <div class="container">
                                            
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_1.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_2.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_3.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                                
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_4.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_5.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_6.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                            
                                                    <div class="row">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_7.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_8.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_9.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                
                                            </div>

                                        </div>

                                        <!-- Formulario -->

                                        <div class="container">
                                                                                                
                                            <div class="row mb-2 mt-4">
                                                    <input type= "text" class="form-control text-center" value="" placeholder="Escribe la URL de la imagen a colocar" onBlur="document.getElementById('foto_actual').src=this.value;document.getElementById('url_perfil').value=this.value;" maxlength="191"> 
                                            </div>
                                                            
                                            <form method="POST" action="/cambiarfoto">
                                            @csrf
                                                <div class="row">
        
                                                    <input id="url_perfil" type= "hidden" name="foto_perfil" class="form-control" value="{{Auth::user()->foto_perfil}}">
                                                    @error ('foto_perfil')
        
                                                    <small class="text-danger">{{$message}}</small>
        
                                                    @enderror
        
                                                </div>
        
                                                <div class=" mb-2 mt-2 row justify-content-center aling-items-center">
                                                
                                                    <button type="submit" class="btn btn-primary p-1 widthbutcam opensans" value="Registrarse">Guardar Cambios</button>
                                        
                                                </div>
                                            </form>

                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                
                <!-- Modal Cambiar Contraseña-->
                    <div class="modal fade mt-5" id="CambiarPass" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                
                                    <div class="container yell">
                                        
                                        <div class="row">
                                            
                                                        
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row text-center">
                
                                            <div class="col-xs-2">
                                            
                                                <img id="foto_perfil" src="{{ auth()->user()->foto_perfil }}" height="100px" width="100px" class="rounded-circle">
        
                                                <div class="col-xs-8">
                                                    <h4 class="modal-title">Cambiar Contraseña</h4>
                                                    <h6 class="modal-title">-  Ingresa tu Contraseña Actual -</h6>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                    </div>
                
                
                                </div>
                
                                <div class="modal-body">
                                    <div class="container">
        
                                        <form method="POST" action="/cambiarpass">
                                            @csrf
        
        
                                            <div class="mb-2 row passpos">
                                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Contraseña Actual">
                                                </div>
        
                                                @error ('current_password')
        
                                                <small class="text-danger">{{$message}}</small>
        
                                                @enderror
                                            </div>
                
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña">
                                                </div>
        
                                                @error ('password')
        
                                                <small class="text-danger">{{$message}}</small>
        
                                                @enderror
                                            </div>
                                        
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña" >
                                                </div>
                                                @error ('password_confirmation')
        
                                                <small class="text-danger">{{$message}}</small>
        
                                                @enderror
        
                                            </div>
        
                                            <div class="mb-3">
                                                
                                                <input type="checkbox" name="" id="" onclick="showPassword();"> <span  class="showpass"> Mostrar Contraseña</span>
                                            </div>
        
                                            
                                            <div class="row text-center">
        
                                                <div class="col-5">
                                                    <button type="button" class="btn btn-secondary p-2 widthbutcampass1 opensanscam mx-auto" data-bs-dismiss="modal">Cancelar</button>
                                                </div>
        
                                                <div class="col-7">
        
                                                    <button type="submit" class="btn btn-success border-1 btn-lg p-1 widthbutcampass2 opensanscam">
                                                    Guardar Cambios
                                                    </button>
                                                    
                                                </div>
            
                                            </div>
                
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
        
        

                <!-- Modal INFO -->
                    <div class="modal fade mt-1" id="CambiarInfo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header gren">
                
                                    <div class="container ">
                                        
                                        <div class="row">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row text-center">
                
                                            <div class="col-xs-2">
                                            
                                            <img id="foto_perfil" src="{{ auth()->user()->foto_perfil }}" height="100px" width="100px" class="rounded-circle">
                                                <div class="col-xs-8 mt-3">
                                                    <h4 class="modal-title">- Actualiza tus Datos -</h4>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                    </div>
                
                
                                </div>
                
                                <div class="modal-body margenestabilizador">
                                    <div class="container">
                                        <form method="POST" action="/usuarios_update/usuarios">
                                        @csrf
        
                                        <div class="row">
                                            <input id="" type= "hidden" name="id" class="form-control" value="{{Auth::user()->id}}">
                                        </div>
        
                                        <div class="mb-1 row mt-2">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type= "text" class="form-control" value="{{Auth::user()->nombre}}" name="nombre" id="nombre" placeholder="Nombre(s)">
                                            @error ('nombre')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->primer_ap}}" name="primer_ap" id="primer_ap" placeholder="Apellido Paterno">
                                            @error ('primer_ap')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->segundo_ap}}" name="segundo_ap" id="segundo_ap" placeholder="Apellido Materno">
                                            @error ('segundo_ap')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                
                                        <div class="mb-1 row mt-2">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type= "text" class="form-control" value="{{Auth::user()->matricula}}" name="matricula" id="matricula" placeholder="Matrícula">
                                            @error ('matricula')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->correo_inst}}" name="correo_inst" id="correo_inst" placeholder="Correo Institucional">
                                            @error ('correo_inst')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->correo_personal}}" name="correo_personal" id="correo_personal" placeholder="Correo Personal">
                                            @error ('correo_personal')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->grupo}}" name="grupo" id="grupo" placeholder="Grupo">
                                            @error ('grupo')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
                        
                                        <div class="mb-0 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->username}}" name="username" id="username" placeholder="Nombre de Usuario">
                                            @error ('username')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class=" mb-1 mt-3 row justify-content-center aling-items-center">
                                        
                                            <button type="submit" class="btn btn-primary p-1 widthbutcam opensans" value="Registrarse">Guardar Cambios</button>
                                
                                        </div>

                                        </form>
                                    </div>
                
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                
                <!-- Modal CAMBIOS-->
                    <div class="modal fade mt-5" id="SuccessChange" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                
                                    <div class="container ">
                                            
                                        <div class="row">
                                            
                                                        
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row mt-1 text-center">
                
                                            <div class="col-xs-2">
                                            
                                                <img src="Img/AxolAl.png" height="150px" width="auto">
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                        <div class="col-xs-8 text-center">
                                            <h4 class="modal-title">Cambios Realizados</h4>
                                            <h6 class="modal-subtitle">- Con Éxito -</h5>
                                            
                                        </div>
                
                                        <div class=" mb-1 row justify-content-center aling-items-center">
                                            
                                            <button type="submit" class="btn btn-primary p-1 widthbutcam"><a class="opensans" href="/usuarios">Hecho</a></button>
                                    
                                        </div>
                
                                    
                                    </div>
                                
                                </div>
                
                                
                            </div>
                        </div>
                    </div>
                <!--Fin Usuarios-->

            </div>
        
    <!-- Centros de Canjeo -->
        @elseif (Auth::user()->tipo == 'CENTRO DE CANJEO')

            <div>
                <!--Navegacion-->
                    <nav class="navbar navbar-expand backbarsupsec sticky-top ">
                        <div class="container-fluid">
                    
                        
                            
                            <div class="col-xs-4">
        
                                <h1 class="trueborinicionot">M<span class="trueboriniciosecnot">E</span><span class="trueborinicionot">CAN</span><span class="trueboriniciosecnot">TIC´s</span></h1>
                                
                            </div>
                            
                            <div class="col-xs-5 text-end ">
                            
                                <h4 class="userfont">{{ auth()->user()->username }}</h4>

                                @if(Auth::user()->id >= 100000)
                                    <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                @else
                                    @if(Auth::user()->id >= 10000){
                                        <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                    @else
                                        @if(Auth::user()->id >= 1000)
                                            <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                        @else
                                            @if(Auth::user()->id >= 100)
                                                <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                            @else
                                                @if(Auth::user()->id >= 10)
                                                    <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                                @else
                                                    <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            
                            </div>
                            
                            <div class="col-xs-3">
        
                                    <button type="menu" class="btn " data-bs-toggle="modal" data-bs-target="#PerfilInfoCC">
                                        <img src="{{ auth()->user()->foto_perfil }}" height="70px" width="70px" class=" rounded-circle botonperfil">
                                    </button>
                                
                            </div>

                        </div>
                    </nav>
                
                    @include('Layouts.partials.messages2')     
                <!--Titulo-->

                    <div class="container-fluid text-center mt-5 justify-content-center aling-items-center" >
                        
                        <h1 class="Titles2ADM mb-1 gren">Canjeo de Puntos</h1>
                    
                    </div>

                <!-- Buscador -->
                
                    <div class="container-fluid">
                        
                        <div class="row gren pb-4">
                            
                            <div class="col-3 m-1">
                                <img src="Img/lata.png" height="175px" width="auto" class="imgadm">                   
                            </div>

                            <div class="col-8 card mt-4 p-4 ms-2 buscaruser">
                                    
                                    <div class="row">

                                        <h3 class="modal-canjeo mt-1 text-center">Encuentra tu Cliente <br> --- </h3>

                                        <form method="Post" action="/usuarios/descontador">
                                        @csrf

                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-form-label"></label>
                                                <div class="">
                                                    <input type="number" class="form-control backgreen" value="{{ old('id_usuario') }}" name="id_usuario" id="id" placeholder="ID del Usuario">
                                                @error ('id_usuario')
                                                <small class="text-danger text-start">{{$message}}</small>
                                                @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="inputName" class="col-form-label"></label>
                                                <div class="">
                                                    <input type="text" class="form-control backgreen" value="{{ old('matricula_usuario') }}"name="matricula_usuario" id="matricula" placeholder="Matrícula del Usuario">
                                                @error ('matricula_usuario')
                                                <small class="text-danger text-start">{{$message}}</small>
                                                @enderror
                                                </div>
                                            </div>
                    
                                            <div class="mb-2 row justify-content-center aling-items-center text-center">
                                                                
                                            <button type="submit" class="btn btn-primary p-1 widthbutcam opensans" value="Buscar">Buscar</button>
                                        
                                            </div>
                    
                    
                                        </form>
                                
                                    </div>
                                    
                            </div>


                        </div>
                    </div>


                <!--Catalogo-->

                    <div class="container-fluid text-center mt-4 justify-content-center aling-items-center" >
                        
                        <h1 class="Titles2ADM mb-1">Catálogo de Cambio</h1>

                            
                        <div class="mb-2 mt-3 text-center">

                            <div class="col-8 offset-2 mb-3">

                                <a class="btn btn-primary p-1 widthbut opensanscam" href="{{route('crear.producto')}}" role="button">
                            
                                    Agregar producto
                        
                                </a>

                            </div>
                        </div>
                        
                    
                    </div>

                    <div class="container-fluid">
                        
                        <div class="card mt-2 mb-3">
                            <div class="card-body">

                                <table class="table table-hover table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-center">Imagen</th>
                                            <th class="text-center">Descripción</th>
                                            <th class="text-center">Editar</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($productos as $producto)  

                                            <tr>
                                                <td scope="row" class=" text-center col-4 p-3 aling-middle mx-auto px-auto">
                                                    <img src="{{$producto->imagen}}" class="img-fluid mx-auto" alt="{{ $producto->tipo }}" width="100%">
                                                </td>
                                                
                                                <td>

                                                    <h5 class="h5-cata text-center">{{$producto->tipo}}</h5>

                                                    <p class="p-cata"> <span class="denotar-cata">Puntos Necesarios:</span> {{number_format($producto->puntos_requeridos)}}</p>
                                                    
                                                    <p class="p-cataedo "> <span class="denotar-cata">En stock: </span>{{$producto->cantidad_disponible}}</p>

                                                </td>
                                                <td class="text-center">

                                                    <div class="col-2 offset-1">

                                                        <a name="" id="" class="btn btn-warning" href="{{route('editar.producto', $producto->idproducto)}}" role="button">
                                                        <i class="fa-solid fa-pen-clip"></i>                                
                                                        </a>                                

                                                    </div>
                                                    <div class="col-2 offset-1 mt-2">

                                                        <form action="{{route('eliminar.producto')}}" method="POST" class="form-eliminar">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="idproducto" value="{{$producto->idproducto}}">
                                                            <button name="" id="" class="btn btn-danger" role="button" type="submit">
                                                            <i class="fa-solid fa-trash-can"></i>                             
                                                            </button>
                                                        </form>

                                                
                                                    </div>

                                                </td>
                                            </tr>

                                        @endforeach                            
                                        </tbody>
                                </table>
                                <div class="row mb-2 mt-4">
                                    <div class="offset-3 col-6 justify-content-center">
                                        <div class="d-flex justify-content-center">
                                            {!! $productos->links() !!}
                                        </div>                        
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>    
  
                <!-- ---------------------------------------- -->
                <!-- Modal  FOTO-->
                     <div class="modal fade mt-3" id="CambiarFoto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header pb-5 gren-log">
                
                                    <div class="container gren-changeprofile">
                                        
                                        <div class="row">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row text-center">
                
                                            <div class="col-xs-2">
                                            
                                                <img id="foto_actual" src="{{ auth()->user()->foto_perfil }}" height="100px" width="100px" class="rounded-circle">
                                                <div class="col-xs-8 mt-2">
                                                    <h4 class="modal-title">- Actualiza tus Datos -</h4>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                    </div>
                
                
                                </div>
                
                                <div class="modal-body margenestabilizador">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs justify-content-center aling-items-center" id="myTab" role="tablist">
                                    
                                        <li class="nav-item tabs-login" role="presentation">
                                        <button class="nav-link nav-link-login active " id="login" data-bs-toggle="tab" data-bs-target="#galeria1" type="button" role="tab" aria-controls="home" aria-selected="true">Galeria 1</button>
                                        </li>

                                        <li class="nav-item tabs-login" role="presentation">
                                            <button class="nav-link nav-link-login" id="profile-tab" data-bs-toggle="tab" data-bs-target="#galeria2" type="button" role="tab" aria-controls="profile" aria-selected="false">Galeria 2</button>
                                        </li>

                                        <li class="nav-item tabs-login" role="presentation">
                                            <button class="nav-link nav-link-login" id="profile-tab" data-bs-toggle="tab" data-bs-target="#galeria3" type="button" role="tab" aria-controls="profile" aria-selected="false">Galeria 3</button>
                                        </li>

                                    </ul>
                                    
                                    <!-- Tab panes -->
                                    <div class="tab-content mt-3">


                                        <!--Tab 1-->

                                        <div class="tab-pane active" id="galeria1" role="tabpanel" aria-labelledby="home-tab"> 

                                            <div class="container">
                                            
                                                    <div class="row mb-1 text-center">
                        
                                                        <div class="col-4">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_1.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_2.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_3.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                                
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_4.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_5.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_6.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                            
                                                    <div class="row">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_7.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_8.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_9.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                            </div>
                                        
                                        </div>  

                                        <!--Tab 2-->

                                        <div class="tab-pane" id="galeria2" role="tabpanel" aria-labelledby="profile-tab"> 

                                            <div class="container">
                                            
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_1.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_2.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_3.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                                
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_4.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_5.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_6.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                            
                                                    <div class="row">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_7.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_8.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_9.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                
                                            </div>

                                        </div>

                                        <!--Tab 3-->

                                        <div class="tab-pane" id="galeria3" role="tabpanel" aria-labelledby="profile-tab"> 

                                            <div class="container">
                                            
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_1.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_2.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_3.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                                
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_4.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_5.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_6.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                            
                                                    <div class="row">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_7.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_8.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_9.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                
                                            </div>

                                        </div>

                                        <!-- Formulario -->

                                        <div class="container">
                                                                                                
                                            <div class="row mb-2 mt-4">
                                                    <input type= "text" class="form-control text-center" value="" placeholder="Escribe la URL de la imagen a colocar" onBlur="document.getElementById('foto_actual').src=this.value;document.getElementById('url_perfil').value=this.value;" maxlength="191"> 
                                            </div>
                                                            
                                            <form method="POST" action="/cambiarfoto">
                                            @csrf
                                                <div class="row">
        
                                                    <input id="url_perfil" type= "hidden" name="foto_perfil" class="form-control" value="{{Auth::user()->foto_perfil}}">
                                                    @error ('foto_perfil')
        
                                                    <small class="text-danger">{{$message}}</small>
        
                                                    @enderror
        
                                                </div>
        
                                                <div class=" mb-2 mt-2 row justify-content-center aling-items-center">
                                                
                                                    <button type="submit" class="btn btn-primary p-1 widthbutcam opensans" value="Registrarse">Guardar Cambios</button>
                                        
                                                </div>
                                            </form>

                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Modal Cambiar Contraseña-->
                    <div class="modal fade mt-5" id="CambiarPass" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                
                                    <div class="container yell">
                                        
                                        <div class="row">
                                            
                                                        
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row text-center">
                
                                            <div class="col-xs-2">
                                            
                                                <img id="foto_perfil" src="{{ auth()->user()->foto_perfil }}" height="100px" width="100px" class="rounded-circle">
        
                                                <div class="col-xs-8">
                                                    <h4 class="modal-title">Cambiar Contraseña</h4>
                                                    <h6 class="modal-title">-  Ingresa tu Contraseña Actual -</h6>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                    </div>
                
                
                                </div>
                
                                <div class="modal-body">
                                    <div class="container">
        
                                        <form method="POST" action="/cambiarpass">
                                            @csrf
        
        
                                            <div class="mb-2 row passpos">
                                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Contraseña Actual">
                                                </div>
        
                                                @error ('current_password')
        
                                                <small class="text-danger">{{$message}}</small>
        
                                                @enderror
                                            </div>
                
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña">
                                                </div>
        
                                                @error ('password')
        
                                                <small class="text-danger">{{$message}}</small>
        
                                                @enderror
                                            </div>
                                        
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña" >
                                                </div>
                                                @error ('password_confirmation')
        
                                                <small class="text-danger">{{$message}}</small>
        
                                                @enderror
        
                                            </div>
        
                                            <div class="mb-3">
                                                
                                                <input type="checkbox" name="" id="" onclick="showPassword();"> <span  class="showpass"> Mostrar Contraseña</span>
                                            </div>
        
                                            
                                            <div class="row text-center">
        
                                                <div class="col-5">
                                                    <button type="button" class="btn btn-secondary p-2 widthbutcampass1 opensanscam mx-auto" data-bs-dismiss="modal">Cancelar</button>
                                                </div>
        
                                                <div class="col-7">
        
                                                    <button type="submit" class="btn btn-success border-1 btn-lg p-1 widthbutcampass2 opensanscam">
                                                    Guardar Cambios
                                                    </button>
                                                    
                                                </div>
            
                                            </div>
                
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Modal INFO -->
                    <div class="modal fade mt-3" id="CambiarInfoCC" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header gren">
                
                                    <div class="container ">
                                        
                                        <div class="row">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row text-center">
                
                                            <div class="col-xs-2">
                                            
                                            <img id="foto_perfil" src="{{ auth()->user()->foto_perfil }}" height="100px" width="100px" class="rounded-circle">
                                                <div class="col-xs-8 mt-3">
                                                    <h4 class="modal-title">- Actualiza tus Datos -</h4>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                    </div>
                
                
                                </div>
                
                                <div class="modal-body margenestabilizador">
                                    <div class="container">
                                        <form method="POST" action="/usuarios_update/centrosdecanjeo">
                                        @csrf

                                        <div class="row">
                                            <input id="" type= "hidden" name="id" class="form-control" value="{{Auth::user()->id}}">
                                        </div>
        
                                        <div class="mb-1 row mt-2">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type= "text" class="form-control" value="{{Auth::user()->nombre}}" name="nombre" id="nombre" placeholder="Nombre(s)">
                                            @error ('nombre')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->primer_ap}}" name="primer_ap" id="primer_ap" placeholder="Apellido Paterno">
                                            @error ('primer_ap')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->segundo_ap}}" name="segundo_ap" id="segundo_ap" placeholder="Apellido Materno">
                                            @error ('segundo_ap')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->correo_personal}}" name="correo_personal" id="correo_personal" placeholder="Correo Empresarial">
                                            @error ('correo_personal')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
                        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->username}}" name="username" id="username" placeholder="Nombre de Usuario">
                                            @error ('username')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class=" mb-3 mt-4 row justify-content-center aling-items-center">
                                        
                                            <button type="submit" class="btn btn-primary p-1 widthbutcam opensans" value="Registrarse">Guardar Cambios</button>
                                
                                        </div>
    
                                        </form>
                                    </div>
                
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Modal Profile -->
                    <div class="modal fade" id="PerfilInfoCC" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                
                                <div class="modal-header">
                
                                    <div class="container ">
                                            
                                        <div class="row">
                                            
                                                        
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row mt-1 text-center">
                
                                            <div class="col-xs-2 mb-2">
                                            
                                                <img src="{{ auth()->user()->foto_perfil}}" height="180px" width="180px" class="  rounded-circle">
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>

                                        <div class="col-xs-8">
                                            <h4 class="modal-title-user">{{ auth()->user()->username }}</h4>
        
                                            @if(Auth::user()->id >= 100000)
                                                <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                            @else
                                                @if(Auth::user()->id >= 10000){
                                                    <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                                @else
                                                    @if(Auth::user()->id >= 1000)
                                                        <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                                    @else
                                                        @if(Auth::user()->id >= 100)
                                                            <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                                        @else
                                                            @if(Auth::user()->id >= 10)
                                                                <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                                            @else
                                                                <h4 class="userfont">#Centro_{{ auth()->user()->id }}</h4>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                
                
                                    </div>
                                
                                </div>
                
                
                                <!-- Información -->
                                <div class="modal-body">         
                                        <div class="container-fluid">
                
                                                
                                                <h5 class="textuser">Nombre de Usuario</h5>
                                                <p class="bgsucs"> {{ auth()->user()->nombre }} {{ auth()->user()->primer_ap }} {{ auth()->user()->segundo_ap }}</p>
                                                
                                                
                                                <h5 class="textuser">Correo Empresarial</h5>
                                                <p class="bgsucs">{{ auth()->user()->correo_personal }}</p>

                                                
                                            <!-- Links -->
                                            <div class="row">
                                                 <!-- Button trigger modal -->
                                                <button type="button" class="changeresprofile btn " data-bs-toggle="modal" data-bs-target="#CambiarPass">
                                                    Cambiar Contraseña<i class="fa-solid fa-angles-right mar-iconnav2"></i>
                                                </button>                           
                                            </div>

                                            <div class="row">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="changeresprofile btn " data-bs-toggle="modal" data-bs-target="#CambiarFoto">
                                                    Cambiar Foto de Perfil<i class="fa-solid fa-angles-right mar-iconnav1"></i>
                                                </button>
                                            </div>
                                                
                                            <div class="row">
                                            <!-- Button trigger modal -->
                                                <button type="button" class="changeresprofile btn " data-bs-toggle="modal" data-bs-target="#CambiarInfoCC">
                                                    Editar Información Personal<i class="fa-solid fa-angles-right mar-iconnav3" ></i>
                                                </button>
                                            </div>        
                                                
                                            <div class="row">

                                                <a class="changeresprofile btn" href="/usuarios/intercambios/pendientes">
                                                    Intercambios pendientes<i class="fa-solid fa-angles-right mar-iconnav4" ></i>
                                                </a>

                                            </div>        
                                                
                                            <div class="row">

                                                <a class="changeresprofile btn" href="/usuarios/intercambios/realizados">
                                                    Intercambios realizados<i class="fa-solid fa-angles-right mar-iconnav5" ></i>
                                                </a>

                                            </div>        
                
                                            <div class="mt-4 mb-1 row justify-content-center aling-items-center">
                                                                    
                                                <button type="submit" class="btn btn-primary p-1 widthbut"><a class="opensans" href="/logout">Cerrar Sesión</a></button>
                                        
                                            </div>
                                        
                                        </div>               
                                </div>
                
                
                            </div>
                        </div>
                    </div>   
                    
                <!--Fin Centros de Canjeo -->

            </div>
        
    <!-- Administrador -->
        @elseif (Auth::user()->tipo == 'ADMINISTRADOR')

            <div>
                <!--Navegacion-->
                    <nav class="navbar navbar-expand backbarsupsec">
                        <div class="container-fluid">
                    
                        
                            
                            <div class="col-xs-6 text-center ps-3">
        
                                <h1 class="trueborinicioadmi">M<span class="trueboriniciosecadmni">E</span><span class="trueborinicioadmi">CAN</span><span class="trueboriniciosecadmni">TIC´s</span></h1>
                                
                            </div>
                                                      
                            <div class="col-xs-6 text-center pe-3">
        
                                    <button type="menu" class="btn " data-bs-toggle="modal" data-bs-target="#PerfilInfoAdmi">
                                        <img src="{{ auth()->user()->foto_perfil }}" height="80px" width="80px" class=" rounded-circle botonperfil">
                                    </button>
                                
                            </div>

                        </div>
                    </nav>
                    @include('Layouts.partials.messages2')
                <!-- Botones De Navegación -->

                    <div class="container-fluid text-center botones-admi justify-content-center aling-items-center" >

                        <div class="row text-center">

                            <div>
                                        
                            <img src="{{asset('Img/logo.png')}}" height="110px" width="auto">
                                            
                            </div>
                                        
                        </div>

                        <h1 class="Titles2ADM mb-0 mt-2 gren">Listas de Registros</h1>
                        
                    </div>

                    <div class="container ">
                        
                        <div class="container-fluid text-center ps-5 pe-5 pt-4 pb-4">
                                
                            <button href="/usuarios/listas/intercambios" type="submit" class="btn btn-primary btn-lg secundarios botones-admi-listas"><a class="opensans" href="/usuarios/listas/intercambios">Intercambios</a></button>
                                
                            <button type="submit" class="btn btn-primary btn-lg secundarios mt-4 botones-admi-listas"><a class="opensans" href="/usuarios/listas/productos">Productos</a></button>
                                
                            <button type="submit" class="btn btn-primary btn-lg secundarios mt-4 botones-admi-listas"><a class="opensans" href="/usuarios/listas/usuarios">Usuarios</a></button>
        
                        </div>

                    </div>


                    <nav class="navbar navbar-expand-lg backbarinfadmi">
                        <div class="container-fluid text-center pb-2 pt-2">

                            <div class="col-6 offset-3 text-center">
                                            
                                <img src="{{asset('Img/large.png')}}" height="38px" width="auto" class="mt-1 mb-1">
                                
                            </div>
                        
                        </div>
                    </nav>

                
                <!-- ---------------------------------------- -->
                <!-- Modal  FOTO-->
                     <div class="modal fade mt-3" id="CambiarFoto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header pb-5 gren-log">
                
                                    <div class="container gren-changeprofile">
                                        
                                        <div class="row">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row text-center">
                
                                            <div class="col-xs-2">
                                            
                                                <img id="foto_actual" src="{{ auth()->user()->foto_perfil }}" height="100px" width="100px" class="rounded-circle">
                                                <div class="col-xs-8 mt-2">
                                                    <h4 class="modal-title">- Actualiza tus Datos -</h4>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                    </div>
                
                
                                </div>
                
                                <div class="modal-body margenestabilizador">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs justify-content-center aling-items-center" id="myTab" role="tablist">
                                    
                                        <li class="nav-item tabs-login" role="presentation">
                                        <button class="nav-link nav-link-login active " id="login" data-bs-toggle="tab" data-bs-target="#galeria1" type="button" role="tab" aria-controls="home" aria-selected="true">Galeria 1</button>
                                        </li>

                                        <li class="nav-item tabs-login" role="presentation">
                                            <button class="nav-link nav-link-login" id="profile-tab" data-bs-toggle="tab" data-bs-target="#galeria2" type="button" role="tab" aria-controls="profile" aria-selected="false">Galeria 2</button>
                                        </li>

                                        <li class="nav-item tabs-login" role="presentation">
                                            <button class="nav-link nav-link-login" id="profile-tab" data-bs-toggle="tab" data-bs-target="#galeria3" type="button" role="tab" aria-controls="profile" aria-selected="false">Galeria 3</button>
                                        </li>

                                    </ul>
                                    
                                    <!-- Tab panes -->
                                    <div class="tab-content mt-3">


                                        <!--Tab 1-->

                                        <div class="tab-pane active" id="galeria1" role="tabpanel" aria-labelledby="home-tab"> 

                                            <div class="container">
                                            
                                                    <div class="row mb-1 text-center">
                        
                                                        <div class="col-4">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_1.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_2.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_3.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                                
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_4.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_5.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_6.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                            
                                                    <div class="row">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_7.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_8.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Pistache/Pistache_9.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                            </div>
                                        
                                        </div>  

                                        <!--Tab 2-->

                                        <div class="tab-pane" id="galeria2" role="tabpanel" aria-labelledby="profile-tab"> 

                                            <div class="container">
                                            
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_1.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_2.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_3.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                                
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_4.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_5.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_6.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                            
                                                    <div class="row">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_7.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_8.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Degradado/Degradado_9.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                
                                            </div>

                                        </div>

                                        <!--Tab 3-->

                                        <div class="tab-pane" id="galeria3" role="tabpanel" aria-labelledby="profile-tab"> 

                                            <div class="container">
                                            
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_1.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_2.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_3.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                                
                                                    <div class="row mb-1">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_4.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_5.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_6.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                                                            
                                                    <div class="row">
                        
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_7.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle"
                                                            onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;"
                                                            >
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_8.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                                                    
                                                        <div class="col-4 text-center">
                                                            <img src="{{asset('Img/FotosPerfil/Amarillo/Amarillo_9.png')}}" height="70px" width="70px" class="img-fluid mt-1 mb-1 rounded-circle" onClick="document.getElementById('foto_actual').src=this.src;document.getElementById('url_perfil').value=this.src;">
                                                        </div>
                        
                                                    </div>
                                                
                                            </div>

                                        </div>

                                        <!-- Formulario -->

                                        <div class="container">
                                                                                                
                                            <div class="row mb-2 mt-4">
                                                    <input type= "text" class="form-control text-center" value="" placeholder="Escribe la URL de la imagen a colocar" onBlur="document.getElementById('foto_actual').src=this.value;document.getElementById('url_perfil').value=this.value;" maxlength="191"> 
                                            </div>
                                                            
                                            <form method="POST" action="/cambiarfoto">
                                            @csrf
                                                <div class="row">
        
                                                    <input id="url_perfil" type= "hidden" name="foto_perfil" class="form-control" value="{{Auth::user()->foto_perfil}}">
                                                    @error ('foto_perfil')
        
                                                    <small class="text-danger">{{$message}}</small>
        
                                                    @enderror
        
                                                </div>
        
                                                <div class=" mb-2 mt-2 row justify-content-center aling-items-center">
                                                
                                                    <button type="submit" class="btn btn-primary p-1 widthbutcam opensans" value="Registrarse">Guardar Cambios</button>
                                        
                                                </div>
                                            </form>

                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Modal Cambiar Contraseña-->
                    <div class="modal fade mt-5" id="CambiarPass" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                
                                    <div class="container yell">
                                        
                                        <div class="row">
                                            
                                                        
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row text-center">
                
                                            <div class="col-xs-2">
                                            
                                                <img id="foto_perfil" src="{{ auth()->user()->foto_perfil }}" height="100px" width="100px" class="rounded-circle">
        
                                                <div class="col-xs-8">
                                                    <h4 class="modal-title">Cambiar Contraseña</h4>
                                                    <h6 class="modal-title">-  Ingresa tu Contraseña Actual -</h6>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                    </div>
                
                
                                </div>
                
                                <div class="modal-body">
                                    <div class="container">
        
                                        <form method="POST" action="/cambiarpass">
                                            @csrf
        
        
                                            <div class="mb-2 row passpos">
                                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Contraseña Actual">
                                                </div>
        
                                                @error ('current_password')
        
                                                <small class="text-danger">{{$message}}</small>
        
                                                @enderror
                                            </div>
                
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña">
                                                </div>
        
                                                @error ('password')
        
                                                <small class="text-danger">{{$message}}</small>
        
                                                @enderror
                                            </div>
                                        
                                            <div class="mb-2 row">
                                                <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña" >
                                                </div>
                                                @error ('password_confirmation')
        
                                                <small class="text-danger">{{$message}}</small>
        
                                                @enderror
        
                                            </div>
        
                                            <div class="mb-3">
                                                
                                                <input type="checkbox" name="" id="" onclick="showPassword();"> <span  class="showpass"> Mostrar Contraseña</span>
                                            </div>
        
                                            
                                            <div class="row text-center">
        
                                                <div class="col-5">
                                                    <button type="button" class="btn btn-secondary p-2 widthbutcampass1 opensanscam mx-auto" data-bs-dismiss="modal">Cancelar</button>
                                                </div>
        
                                                <div class="col-7">
        
                                                    <button type="submit" class="btn btn-success border-1 btn-lg p-1 widthbutcampass2 opensanscam">
                                                    Guardar Cambios
                                                    </button>
                                                    
                                                </div>
            
                                            </div>
                
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Modal INFO -->
                    <div class="modal fade mt-3" id="CambiarInfoAdmi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header gren">
                
                                    <div class="container ">
                                        
                                        <div class="row">
                                            
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row text-center">
                
                                            <div class="col-xs-2">
                                            
                                            <img id="foto_perfil" src="{{ auth()->user()->foto_perfil }}" height="100px" width="100px" class="rounded-circle">
                                                <div class="col-xs-8 mt-3">
                                                    <h4 class="modal-title">- Actualiza tus Datos -</h4>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                
                                    </div>
                
                
                                </div>
                
                                <div class="modal-body margenestabilizador">
                                    <div class="container">
                                        <form method="POST" action="/usuarios_update/adiministrador">
                                        @csrf
        
                                        <div class="row">
                                            <input id="" type= "hidden" name="id" class="form-control" value="{{Auth::user()->id}}">
                                        </div>
        
                                        <div class="mb-1 row mt-2">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type= "text" class="form-control" value="{{Auth::user()->nombre}}" name="nombre" id="nombre" placeholder="Nombre(s)">
                                            @error ('nombre')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->primer_ap}}" name="primer_ap" id="primer_ap" placeholder="Apellido Paterno">
                                            @error ('primer_ap')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->segundo_ap}}" name="segundo_ap" id="segundo_ap" placeholder="Apellido Materno">
                                            @error ('segundo_ap')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->correo_personal}}" name="correo_personal" id="correo_personal" placeholder="Correo Empresarial/Personal">
                                            @error ('correo_personal')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
                        
                                        <div class="mb-1 row">
                                            <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                            <div class="col-sm-1-12">
                                                <input type="text" class="form-control" value="{{Auth::user()->username}}" name="username" id="username" placeholder="Nombre de Usuario">
                                            @error ('username')
        
                                            <small class="text-danger">{{$message}}</small>
        
                                            @enderror
                                            </div>
                                        </div>
        
                                        <div class=" mb-3 mt-4 row justify-content-center aling-items-center">
                                        
                                            <button type="submit" class="btn btn-primary p-1 widthbutcam opensans" value="Registrarse">Guardar Cambios</button>
                                
                                        </div>
    
                                        </form>
                                    </div>
                
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Modal Profile -->
                    <div class="modal fade" id="PerfilInfoAdmi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                
                                <div class="modal-header">
                
                                    <div class="container ">
                                            
                                        <div class="row">
                                            
                                                        
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
                
                                        </div>
                                        
                                        
                                        <div class="row mt-1 text-center">
                
                                            <div class="col-xs-2 mb-2">
                                            
                                                <img src="{{ auth()->user()->foto_perfil}}" height="180px" width="180px" class="  rounded-circle">
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>

                                        <div class="col-xs-8">
                                            <h4 class="modal-title-user">{{ auth()->user()->username }}</h4>
                                            <h6 class="modal-subtitle-user">~ Administrador ~</h6>
                                            
                                        </div>
                
                
                                    </div>
                                
                                </div>
                
                
                
                                <div class="modal-body">         
                                        <div class="container-fluid">
                
                                                
                                                <h5 class="textuser">Nombre de Usuario</h5>
                                                <p class="bgsucs"> {{ auth()->user()->nombre }} {{ auth()->user()->primer_ap }} {{ auth()->user()->segundo_ap }}</p>
                                                
                                                
                                                <h5 class="textuser">Correo empresarial/personal    </h5>
                                                <p class="bgsucs">{{ auth()->user()->correo_personal }}</p>

                                                
                                            
                                            <div class="row">
                                                 <!-- Button trigger modal -->
                                                <button type="button" class="changeresprofile btn " data-bs-toggle="modal" data-bs-target="#CambiarPass">
                                                    Cambiar Contraseña<i class="fa-solid fa-angles-right mar-iconnav2"></i>
                                                </button>                           
                                            </div>

                                            <div class="row">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="changeresprofile btn " data-bs-toggle="modal" data-bs-target="#CambiarFoto">
                                                    Cambiar Foto de Perfil<i class="fa-solid fa-angles-right mar-iconnav1"></i>
                                                </button>
                                            </div>
                                                
                                            <div class="row">
                                            <!-- Button trigger modal -->
                                                <button type="button" class="changeresprofile btn " data-bs-toggle="modal" data-bs-target="#CambiarInfoAdmi">
                                                    Editar Información Personal<i class="fa-solid fa-angles-right mar-iconnav3" ></i>
                                                </button>
                                            </div>        
                
                                            <div class="mt-4 mb-1 row justify-content-center aling-items-center">
                                                                    
                                                <button type="submit" class="btn btn-primary p-1 widthbut"><a class="opensans" href="/logout">Cerrar Sesión</a></button>
                                        
                                            </div>
                                        
                                        </div>               
                                </div>
                
                
                            </div>
                        </div>
                    </div>   
                    
                <!-- Fin Administrador -->
            </div>

        @endif

@endauth
    
@guest

    <nav class="navbar navbar-expand-lg backbarsup sticky-top ">
        <div class="container-fluid ps-3">
        
            <div class="col-xs-2 mb-1 mx-auto">
                
                <img src="{{asset('Img/logowhitetiny.png')}}" height="65px" width="auto" class="mt-1 mb-1">
                
            </div>
            <div class="col-xs-3 text-start aling-middle me-5">
                
        
                <h1 class="trueborinicio">M<span class="trueboriniciosec">E</span><span class="trueborinicio">CAN</span><span class="trueboriniciosec">TIC´s</span></h1>
        
            </div>
        </div>
    </nav>

    <!--About us-->
    <div class="container mt-2">

                <img src="{{asset('Img/warning.png')}}" alt="advertencia" class="mt-3 img-fluid mx-auto axoldead">

                <h4 class="advertencia mb-2 text-center mt-4">* Advertencia * </h4>

                <p class="textoAdvertencia mb-3 text-center">Usted no está autorizado para acceder a la información o su sesión ha expirado.</p>
    </div>

    <div class="ps-4 pe-4 pt-3">
                <div class="container card  pt-4 pb-2 mb-3">


                    <p class="textoAdvertencia2 mb-2 text-center">Para ver el contenido, favor de:<a href="/login" class="btn btn-success p-2 widthbut opensansnoaccess mt-2"><strong>Iniciar Sesión</strong></a></p>
                    
                </div>
                


    </div>


@endguest

    <!-- Funcionamineto Splash -->
        <script type="text/javascript">
            (function() {
                setTimeout(function() {
                document.getElementById("splashusuario").style.display = "none";
            }, 2000);
            })();
        </script>
    <!-- Fin Funcionamineto -->
    <!-- Script SweetAlert -->
        <script type="text/javascript">

            @if (session('eliminar') == 'Listo')

                Swal.fire(
                    '¡Eliminado!',
                    'El producto ha sido eliminado con éxito',
                    'success'
                )
                
            @endif


            $(".form-eliminar").on("submit", function(e) {
                
                e.preventDefault();

                    Swal.fire({
                        title: '¿Estas seguro?',
                        text: "¡Este producto se eliminará  definitivamente!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Sí, elimínalo!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Swal.fire(
                            // 'Eliminado!',
                            // 'El producto ha sido eliminado',
                            // 'success'
                            // )
                        
                            this.submit();
                        }
                    });
            })

        </script>

</body>
</html> 
