@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li><a href="/dashboard/imoveis"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Imoveis</a></li>
            <li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li class="active"><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
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
                <li class="active">Clientes</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Clientes</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Consulta de Clientes.</div>
                    <div class="panel-body">
                        <form class="form-horizontal form-pesquisa" method="post" action="" send="">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nome_razao">Nome/Razão Social:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nome_razao" name="nome_razao" placeholder="Digite o nome" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="/dashboard/clientes/cadastra-cliente" class="btn btn-default">Novo</a>
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
                    <div class="panel-heading">{{$tituloTabela or 'Todos os Clientes:'}}</div>
                    <div class="panel-body">
                        <table class="table table-hover"  id="clientes-table">
                            <thead>
                            <tr>
                                <th data-field="id">Item ID</th>
                                <th data-field="nome_razao" data-sortable="true">Nome/Razão Social</th>
                                <th data-field="nome_fantasia" data-sortable="true">Nome Fantasia</th>
                                <th data-field="cpf_cnpj"  data-sortable="true">CPF/CNPJ</th>
                                <th data-field="telefone" data-sortable="true">Telefone</th>
                                <th data-field="tipo_cliente" data-sortable="true">Tipo</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td data-field="id">{{$cliente->id}}</td>
                                    <td data-field="nome_razao" data-sortable="true">{{$cliente->nome_razao}}</td>
                                    <td data-field="nome_fantasia" data-sortable="true">
                                        @if($cliente->nome_fantasia)
                                            {{$cliente->nome_fantasia}}
                                        @else
                                            -----
                                        @endif
                                    </td>
                                    <td data-field="cpf_cnpj"  data-sortable="true">{{$cliente->cpf_cnpj}}</td>
                                    <td data-field="telefone" data-sortable="true">{{$cliente->telefone}}</td>
                                    <td data-field="tipo_cliente" data-sortable="true">{{$cliente->descricao}}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $clientes->render() !!}
                    </div>
                </div>
            </div>
        </div><!--/.row-->

        <!-- Modal de Exclusão -->
        <div class="modal fade" id="modalDeleta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header header-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Exclusão de Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <input type="text" id="url-deletar" class="form-control" name="id" value="" style="display: none">
                        </form>
                        <p>Deseja realmente excluir o cliente(a)?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="deletaCliente">Confirmar</button>
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