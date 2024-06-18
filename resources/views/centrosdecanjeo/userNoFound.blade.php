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

                        <h4 class="advertencia mb-2 text-center mt-1">Fallo de Consulta</h4>

                        <p class="textoAdvertencia2 text-center"><strong>No se ha encontrado al Usuario.</strong></p>
            </div>
            
            <div class="p-4">
                <div class="container card ps-4 pt-3 pb-2 mb-3">

                    <p class="textoAdvertencia mb-2 text-start">Los datos ingresados no coinciden con ningún usuario registrado.</p>
                    <p class="textoAdvertencia mb-2 text-start"><strong>Por favor corrobore que:</strong></p>

                    <ul>
                        <li class="textoAdvertencia mb-2 text-start ms-3">El Id ingresado sea el correcto.</li>

                        <li class="textoAdvertencia text-start ms-3">La matrícula este escrita correctamente.</li>

                    </ul>
                    
                </div>
                
                <p class="textoAdvertencia2 text-center"><a href="{{ url()->previous() }}" class="btn btn-primary p-2 widthbut opensansnoaccess textoAdvertencia2 text-center"><strong>Entendido</strong></a></p>

            </div>



@endauth

@endsection