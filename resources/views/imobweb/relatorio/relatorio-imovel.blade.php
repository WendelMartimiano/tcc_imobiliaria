@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            @shield('view.imovel')<li><a href="/dashboard/imoveis"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Imoveis</a></li>@endshield
            @shield('view.funcionario')<li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>@endshield
            @shield('view.cliente')<li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>@endshield
            @shield('view.venda')<li><a href="/dashboard/vendas"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg> Vendas</a></li>@endshield
            @shield('view.reserva')<li><a href="/dashboard/reservas"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Reservas</a></li>@endshield
            @shield('view.contrato')<li><a href="/dashboard/contratos"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Contratos</a></li>@endshield
            @shield('view.relatorio')<li  class="active"><a href="/dashboard/relatorios"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Relatórios</a></li>@endshield

            <li role="presentation" class="divider"></li>
            @shield('view.imobiliaria')<li><a href="/dashboard/imobiliaria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Imobiliaria</a></li>@endshield
            @shield('view.usuario')<li><a href="/dashboard/usuarios"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></use></svg> Usuários</a></li>@endshield
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg></li>
                <li><a href="/dashboard/relatorios">Relatórios</a></li>
                <li class="active">Imóveis</li>
            </ol>
        </div><!--/.row-->
        @shield('view.relatorio')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Relatórios</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Gera relatório de imóveis.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/dashboard/relatorios/gera-relatorio-imovel">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-sm-2">CEP: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cep" placeholder="Digite o número do cep" value="{{old('cep')}}">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Tipos de Imóvel: </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_tipo_imovel" id="">
                                        <option value="">Selecione uma opção.</option>
                                        @foreach($tiposImovel as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Status: </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status" id="">
                                        <option value="">Selecione uma opção.</option>
                                        <option value="">DISPONÍVEIS.</option>
                                        <option value="RESERVADO">RESERVADOS.</option>
                                        <option value="VENDIDO">VENDIDOS.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Situação: </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="situacao" id="">
                                        <option value="">Selecione uma opção.</option>
                                        <option value="USADO">USADO.</option>
                                        <option value="NOVO">NOVO.</option>
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
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Valor de: </label>
                                <div class="col-md-2">
                                    <input id="data" name="valor_inicial" type="text" class="form-control">
                                </div>
                                <label class="control-label col-sm-1">até: </label>
                                <div class="col-md-3">
                                    <input id="data" name="valor_final" type="text" class="form-control">
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
        @endshield
    </div>
@endsection