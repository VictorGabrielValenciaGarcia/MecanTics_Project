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
            
            <div class="row mt-1 text-center mt-4">
                
                <div>
                    
                    <img src="{{asset('Img/logo.png')}}" height="110px" width="auto">
                    
                </div>
                
            </div>
            
            <h1 class="mb-1 mt-3 gren-tittle">Datos del producto</h2>

            <div class="container-fluid mt-2 mb-1">
                
                <div class="mb-2 mt-3 text-center">
        
                    <div class="col-8 offset-2 mb-3">
        
                        <a class="btn btn-primary p-1 widthbut botones-admi-listas marge-boton" href="/usuarios/listas/productos" role="button">
                    
                            Regresar
                
                        </a>
        
                    </div>
                </div>
                    
            </div> 

        </div>
        
        <div class="container mb-4 ps-4 pe-4">

            <div class="container-fluid text-center card mt-2 ps-4 pe-4">

                <div class="container mt-2 mb-3">
                    
                    <img src="{{ $producto->imagen }}"  class="img-fluid-p mt-3">

                </div>

                <!-- Detalles Cliente -->
                <p class="text-center ms-3 mt-4 libreFranklin-p negritas titulos-p gren-producto"><strong>{{ $producto->tipo }}</strong></p>

                <div class="container-fluid mb-1">

                    <div class="row ">
        
                            <p class="text-start letras_productos libreFranklin"><span class="negritas-p libreFranklin">Producto N°:</span>  {{ $producto->idproducto }} </p>
                            <p class="text-start letras_productos libreFranklin"><span class="negritas-p libreFranklin">Cantidad en Stock:</span>  {{ $producto->cantidad_disponible }}</p>
                            <p class="text-start letras_productos libreFranklin"><span class="negritas-p libreFranklin">Precio en tienda:</span>  {{ $producto->precio }}</p>
                            <p class="text-start letras_productos libreFranklin  mb-4"><span class="negritas-p libreFranklin">Costo en puntos:</span>  {{ $producto->puntos_requeridos }}</p>
                        
                    </div>
                </div>

                <!-- Fechas -->
                <div class="row ps-3 pe-3 mb-1 mt-2 gren-producto">
        
                        <div class="col-6" >
                            <p class="text-start fechas">Fecha de registro:</p>
                            <p class="text-start fechas-inf">{{ $producto->created_at }} </p>
                        </div>
        
                        <div class="col-6">
                            <p class="text-end fechas">Ultima modificación: </p>
                            <p class="text-end fechas-inf">{{ $producto->updated_at }} </p>
                        </div>
                        
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