<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>{{ $titulo or 'ImobWeb' }}</title>
    <meta name="description" content="Cadastre sua empresa na ImobWeb."/>
    <meta name="robots" content="index, follow"/>

    <link rel="shortcut icon" href="{{ url('/assets/site/imagens/icone-imob.png') }}" type="image/x-icon" />

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--CSS Personalizado-->
    <link rel="stylesheet" href="{{ url('/bower_components/materialize/dist/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/site/css/imobweb.css') }}">


    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <![endif]-->

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="fundo">

@yield('content')

<!--Jquery-->
<script src="{{ url('/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ url('/bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ url('/bower_components/materialize/dist/js/materialize.min.js') }}"></script>


<!-- scripts -->
@yield('script')
</body>
</html>
