@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            @shield('view.imovel')<li><a href="/dashboard/imoveis"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Imoveis</a></li>@endshield
            @shield('view.funcionario')<li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>@endshield
            @shield('view.cliente')<li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>@endshield
            @shield('view.venda')<li><a href="/dashboard/vendas"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg> Vendas</a></li>@endshield
            @shield('view.reserva')<li  class="active"><a href="/dashboard/reservas"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Reservas</a></li>@endshield
            @shield('view.contrato')<li><a href="/dashboard/contratos"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Contratos</a></li>@endshield
            @shield('view.relatorio')<li><a href="/dashboard/relatorios"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Relatórios</a></li>@endshield

            <li role="presentation" class="divider"></li>
            @shield('view.imobiliaria')<li><a href="/dashboard/imobiliaria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Imobiliaria</a></li>@endshield
            @shield('view.usuario')<li><a href="/dashboard/usuarios"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></use></svg> Usuários</a></li>@endshield
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg></li>
                <li><a href="/dashboard/reservas">Reservas</a></li>
                <li class="active">Cadastro de Reserva</li>
            </ol>
        </div><!--/.row-->
        @shield('create.reserva')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Reservas</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Elaboração de contrato de reserva.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/dashboard/reservas/cadastra-reserva" send="" target="_blank">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tipos de Cotratos: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="tipo de contrato" value="CONTRATO DE {{$contrato->descricao}}" disabled>
                                    <input type="hidden" name="id_tipo_contrato" value="{{$contrato->id}}">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Imóvel: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="id_imovel" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($imoveis as $imovel)
                                            <option value="{{$imovel->id}}">{{$imovel->codigo}} | {{$imovel->bairro}} | {{$imovel->cidade}}, {{$imovel->uf}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Corretor: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="corretor" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($corretores as $corretor)
                                            <option value="{{$corretor->cpf_cnpj}}">{{$corretor->nome_razao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2" for="email">Cliente Vendedor: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="vendedor" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($vendedores as $vendedor)
                                            <option value="{{$vendedor->cpf_cnpj}}">{{$vendedor->nome_razao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2" for="name">Cliente Comprador: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="comprador" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($compradores as $comprador)
                                            <option value="{{$comprador->cpf_cnpj}}">{{$comprador->nome_razao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label class="control-label col-sm-2">Empresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_empresa" placeholder="empresa" value="{{Auth::user()->id_empresa}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Finalizar Reserva</button>
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

