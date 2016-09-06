<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ url('/assets/site/imagens/icone-imob.png') }}" type="image/x-icon" />
    <title>{{$titulo or 'ImobWeb - DashBoard'}}</title>

    <link href="{{url('assets/imobweb/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/imobweb/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('assets/imobweb/css/bootstrap-table.css')}}" rel="stylesheet">
    <link href="{{url('assets/imobweb/css/styles.css')}}" rel="stylesheet">

    <!--Icons-->
    <script src="{{url('assets/imobweb/js/lumino.glyphs.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Imob</span>Web</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>{{Auth::user()->name}}<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Perfil</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Configurações</a></li>
							<li><a href="/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Sair</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
@yield('content')

    <script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('assets/imobweb/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/imobweb/js/chart.min.js')}}"></script>
    <script src="{{url('assets/imobweb/js/chart-data.js')}}"></script>
    <script src="{{url('assets/imobweb/js/easypiechart.js')}}"></script>
    <script src="{{url('assets/imobweb/js/easypiechart-data.js')}}"></script>
    <script src="{{url('assets/imobweb/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('assets/imobweb/js/bootstrap-table.js')}}"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>

@yield('cadastra-funcionario')
@yield('demite-funcionario')

</body>
</html>
