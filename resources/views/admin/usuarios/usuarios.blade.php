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

            <h1 class="Titles2ADM mb-1 mt-3 gren">Usuarios registrados</h1>

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
        @if ( count($usuarios) > 1 )
            <div class="container mb-4 ps-2 pe-2">
            @foreach($usuarios as $usuario) 
                <div class="container-fluid text-center card mt-2 pt-3 pb-3 ps-2 pe-3">

                    <div class="row">
                        
                        <div class="col-4 d-flex align-items-center">
                            <div>
                                        
                            <img src="{{asset( $usuario->foto_perfil ) }}" height="100px" width="100px" class=" rounded-circle align-middle">
                                        
                            </div>
    
                        </div>
    
                        <div class="col-8">
                                    
                                <h5 class="usuinfotitle mt-1">{{$usuario->username}}</h5>
                                <p class="usuinfobody mt-3"><strong> E-mail:</strong> {{$usuario->correo_personal}}</p>

                                @if ($usuario->tipo == 'USUARIO')
                                    <p class="usuinfobody"><strong> Tipo de Usuario:</strong> <span class="es-usuario">{{$usuario->tipo}}</span></p>
                                @elseif ($usuario->tipo == 'ADMINISTRADOR')
                                    <p class="usuinfobody"><strong> Tipo de Usuario:</strong> <span class="es-admi">{{$usuario->tipo}}</span></p>
                                @elseif ($usuario->tipo == 'CENTRO DE CANJEO')
                                    <p class="usuinfobody"><strong> Tipo de Usuario:</strong> <span class="es-centro">{{$usuario->tipo}}</span></p>
                                @endif

                                <div class="row mt-4">

                                    <div class="col-6 text-center mb-1">

                                        <form action="{{route('eliminar.usuario', $usuario->id)}}" method="post" class="form-eliminar-user">
                                            @csrf
                                            @method('DELETE')
                                            <button name="" id="" class="btn btn-danger widthbut-user-admi" role="button" type="submit">
                                            <i class="fa-solid fa-trash-can"></i>                             
                                            </button>
                                        </form>

                                
                                    </div> 

                                    
                                    <div class="col-6 text-center mb-1">

                                        <a name="" id="" class="btn btn-secondary widthbut-user-admi" href="{{route('usuarios.show', $usuario->id)}}" role="button">
                                        <i class="fa-solid fa-circle-info tamaño-icono-admi"></i>
                                        </a>

                                    </div>

                                </div>
    
                        </div>

                    </div>

                </div>
            @endforeach
            </div>
            <div class="d-flex justify-content-end mt-4 mb-4">
                {!! $usuarios->links() !!}
            </div>
        @else

            <div class="p-5 noproducbg  offset-1 col-10 mt-3">
                <div class="container">
                    <h1 class="noproducbgletter text-center">No hay ningun Usuario para mostrar</h1>

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
            'El usuario ha sido eliminado con éxito',
            'success'
        )
        
    @endif


    $(".form-eliminar-user").on("submit", function(e) {
        
        e.preventDefault();

            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡Este usuario se eliminará definitivamente!",
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