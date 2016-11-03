@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li><a href="/dashboard/imoveis"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Imoveis</a></li>
            <li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
            <li class="active"><a href="/dashboard/vendas"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg> Vendas</a></li>
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
                <li><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></li>
                <li class="active">Vendas</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Vendas</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Elaboração de contrato de venda.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="" send="">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Cliente Comprador:</label>
                                <div class="col-sm-10">
                                    <input name="cliente_comprador" type="text" placeholder="Digite o CPF/CNPJ ou nome do comprador" class="form-control" value="{{old('cliente_comprador')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Cliente Vendedor:</label>
                                <div class="col-sm-10">
                                    <input name="cliente_vendedor" type="text" placeholder="Digite o CPF/CNPJ ou nome do vendedor" class="form-control" value="{{old('cliente_vendedor')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Corretor:</label>
                                <div class="col-sm-10">
                                    <input name="corretor" type="text" placeholder="Digite o CPF ou nome do corretor" class="form-control" value="{{old('corretor')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Imóvel:</label>
                                <div class="col-sm-10">
                                    <input name="id_imovel" type="text" placeholder="Digite o código do imóvel" class="form-control" value="{{old('id_imovel')}}">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2" for="email">Tipos de Cotratos:</label>
                                <div class="col-sm-10">
                                    <select name="tipo_contrato" id="" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        <option value="">Contrato de Reserva</option>
                                        <option value="">Contrato de Venda</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Finalizar Venda</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
