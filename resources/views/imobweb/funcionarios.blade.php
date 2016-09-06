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
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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
						<table class="table" data-toggle="table" data-show-refresh="true" data-show-columns="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
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
								@else
									<td data-field="razao_social" data-sortable="true">{{$funcionario->razao_social}}</td>
								@endif
								
								<td data-field="cpf_cnpj"  data-sortable="true">{{$funcionario->cpf_cnpj}}</td>
								<td data-field="telefone" data-sortable="true">{{$funcionario->telefone}}</td>
								<td>
									<a href="" class="btn btn-success btn-xs">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
									<a href="" onclick="demiteFuncionario('{{$funcionario->nome}}')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
										<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									</a>									
								</td>
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
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Demissão de Funcionário</h4>
		</div>
		<div class="modal-body">
			Deseja realmente demitir o funcionário(a) <span id="name-funcionario"></span>?
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-primary">Confirmar</button>
		</div>
		</div>
	</div>
	</div>
@endsection

@section('demite-funcionario')
<script>
	function demiteFuncionario(nome){	
		$('#myModal').on('shown.bs.modal', function () {
  			$('#myInput').focus()
			$('#name-funcionario').html(nome)
		})
	}
</script>
@endsection