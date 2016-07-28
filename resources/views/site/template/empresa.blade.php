<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>{{ $titulo or 'ImobWeb' }}</title>
    <meta name="description" content="Cadastre sua empresa na ImobWeb."/>
    <meta name="robots" content="index, follow"/>

    <link rel="shortcut icon" href="{{ url('/assets/site/imagens/icone-imob.png') }}" type="image/x-icon" />

    <!--CSS Personalizado-->
    <link rel="stylesheet" href="{{ url('/assets/site/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/site/css/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/site/css/preloader.css') }}">

    <!--JS Personalizado-->
    <script src="{!! url('/assets/site/js/lumino.glyphs.js') !!}"></script>

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <![endif]-->
</head>
<body>

@yield('content')

<!--Jquery-->
<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- scripts -->
@yield('script')
</body>
</html>
