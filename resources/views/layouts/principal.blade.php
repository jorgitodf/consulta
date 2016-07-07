<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste - @yield('titulo')</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="">
@section('header')
    @include('layouts._includes._header')
@show

@section('nav')
    @include('layouts._includes._nav')
@show

</header>
<section class="">
@yield('conteudo')
</section>
<footer class="">
@section('footer')
    @include('layouts._includes._footer')
@show

</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>