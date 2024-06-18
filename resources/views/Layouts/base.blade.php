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
    <link rel="stylesheet" href="{{asset('/bootstrap/ticket_admi.css')}}">
    <link rel="stylesheet" href="{{asset('/bootstrap/productos_admi.css')}}">
    <link rel="stylesheet" href="{{asset('/bootstrap/usuarios_admi.css')}}">

    <!--ICONOS-->
    <link rel="stylesheet" href="{{asset('icons/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('icons/css/fontawesome.min.css')}}">


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/togglePW.js') }}"></script>
    <script src="{{ asset('bootstrap/viewPass.js') }}"></script>
    <script src="{{ asset('icons/js/all.min.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
   
    <title>Mecantic´s</title>
</head>
<body>


@yield('content')

<script type="text/javascript">

    (function() {
        setTimeout(function() {
        document.getElementById("splash").style.display = "none";
    }, 4300);
    })();

    $("#select_productos_en_canjeo").change(function () {
        let puntos = $( "#select_productos_en_canjeo option:selected" ).attr("data-puntos");
        $("#puntos_requeridos").val( puntos );
    });



</script>

</body>
</html>