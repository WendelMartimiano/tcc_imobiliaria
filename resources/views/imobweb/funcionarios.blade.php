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

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Consulta de Funcionários.</div>
					<div class="panel-body">
						<label class="col-md-3 control-label" for="name">CPF: </label>
						<div class="col-md-9">
							<input id="name" name="name" type="text" placeholder="Digite o CPF" class="form-control">
						</div>
						<label class="col-md-3 control-label" for="name">Nome: </label>
						<div class="col-md-9">
							<input id="name" name="name" type="text" placeholder="Digite o Nome" class="form-control">
						</div>
						<div class="col-md-12 widget-right">
							<button type="submit" class="btn btn-primary">Buscar</button>
							<a href="/dashboard/cadastra-funcionarios" class="btn btn-default">Novo</a>
						</div>
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
								<th data-field="state" data-checkbox="true" >Item ID</th>
								<th data-field="nome" data-sortable="true">Nome</th>
								<th data-field="cpf"  data-sortable="true">CPF</th>
								<th data-field="telefone" data-sortable="true">Telefone</th>
							</tr>
							</thead>
							<tr>
								<th scope="row">1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<th scope="row">1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
								<td>@mdo</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>
@endsection