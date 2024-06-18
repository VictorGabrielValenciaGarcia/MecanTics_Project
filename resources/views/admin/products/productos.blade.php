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

        @include('Layouts.partials.messages2')

                <div class="container-fluid text-center mt-5 justify-content-center aling-items-center" >
                                    
                    <div class="row mt-1 text-center">

                        <div>
                                    
                        <img src="{{asset('Img/logo.png')}}" height="110px" width="auto">
                                        
                        </div>
                                    
                    </div>

                    <h1 class="Titles2ADM mb-1 mt-3 gren">Lista de Productos</h1>

                </div>

                <div class="container-fluid text-center mt-3 justify-content-center aling-items-center" >
                                
                    <div class="mb-2 mt-3 text-center">

                        <div class="col-8 offset-2 mb-3">

                            <a class="btn btn-primary p-1 widthbut botones-admi-listas" href="/usuarios" role="button">
                        
                                Regresar
                    
                            </a>

                        </div>
                    </div>
                    
                
                </div>

        @if ( count($productos) > 0 )

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
                                        <td scope="row" class="col-4 p-2 align-items-center">
                                                
                                            <img src="{{$producto->imagen}}" class="img-fluid mx-auto" alt="{{ $producto->tipo }}">

                                        </td>
                                        
                                        <td>

                                            <h5 class="h5-cata text-center mt-4">{{$producto->tipo}}</h5>

                                        
                                            <p class="p-cata text-center"> <span class="denotar-cata">En stock: </span>{{$producto->cantidad_disponible}}</p>

                                        </td>
                                        <td class="text-center">

                                            <div class="col-2 offset-1 mt-2 mb-2">

                                                <form action="{{route('eliminar.producto')}}" method="POST" class="form-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="idproducto" value="{{$producto->idproducto}}">
                                                    <button name="" id="" class="btn btn-danger" role="button" type="submit">
                                                    <i class="fa-solid fa-trash-can"></i>                             
                                                    </button>
                                                </form>

                                        
                                            </div>  

                                            <div class="col-2 text-center  offset-1 mb-2">
                                                <a name="" id="" class="btn btn-success" href="{{route('productos.show', $producto->idproducto)}}" role="button">
                                                <i class="fa-solid fa-circle-info"></i>                                 
                                                </a>
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

        @else

            <div class="p-5 noproducbg  offset-1 col-10 mt-3">
                <div class="container">
                    <h1 class="noproducbgletter text-center">No hay ningun Producto para mostrar</h1>

                </div>
            </div>

        @endif
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
                text: "¡Este producto se eliminará definitivamente!",
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
    
@endsection