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
        @if (session('status'))            
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 {{ session('status') }}
			</div>
        @endif

		<div class="alert alert-success" id="message-success" role="alert" style="display: none"></div>
		<div class="alert alert-danger" id="message-danger" role="alert" style="display: none"></div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Consulta de Funcionários.</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-sm-2" for="cpf_cnpj">CPF/CNPJ:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="cpf_cnpj" placeholder="Digite o CPF/CNPJ" value="{{ old('cpf_cnpj') }}">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="nome">Nome:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nome" placeholder="Digite o nome" value="{{old('nome')}}">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary">Buscar</button>
									<a href="/dashboard/cadastra-funcionario" class="btn btn-default">Novo</a>
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
					<div class="panel-heading">Funcionários:</div>					
					<div class="panel-body">
						<table class="table" data-toggle="table" id="funcionarios-table">
							<thead>
							<tr>
								<th data-field="id">Item ID</th>
								<th data-field="nome" data-sortable="true">Nome</th>
								<th data-field="cpf_cnpj"  data-sortable="true">CPF/CNPJ</th>
								<th data-field="telefone" data-sortable="true">Telefone</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							@forelse($funcionarios as $funcionario)
								<tr>
								<td data-field="id">{{$funcionario->id}}</td>
								@if($funcionario->tipo_pessoa == "F")
									<td data-field="nome" data-sortable="true">{{$funcionario->nome}}</td>
									<td data-field="cpf_cnpj"  data-sortable="true">{{$funcionario->cpf_cnpj}}</td>
									<td data-field="telefone" data-sortable="true">{{$funcionario->telefone}}</td>
									<td>
										<a href="/dashboard/edita-funcionario" class="btn btn-success btn-xs">
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
										<a href="" onclick="modalDeleta('/dashboard/demite-funcionario/{{$funcionario->id}}')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
											<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
										</a>									
									</td>
								@else
									<td data-field="razao_social" data-sortable="true">{{$funcionario->razao_social}}</td>
									<td data-field="cpf_cnpj"  data-sortable="true">{{$funcionario->cpf_cnpj}}</td>
									<td data-field="telefone" data-sortable="true">{{$funcionario->telefone}}</td>
									<td>
										<a href="/dashboard/edita-funcionario" class="btn btn-success btn-xs">
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
										</a>
										<a href="" onclick="modalDeleta('/dashboard/demite-funcionario/{{$funcionario->id}}')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
											<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
										</a>									
									</td>
								@endif
								
								
							</tr>
							@empty
								<p>"Nenhum registro encontrado!"</p>
							@endforelse								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->

	<!-- Modal de Demissão -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Demissão de Funcionário</h4>
				</div>
				<div class="modal-body">
					<form action="">
						<input type="text" id="url-demitir" class="form-control" name="id" value="" style="display: none">
					</form>					
					<p>Deseja realmente demitir o funcionário(a)?</p>					
					<div class="alert alert-warning preloader-demitir" role="alert" style="display: none">Demitindo funcinário, por favor aguarde...</div>
				</div>
				<div class="modal-footer">					
					<button type="button" class="btn btn-primary" id="demiteFuncionario">Confirmar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>	
@endsection

@section('funcionario')
<script>
	//Chama modal de demissão
	function modalDeleta(url){
				
			$('#url-demitir').val(url)		

			$('#myModal').on('shown.bs.modal', function () {
				$('#myInput').focus()
			})	
	}

	//Efetua a demissão do funcionário
	$("#demiteFuncionario").click(function() {
		var url = $("#url-demitir").val();		

		var request = $.ajax({			
			url: url,
			method: "GET",
			beforeSend: iniciaPreloaderDemitir()
		});
		request.done(function(data){
			finalizaPreloaderDemitir();
			
			if(data == "1"){
				$('#myModal').modal('hide');
				$('#message-success').html("Não foi possível demitir o funcionário!");
				$('#message-success').show();
				setTimeout("location.reload();", 5000);				
			}else{
				$('#myModal').modal('hide');
				$('#message-danger').html("Não foi possível demitir o funcionário!");
				$('#message-danger').show();
				setTimeout("jQuery('#message-danger').hide();", 5000);
			}
			
		});
		request.fail(function(){
			finalizaPreloaderDemitir();
			$('#message-success').hide();
			alert("Falha Inesperada! Informe o erro a ImobWeb no contato (16)99999-9999.");
		});
	});

	function iniciaPreloaderDemitir(){
		$('.preloader-demitir').show();
	}

	function finalizaPreloaderDemitir(){
		$('.preloader-demitir').hide();
	}

</script>
@endsection