@extends('layouts.base')
@section('content')

@auth
    
            <nav class="navbar navbar-expand-lg backbarsup sticky-top ">
                <div class="container-fluid">
            
                    
                    <div class="offset-2 col-8 text-center pt-1">
                        
                        
                    <h1 class="trueborinicioDesc">M<span class="trueborinicioDescmin">E</span><span class="trueborinicioDesc">CAN</span><span class="trueborinicioDescmin">TIC´s</span></h1>
                        
                    </div>
                    
                
                </div>
            </nav>

            <!--About us-->
            <div class="container mt-2">

                        <img src="{{asset('Img/warning.png')}}" alt="advertencia" class="img-fluid mx-auto axoldead">

                        <h4 class="advertencia mb-2 text-center mt-3">Intercambio fallido</h4>

                        <p class="textoAdvertencia2 text-center"><strong>No ha sido posible realizar la acción.</strong></p>
            </div>
            <div class="p-4">
                        <div class="container card ps-4 pt-4 pb-2 mb-3">

                            <p class="textoAdvertencia mb-2 text-start"><strong>Por favor corrobore que:</strong></p>

                            <ul>
                                <li class="textoAdvertencia mb-2 text-start ms-3">El usuario cuente con los suficientes puntos.</li>

                                <li class="textoAdvertencia text-start ms-3">El producto esté disponible.</li>

                            </ul>
                           
                        </div>
                        
                        <p class="textoAdvertencia2 text-center"><a href="/usuarios" class="btn btn-primary p-2 widthbut opensansnoaccess textoAdvertencia2 text-center"><strong>Entendido</strong></a></p>


            </div>

@endauth

@endsection