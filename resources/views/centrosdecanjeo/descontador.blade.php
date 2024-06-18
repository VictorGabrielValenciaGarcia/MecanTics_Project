@extends('layouts.base')
@section('title','Mecantic´s | Centros de canjeo - Descontador')
@section('content')

@auth
           
    <nav class="navbar navbar-expand-lg backbarsupsec sticky-top ">
        <div class="container-fluid">
    
            
            <div class="offset-2 col-8 text-center pt-1">
                
                
            <h1 class="trueborinicioDesc">M<span class="trueborinicioDescmin">E</span><span class="trueborinicioDesc">CAN</span><span class="trueborinicioDescmin">TIC´s</span></h1>
                
            </div>
            
        
        </div>
    </nav>

    <!--Titulo-->

    <div class="container-fluid text-center mt-5 justify-content-center aling-items-center" >
        
        <h1 class="TitlesADMdesc mb-1 gren">¡Usuario Encontrado!</h1>
    
    </div>

    <div class="container-fluid mt-2">
    
        <div class="row">
            
            <div class="col-3">
                <img src="{{asset('Img/FotosPerfil/Axolotitos/Axolotito_Standar.png')}}" height="110px" width="auto" class="imgdesc">                   
            </div>

            <div class="col-8 card cardfondo mt-4 pt-3">
                

                    
                    <div class="row text-center justify-content-center aling-items-center pt-2 pb-2">

                        <h4 class="modal-title-descontador">{{$usuario->username}}</h4>

                            @if($usuario->id >= 100000)
                                    <h6 class="modal-subtitle-descontador">#{{ $usuario->id }}</h6>
                                @else
                                    @if($usuario->id >= 10000){
                                        <h6 class="modal-subtitle-descontador">#0{{ $usuario->id }}</h6>
                                    @else
                                        @if($usuario->id >= 1000)
                                            <h6 class="modal-subtitle-descontador">#00{{ $usuario->id }}</h6>
                                        @else
                                            @if($usuario->id >= 100)
                                                <h6 class="modal-subtitle-descontador">#000{{ $usuario->id }}</h6>
                                            @else
                                                @if($usuario->id >= 10)
                                                    <h6 class="modal-subtitle-descontador">#0000{{ $usuario->id }}</h6>
                                                @else
                                                    <h6 class="modal-subtitle-descontador">#00000{{ $usuario->id }}</h6>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                            @endif

                        <p class="bgsucsdesc mt-1">{{$usuario->nombre}} {{$usuario->primer_ap}} {{$usuario->segundo_ap}}</p>
                
                    </div>
                    
            </div>

            <div class="container-fluid text-center  justify-content-center aling-items-center mt-4" >
            
                <h1 class="TitlesADMdesc mb-1">Puntos Acumulados</h1>
                <h1 class="Puntos points mt-3">{{$usuario->puntos}}<span class="Puntosletter">pt</span></h1>
                    
            </div>

        </div>

    </div>

    <div class="container-fluid text-center">
        @include('Layouts.partials.messages')

        <form method="POST" action="/usuarios/descontador/descontar">

        @csrf
        @method('POST')
            <div class="row">
                <input id="" type= "hidden" name="id_centrocanjeo" class="form-control" value="{{auth()->user()->id}}">
            </div>

            <div class="row">
                <input id="" type= "hidden" name="id_usuario" class="form-control" value="{{$usuario->id}}">
            </div>

            <div class="row mt-3 justify-content-center aling-items-center ">
                
                    <label for="" class="form-label col-4 text-start">Producto a Cambiar</label>

                    <select class="form-select text-center col-6" name="id_producto" id="select_productos_en_canjeo">
                        <option selected disabled>-- -- --</option>

                        @foreach ($productos as $producto)
                            
                        <option data-puntos="{{$producto->puntos_requeridos}}" value="{{$producto->idproducto}}">{{$producto->tipo}}</option>
                        
                        @endforeach
                        
                    </select>
                    @error ('id_producto')

                    <small class="text-danger">{{$message}}</small>

                    @enderror
            </div>

            <div class="row mt-3 justify-content-center aling-items-center ">
                
                    
                <label for="" class="form-label col-4 text-start">Puntos a Descontar</label>
                <input type="number" class="form-controldesc text-center col-5" name="puntos_requeridos" id="puntos_requeridos" aria-describedby="helpId" readonlyl >
                @error ('puntos_requeridos')

                <small class="text-danger">{{$message}}</small>

                @enderror
    
            </div>

            <div class="row mt-3 justify-content-center aling-items-center ">
                
                    
                <label for="" class="form-label col-4 text-start">Fecha del Intercambio</label>
                <input type="date" class="form-controldesc text-center col-5" name="fecha" id="" aria-describedby="helpId" placeholder="-- -- --" value="">
                @error ('fecha')

                <small class="text-danger">{{$message}}</small>

                @enderror
    
            </div>

            <div class="row mt-3 justify-content-center aling-items-center mb-4 mt-5">

                <div class="col-6">

                    <button type="button" class="btn btn-success p-1 widthbut desimp"><a class="opensans" href="/usuarios">Cancelar</a></button>
                    
                </div>
                
                <div class="col-6">

                    <button type="submit" class="btn btn-primary border-1 btn-lg p-1 widthbutcampass2 opensanscam desimp" value="Registrarse">Aceptar</button>
                    
                </div>
                


            </div>

        </form>   

    </div>
    
    <!-- Modal DescEfectivo -->
    <!-- <div class="modal fade mt-5" id="ConfirmarDesc" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <div class="container ">
                            
                       
                        <div class="row mt-1 text-center">

                            <div class="col-xs-2">
                            
                                <img src="{{asset('Img/AxolAl.png')}}" height="150px" width="auto">
                                
                                
                            </div>
                            
                            
                        </div>

                        <div class="col-xs-8 text-center">
                            <h4 class="modal-title">Canjeo Realizado</h4>
                            <h6 class="modal-subtitle">- Con Éxito -</h5>
                            
                        </div>

                        <div class=" mb-1 row justify-content-center aling-items-center">
                            
                            <button type="submit" class="btn btn-primary p-1 widthbutcam"><a class="opensans" href="CentrosdeCanjeo.html">Hecho</a></button>
                    
                        </div>

                    
                    </div>
                
                </div>

                
            </div>
        </div>
    </div> -->

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
