@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li><a href="/dashboard/imoveis"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Imoveis</a></li>
            <li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
            <li><a href="/dashboard/vendas"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg> Vendas</a></li>
            <li><a href="/dashboard/reservas"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Reservas</a></li>
            <li><a href="/dashboard/contratos"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Contratos</a></li>
            <li class="active"><a href="/dashboard/relatorios"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Relatórios</a></li>

            <li role="presentation" class="divider"></li>
            <li><a href="/dashboard/imobiliaria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Imobiliaria</a></li>
            <li><a href="/dashboard/usuarios"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></use></svg> Usuários</a></li>
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg></li>
                <li><a href="/dashboard/relatorios">Relatórios</a></li>
                <li class="active">Clientes</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Relatórios</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Gera relatório de clientes.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/dashboard/relatorios/gera-relatorio-cliente">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-sm-2">CPF / CNPJ: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cpf_cnpj" placeholder="Digite o CPF/CNPJ" value="{{old('cpf_cnpj')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nome / Razão Social: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nome_razao" placeholder="Digite o nome ou a razão social" value="{{old('nome_razao')}}">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Tipo Cliente: </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_tipo_cliente" id="">
                                        <option value="">Selecione uma opção.</option>
                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Tipo Pessoa: </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="tipo_pessoa" id="">
                                        <option value="">Selecione uma opção.</option>
                                        <option value="J">JURÍDICA</option>
                                        <option value="F">FÍSICA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Cadastrado em: </label>
                                <div class="col-md-2">
                                    <input id="data" name="data_inicial" type="date" class="form-control">
                                </div>
                                <label class="control-label col-sm-1">até: </label>
                                <div class="col-md-3">
                                    <input id="data" name="data_final" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="/dashboard/relatorios" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection