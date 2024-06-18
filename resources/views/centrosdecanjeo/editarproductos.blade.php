@extends('layouts.base')
@section('title','Mecantic´s | Centros de canjeo - Agregar Productos')
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

            <div class="container-fluid text-center mt-5 justify-content-center aling-items-center" >
                

                
                <div class="row mt-1 text-center">

                    <div>
                                
                    <img src="{{asset('Img/logo.png')}}" height="110px" width="auto">
                                    
                    </div>
                                
                </div>

                <h1 class="TitlesADM mb-1 mt-2 gren">Crear Producto</h1>


            </div>

            <div class="container-fluid ">

                <div class="text-center">

                    <div class="col-6 offset-3 mb-3">

                        <a class="btn btn-primary p-1 widthbut opensanscam" href="/usuarios" role="button">
                                Regresar al listado
                        </a>

                    </div>
                </div>


                <div class="row mt-4">

                    <div class="offset-1 col-10 card mt-2 mb-4">
                            
                        <div class="container-fluid">
                        @if(isset($producto))

                            <form action="{{route('actualizar.producto')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="idproducto" value="{{$producto->idproducto}}">

                                <div class="mb-1 mt-3 row">
                                    <label for="imagen" class="col-sm-1-12 col-form-label">Imagen del Producto</label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" value="{{$producto->imagen}}" name="imagen" id="imagen" placeholder="URL de la Imagen" accept="image/*">

                                        @error ('imagen')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label">Nombre del Producto</label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" value="{{$producto->tipo}}" name="tipo" id="tipo" placeholder="">

                                        @error ('tipo')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label">Precio del Producto</label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{$producto->precio}}" name="precio" id="precio" placeholder="Precio del Producto">

                                        @error ('precio')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>


                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label">Puntos para Canjeo</label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{$producto->puntos_requeridos}}" name="puntos_requeridos" id="puntos_requeridos" placeholder="Puntos para Canjeo">

                                        @error ('puntos_requeridos')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label">En stock</label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{$producto->cantidad_disponible}}" name="cantidad_disponible" id="cantidad_disponible" placeholder="En stock">

                                        @error ('cantidad_disponible')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row justify-content-center aling-items-center text-center">
                                        <div class="offset-sm-4 col-sm-8">
                                            <button type="submit" class="btn btn-secondary btn-lg p-1 widthbutcam opensanscam">Guardar Cambios</button>
                                        </div>
                                </div>



                            </form>

                        @else

                            <form action="{{route('registrar.producto')}}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="mb-1 row">

                                    <label for="imagen" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" value="{{ old('imagen') }}" name="imagen"  id="imagen"  placeholder="URL de la Imagen">
                                        
                                        @error ('imagen')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" value="{{ old('tipo') }}" name="tipo"   id="tipo" placeholder="Nombre del Producto">

                                        @error ('tipo')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{ old('precio') }}" name="precio"  id="precio"  placeholder="Precio del Producto">

                                        @error ('precio')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>
                                

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{ old('puntos_requeridos') }}" name="puntos_requeridos"  id="puntos_requeridos" placeholder="Puntos para Canjeo">

                                        @error ('puntos_requeridos')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control"value="{{ old('cantidad_disponible') }}" name="cantidad_disponible" id="cantidad_disponible" placeholder="En stock">

                                        @error ('cantidad_disponible')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row justify-content-center aling-items-center text-center">
                                        <div class="offset-sm-4 col-sm-8">
                                            <button type="submit" class="btn btn-secondary btn-lg p-1 widthbutcam opensanscam">Guardar Producto</button>
                                        </div>
                                </div>  



                            </form>

                            @endif

                                
                        </div>
                                        
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

            <div class="container-fluid text-center mt-5 justify-content-center aling-items-center" >
                

                
                <div class="row mt-1 text-center">

                    <div>
                                
                    <img src="{{asset('Img/logo.png')}}" height="110px" width="auto">
                                    
                    </div>
                                
                </div>

                <h1 class="TitlesADM mb-1 mt-2 gren">Crear Producto</h1>


            </div>

            <div class="container-fluid ">

                <div class="text-center">

                    <div class="col-6 offset-3 mb-3">

                        <a class="btn btn-primary p-1 widthbut opensanscam" href="/usuarios" role="button">
                                Regresar al listado
                        </a>

                    </div>
                </div>


                <div class="row mt-4">

                    <div class="offset-1 col-10 card mt-2 mb-4">
                            
                        <div class="container-fluid">
                        @if(isset($producto))

                            <form action="{{route('actualizar.producto')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="idproducto" value="{{$producto->idproducto}}">

                                <div class="mb-1 mt-3 row">
                                    <label for="imagen" class="col-sm-1-12 col-form-label">Imagen del Producto</label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" value="{{$producto->imagen}}" name="imagen" id="imagen" placeholder="URL de la Imagen" accept="image/*">

                                        @error ('imagen')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label">Nombre del Producto</label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" value="{{$producto->tipo}}" name="tipo" id="tipo" placeholder="">

                                        @error ('tipo')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label">Precio del Producto</label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{$producto->precio}}" name="precio" id="precio" placeholder="Precio del Producto">

                                        @error ('precio')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>


                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label">Puntos para Canjeo</label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{$producto->puntos_requeridos}}" name="puntos_requeridos" id="puntos_requeridos" placeholder="Puntos para Canjeo">

                                        @error ('puntos_requeridos')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label">En stock</label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{$producto->cantidad_disponible}}" name="cantidad_disponible" id="cantidad_disponible" placeholder="En stock">

                                        @error ('cantidad_disponible')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row justify-content-center aling-items-center text-center">
                                        <div class="offset-sm-4 col-sm-8">
                                            <button type="submit" class="btn btn-secondary btn-lg p-1 widthbutcam opensanscam">Guardar Cambios</button>
                                        </div>
                                </div>



                            </form>

                        @else

                            <form action="{{route('registrar.producto')}}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="mb-1 row">

                                    <label for="imagen" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" value="{{ old('imagen') }}" name="imagen"  id="imagen"  placeholder="URL de la Imagen">
                                        
                                        @error ('imagen')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="text" class="form-control" value="{{ old('tipo') }}" name="tipo"   id="tipo" placeholder="Nombre del Producto">

                                        @error ('tipo')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{ old('precio') }}" name="precio"  id="precio"  placeholder="Precio del Producto">

                                        @error ('precio')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>
                                

                                <div class="mb-1 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control" value="{{ old('puntos_requeridos') }}" name="puntos_requeridos"  id="puntos_requeridos" placeholder="Puntos para Canjeo">

                                        @error ('puntos_requeridos')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                                    <div class="col-sm-1-12">
                                        <input type="number" class="form-control"value="{{ old('cantidad_disponible') }}" name="cantidad_disponible" id="cantidad_disponible" placeholder="En stock">

                                        @error ('cantidad_disponible')

                                        <small class="text-danger">{{$message}}</small>

                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row justify-content-center aling-items-center text-center">
                                        <div class="offset-sm-4 col-sm-8">
                                            <button type="submit" class="btn btn-secondary btn-lg p-1 widthbutcam opensanscam">Guardar Producto</button>
                                        </div>
                                </div>  



                            </form>

                            @endif

                                
                        </div>
                                        
                    </div>
                                
                                
                </div>
                                    
            </div>

        @endif


    <!--ICONOS-->
    <script src="./icons/js/all.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

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