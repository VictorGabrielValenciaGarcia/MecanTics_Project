@extends('layouts.base')
@section('content')

@auth   

    <!-- Centros de Canjeo -->
    @if (Auth::user()->tipo == 'CENTRO DE CANJEO')
        
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
                                    
                        <img src="{{asset( $centro->foto_perfil ) }}" height="100px" width="100px" class=" rounded-circle">
                                    
                        </div>
                                    
                    </div>
                    <div class="row gren_ticket">
                        
                        <h1 class="Titles2ADM mt-4"><strong>Intercambio No. {{ $intercambio->id }}</strong></h1>
                        <p class="text-center fecha libreFranklin">{{ $intercambio->fecha }}</p>
        
                        <!-- Detalles Centro de canjeo -->
                        <p class="text-center negritas libreFranklin-centros margen-subir-centros">~ {{ $centro->username }} ~</p>
                        <p class="text-center margen-subir-centros">{{ $centro->nombre }} {{ $centro->primer_ap }} {{ $centro->segundo_ap }}</p>

                        <a href="mailto: {{ $centro->correo_personal }}" class="subrayado-centros libreFranklin-centros  mb-1">{{ $centro->correo_personal }}</a>

                    </div>


                </div>
                
                <!-- Detalles Cliente -->
                    <p class="text-start ms-3 mt-4 libreFranklin-centros negritas titulos-ticktet"><strong>Datos del cliente:</strong></p>

                    <div class="container-fluid  mb-2">

                        <div class="row gren_ticket ">
            
                            <div class="col-5" >
            
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">Usuario: </p>
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">Nombre: </p>
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">E-mail: </p>
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">Matrícula: </p>
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">Grupo: </p>
            
                            </div>
            
                            <div class="col-7">
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->username }} </p>
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->nombre }} {{ $usuario->primer_ap }} {{ $usuario->segundo_ap }}</p>
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->correo_personal }} </p>
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->matricula }} </p>
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->grupo }} </p>
                                
                            </div>
                            
                        </div>
                    </div>

                <!-- Detalles Compra -->
                    <p class="text-start ms-3 mt-4 libreFranklin-centros negritas titulos-ticktet"><strong>Detalles de la compra:</strong></p>

                    <div class="container-fluid mb-1">

                        <div class="row gren_ticket ">
            
                            <div class="col-6" >
            
                                <p class="text-start izq2 negritas letra-ticket-info-producto">N° de Producto: </p>
                                <p class="text-start izq2 negritas letra-ticket-info-producto">Nombre: </p>
                                <p class="text-start izq2 negritas letra-ticket-info-producto">Puntos Cobrados: </p>
                                <p class="text-start izq2 negritas letra-ticket-info-producto">Estado de entrega: </p>
            
                            </div>
            
                            <div class="col-6">
                                <p class="text-start der2 letra-ticket-info-producto2">{{ $producto->idproducto }} </p>
                                <p class="text-start der2 letra-ticket-info-producto2">{{ $producto->tipo }} </p>
                                <p class="text-start der2 letra-ticket-info-producto2">{{ $intercambio->puntos_descontados }} </p>
                                <p class="text-start der2 letra-ticket-info-producto2 subrayado">{{ $intercambio->estado }} </p>
                                
                            </div>
                            
                        </div>
                    </div>
                
                <!-- Fechas -->
                    <div class="row ps-3 pe-3 mb-1">
            
                            <div class="col-5" >
                                <p class="text-end fechas">Fecha de intercambio:</p>
                                <p class="text-end fechas-inf">{{ $intercambio->created_at }} </p>
                            </div>

                            <div class="col-2">
                                
                            </div>
            
                            <div class="col-5">
                                <p class="text-start fechas">Ultima modificación: </p>
                                <p class="text-start fechas-inf">{{ $intercambio->updated_at }} </p>
                            </div>
                            
                        </div>
                    </div>


            </div>

        </div>

        <div class="container-fluid mt-2 mb-3">
                        
            <div class="mb-2 mt-3 text-center">

                <div class="col-8 offset-2 mb-3">

                    <a class="btn btn-primary p-1 widthbut botones-admi-listas" href="{{ url()->previous() }}" role="button">
                
                        Regresar
            
                    </a>

                </div>
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
                                    
                        <img src="{{asset( $centro->foto_perfil ) }}" height="100px" width="100px" class=" rounded-circle">
                                    
                        </div>
                                    
                    </div>
                    <div class="row gren_ticket">
                        
                        <h1 class="Titles2ADM mt-4"><strong>Intercambio No. {{ $intercambio->id }}</strong></h1>
                        <p class="text-center fecha libreFranklin">{{ $intercambio->fecha }}</p>
        
                        <!-- Detalles Centro de canjeo -->
                        <p class="text-center negritas libreFranklin-centros margen-subir-centros">~ {{ $centro->username }} ~</p>
                        <p class="text-center margen-subir-centros">{{ $centro->nombre }} {{ $centro->primer_ap }} {{ $centro->segundo_ap }}</p>

                        <a href="mailto: {{ $centro->correo_personal }}" class="subrayado-centros libreFranklin-centros  mb-1">{{ $centro->correo_personal }}</a>

                    </div>


                </div>
                
                <!-- Detalles Cliente -->
                    <p class="text-start ms-3 mt-4 libreFranklin-centros negritas titulos-ticktet"><strong>Datos del cliente:</strong></p>

                    <div class="container-fluid  mb-2">

                        <div class="row gren_ticket ">
            
                            <div class="col-5" >
            
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">Usuario: </p>
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">Nombre: </p>
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">E-mail: </p>
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">Matrícula: </p>
                                <p class="text-start izquierda negritas letra-ticket-info-cliente">Grupo: </p>
            
                            </div>
            
                            <div class="col-7">
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->username }} </p>
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->nombre }} {{ $usuario->primer_ap }} {{ $usuario->segundo_ap }}</p>
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->correo_personal }} </p>
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->matricula }} </p>
                                <p class="text-start derecha letra-ticket-info-cliente">{{ $usuario->grupo }} </p>
                                
                            </div>
                            
                        </div>
                    </div>

                <!-- Detalles Compra -->
                    <p class="text-start ms-3 mt-4 libreFranklin-centros negritas titulos-ticktet"><strong>Detalles de la compra:</strong></p>

                    <div class="container-fluid mb-1">

                        <div class="row gren_ticket ">
            
                            <div class="col-6" >
            
                                <p class="text-start izq2 negritas letra-ticket-info-producto">N° de Producto: </p>
                                <p class="text-start izq2 negritas letra-ticket-info-producto">Nombre: </p>
                                <p class="text-start izq2 negritas letra-ticket-info-producto">Puntos Cobrados: </p>
                                <p class="text-start izq2 negritas letra-ticket-info-producto">Estado de entrega: </p>
            
                            </div>
            
                            <div class="col-6">
                                <p class="text-start der2 letra-ticket-info-producto2">{{ $producto->idproducto }} </p>
                                <p class="text-start der2 letra-ticket-info-producto2">{{ $producto->tipo }} </p>
                                <p class="text-start der2 letra-ticket-info-producto2">{{ $intercambio->puntos_descontados }} </p>
                                <p class="text-start der2 letra-ticket-info-producto2 subrayado">{{ $intercambio->estado }} </p>
                                
                            </div>
                            
                        </div>
                    </div>
                
                <!-- Fechas -->
                    <div class="row ps-3 pe-3 mb-1">
            
                            <div class="col-5" >
                                <p class="text-end fechas">Fecha de intercambio:</p>
                                <p class="text-end fechas-inf">{{ $intercambio->created_at }} </p>
                            </div>

                            <div class="col-2">
                                
                            </div>
            
                            <div class="col-5">
                                <p class="text-start fechas">Ultima modificación: </p>
                                <p class="text-start fechas-inf">{{ $intercambio->updated_at }} </p>
                            </div>
                            
                        </div>
                    </div>


            </div>

        </div>

        <div class="container-fluid mt-2 mb-3">
                        
            <div class="mb-2 mt-3 text-center">

                <div class="col-8 offset-2 mb-3">

                    <a class="btn btn-primary p-1 widthbut botones-admi-listas" href="{{ url()->previous() }}" role="button">
                
                        Regresar
            
                    </a>

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