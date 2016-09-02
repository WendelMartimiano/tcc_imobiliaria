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
					<div class="panel-heading">Resultados da Pesquisa.</div>
					<div class="panel-body">
						<table data-toggle="table" >
							<thead>
							<tr>
								<th data-field="nome">Nome</th>
								<th data-field="cpf">CPF</th>
								<th data-field="telefone">Telefone</th>
							</tr>
							</thead>
							@forelse($funcionarios as $funcionario)
								<tr>
								@if($funcionario->tipo_pessoa = "J")
										<td>{{$funcionario->razao_social}}</td>
								@else
										<td>{{$funcionario->nome}}</td>
								@endif
									<td>{{$funcionario->cpf_cnpj}}</td>
									<td>{{$funcionario->telefone}}</td>
								</tr>
							@empty
								<p>Nenhum registro encontrado!</p>
							@endforelse
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>
@endsection