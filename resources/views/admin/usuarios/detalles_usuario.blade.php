@extends('layouts.base')
@section('content')

@auth   

    <!-- Centros de Canjeo -->
    @if (Auth::user()->tipo == 'CENTRO DE CANJEO')
        
        <nav class="navbar navbar-expand-lg backbarsup sticky-top ">
            <div class="container-fluid">
        
                
                <div class="offset-2 col-8 text-center pt-1">
                    
                    
                <h1 class="trueborinicioDesc">M<span class="trueborinicioDescmin">E</span><span class="trueborinicioDesc">CAN</span><span class="trueborinicioDescmin">TIC´s</span></h1>
                    
                </div>
                
            
            </div>
        </nav>

        <!--About us-->
        <div class="container mt-2">

                    <img src="{{asset('Img/warning.png')}}" alt="advertencia" class="mt-3 img-fluid mx-auto axoldead">

                    <h4 class="advertencia mb-2 text-center mt-2">* Advertencia * </h4>

                    <p class="textoAdvertencia2 mb-3 text-center">Usted no está autorizado para poder acceder a esta información.</p>
        </div>

        <div class="ps-4 pe-4 pt-2">
            <div class="container card pt-3 pb-2 mb-3">

                <p class="textoAdvertencia mb-2 text-center"><strong>Por favor:</strong><br><a href="/usuarios" class="btn btn-primary p-2 widthbut opensansnoaccess mt-2 textoAdvertencia2"><strong>Vuelva atrás</strong></a></p>
                
            </div>
        </div>

    <!-- Usuarios -->
    @elseif (Auth::user()->tipo == 'USUARIO')
    
        <nav class="navbar navbar-expand-lg backbarsup sticky-top ">
            <div class="container-fluid">
        
                
                <div class="offset-2 col-8 text-center pt-1">
                    
                    
                <h1 class="trueborinicioDesc">M<span class="trueborinicioDescmin">E</span><span class="trueborinicioDesc">CAN</span><span class="trueborinicioDescmin">TIC´s</span></h1>
                    
                </div>
                
            
            </div>
        </nav>

        <!--About us-->
        <div class="container mt-2">

                    <img src="{{asset('Img/warning.png')}}" alt="advertencia" class="mt-3 img-fluid mx-auto axoldead">

                    <h4 class="advertencia mb-2 text-center mt-2">* Advertencia * </h4>

                    <p class="textoAdvertencia2 mb-3 text-center">Usted no está autorizado para poder acceder a esta información.</p>
        </div>

        <div class="ps-4 pe-4 pt-2">
            <div class="container card pt-3 pb-2 mb-3">

                <p class="textoAdvertencia mb-2 text-center"><strong>Por favor:</strong><br><a href="/usuarios" class="btn btn-primary p-2 widthbut opensansnoaccess mt-2 textoAdvertencia2"><strong>Vuelva atrás</strong></a></p>
                
            </div>
        </div>

    <!-- Administrador -->
    @elseif (Auth::user()->tipo == 'ADMINISTRADOR')
    
        <nav class="navbar navbar-expand-lg backbarsupsec sticky-top ">
            <div class="container-fluid">
        
                
                <div class="offset-2 col-8 text-center pt-1">
                    
                    
                <h1 class="trueborinicioDesc">M<span class="trueborinicioDescmin">E</span><span class="trueborinicioDesc">CAN</span><span class="trueborinicioDescmin">TIC´s</span></h1>
                    
                </div>
                
            
            </div>
        </nav>

        <div class="container-fluid text-center mt-5 ps-4 pe-4">
            <div class="container card mt-3">    
                <div class="container-fluid text-center  mb-2 mt-3 justify-content-center aling-items-center" >
                                
                    <div class="row mt-3 text-center">

                        <div>
                                    
                        <img src="{{$usuario->foto_perfil}}" height="145px" width="145px" class=" rounded-circle">
                                    
                        </div>
                                    
                    </div>
            
                    <div class="row grren_usuarios_lista">
                        
                        <h1 class="Title-username mt-4"><strong>{{ $usuario->username }}</strong></h1>
                        @if ($usuario->tipo == 'USUARIO')
                            <p class="text-center tipo libreFranklin es-usuario-detalles">~ {{ $usuario->tipo }} ~</p>
                        @elseif ($usuario->tipo == 'ADMINISTRADOR')
                            <p class="text-center tipo libreFranklin es-admi">~ {{ $usuario->tipo }} ~</p>
                        @elseif ($usuario->tipo == 'CENTRO DE CANJEO')
                            <p class="text-center tipo libreFranklin es-centro">~ {{ $usuario->tipo }} ~</p>
                        @endif

                        <!-- Detalles Centro de canjeo -->
                        <p class="text-center negritas libreFranklin-id margen-subir-id">- Registro No. {{ $usuario->id }} -</p>
                        <p class="text-center margen-subir-centros">{{ $usuario->nombre }} {{ $usuario->primer_ap }} {{ $usuario->segundo_ap }}</p>

                        <a href="mailto: {{ $usuario->correo_personal }}" class="subrayado-centros libreFranklin-centros  mb-1">{{ $usuario->correo_personal }}</a>

                    </div>

                    @if ($usuario->tipo == 'USUARIO')
                        
                        <div class="grren_usuarios_lista">

                            <h1 class="letras_puntos_usuarios_lista mb-1">Puntos recolectados</h1>
                            <h1 class="Puntosusuario_lista">{{ $usuario->puntos }} <span class="Puntosletterusuario_lista">pt</span></h1>

                        </div>

                        <p class="text-start ms-3 mt-4 libreFranklin-centros negritas titulos-ticktet"><strong>Información escolar:</strong></p>

                        <div class="container-fluid">

                            <div class="row grren_usuarios_lista ">
                
                                <li class="text-start negritas letra-usuarios-info-escolar margin-letritas-informacion-inst">Correo Institucional: <span class="text-start letra-usuarios-info-escolar normal margen-correo-inst">{{ $usuario->correo_inst }} </span></li>
                                <li class="text-start negritas letra-usuarios-info-escolar margin-letritas-informacion-inst">Matrícula: <span class="text-start letra-usuarios-info-escolar normal">{{ $usuario->matricula }} </span></li>
                                <li class="text-start negritas letra-usuarios-info-escolar margin-letritas-informacion-inst">Carrera: <span class="text-start letra-usuarios-info-escolar normal">{{ $usuario->carrera }} </span></li>
                                <li class="text-start negritas letra-usuarios-info-escolar margin-letritas-informacion-inst">Grupo: <span class="text-start letra-usuarios-info-escolar normal">{{ $usuario->grupo }} </span></li>
                                
                            </div>
                        </div>

                    @endif

                    <!-- Fechas -->
                    <div class="row ps-3 pe-3 mb-1 mt-2">
            
                            <div class="col-6" >
                                <p class="text-start fechas">Fecha de registro:</p>
                                <p class="text-start fechas-inf">{{ $usuario->created_at }} </p>
                            </div>
            
                            <div class="col-6">
                                <p class="text-end fechas">Ultima modificación: </p>
                                <p class="text-end fechas-inf">{{ $usuario->updated_at }} </p>
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div>

            <div class="container-fluid mt-2 mb-3">
                        
                <div class="mb-2 mt-3 text-center">
    
                    <div class="col-8 offset-2 mb-3">
    
                        <a class="btn btn-primary p-1 widthbut botones-admi-listas" href="/usuarios/listas/usuarios" role="button">
                    
                            Regresar
                
                        </a>
    
                    </div>
                </div>
                    
            </div>
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

@endsection