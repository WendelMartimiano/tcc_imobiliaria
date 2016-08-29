@extends('imobweb.template.index')

@section('content')	
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
			<li><a href="/dashboard/imoveis"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Imoveis</a></li>
			<li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
			<li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
			<li><a href="/dashboard/contratos"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Contratos</a></li>
			<li><a href="/dashboard/relatorios"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Relatórios</a></li>
			
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="/dashboard/imobiliaria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Imobiliaria</a></li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg></a></li>
				<li class="active">Imobiliária</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Imobiliária</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Dados Imobiliária!</div>
					<div class="panel-body">
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Razão Social: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->razao_social}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">CNPJ: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->cnpj}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">E-Mail: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->email}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Telefone: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->telefone}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Inscrição: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->inscricao}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">CRECI: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->creci}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">CEP: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->cep}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Rua: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->rua}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Número: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->numero}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Bairro: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->bairro}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Cidade: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->cidade}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Estado: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$imobiliaria->uf}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 control-label" for="name">Plano Vigente: </label>
							<div class="col-md-9">
								<input id="name" name="name" type="text" placeholder="{{$plano->nome}} - R$ {{$plano->valor}}" class="form-control" readonly>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection