@extends('imobweb.template.index')

@section('content')	
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
			<li><a href="/dashboard/imoveis"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Imoveis</a></li>
			<li class="active"><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
			<li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
			<li><a href="/dashboard/contratos"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Contratos</a></li>
			<li><a href="/dashboard/relatorios"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Relatórios</a></li>
			
			<li role="presentation" class="divider"></li>
			<li><a href="/dashboard/imobiliaria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Imobiliaria</a></li>
			<li><a href="/dashboard/usuarios"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></use></svg> Usuários</a></li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg></a></li>
				<li class="active">Funcionários</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Funcionários</h1>
			</div>
		</div><!--/.row-->    

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Consulta de Funcionários.</div>
					<div class="panel-body">
						<form class="form-horizontal form-pesquisa" method="post" action="/dashboard/funcionarios/pesquisar">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cpf_cnpj">CPF / CNPJ:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cpf_cnpj" placeholder="Digite o CPF ou CNPJ do funcionário" value="{{old('cpf_cnpj')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nome_razao">Nome / Razão Social:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nome_razao" placeholder="Digite o nome ou razão social do funcionário" value="{{old('nome_razao')}}">
                                </div>
                            </div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary">Buscar</button>
									<a href="/dashboard/funcionarios/cadastra-funcionario" class="btn btn-default">Novo</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">{{$tituloTabela or 'Todos os Funcionários:'}}</div>
					<div class="panel-body">
						<table class="table table-hover"  id="funcionarios-table">
							<thead>
							<tr>
								<th>Nome/Razão Social</th>
								<th>Nome Fantasia</th>
								<th>CPF/CNPJ</th>
								<th>Telefone</th>
								<th>Ações</th>
							</tr>
							</thead>
							<tbody>
							@foreach($funcionarios as $funcionario)
							<tr>
								<td>{{$funcionario->nome_razao}}</td>
								<td>
									@if($funcionario->nome_fantasia)
										{{$funcionario->nome_fantasia}}
									@else
										-----
									@endif
								</td>
								<td>{{$funcionario->cpf_cnpj}}</td>
								<td>{{$funcionario->telefone}}</td>
								<td>
									<a href="/dashboard/funcionarios/edita-funcionario/{{$funcionario->id}}" class="btn btn-success btn-xs">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
									<a href="" onclick="modalDeleta('/dashboard/funcionarios/demite-funcionario/{{$funcionario->id}}')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
										<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									</a>
								</td>
							</tr>														
							@endforeach														
							</tbody>								
						</table>
						{!! $funcionarios->render() !!}
					</div>
				</div>
			</div>
		</div><!--/.row-->

	<!-- Modal de Demissão -->
	<div class="modal fade" id="modalDemissao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header header-danger">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Demissão de Funcionário</h4>
				</div>
				<div class="modal-body">
					<form action="">
						<input type="text" id="url-demitir" class="form-control" name="id" value="" style="display: none">
					</form>					
					<p>Deseja realmente demitir o funcionário(a)?</p>
				</div>
				<div class="modal-footer">					
					<button type="button" class="btn btn-primary" id="demiteFuncionario">Confirmar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

		<!-- Modal Preloader -->
		<div class="modal fade bs-example-modal-sm" id="modalPreloader" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="spinner"></div>
					<p class="spinner-text">carregando..</p>
				</div>
			</div>
		</div>

		<!-- Modal Status Success-->
		<div class="modal fade bs-example-modal-sm" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header header-success">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="message-success"></h4>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Status Warning-->
		<div class="modal fade bs-example-modal-sm" id="modalWarning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header header-warning">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="message-warning"></h4>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('scripts')
<script>
	//Chama modal de demissão
	function modalDeleta(url){
				
			$('#url-demitir').val(url);
			$('#modalDemissao').modal('show');
	}

	//Efetua a demissão do funcionário
	$("#demiteFuncionario").click(function() {
		var url = $("#url-demitir").val();		

		var request = $.ajax({			
			url: url,
			method: "GET",
			beforeSend: iniciaPreloader()
		});
		request.done(function(data){
			finalizaPreloader();
			
			if(data == "1"){
				$('#modalDemissao').modal('hide');
				$('#message-success').html("Funcionário demitido com sucesso!");
				$('#modalSuccess').modal('show');
				setTimeout("$(window.document.location).attr('href', '/dashboard/funcionarios'); ", 3000);
			}else{
				$('#modalDemissao').modal('hide');
				$('#message-warning').html("Falha ao demitir funcionário! Informe o erro a ImobWeb no contato (16)99999-9999.");
				$('#modalWarning').modal('show');
			}
			
		});
		request.fail(function(){
			finalizaPreloader();
			
			alert("Falha Inesperada! Informe o erro a ImobWeb no contato (16)99999-9999.");
		});

		return false;
	});

	function iniciaPreloader(){
		$('#modalPreloader').modal({backdrop: 'static',  keyboard: false})
	}

	function finalizaPreloader(){
		$('#modalPreloader').modal('hide');
	}

</script>
@endsection