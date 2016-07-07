<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste - @yield('titulo')</title>
    <!-- Styles -->
    <link href="{!! asset('bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" >
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{!! asset('css/estilos.css') !!}" rel="stylesheet">
    <script src="{!! asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('bootstrap/js/jquery.maskedinput.js') !!}" type="text/javascript"></script>

</head>
<body id="app-layout">
<script>
    $(document).ready(function(){
        $("#cpf").mask("999.999.999-99");
        $("#num_celular").mask("(99) 99999-9999");
        $("#num_telefone_residencial").mask("(99) 9999-9999");
        $("#num_telefone_comercial").mask("(99) 9999-9999");
        $("#cep").mask("99.999-999");
    });
</script>
<header class="">

    @section('nav')
        @include('layouts._includes._nav')
    @show

</header>
<section class="container-fluid">
    @yield('content')
</section>
<footer class="container">
</footer>
<!-- JavaScripts -->
<script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>

